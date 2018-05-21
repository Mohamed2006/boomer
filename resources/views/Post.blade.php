
<script src="/js/profile.js"></script>

 <link href="/css/profile.css" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.2.2/lity.min.css" rel="stylesheet">
 <link href="{{ asset('css/postControll.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.2.2/lity.min.js"></script>

<script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <!-- Styles -->
  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


 
  @foreach($posts as $post)
  
        <div  id="" data-id="{{$post->id}}" class=" row col-sm-12">
          <div  class="col-xm-3">
              <img class="small_avatar" src="/{{$post->user->picture}}">
          </div>
          <div class="col-xm-8">
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
         
          <hr>
          <p>Impressions | 35 Likes<br>
             30 <a id="like" href=""><span> Like </span></a>
          30 <a id="reply" href=""><span> Reply </span></a>

<form action="/AddComment/{{$post->id}}" method="post" >
       {{csrf_field()}}
          <div  class=" row write_comment">
            <div class="col-xs-6">
              <img class="small_avatar" src="/storage/1/1526362579.jpg">
                </div>
            <div class="col-xs-6">

            <textarea name="comment" class="comment" placeholder="Leave a comment .. " rows="1" cols="35"></textarea><br>
            <input value="post" id="post" style="display: none" class="bottom-right btn btn-primary" type="submit" name="">
            </div>
            
          </div>

</form>      
      <hr>
  <div class="PostContainer row ">
            <div class="col-xs-6">
              <img class="small_avatar" src="/storage/1/1526362579.jpg">
                </div>
            <div class="col-xs-6">
              <p>Name @malsdyaq -  21:58:19
           <h6> This Artistic level is understood by only a few</h6>
            </div>

          </div>
<br>
            <div class="PostContainer row ">
            <div class="col-xs-6">
              <img class="small_avatar" src="/storage/1/1526362579.jpg">
                </div>
            <div class="col-xs-6">
              <p>Name @malsdyaq -  21:58:19
           <h6> This Artistic level is understood by only a few</h6>
            </div>

          </div>




          </div>
      </div>

@endforeach()

<script >
  $('.write_comment').click(function(){
  $('.write_comment').css('height', '100');
    $('#post').show();
});
    
  

function collapse(){
    $('#comment').attr('rows', '2');
    $('#buttons').hide();
}  
</script>