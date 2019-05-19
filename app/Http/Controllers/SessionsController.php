<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class SessionsController extends Controller
{
    /*Login form template*/
    public function create()
    {
        return view('sessions.create');
    }
    
    /*Login method*/
    public function store()
    {
        if (auth()->attempt(request(['username', 'password'])) == false) {
            
            return back()->withErrors([
                'message' => 'The username or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/');
    }

    /*Log out method*/
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/login');
    }
}