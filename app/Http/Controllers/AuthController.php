<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Validator;

class AuthController extends Controller
{
    /**
     * Display login of the resource.
     *
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect(route('admin.start'));
        }

        $title = 'Login';
        $description = 'Some description for the page';

        return view('auth.login', compact('title', 'description'));
    }

    /**
     * Display register of the resource.
     *
     * @return View
     */
    public function register()
    {
        $title = 'Register';
        $description = 'Some description for the page';

        return view('auth.register', compact('title', 'description'));
    }

    /**
     * Display forget password of the resource.
     *
     * @return View
     */
    public function forgetPassword()
    {
        $title = 'Forget Password';
        $description = 'Some description for the page';

        return view('auth.forget_password', compact('title', 'description'));
    }

    /**
     * make the user able to register
     *
     * @return
     */
    public function signup(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validators->fails()) {
            return redirect()->route('register')->withErrors($validators)->withInput();
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            //            return redirect()->intended(route('dashboard.demo_one','en'))->with('message','Registration was successfull !');
        }
    }

    /**
     * make the user able to login
     *
     * @param  Request  $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function authenticate(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validators->fails()) {
            return redirect()->route('login')->withErrors($validators)->withInput();
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect(route('admin.start'));
            } else {
                return redirect()->route('login')->with('error', 'Login failed !Email/Password is incorrect !');
            }
        }
    }

    /**
     * make the user able to logout
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('message', 'Successfully Logged out !');
    }
}
