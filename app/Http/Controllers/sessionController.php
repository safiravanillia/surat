<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use App\users;

class sessionController extends Controller
{
	public function index(){
        if(!Session::get('login')){
            return view('login');
        }
        else{
            return view('dashboard');
        }
	}
    public function create(){
    	return view('sessions.create');
    }

    public function store(){
    	$this->validate(request(),[
    		'email'=>'required',
    		'password'=>'required'
		]);

		$email = Input::get('email');
		$remember = (Input::get('remember')) ? true : false;
		$data = users::where('email',$email)->first();

    	if(auth()->attempt(request(['email','password']),$remember) ){
			Session::put('nama',$data->nama);
			Session::put('jabatan',$data->jabatan);
			Session::put('nik',$data->nik);
			Session::put('login',true);
			Session::put('role',$data->role);
			return redirect('/dashboard');		
        } else {
			return back()->withErrors([
				'messages'=>'email/password Anda salah'
			]);
		}
    }
    
    public function destroy(){
		Session::flush();
    	auth()->logout();
    	return redirect('/');
	}
	
}
