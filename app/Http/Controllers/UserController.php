<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|string|max:50',
            'email'=> 'required|string|max:255|unique:users',
            'password'=> 'required|string|max:255',
            'image_id'=> 'nullable|integer',
            'biography'=> 'nullable|string',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $password = $request->password;
        $user->password = Hash::make($password);
        if ($request->has('image_id')) {
            $image = Image::find($request->image_id);
            if ($image) {
                $user->image()->associate($image);
            } else {
                // Handle the case where the image does not exist
            }
        }
        $user->biography = $request->biography;

        $user->save();

        $user->sendEmailVerificationNotification();

        return redirect()->route('collection.index')->with('success', 'Utilisateur ajouté avec succès, vérifier vos e-mails !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('user.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect()->intended(route('collection.index'))->with('success', 'Vous êtes connecté !');
        }

        // return redirect()->route('login')->with('error', 'Email ou mot de passe incorrect !');
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect !',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('collection.index')->with('success', 'Vous êtes déconnecté !');
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['loginForm', 'login', 'store', 'create']);
    }
}
