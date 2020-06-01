<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ward;
use Illuminate\Support\Facades\DB;

class wardcontroller extends Controller
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
     public function getward($id)
     {
       $data = ward::where('municipality_id', $id)->get();

        return $data;
     }

    public function index()
    {
        //
        $w =DB::table('wards')
        ->join('states', 'wards.state_id', '=', 'states.id')
        ->join('districts','wards.district_id','=','districts.id')
        ->join('municipalities','wards.municipality_id','=','municipalities.id')
        ->select('wards.*','states.name as sname','districts.name as disname','municipalities.name as municname')
        ->get();
         return $w;
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
        'state_id'=>'required',
        'district_id'=>'required',
        'municipality_id'=>'required',


      ]);

      $u=new ward();

      $u->name=$request->input('name');
      $u->state_id=$request->input('state_id');
      $u->district_id=$request->input('district_id');
      $u->municipality_id=$request->input('municipality_id');

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
        $m=ward::findOrFail($id);
        $this->validate($request,[
        'name'=>'required|min:6|string|max:256',
        'state_id'=>'required',
        'district_id'=>'required',
        'municipality_id'=>'required'


      ]);
      $m->update($request->all());
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
        $w=ward::findorFail($id);
        $w->delete();
    }
}
