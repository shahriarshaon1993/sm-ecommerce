<?php

namespace App\Http\Controllers\Frontend;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserVerifyNotification;
use Auth;
use Exception;
use Illuminate\Http\Request;
use PDOException;
use Str;
use Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function proccessLogin()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = request()->only(['email', 'password']);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->email_verified_at == null) {
                $this->setError('Your account is not activated. Please check your mail');
                return redirect()->route('login');
            }

            $this->setSuccess('User logged in.');
            return redirect()->intended();
        }

        $this->setError('Invalid credentials');

        return redirect()->back();
    }

    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    public function proccessRegister()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|min:11|unique:users,phone_number',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'name' => trim(request()->input('name')),
                'email' => Str::lower(trim(request()->input('email'))),
                'phone_number' => request()->input('phone_number'),
                'password' => bcrypt(request()->input('password')),
                'email_verification_token' => uniqid(time(), true) . Str::random(16),
            ]);

            $user->notify(new UserVerifyNotification($user));

            $this->setSuccess('Account registered');

            return redirect()->route('login');
        } catch (Exception $e) {

            $this->setError($e->getMessage());
            return redirect()->back();
        }
    }

    public function activate($token = null)
    {
        if ($token == null) {
            return redirect('/');
        }

        $user = User::where('email_verification_token', $token)->firstOrFail();

        if ($user) {
            $user->update([
                'email_verified_at' => now(),
                'email_verification_token' => null,
            ]);

            $this->setSuccess('Account activated. You can login now.');
            return redirect()->route('login');
        }

        $this->setError('Invalid token.');
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        $this->setSuccess('User logged out.');
        return redirect()->route('login');
    }
}
