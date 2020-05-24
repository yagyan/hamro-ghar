<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\propertytype;
use Illuminate\Http\Request;

class propertytypecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         $type= propertytype::get();

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

       $u=new propertytype();

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
         $p=propertytype::findOrFail($id);
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
         $p=propertytype::findorFail($id);
         $p->delete();
     }
 }
