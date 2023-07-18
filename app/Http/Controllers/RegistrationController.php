<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInterest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendWelcomeEmail; 
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;


class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:3|max:50',
            'interests' => 'required|array',
        ]);

     
        // Hash the password before saving it to the database
        $hashedPassword = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword, // Save the hashed password
        ]);

        foreach ($request->input('interests') as $interest) {
            UserInterest::create([
                'user_id' => $user->id,
                'interest' => $interest,
            ]);
        }

        $roles = Role::all();
        $user->roles()->sync($roles);


           // Dispatch the SendWelcomeEmail job to the queue
           dispatch(new SendWelcomeEmail($user));
        
           Mail::to($user->email)->send(new WelcomeEmail($user));
        

        $users = User::with(['interests', 'roles'])->get();
        return redirect('/')->with('success', 'Registration successful');

      
      
    }
}
