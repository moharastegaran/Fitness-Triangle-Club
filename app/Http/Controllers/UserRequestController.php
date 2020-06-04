<?php

namespace App\Http\Controllers;

use App\Expense;
use App\lib\zarinpal;
use App\Notifications\UserRequested;
use App\User;
use App\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use nusoap_client;

class UserRequestController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if (\request('mark_as_read')){
            auth()->user()->unreadNotifications->where('type',UserRequested::class)->markAsRead();
        }
        $requests = $user->isAdmin() ? UserRequest::latest()->get() : $user->requests()->latest()->get();
        return view('panel.user_requests.index', compact('requests'));
    }

    public function addOrder(Request $request, $id)
    {
        $total = 0;
        $ids = $request->expense_id;
        foreach ($ids as $_id) {
            $total += intval(Expense::find($_id)->price);
        }

        $order = new zarinpal();
        session()->put('is_workout_program', in_array(1, $ids));
        session()->put('is_nutrition_program', in_array(2, $ids));
        session()->put('price',$total);
        $res = $order->pay(route('panel.order.result', $id), $total, 'moharastegaran@gmail.com', '09057507969');
        return redirect()->to($res);
    }

    public function orderResult(Request $request, $id)
    {
        if (env('ZARINPAL_IS_MOCKED')) {

            $request = UserRequest::create([
                'user_id' => $id,
                'is_workout_program' => (session()->pull('is_workout_program') === true) ? 1 : 0,
                'is_nutrition_program' => (session()->pull('is_nutrition_program') === true) ? 1 : 0,
            ]);
            Notification::send(User::admins(),new UserRequested($request));

            return redirect()->route('panel.requests.index',$id);
        }

        $MerchantID = env('MERCHANT_ID');
        $Authority = $request->get('Authority');

        $Amount = session()->pull('price');
        if ($request->get('Status') == 'OK') {
            $client = new nusoap_client('https://www.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            $client->soap_defencoding = 'UTF-8';

            //در خط زیر یک درخواست به زرین پال ارسال می کنیم تا از صحت پرداخت کاربر مطمئن شویم
            $result = $client->call('PaymentVerification', [
                [
                    //این مقادیر را به سایت زرین پال برای دریافت تاییدیه نهایی ارسال می کنیم
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ],
            ]);
            if ($result['Status'] == 100) {
                $request = UserRequest::create([
                    'user_id' => $id,
                    'is_workout_program' => (session()->pull('is_workout_program') === true) ? 1 : 0,
                    'is_nutrition_program' => (session()->pull('is_nutrition_program') === true) ? 1 : 0,
                ]);
                Notification::send(User::admins(),new UserRequested($request));

                return redirect()->route('home');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

}
