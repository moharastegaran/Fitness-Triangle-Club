<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserMedicalRequest;
use App\Http\Requests\UserPersonalRequest;
use App\Notifications\DeadlineWarning;
use App\Notifications\UserRegistered;
use App\Permission;
use App\User;
use App\UserAthletic;
use App\UserMedical;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class UserController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();
        if ($user->isAdmin()) {
            return view('panel.dashboard')->with(['user' => $user]);
        } else {
            return redirect()->route('panel.users.show', $user->id);
        }
    }

    public function index()
    {
        $users = User::members();
        return view('panel.users.index', compact('users'));
    }

    public function updatePersonal(UserPersonalRequest $request, User $user)
    {
        $data = $request->all();
//        if ($request->password) {
//            if (Hash::check($request->password, $user->password)) {
//                $data['password'] = bcrypt($request->new_pwd);
//            } else {
//                return redirect()->back()->withErrors([
//                    'password' => 'گذرواژه فعلی وارد شده مطابقت ندارد'
//                ]);
//            }
//        } else {
//            $data['password'] = $user->password;
//        }
        $data['birthday'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['birth_year'] . '-' . $data['birth_month'] . '-' . $data['birth_day'])->toDateString();
        $user->update($data);
        return redirect()->back();
    }

    public function updateMedical(UserMedicalRequest $request, User $user)
    {
        $data = $request->all();
        if ($user->medical) {
            $user->medical->update($data);
        } else {
            $data['user_id'] = $user->id;
            UserMedical::create($data);
        }

        $this->uploadMedicalAttachment($request, $user);

        return redirect()->back();
    }

    public function updateAthletic(Request $request, User $user)
    {
        $data = $request->all();
        if ($user->athletic) {
            $user->athletic->update($data);
        } else {
            $data['user_id'] = $user->id;
            UserAthletic::create($data);
        }
        return redirect()->back();
    }

    public function uploadMedicalAttachment(Request $request, $user)
    {
        if ($request->hasFile("file")) {
            $dir = env('STORAGE_DIR_PATH') . env('MEDICAL_DIR_PATH');
            if ($user->medical) {
                if ($user->medical->attachment)
                    File::deleteDirectory(public_path($dir . $user->id));
            } else {
                return \response()->json([
                    'message' => 'ابتدا اطلاعات لازم را وارد کنید',
                    'class' => 'medical'
                ], 404);
            }
            return $this->uploadAttachment($request->file, $user->medical->attachment, $dir, $user->medical, 'medical');
        } else {
            return "fuck uuu";
        }
    }

    public function downloadMedicalAttachment()
    {
        $user = auth()->user();
        return Response::download(
            public_path(env('MEDICAL_DIR_PATH') . $user->id . '/' . $user->medical->attachment->filename));
    }

    public function uploadAthleticImageAttachment(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile("file")) {
            $dir = env('ATHLETIC_IMAGE_DIR_PATH');
            if ($user->athletic) {
                if ($user->athletic->image())
                    Storage::deleteDirectory($dir . $user->id);
            } else {
                UserAthletic::create(['user_id' => $user->id]);
            }
            return $this->uploadAttachment($request->file, $user->athletic->image(), $dir, $user->athletic);
        } else {
            return "fuck uuu";
        }
    }

    public function downloadAthleticImageAttachment()
    {
        $user = auth()->user();
        return Response::download(
            storage_path('app/public/' . env('ATHLETIC_IMAGE_DIR_PATH') . $user->id . '/' . $user->athletic->image()->filename));

    }

    public function uploadAthleticTestAttachment(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile("file")) {
            $dir = env('ATHLETIC_TEST_DIR_PATH');
            if ($user->athletic) {
                if ($user->athletic->test())
                    Storage::deleteDirectory($dir . $user->id);
            } else {
                UserAthletic::create(['user_id' => $user->id]);
            }
            return $this->uploadAttachment($request->file, $user->athletic->test(), $dir, $user->athletic, 'test');
        } else {
            return "fuck uuu";
        }
    }

    public function downloadAthleticTestAttachment()
    {
        $user = auth()->user();
        return Response::download(
            storage_path('app/public/' . env('ATHLETIC_TEST_DIR_PATH') . $user->id . '/' . $user->athletic->test()->filename));

    }

    private function uploadAttachment($file, $attachment, $dir, $object, $title)
    {
        $user = auth()->user();
        $ext = strtolower($file->getClientOriginalExtension());
        $filename = microtime("true") . "." . $ext;
        $file->storeAs($dir . $user->id, $filename);
        if ($attachment) {
            $attachment->filename = $filename;
            $attachment->save();
            $isFirst = false;
        } else {
            Attachment::create([
                'attachmentable_id' => $object->id,
                'attachmentable_type' => get_class($object),
                'type' => 'image',
                'filename' => $filename,
                'title' => $title
            ]);
            $isFirst = true;
        }

        return response()->json([
            'isFirst' => $isFirst,
            'redirect' => url()->previous(),
            'message' => 'آپلود فایل با موفقیت انجام شد'
        ]);
    }

    /* ADMIN USERS */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'family' => 'required',
            'mobile' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی است',
            'family.required' => 'وارد کردن نام خانوادگی الزامی است',
            'mobile.required' => 'وارد کردن موبایل الزامی است'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt('123456');
        $user = User::create($data);
        $user->roles()->sync(2);

        return redirect()->route('panel.users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        $this->authorize('view', $user);

        if (\request('mark_as_read')) {
            auth()->user()->unreadNotifications->where('type', UserRegistered::class)->MarkAsRead();
        }

//        dd($user->workout_programs()->get());
        $user_wp_count = count($user->workout_programs);
        $user_np_count = count($user->nutrition_programs);
        $user_unapproved_count = $user->requests()->where('is_approved',0)->count();
        return view('panel.users.show', compact('user', 'user_wp_count', 'user_np_count', 'user_unapproved_count'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

        if (!Session::has('user_update_first_attempt')) {
            Session::put('user_update_first_attempt', true);
        }
        return view('panel.users.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'کاربر مورد نظر با موفقیت حذف شد.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'family' => 'required',
            'email' => 'nullable|email',
            'mobile' => 'required|digits:11|regex:/^0?9[0-39][0-9]{8}$/',
        ], [
            'name.required' => 'وارد کردن نام الزامی است.',
            'family.required' => 'وارد کردن نام خانوادگی الزامی است.',
            'email.required' => 'فرمت ایمیل به درستی وارد نشده است.',
//            'email.unique' => 'وارد کردن ایمیل الزامی است.',
            'mobile.required' => 'وارد کردن شماره تماس الزامی است.',
//            'mobile.unique' => ' شماره تماس قبلا در سیستم ثبت شده است.',
            'mobile.digits' => 'شماره تماس ۱۱ رقمی است.',
            'mobile.regex' => 'فرمت شماره تماس به درستی وارد نشده است.'
        ]);

        if (User::where('id', '!=', $id)->where('mobile','=',$request->mobile)->first()) {
            $validator->getMessageBag()->merge(['mobile' => array('شماره تماس قبلا در سیستم ثبت شده است.')]);
        }

        if ($validator->getMessageBag()->count() > 0) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['birthday'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['birth_year'] . '-' . $data['birth_month'] . '-' . $data['birth_day'])->toDateString();
        $user->update(collect($data)->only(['name', 'family', 'email', 'mobile', 'birthday'])->toArray());

        if ($request->hasFile("avatar")) {
            $dir = env('AVATAR_DIR_PATH') . $user->id;
            File::deleteDirectory($dir);

            $file = $request->file("avatar");
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = microtime("true") . "." . $ext;
            $file->storeAs($dir, $filename);

            if ($user->avatar()) {
                $file = $user->attachment;
                $file->filename = $filename;
                $file->save();
            } else {
                Attachment::create([
                    'attachmentable_id' => $user->id,
                    'attachmentable_type' => User::class,
                    'type' => 'image',
                    'filename' => $filename,
                    'title' => 'avatar'
                ]);
            }
        }

        $medical_data = collect($data)->only(['blood_type', 'height', 'weight', 'disease_history', 'injury_history'])->toArray();
        $user_medical = $user->medical;
        if ($user_medical) {
            $user_medical->update($medical_data);
        } else if ($medical_data['blood_type'] ||
            $medical_data['weight'] ||
            $medical_data['height'] ||
            $medical_data['disease_history'] ||
            $medical_data['injury_history'] ||
            $request->hasFile("injury_result_test")) {
            $medical_data['user_id'] = $user->id;
            $user_medical = UserMedical::create($medical_data);
        }

        if ($request->hasFile("injury_result_test")) {
            $dir = env('MEDICAL_DIR_PATH') . $user->id;
            File::deleteDirectory($dir);

            $file = $request->file("injury_result_test");
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = microtime("true") . "." . $ext;
            $file->storeAs($dir, $filename);

            if ($user_medical && $user_medical->attachment) {
                $file = $user_medical->attachment;
                $file->filename = $filename;
                $file->save();
            } else {
                Attachment::create([
                    'attachmentable_id' => $user_medical->id,
                    'attachmentable_type' => UserMedical::class,
                    'type' => 'image',
                    'filename' => $filename,
                    'title' => 'injury'
                ]);
            }
        }

        $user_athletic = $user->athletic;
        $athletic_data = collect($data)->only(['target', 'athletic_history'])->toArray();
        if ($user_athletic) {
            $user_athletic->update($data);
        } else if ($athletic_data['target'] ||
            $athletic_data['athletic_history'] ||
            $request->hasFile("body_custom_test")) {
            $athletic_data['user_id'] = $user->id;
            UserAthletic::create($athletic_data);
        }

        if ($request->hasFile("body_custom_test")) {
            $dir = env('ATHLETIC_TEST_DIR_PATH') . $user->id;
            File::deleteDirectory($dir);

            $file = $request->file("body_custom_test");
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = microtime("true") . "." . $ext;
            $file->storeAs($dir, $filename);

            if ($user_athletic && $user_athletic->test()) {
                $file = $user_athletic->test();
                $file->filename = $filename;
                $file->save();
            } else {
                Attachment::create([
                    'attachmentable_id' => $user_athletic->id,
                    'attachmentable_type' => UserAthletic::class,
                    'type' => 'image',
                    'filename' => $filename,
                    'title' => 'test'
                ]);
            }
        }

        return redirect()->route('panel.users.show', $id);
    }


    public function userAttachments($id){
        $user = User::find($id);
        $files = $user->attachment()->where('title','!=','avatar')->get();
//        dd(env('USER_DIR_PATH'));
        return view('panel.users.uploadAttachment',compact('files','user'));
    }

    public function deadlineWarning_markAsRead(){
        auth()->user()->unreadNotifications->where('type', DeadlineWarning::class)->MarkAsRead();
        return redirect()->back();
    }
}
