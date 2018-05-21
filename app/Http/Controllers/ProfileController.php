<?php

namespace App\Http\Controllers;
use App\Post as Post;
use App\Balance as Balance;
use App\Store as Store;
use App\Tranaction as Tranaction;
use Auth;
use App\User as User;
use Image;
use App\Follow as Follow;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display an instance of user .
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
             $items = ItemController::ShowItems($id);
             $follow = false;
             # Check if I follow the target user 
        if(isset(Auth::user()->id)){
             $follow = Follow::where([
            'follower' => Auth::user()->id, 'following' => $id ])->get();
            }

            $posts = PostController::ShowPosts($id);
            $user = \App\User::whereId($id)->first();
            $user = $user['attributes'];
            $user = json_decode(json_encode($user), true);
            $numberOfFollower = \App\Follow::where('following', $id)->get();
            $numberOfFollower = $numberOfFollower->count();
            $numberOfFollowing = \App\Follow::where('follower', $id)->get();
            $numberOfFollowing = $numberOfFollowing->count();
            $follow = \App\Follow::where( 'follower', $id)->where('following', Auth::user()->id)->get();

     return View('UserPage')->with([
        'follow' => $follow,
        'user' => $user,
        'numberOfFollwing' => $numberOfFollowing,
        'numberOfFollwer' => $numberOfFollower,
        'items'           => $items,
        'posts'           => $posts

         ]);     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdatePicture(Request $request)
    {
        //
      

          if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = 'storage/'.Auth::user()->id.'/' . time() . '.' . $avatar->getClientOriginalExtension();
         Storage::makeDirectory(Auth::user()->id);

            Image::make($avatar)->save( public_path($filename ) );
          
            $user =  \App\User::find(Auth::user()->id);
            
            $user->picture = $filename;
            $user->save();
     
        }

        if($request->hasFile('header')){
            $avatar = $request->file('header');
            $filename = 'storage/'.Auth::user()->id.'/' . time() . '.' . $avatar->getClientOriginalExtension();
         Storage::makeDirectory(Auth::user()->id);

            Image::make($avatar)->save( public_path($filename ) );
          
            $user =  User::find(Auth::user()->id);
            
            $user->header = $filename;
            $user->save();
     
        }
    }



    /**
     * Save the updates for specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdateProfile(Request $request)
    {
        //

         User::where('id', Auth::user()->id)->update([
            'bio' => $request['bio'],
            'name' =>$request['name']   
        ]);
    }


}
