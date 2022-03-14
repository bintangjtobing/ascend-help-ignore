<?php

namespace App\Http\Controllers;

use App\company_details;
use App\User;
use App\userLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class authController extends Controller
{
    public function index()
    {
        $company = company_details::first();

        return view('auth.login', ['company' => $company]);
    }
    public function forgotPassword()
    {
        $company = company_details::first();
        return view('auth.forgot', ['company' => $company]);
    }
    public function askReset(Request $request)
    {
        $company = company_details::first();

        $email = $request->email;
        $users = User::where('email', '=', $email)->get();
        $user = $users[0];

        $saveLogs = new userLogs();
        $saveLogs->userId = $user->id;
        $saveLogs->ipAddress = $request->ip();
        $saveLogs->notes = 'Asking for reset password';
        $saveLogs->save();

        // Mail::to($email)->send(new askReset($user, $company));
        return view('auth.doneForgot', ['company' => $company]);
    }
    public function resetPassword($id)
    {
        $company = company_details::first();

        $user = User::where('id', $id)->get();
        return view('auth.reset', ['user' => $user[0], 'company' => $company]);
    }
    public function processResetPassword($id, Request $request)
    {
        $company = company_details::first();

        $users = User::where('id', $id)->get();
        $user = $users[0];
        $user->password = Hash::make($request->password);
        $user->unpassword = $request->password;
        $user->save();

        $saveLogs = new userLogs();
        $saveLogs->userId = $user->id;
        $saveLogs->ipAddress = $request->ip();
        $saveLogs->notes = 'Successfully reset password.';
        $saveLogs->save();

        Mail::to($user->email)->send(new doneReset($user, $company));
        return view('auth.doneReset', ['company' => $company]);
    }
    public function loginProcess(Request $request)
    {
        $remember_me = $request->has('remember') ? true : false;
        $request->merge(['status' => '1']);
        if (Auth::attempt($request->only('email', 'password', 'status'), $remember_me)) {
            $user = User::where(['email' => $request->email])->first();
            Auth::loginUsingId($user->id, TRUE);

            $saveLogs = new userLogs();
            $saveLogs->userId = Auth::id();
            $saveLogs->ipAddress = $request->ip();
            $saveLogs->notes = 'Logged in to system ASCEND HR Helper.';
            $saveLogs->save();

            return redirect('/');
        }
        return back()->with('gagal', ' Please check your auth status or your input!');
        // return 200;
    }
}
