<?php

namespace App\Http\Controllers;
use App\Item as Item;
use App\ItemCaption as ItemCaption;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{


    /**
     * Store a newly created item in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return View 
     */
    public static function AddItem(Request $request)
    {
        //
         $item = new Item;
         $item->user_id = Auth::user()->id;
         $item->name = $request->input('name');
         $item->price = $request->input('price');
         $item->StockCount = $request->input('stock');
         $item->type = 0;
         $item->save();

        for($i=1; $i < 9; $i++){
            if(!$request->hasFile("image".$i))
                break;

         if($request->hasFile("image".$i)){
            $avatar = $request->file("image".$i);

            File::makeDirectory('items/'.$item->id);
            $filename = 'items/'.$item->id.'/' . $i . '.' . $avatar->getClientOriginalExtension();
              
            Image::make($avatar)->save( public_path($filename ) );

         ItemCaption::create([
            'item_id' => $item->id,
            'type' => 0,
            'content' => $filename
         ]);
          }
        }
            return Redirect::to('/profile/'.Auth::user()->id);
    }

    /**
     * show the specified resource in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Collection
     */

     public static function ShowItems( $id)
    {
        // 
         return Item::where('user_id', $id)->where('type', '=', 0)->with('ItemCaption')->orderBy('updated_at', 'desc')->get();
    }

        /**
     * show the specified resource in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Collection
     */

     public static function ShowItem( $id)
    {
        // 
         return Item::where('id', $id)->where('type', '=', 0)->with('ItemCaption')->with('User')->orderBy('updated_at', 'desc')->get();
    }

    /**
     * Update the specified resource in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from DB.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
