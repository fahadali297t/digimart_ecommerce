<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('Admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($admin));

        // Auth::guard('admin')->login($admin);

        return redirect(route('admin.dashboard', absolute: false));
    }


    public function users_list()
    {
        $users  = User::get();
        // return $users;
        return view('Admin.pages.all_users', ['users' => $users]);
    }
    public function admins_list()
    {
        $admins  = Admin::get();
        // return $users;
        return view('Admin.pages.all_admins', ['admins' => $admins]);
    }
    public function admins_remove(Request $request)
    {
        
        $admin = Admin::find($request->id);
        $admin->delete();

        return redirect()->route('admin.admins.list');
    }
}
