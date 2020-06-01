<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\state;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class statecontroller extends Controller
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

    public function index()
    {
        //
        $state= state::orderBy('id')->get();

            return $state;
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

      $s=new state();

      $s->name=$request->input('name');


      $s->save();
      return $s;
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
        $s=state::findOrFail($id);
          $this->validate($request,[
          'name'=>'required|min:6|string|max:256',
        ]);

            $s->update($request->all());
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
        $s=state::findorFail($id);
        $s->delete();
    }
}
