<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthenticationController extends Controller
{
    public function login()
    {
        $page_name = "Login";
        return view('auth.login', ['page_name'=>$page_name]);
    }

    public function logged(Request $request)
    {
        //  ddd($request);
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $hash_password = md5($request->password);
        $count = AppUser::where('email', $request->email)->where('password', $hash_password)->where('is_active','1')->count();

        if($count < 1)
        {
            return Redirect()->back()->with('message', 'Wrong Username & Password')->withInput();
        }else
        {
            $user = AppUser::where('email', $request->email)->where('password', $hash_password)->where('is_active','1')->first();

            // dd($user->id);
            $request->session()->put('user_id', $user->id);
            $request->session()->put('name',  Str::words($user->name, $words = 2, $end='...'));
            $request->session()->put('email', $user->email);

            return Redirect()->route('setting');
        }
    }

    public function register()
    {
        $page_name = "Register";
        return view('auth.register', ['page_name'=>$page_name]);
    }

    public function registered(Request $request)
    {
        // ddd($request);

        $validated = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:app_users,email|email',
            'company_name' => 'required|min:5',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = AppUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'password' => md5($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $request->session()->put('user_id', $user->id);
        $request->session()->put('name',  Str::words($request->name, $words = 2, $end='...'));
        $request->session()->put('email', $request->email);

        return Redirect()->route('setting');
    }

    public function logout(Request $request)
    {
        // Forget multiple keys...

        $request->session()->forget(['user_id', 'name', 'email', 'password']);
        $request->session()->flush();
        return Redirect()->route('auth.login');
    }
}
