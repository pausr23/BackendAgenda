<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required',
            'email.required' => 'Email field is required - min 8 characters',
            'email.email' => 'Email field must be email addredd',
            
        ]);
        
        if ($validator->fails()) 
        {
            return response()->json($validator->errors());
        }

        $validated = $validator->validated();

        $password = Hash::make($validated['password']);
        $rand_code = random_int(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'verification_code' => $rand_code
        ]);

        Mail::to($validated['email'])->send(new UserMail($validated['name'], $user->id, $rand_code));

        return 'User created successfully.';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('admin.register');
    }

    public function login()
    {
        //
        return view('admin.login');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function check(Request $request)
    {
        $adminEmail = 'coco00@gmail.com'; 
        $adminPassword = 'coco2309'; 

        if(!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        
        $token = $user->createToken('auth_token')->plainTextToken;

        $uid =  $user->id;
        session_start();

        return redirect()->route('activities.index');
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::logout();
        //destroy session and variables
        session_start();
        session_destroy();
        //return response()->json(['message' => 'Logged out successfully']);
        return redirect()->route('admin.login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
