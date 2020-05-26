<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\address;
use App\userinfo;
use Illuminate\Support\Facades\DB;

class addresscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function updateprofile(Request $request, $id)
     {
      $u=userinfo::findOrFail($id);
      $u->pward_id=$request->input('ward_id');
      $u->update($request->only('ward_id'));

   }


     public function index()
     {
         //
         $a =DB::table('addresses')
         ->join('states', 'addresses.state_id', '=', 'states.id')
         ->join('districts','addresses.district_id','=','districts.id')
         ->join('municipalities','addresses.municipality_id','=','municipalities.id')
         ->join('wards','addresses.ward_id','=','wards.id')
         ->select('wards.*','states.name as sname','districts.name as disname','municipalities.name as municname')
         ->get();
          return $a;
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

         'state_id'=>'required',
         'district_id'=>'required',
         'municipality_id'=>'required',
         'ward_id'=>'required',


       ]);

       $a=new address();


       $a->state_id=$request->input('state_id');
       $a->district_id=$request->input('district_id');
       $a->municipality_id=$request->input('municipality_id');
       $a->ward_id=$request->input('ward_id');

       $a->save();
       return $a;
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
         $w =DB::table('wards')
         ->join('states', 'wards.state_id', '=', 'states.id')
         ->join('districts','wards.district_id','=','districts.id')
         ->join('municipalities','wards.municipality_id','=','municipalities.id')
         ->join('userinfos','wards.id','=','userinfos.pward_id')
         ->select('wards.name as wname','states.name as sname','districts.name as disname','municipalities.name as municname','userinfos.user_id as user_id' )
         ->get();
          return $w->where('user_id',$id);
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
         $a=address::findOrFail($id);
         $this->validate($request,[

         'state_id'=>'required',
         'district_id'=>'required',
         'municipality_id'=>'required',
         'ward_id'=>'required'


       ]);
       $a->update($request->all());
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
         //
         $a=address::findorFail($id);
         $a->delete();
     }
 }
