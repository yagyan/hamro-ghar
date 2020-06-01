<?php

namespace App\Http\Controllers\API;
use App\usertype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class usertypecontroller extends Controller
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
         //
         $type= usertype::get();

             return $type;
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
         'name'=>'required|string|max:256',


       ]);

       $u=new usertype();

       $u->name=$request->input('name');


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
         $p=usertype::findOrFail($id);
           $this->validate($request,[
           'name'=>'required|string|max:256',
         ]);

             $p->update($request->all());
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
         $p=usertype::findorFail($id);
         $p->delete();
     }
}
