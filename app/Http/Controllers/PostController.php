<?php

namespace App\Http\Controllers;
use App\Post as Post;
use App\PostContent as PostContent;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Comment as Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
     return Post::where('id', $id)->with('PostContent')->with('User')->with('Comment')->orderBy('updated_at', 'desc')->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        # a Regular post is of type 1, image post thread is of type 2, vids =>3 , gifs => 4
         $post = new Post;
        // $post-> = $request->input('comment');
        $post->user_id = Auth::user()->id;
        $type = 0;
        if($request->hasFile("file"))
            $type = 1;
        $post->content =  $request['caption'];
        $post->type = $type;
        
        $post->save();

         #for($i=1; $i < 9; $i++){
           
         #      break;

         if($request->hasFile("file")){
            $type = $request->file->getMimeType();  
            $type = explode("/",$type);
            $type = $type[0];
                if($type == 'image'){
                    $type = 1;
                }
                elseif ($type == 'video') {
                      $type = 2;
                   }

            $avatar = $request->file("file");

            File::makeDirectory('posts/'.$post->id,0777,true);
            $path = 'posts/'.$post->id;
            $filename = '1.'. $avatar->getClientOriginalExtension();
     $request->file->storeAs($path, $filename);
          }

          $content = new PostContent;
          $content->post_id = $post->id;
          $content->type = $type;
          if($type == 1 || $type == 2)
          $content->content = 'posts/'.$post->id.'/'.$filename;

          $content->save();

     # }
            return Redirect::to('/profile/'.Auth::user()->id);

}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddPost(Request $request)
    {

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->type = $request->input('type');
        $post->save();

       //@@ check the type of post if its a new item listing or regular post
        /**
        * Type 0 is a normal item listing, associate with ITemCAption
        * Type 1 is reqular post with no item, associates with PostContent
        *
         */
         if($request->input('type') == 0)
        ItemController::store($request);

            
                }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
  public static function ShowPosts($id)
    {
            //
          return Post::where('user_id', $id)->with('PostContent')->with('User')->orderBy('updated_at', 'desc')->get();
    }


    /**
    * @@param , PostId 
    *  @return iframe of the post and its coresponding comments alongside with all realtions
    *
    */
    public function ShowPost($id){

       $posts = Post::where('id', $id)->with('PostContent')->with('User')->with('Comment')->orderBy('updated_at', 'desc')->get();

       return View('Post')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function LikePost( $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove( $id)
    {
        //
    }
}
