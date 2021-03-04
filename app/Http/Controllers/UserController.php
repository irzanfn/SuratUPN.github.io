<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user = User::get();
        return view('user.index',['title' => 'Admin'],compact('user'));
    }

    public function adduser()
    {
        return view('user.adduser',['title' => 'Add User']);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'min:9','max:20','unique:users'],
            'sex' => ['required', 'string'],
            'ktp' => ['required', 'min:16','max:20', 'unique:users'],
            'telp' => ['required', 'min:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        do{
            $default = Str::random(8);
            $def = User::where('default_password',$default)->get();
        }while(empty($def));

        User::create([
            'default_password' => $default,
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($default),
            'nip' => $request['nip'],
            'sex' => $request['sex'],
            'ktp' => $request['ktp'],
            'telp' => $request['telp'],
            'image' => $request['image'],
            'role' => $request['role'],
        ]);

        return redirect('/User')->with('status','User dengan email : '.$request['email']. ' berhasil ditambahkan! Silahkan catat passwordnya :'.$default);
    }

    public function reset_password(Request $request,$id)
    {
        if (!empty($request->default_password)) {
            $check = User::where('id',$id)->where('default_password',$request['default_password'])->first();
            if(!empty($check)){
                do{
                    $default = Str::random(8);
                    $def = User::where('default_password',$default)->get();
                }while(empty($def));

                User::where('id',$id)->update(['password'=>Hash::make($default)]);
                return redirect('/User')->with('status','Password untuk email :'.$request['email'].' telah di reset ! dengan password : '.$default.' silahkan catat password baru anda!');
            }else{
                return redirect('/User')->with('warning','Default Password untuk email :'.$request['email'].' salah');
            }
        }elseif(!empty($request->ktp)){
            $check = User::where('id',$id)->where('ktp',$request['ktp'])->first();
            if(!empty($check)){
                do{
                    $default = Str::random(8);
                    $def = User::where('default_password',$default)->get();
                }while(empty($def));

                User::where('id',$id)->update(['password'=>Hash::make($default)]);
                return redirect('/User')->with('status','Password untuk email :'.$request['email'].' telah di reset ! dengan password : '.$default.' silahkan catat password baru anda!');
            }else{
                return redirect('/User')->with('warning','No. KTP untuk email :'.$request['email'].' salah');
            }
        }else{
            return redirect('/User')->with('warning','Tidak ada data yang dimasukan untuk email :'.$request['email'].'');
        }
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
        User::where('id',$id)->update(['role' => $request['role'],]);
        return back()->with('status','Role Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('status','User Berhasil Dihapus!');
    }
}
