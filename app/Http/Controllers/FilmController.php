<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Films;
use Auth;
use App\User;
use App\comments;
use Image;
use Illuminate\Support\Facades\Validator;
class FilmController extends Controller
{
    //

    public function index()
    {
      
      $data=Films::paginate(1);
       return response()->json($data);
    }

    public function store(Request $request)
    {
    	 $validator=Validator::make($request->all(),[
                      'name'=>'required',
                      'description'=>'required',
                      'country'=>'required',
                      'release_date'=>'required',
                      'rating'=>'required|min:1|max:5',
                      'country'=>'required',
                      'ticket_price'=>'required'
                     
                      // 'photo' => 'required|mimes:jpeg,bmp,png,jpg',

                    ]);
                    if($validator->fails())
                    {
                      return response()->json(['errors'=>$validator->errors()]);
                    }

                    if($request->photo){
       	  
          $image = $request->photo;
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($image)->save(public_path('images/').$name);
          
                   }

               $film=new Films;
               $film->photo='images/'.$name;
               $film->film_slug=str_replace("","_",$request->name);
               $film->name=$request->name;
               $film->description=$request->description;
               $film->country=$request->country;
               $film->release_date=$request->release_date;
               $film->ratings=$request->rating;
               $film->genrs='Action,thrilling';
               $film->name=$request->name;
               $film->ticket_price=$request->ticket_price;
               $film->created_by=Auth::user()->id;
               if($film->save())
               {
               	return response()->json(['success'=>1]);
               }

    }

    public function singleFilm($slug)
    {  $comments=array();
    	$film=Films::where('film_slug',$slug)->first();
    	foreach($film->comments as $key=>$value)
    	{

    	   $comments[$key]['comments']=$value->comment;
    	   $userid=User::where('id',$value->user_id)->pluck('name');
    	  // return $userid;
    	   $comments[$key]['username']=$userid[0];
    	}
    	return response()->json(['film'=>$film,'comments'=>$comments]);
    }


    public function addcomment(Request $request)
    {

    	$validator=Validator::make($request->all(),[
                      'comments'=>'required',
                    
                      // 'photo' => 'required|mimes:jpeg,bmp,png,jpg',

                    ]);
                    if($validator->fails())
                    {
                      return response()->json(['errors'=>$validator->errors()]);
                    }
               $comments=new comments;
               $comments->film_id=$request->filmid;
               $comments->user_id=Auth::user()->id;
               $comments->comment=$request->comments;
               
               if($comments->save())
               {
               	$allcomments=array();
               	$comments=comments::where('film_id',$request->filmid)->orderby('id','desc')->get();
               	foreach ($comments as $key => $value)
               	 {
               		
    	   $allcomments[$key]['comments']=$value->comment;
    	   $userid=User::where('id',$value->user_id)->pluck('name');
    	  // return $userid;
    	   $allcomments[$key]['username']=$userid[0];
               	}
               	 return response()->json(['comments'=>$allcomments]);
               }

    }
}
