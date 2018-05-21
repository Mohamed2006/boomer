<?php

namespace App\Http\Controllers;
use App\Post as Post;
use App\Balance as Balance;
use App\Tranaction as Tranaction;
use Auth;
use App\User as User;
use App\Follow as Follow;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display the main page for the current user .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Update follow record on DB
     *
     * @return 0.
     */
    public function Follow(User $id)
    {
        //
    }

    /**
     * Update follow record on DB
     *
     * @return 0.
     */
    public function Unfollow(User $id)
    {
        //
    }

    /**
     * Get all threads where user was mentioned. and send notification for him
     *
     * @return \Illuminate\Http\Response
     */
    public function Mention()
    {
        //
    }



    /**
     * Store a record for any transaction happened whether it successed or not.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Transfer(User $id, integer $amount)
    {
        //
    }

    /**
     * Remove the specified resource from DB.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        //
    }
}
