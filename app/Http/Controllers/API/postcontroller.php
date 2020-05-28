<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\post;
use App\User;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yourpost($id)
    {
        $post=DB::table('posts')
        ->join('propertytypes','posts.propertytype_id','=','propertytypes.id')
        ->select('posts.*','propertytypes.name as pname')
        ->get();
        return $post->where('user_id',$id);    
    }
    public function singlepost($id)
    {
        $post=DB::table('posts')
        ->join('propertytypes','posts.propertytype_id','=','propertytypes.id')
        ->select('posts.*','propertytypes.name as pname')
        ->get();
        return $post->where('id',$id);    
    }
    public function index()
    {
        //
        $post=DB::table('posts')
        ->join('propertytypes','posts.propertytype_id','=','propertytypes.id')
        ->select('posts.*','propertytypes.name as pname')
        ->get();
        return $post;
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
        $this->validate($request, [
            'title'=>'required|string',
            'propertytype_id' => 'required',
            'address_id' => 'sometimes',
            'bed'=>'nullable|numeric',
            'bathroom'=>'nullable|numeric',
            'characteristics' => 'required|string',
            'price' => 'required|string',
            'negotiation' => 'required|boolean',
            'user_id' => 'required',
            'published_date' => 'sometimes',
            'expiry_date' => 'sometimes',
            'status' => 'required|boolean',
            'sold' => 'sometimes|boolean',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'Tview' => 'sometimes',
            'Sview' => 'sometimes',
            'Fview' => 'sometimes',
            'description' => 'sometimes|string',
        ]);
        $u=new post();
       

            $u->title=$request->input('title');
            $u->bed=$request->input('bed');
            $u->bathroom=$request->input('bathroom');
            $u->propertytype_id= $request->input('propertytype_id');
            //$u->address_id= $request->input('address_id');
            $u->characteristics= $request->input('characteristics');
            $u->area= $request->input('area');
            $u->price= $request->input('price');
            $u->negotiation= $request->input('negotiation');
            $u->user_id= $request->input('user_id');
            //$u->published_date= $request->input('published_date');
            //$u->expiry_date= $request->input('expiry_date');
            $u->status= $request->input('status');
            $u->sold= $request->input('sold');
            $u->longitude= $request->input('longitude');
            $u->latitude= $request->input('latitude');
            //$u->side_view= $request->input('Sview');
            //$u->front_view= $request->input('Fview');
            $u->description= $request->input('description');

            if($request->Tview){
            $name = time().'t' . '.' . explode('/', explode(':', substr($request->Tview, 0, strpos($request->Tview, ';')))[1])[1];
            \Image::make($request->Tview)->save(public_path('images/photo/').$name);
            $request->merge(['Tview'=>'/images/photo/'.$name]);
            $u->top_view=$request->input('Tview');;
            }
            if($request->Sview){
            $name1 = time().'s' .'.' . explode('/', explode(':', substr($request->Sview, 0, strpos($request->Sview, ';')))[1])[1];
            \Image::make($request->Sview)->save(public_path('images/photo/').$name1);
            $request->merge(['Sview'=>'/images/photo/'.$name1]);
            $u->side_view=$request->input('Sview');;
            }
            if($request->Fview){
            $name2 = time().'f' .'.' . explode('/', explode(':', substr($request->Fview, 0, strpos($request->Fview, ';')))[1])[1];
            \Image::make($request->Fview)->save(public_path('images/photo/').$name2);
            $request->merge(['Fview'=>'/images/photo/'.$name2]);
            $u->front_view=$request->input('Fview');
            }
            





            $u->save();//to save
            return $u;//jun step maa thyo tyei maa jancha
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
        $u=post::where('id',$id)->paginate(2);

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
        $u=post::findOrFail($id);
        $this->validate($request, [
          'title'=>'sometimes|string',
          'propertytype_id'=>'sometimes',
          'address_id' => 'sometimes',
          'bed'=>'nullable|numeric',
          'bathroom'=>'nullable|numeric',
          'characteristics' => 'sometimes|string',
          'price' => 'sometimes|string',
          'negotiation' => 'sometimes|boolean',
          'user_id' => 'sometimes',
          'published_date' => 'sometimes',
          'expiry_date' => 'sometimes',
          'status' => 'sometimes|boolean',
          'sold' => 'sometimes|boolean',
          'longitude' => 'sometimes|numeric',
          'latitude' => 'sometimes|numeric',
          'Tview' => 'sometimes',
          'Sview' => 'sometimes',
          'Fview' => 'sometimes',
          'description' => 'sometimes|string',

        ]); 
        if($request->Tview){
             $name = time().'t' . '.' . explode('/', explode(':', substr($request->Tview, 0, strpos($request->Tview, ';')))[1])[1];
            \Image::make($request->Tview)->save(public_path('images/photo/').$name);
            $request->merge(['Tview'=>'/images/photo/'.$name]);
            $u->top_view=$request->input('Tview');;
        }   
        if($request->Sview){
            $name1 = time().'s' .'.' . explode('/', explode(':', substr($request->Sview, 0, strpos($request->Sview, ';')))[1])[1];
            \Image::make($request->Sview)->save(public_path('images/photo/').$name1);
            $request->merge(['Sview'=>'/images/photo/'.$name1]);
            $u->side_view=$request->input('Sview');;
        }
        if($request->Fview){
            $name2 = time().'f' .'.' . explode('/', explode(':', substr($request->Fview, 0, strpos($request->Fview, ';')))[1])[1];
            \Image::make($request->Fview)->save(public_path('images/photo/').$name2);
            $request->merge(['Fview'=>'/images/photo/'.$name2]);
            $u->front_view=$request->input('Fview');
        }

        $u->update($request->all());
        return ['message'=>'Updated Successfully'];
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
        $u=post::findOrFail($id);
        $u->delete();
        return ['message'=>'Deleted Successfully'];
    }
}
