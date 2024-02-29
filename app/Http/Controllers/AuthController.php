<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user['password'] = Hash::make($user['password']);
        \DB::table('users')->insert($user);
        return back()->with('success', 'Register successfully');
    }

    public function login()
    {
        if ($this->guard()->check()) {
            return redirect($this->redirectPath());
        }
  		
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $this->loginValidator($request->all())->validate();
        $credentials = $request->only(['name','password']);
        $remember = $request->get('remember', false);
        \Cookie::queue('modal','yes',0.5);
        if ($this->guard()->attempt($credentials, $remember)) {
            return $this->sendLoginResponse($request);
        }
        return back()->withInput()->withErrors([
            'name' => $this->getFailedLoginMessage(),
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    protected function loginValidator(array $data)
    {
        return \Validator::make($data, [
            'name' => 'required',
            'password' => 'required',
        ]);
    }

    protected function getFailedLoginMessage()
    {
        return \Lang::has('auth.failed')
        ? trans('auth.failed')
        : 'These credentials do not match our records.';
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        return redirect()->intended($this->redirectPath())->with(['success' =>'Login Successfully']);
    }

    protected function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : route('home');
    }

    protected function guard()
    {
        return Auth::guard('');
    }
}
