<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class usermanagementcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth:api');
       
    }

    public function index()
    {  
      
      $users = User::orderBy('id','asc')->get();

          return $users;

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
        $this->validate($request,[
        'name'=>'required|min:6|string|max:256',
        'email'=>'required|email|string|unique:users',
        'password'=>'required|string|min:8',
        'confirmpassword'=>'required|string|min:8|same:password',
        'usertype'=>'required|string',
      ]);

      $u=new User();
      $u->name=$request->input('name');
      $u->email=$request->input('email');
      $u->password=Hash::make($request->input('password'));
      $u->usertype=$request->input('usertype');
      $u->save();
      return $u;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
          $u=User::where('id',$id)->paginate(2);
          return $u;
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
          
          $u=User::findOrFail($id);
          $this->validate($request,[
          'name'=>'required|min:6|string|max:256',
          'email'=>'required|email|string|unique:users,email,'.$u->id,
          'usertype'=>'required|string',

        ]);
           
        $u->update($request->all());

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
        $this->authorize('isAdmin');
        $u=User::findOrFail($id);
        $u->delete();
    }


   
}
