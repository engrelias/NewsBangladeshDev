<?php

namespace App\Http\Controllers;

use App\Mail\UserCreatedMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Language;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    //

    public function index(){

        $users = User::where('user_role', '!=', 1)->get();
        return view('admin.user.index', compact('users'));
    }



    // show the form for creating a new user
    
    public function create()
    {
        $role = Role::select(['id','role_title'])->get();
        return view('admin.user.create', compact('role'));
    }


    // store a newly created user in storage

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_role' => 'required',
            'phone' => 'nullable|string',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_photo_path')) {
            $imagePath = $request->file('profile_photo_path')->store('profile_photos', 'public');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->user_role = $request->user_role;
        $user->profile_photo_path = $imagePath ?? null;
        $user->current_team_id = Auth::id();
        $user->save();

        if($user->save())
        {
            // Mail::to($request->email)->send(new UserCreatedMail($user, $request->password));
            return redirect()->route('admin.users')->with('success', 'User created successfully.');
        }

    }



    // display the specified user
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }




    // show the form for editing the specified user
    public function edit( Request $request , $id)
    {
        $updateUser = User::findOrFail($id);
        $role = Role::select(['id','role_title'])->get();

        return view('admin.user.create', compact('updateUser','role'));
    }





    // update the specified user in storage
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'user_role' => 'required',
            'phone' => 'nullable|string',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // Handle file upload if exists
        if ($request->hasFile('profile_photo_path')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $user->profile_photo_path = $request->file('profile_photo_path')->store('profile_photos', 'public');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_role = $request->user_role;
        $user->profile_photo_path = $user->profile_photo_path ?? null;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');

    }


    // remove the specified user from storage
    public function destroy(User $user)
    {

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

}
