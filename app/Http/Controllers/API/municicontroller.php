<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\municipality;
use App\district;
use App\state;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class municicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //$this->middleware('auth:api');
    }

     public function getmunicipality($id)
     {
       $data = municipality::where('district_id', $id)->get();

        return $data;
     }

    public function index()
    {
        //
        $munic =DB::table('municipalities')
        ->join('states', 'municipalities.state_id', '=', 'states.id')
        ->join('districts','municipalities.district_id','=','districts.id')
        ->select('municipalities.*','states.name as sname','districts.name as disname')
        ->get();
         return $munic;
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


      ]);

      $u=new municipality();

      $u->name=$request->input('name');
      $u->state_id=$request->input('state_id');
      $u->district_id=$request->input('district_id');


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
        $m=municipality::findOrFail($id);
        $this->validate($request,[
        'name'=>'required|min:6|string|max:256',
        'state_id'=>'required',
        'district_id'=>'required',


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
        $m=municipality::findorFail($id);
        $m->delete();
    }
}
