<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\district;
use App\state;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class districtcontroller extends Controller
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


     public function getdistrict($id)
     {
       $data = district::where('state_id', $id)->get();

        return $data;

     }
    public function index()
    {
        //
        $dist =DB::table('districts')
        ->join('states', 'districts.state_id', '=', 'states.id')
        ->select('districts.*','states.name as sname')
        ->get();
         return $dist;
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
        'state_id'=>'required'


      ]);

      $u=new district();

      $u->name=$request->input('name');
      $u->state_id=$request->input('state_id');


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
        $d=district::findOrFail($id);
        $this->validate($request,[
        'name'=>'required|min:6|string|max:256',
        'state_id'=>'required',


      ]);
      $d->update($request->all());





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
        $d=district::findorFail($id);
        $d->delete();
    }
}
