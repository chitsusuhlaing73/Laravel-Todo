<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Phone;
use App\Models\Role;
use App\Models\UserRole;
use Hash;
use Auth;
use Session;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * To login
     * 
     * @return View login page
     */
    public function index()
    {
        return view('auth.login');
    }

    public function userRegisterView()
    {
        return view('auth.register');
    }

    public function userRegister(UserRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        $phone = new Phone();
        $phone->phone = $request->phone;
        $user->phones()->save($phone);
        return "Register Successfully.";
    }

    public function loginUser(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user-list');
        }
        return back()->withErrors(['auth' => 'Login failed.']);
    }

    public function userList()
    {
        $users = User::with('phones')->get()->toArray();
        return view('auth.userlist')->with('users', $users);
    }

    public function logoutUser()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login-view');
    }

    public function role()
    {
        $user = User::create([
            'name' => 'su su',
            'email' => 'su@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $phone = new Phone();
        $phone->phone = '09876787678';
        $user->phones()->save($phone);

        Role::create([
            'name' => 'Admin',
        ]);
        Role::create([
            'name' => 'User',
        ]);
        Role::create([
            'name' => 'Guest',
        ]);

        $result = User::find(1)->roles()->attach([1,2]);
 
        return "Register Successfully.";
    }

    public function userRoleList()
    {
        $users = User::with('roles')->get()->toArray();
        // return $users;
        return view('auth/userRoleList')->with('users', $users);
    }
}
