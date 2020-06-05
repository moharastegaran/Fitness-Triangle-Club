<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Blog;
use App\Http\Requests\ArticleRequest;
use App\Notifications\UserRegistered;
use App\Permission;
use App\User;
use App\Workout;
use App\WorkoutCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\CalendarUtils;

class WebsiteController extends Controller
{

    public function index()
    {
        return view('website.home');
    }

    public function articles()
    {
        $articles = Blog::all();
        return view('website.articles', compact('articles'));
    }

    public function article($id)
    {
        $article = Blog::find($id);
        $others = Blog::where('id', '!=', $id)->get();
        return view('website.article', compact('article', 'others'));
    }

    public function videos()
    {
        $attachments = WorkoutCategory::join('workouts', 'workouts.category_id', '=', 'workout_category.id')
            ->join('attachments', 'attachments.attachmentable_id', '=', 'workouts.id')
            ->where('attachments.attachmentable_type', '=', Workout::class)
            ->where('attachments.type', '=', 'video')
            ->select(['workout_category.title as c_title', 'attachments.filename', 'attachments.title', 'attachments.created_at', 'attachments.attachmentable_id as w_id']);

        if ($category_id = request('category_id')) {
            $attachments = $attachments->where('workout_category.id', $category_id);
        }

        $categories = WorkoutCategory::all();
        $attachments = $attachments->paginate(6);
        return view('website.videos', compact('attachments', 'categories'));
    }

    public function register()
    {
        return view('website.auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'family' => 'required',
            'birthday' => 'required',
            'mobile' => 'required|unique:users|digits:11|regex:/^0?9[0-39][0-9]{8}$/',
            'password' => 'required|min:6|confirmed'
        ], [
            'name.required' => 'وارد کردن نام الزامی است.',
            'family.required' => 'وارد کردن نام خانوادگی الزامی است.',
            'birthday.required' => 'وارد کردن تاریخ تولد الزامی است.',
            'mobile.required' => 'وارد کردن شماره تماس الزامی است.',
            'mobile.unique' => 'کاربری با این شماره تماس قبلا ثبت نام کرده است.',
            'mobile.digits' => 'شماره تماس ۱۱ رقمی است.',
            'mobile.regex' => 'فرمت شماره تماس به درستی وارد نشده است.',
            'password.required' => 'وارد کردن رمز عبور الزامی است.',
            'password.min' => 'رمز عبور حداقل ۶ رقمی است.',
            'password.confirmed' => 'رمز عبور وارد شده مطابقت ندارد.',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['birthday'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['birthday'])->toDateString();
        $user = User::create($data);
        $user->roles()->sync(2);
        Notification::send(User::admins(),new UserRegistered($user));
        auth()->login($user);

        return redirect()->route('panel.dashboard');
    }

    public function login()
    {
        return view('website.auth.login');
    }

    public function check(Request $request)
    {
        $this->validate($request, [
            'email_or_phone' => 'required',
            'password' => 'required'
        ], [
            'email_or_phone.required' => 'وارد کردن ایمیل یا موبایل الزامی است.',
            'password.required' => 'وارد کردن رمز عبور الزامی است.'
        ]);

        $username = $request->email_or_phone;
        $key=strpos($username,"@") ? 'email' : 'mobile';
        if($user = User::where($key,$username)->first()) {
            if (Hash::check($request->password, $user->password)) {
                auth()->login($user);
                return redirect()->route('panel.dashboard');
            }else{
                return redirect()->back()->withErrors([
                    'password' => 'رمز عبور وارد شده اشتباه است.'
                ]);
            }
        }else{
            return redirect()->back()->withErrors([
                'email_or_phone' => 'ایمیل یا موبایل وارد شده اشتباه است'
            ]);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->to('/');
    }
}
