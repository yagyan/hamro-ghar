<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\userinfo;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function adduser($id)
     {

      $u =userinfo::where('user_id',$id)->get();
      if(count($u)== 0)
      {
      return userinfo::create([
          'user_id' => $id,

      ]);

     }
     return back();
   }
    public function index()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $u =DB::table('userinfos')
      ->join('users', 'userinfos.user_id', '=', 'users.id')
      
      ->select('userinfos.*','users.name as username','users.email as useremail')
      ->where('user_id',$id)->get();
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
          $u=userinfo::findOrFail($id);
          $this->validate($request,[
          'name'=>'required|min:6|string|max:256',
          'phone'=>'sometimes|min:7|string|max:256',
          'mobile'=>'required|min:10|string|max:256',
          'citizen_no'=>'required|min:6|string|max:256',
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
    }
}
