<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Controller Constructor
     * 
     * @return void
     */
    public function __construct(){

    }

    /**
     * Register User Method
     *  
     * @return void
     */
    public function RegisterUser(Request $request){
        //return $request;
        
        $request->validate([
            'full_name' => 'required',
            'reg_email' => 'required',
            'reg_password' => 'required',
        ]);
        $user = new Users();
        $user->full_name = $request->input('full_name');
        $user->email = $request->input('reg_email');
        $user->password = Hash::make($request->reg_password);
        $user->save();
        return back();
    }

    /**
     * Log out
     * 
     * @return void
     */
    public function Logout(){
        Auth::logout();
        return redirect('/');

    }
    /**
     * Show Account information Page
     * 
     * @return void
     */
    public function Account(){
        $data['title'] = 'Account Information';
        $data['user'] = Users::where('id', auth()->user()->id)->first();
        return view('account', $data);
    }
}
