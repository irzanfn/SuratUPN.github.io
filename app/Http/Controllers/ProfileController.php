<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.edit',['title' => 'Edit Profile']);
    }

    public function index_password()
    {
        return view('profile.password',['title' => 'Change Password']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(empty($request->file('image'))){
            $newName = Auth::user()->image;
        }else{
            $dt = Auth::user()->image;
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $ext = Str::lower($ext);
            $newName = rand(1000000,1001238912).".".$ext;
            $image->move('uploads/profile',$newName);
            if(File::exists('uploads/profile/'.$dt) && $dt!='dummy.jpg') {
                unlink('uploads/profile/'.$dt);
            }
        }
        User::where('id',$id)
            ->update([
                'name' => $request['name'],
                'nip' => $request['nip'],
                'sex' => $request['sex'],
                'ktp' => $request['ktp'],
                'telp' => $request['telp'],
                'email' => $request['email'],
                'image' => $newName,
            ]);
        return back()->with('status','Profil Berhasil Diupdate!');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['same:new_password','min:8'],
        ]);
        
        User::find(Auth::user()->id)->update(['password'=>Hash::make($request->new_password)]);
        Auth::logout();
        return redirect('/login')->with('status','Password Berhasil Diubah Silahkan Login Kembali!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
