<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserMedicalRequest;
use App\Http\Requests\UserPersonalRequest;
use App\Permission;
use App\User;
use App\UserAthletic;
use App\UserMedical;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class UserController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();
        return view('panel.dashboard')->with([
            'user' => $user
        ]);
    }

    public function index()
    {
        $users = User::latest()->get();
        $q = request('q');
        if ($q) {
            $users = $users->where('name', 'like', "%$q%")
                ->orWhere('family', 'like', "%$q%")
                ->orWhere('mobile', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%");
        }
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

        return redirect()->route('panel.admin.users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('panel.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
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
        $data = $request->all();
        $user = User::find($id);

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

        return redirect()->route('panel.admin.users.show', $id);
    }
}
