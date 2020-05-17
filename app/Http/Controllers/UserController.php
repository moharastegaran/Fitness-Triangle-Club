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
        $users = User::query();

        $q = request('q');
        if ($q) {
            $users = $users->where('name', 'like', "%$q%")
                ->orWhere('family', 'like', "%$q%")
                ->orWhere('mobile', 'like', "%$q%")
                ->orWhere('email', 'like', "%$q%");
        }
        $users = $users->paginate(10);
        return view('panel.users.index', compact('users'));
    }

    public function updatePersonal(UserPersonalRequest $request, User $user)
    {
        $data = $request->all();
        if ($request->password) {
            if (Hash::check($request->password, $user->password)) {
                $data['password'] = bcrypt($request->new_pwd);
            } else {
                return redirect()->back()->withErrors([
                    'password' => 'گذرواژه فعلی وارد شده مطابقت ندارد'
                ]);
            }
        } else {
            $data['password'] = $user->password;
        }
        $data['birthday'] = CalendarUtils::createCarbonFromFormat('Y-m-d', $data['birthday'])->toDateString();
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

    public function uploadMedicalAttachment(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile("file")) {
            $dir = env('MEDICAL_DIR_PATH');
            if ($user->medical) {
                if ($user->medical->attachment)
                    Storage::deleteDirectory($dir . $user->id);
            } else {
                return \response()->json([
                    'message' => 'ابتدا اطلاعات لازم را وارد کنید',
                    'class' => 'medical'
                ], 404);
            }
            return $this->uploadAttachment($request->file, $user->medical->attachment, $dir, $user->medical());
        } else {
            return "fuck uuu";
        }
    }

    public function downloadMedicalAttachment()
    {
        $user = auth()->user();
        return Response::download(
            storage_path('app/public/' . env('MEDICAL_DIR_PATH') . $user->id . '/' . $user->medical->attachment->filename));
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
            return $this->uploadAttachment($request->file, $user->athletic->image(), $dir, $user->athletic());
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
            return $this->uploadAttachment($request->file, $user->athletic->test(), $dir, $user->athletic(), 'test');
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

    private function uploadAttachment($file, $attachment, $dir, $attachmentable, $type = null)
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
                'attachmentable_id' => $attachmentable->first()->id,
                'attachmentable_type' => get_class($attachmentable->getRelated()),
                'type' => $type ?: 'image',
                'filename' => $filename,
                'title' => null
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


    public function show(User $user)
    {
        return view('adminlte.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'کاربر مورد نظر با موفقیت حذف شد.');
    }

    public function logout(){
        auth()->logout();
        return redirect()->to('/');
    }

}
