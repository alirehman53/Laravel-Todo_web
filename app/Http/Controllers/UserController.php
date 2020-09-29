<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class UserController extends Controller
{
    //

    public function uploadAvatar(Request $request){

        if($request->hasFile('image')){
        User::uploadAvatar($request->image);

        return redirect()->back()->with('message','Image Uploaded ');  // success message
        
        
        }
       
        return redirect()->back()->with('error','Image Not Uploaded '); // error message
    }


  
















    public function index(){

       /* DB::insert('insert into users 
        (name,email,password) 
        values (?,?,?)',[
            'Ali','ar5557587@gmail.com','password'
        ]);
        */

        /*$users = DB::select('select * from users');

        return $users;*/


        /*DB::update('update users set name="bilal" where id = ?', [1]);

        $users = DB::select('select * from users');*/

       /* DB::delete('delete from users where id = ?', [1]);

        $users = DB::select('select * from users');


        return $users;*/

        /*$user = new User();

        $user->name = "hammad ismail";

        $user->email = "hwm008@gmail.com";
        $user->password = bcrypt("password");
        $user->save();

        */
        
        //User::where('id',7)->update(['name'=> "alirehman"]);

        $data = [

            'name' => 'Elon',
            'email'=> 'elon@bitfumes.com',
            'password'=>'password'
        ];

        User::create($data);

        $user = User::all();
        return $user;


       // User::where('id',5)->delete();
















        return view('home');

    }
}
