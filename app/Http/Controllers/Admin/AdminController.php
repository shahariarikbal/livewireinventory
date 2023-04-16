<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\LogoutResponse;

class AdminController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function adminDashboard()
    {
        if (auth()->guard('admin')->check()){
            return view('admin-dashboard');
        }else {
            return redirect('admin-login');
        }
    }

    public function adminLoginForm()
    {
        if (auth()->guard('admin')->user()){
            return redirect('admin/dashboard');
        }else {
            return view('auth.admin-login');
        }
    }

    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $email = $request->email;
        $password = $request->password;

        if (auth()->guard('admin')->attempt(['email' => $email, 'password' => $password])){
            return redirect('admin/dashboard');
        }else{
            return back()->withErrors(['Credential not match']);
        }
    }


    /**
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminRegisterForm(Request $request) {

        if (auth()->guard('admin')->user()) {
            return redirect('admin/dashboard');
        } else {
            return view('auth.admin-register');
        }
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CreatesNewUsers  $creator
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminRegisterStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
//        Auth::guard('expert')->login($expert);
        auth()->guard('admin')->login($admin);
        return redirect('admin/dashboard');
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}
