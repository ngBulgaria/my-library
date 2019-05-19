<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
 
class RegistrationController extends Controller
{
    /*Register form template*/
    public function create()
    {
        return view('registration.create');
    }

    /*Register method with validation and login on success*/
    public function store()
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['first_name', 'last_name', 'username', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/');
    }

    public function edit()
    {
        if(auth()->check())
        {
            $user = auth()->user();
            return view('registration.edit')->with(['user'=> $user]);
        }

        else
        {
            return redirect()->to('/login');
        }

    }

    public function save()
    {
        $password = request('password');
        if(password_verify($password,auth()->user()->password))
        {
            if(request('email')==auth()->user()->email)
            {
                DB::table('users')->where('id',auth()->user()->id)
                ->update([
                    'first_name'=> request('first_name'),
                    'last_name'=> request('last_name'),
                    'password'=> bcrypt(request('newpassword'))
                ]);
                return redirect()->to('/editprofile');
            }

            else
            {
                request()->validate([
                'email' => 'required|email|unique:users'
                ]);
                DB::table('users')->where('id',auth()->user()->id)
                ->update([
                    'first_name'=> request('first_name'),
                    'last_name'=> request('last_name'),
                    'email'=> request('email'),
                    'password'=> bcrypt(request('newpassword'))
                ]);
                return redirect()->to('/editprofile');
            }
        }

        else
        {
            return back()->withErrors([
                'message' => 'Old password is incorrect'
            ]);
        }
    }
}