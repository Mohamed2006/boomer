@extends('layouts.app')

@section('content')
<head>

<script src="/js/profile.js"></script>

 <link href="/css/profile.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.2.2/lity.min.css" rel="stylesheet">
 <link href="{{ asset('css/postControll.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.2.2/lity.min.js"></script>
<style >
    .city{
        display: none;
    }
</style>
</head>
<script src="/js/InlineEditing.js"></script>

<div class="">
<div class="full_width">
	

	<div class="com-sm-12 full_width transparent">
		<div style="background-image: url({{$user['header']}});" class="header full_width ">
             @if(isset(Auth::user()->id ) )
            <form action="/upload/{{Auth::user()->id}}">

			</div>
	</div>
	<div class="row">
	<div class="col-sm-3">
		<div id="user_section">

           

            </form>
			@endif
  @if(isset(Auth::user()->id) &&  $user['id'] == Auth::user()->id)
                         {{csrf_field()}}
    <a href="/test" data-lity><img class=" avatar" src="/{{$user['picture']}}"></a>
    @else()

        <img class="change avatar" src="{{$user['picture']}}">
    @endif
       
			<p id="author">{{$user['name']}}
			<p>@
                {{$user['name']}}
		</div>
	</div>
	<div class="summary col-sm-6 row">
		<div class="col-sm-3">Follower<br>  {{$numberOfFollwer}}
		</div>
		<div class="col-sm-3">Following <br> {{$numberOfFollwing}}</div>
		<div class="col-sm-3">Boomerank <br> {{$user['balance']}}</div>
        <div class=" col-sm-12"> 




        
            
            <div id="editDocument">
            <h1 id="title"></h1>
           
            </p>
            <p id="content">
            {{$user['bio']}}
        </p>
            </div>
           
           


        </div> </div>
	<div class="summary center-block btn-collection col-sm-3 ">
  @if(isset(Auth::user()->id) &&  $user['id'] == Auth::user()->id)
    
		<button  id="editBtn" class="btn btn-secondary">Edit Profile</button><br>

		<button  class="btn btn-secondary">Settings</button><br>
        @else()
        <button  class="btn btn-success">Follow</button><br>
        @endif
 @if($follow == false)
		<button  class="btn btn-success">Follow</button><br>
@endif

	</div>
	
	</div>
</div>

<div class="up col-sm-12" id="white_blank_space">

<div class="tab">
    
  <button class="active tablinks" onclick="toggle(event, 'store')">Store</button>
  <button class="tablinks" onclick="toggle(event, 'wall')">Wall</button>
  @if(isset(Auth::user()->id) &&  $user['id'] == Auth::user()->id)
  <button class="tablinks" onclick="toggle(event, 'transaction')">Transaction</button>
  @endif
</div>


<div class="page container">


<div id="store" class="common">
  <h3>Store</h3>
	 <div class="row">
@foreach($items as $item)

            <div  class="item_box col-sm-3">
                <div class="instagram-content">
          
                    <div class="row photos-wrap">
                   
                    <div class="box col-xs-12  ">
                        <div class="photo-box">
                            <div class="image-wrap">
                                <img class="img-responsive" src="/{{$item->ItemCaption[0]->content}}">
                                <div class="likes">309 Likes</div>
                            </div>
                            <div  class="description">
                                 {{$item->name}}
                                 <br>
                                   {{$item->content}}

                                <div class="date">{{$item->created_at}}</div>
                            </div>
                        </div>
                    </div>
                        </div>
                </div>
            </div>

@endforeach()



        </div>
</div>

<div style="display: none;" id="wall" class="common">
  <h3>Wall</h3>
  <div class="row col-sm-8">
    @foreach($posts as $post)
  
        <div  id="myBtn" data-id="{{$post->id}}" class="PostContainer col-sm-12 col-xm-12">
          <div class="col-sm-2">
              <img class="small_avatar" src="/{{$post->user->picture}}">
          </div>
          <div class="col-sm-10">
              <h5>{{$post->user->name}} <small>
                    @
                {{$post->user->name}} - {{$post->created_at}}</small></h5>
 <!-- This is a string  --> 
            <div class="PostContent">
           
                  <p>{{$post->content}}
                 <br>
                 
                <a href="/{{$post->PostContent[0]->content}}" data-lity data-lity-desc="Photo of a flower"> 
                 <img class="PostImage" src="/{{$post->PostContent[0]->content}}" >
                </a>
                   </div>
            <br>
          30 <a id="like" href=""><span> Like </span></a>
          30 <a id="reply" href=""><span> Reply </span></a>
          </div>
      </div>

      @endforeach()



<!-- The Modal -->



  </div> 
</div>

<div style="display: none;" id="transaction" class="common">

</div>


</div>
</div>

</div>

@endsection