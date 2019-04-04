<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Recipe;
use DB;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
    $recipes=Recipe::orderBy('created_at','desc')->paginate(10);
    return view('recipes.index')->with('recipes',$recipes); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'ingredients'=>'required',
            'instructions'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        //handle file upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'_'.$extension;
            //Upload image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else 
        $fileNameToStore='noImage.jpg';
        //Create Recipe
       $recipe=new Recipe;
       $recipe->title= $request->input('title');
       $recipe->ingredients=$request->input('ingredients');
       $recipe->instructions=$request->input('instructions');
       $recipe->user_id=auth()->user()->id;
       $recipe->cover_image=$fileNameToStore;
       $recipe->save();

       return redirect("recipes/")->with('success','Post created successfully');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $recipe=Recipe::find($id); 
      return view('recipes.show')->with('recipe',$recipe);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe=Recipe::find($id);
        if(auth()->user()->id !==$recipe->user_id){
            return redirect('/recipes')->with('error','anouthorised page');
        
        }
       
       
        return view('recipes.edit')->with('recipe',$recipe);
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
        $this->validate($request,[
            'title'=>'required',
            'ingredients'=>'required',
            'instructions'=>'required'
        ]);
         //handle file upload
         if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'_'.$extension;
            //Upload image
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        
        //Update Recipe
      $recipe=Recipe::find($id);
       $recipe->title= $request->input('title');
       $recipe->body= $request->input('ingredients');
       $recipe->body= $request->input('instructions');
       $recipe->cover_image=$fileNameToStore;
       $recipe->save();

       return redirect("/recipes/")->with('success','Post updated');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe=Recipe::find($id);
       
        //check correct user
        if(auth()->user()->id !==$recipe->user_id){
            return redirect('/recipes')->with('error','anouthorised page');
        
        }
        if($recipe->cover_image!='noimage.jpg'){
            Storage::delete('/recipehub/storage/public/cover_images/'.$recipe->cover_image);
        }
        $recipe->delete();
        return redirect("/recipes/")->with('success','Post deleted!');
    }
}
