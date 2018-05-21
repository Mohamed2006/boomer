<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="/js/post.js"></script>
    <script src="/js/comment.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style >
        
/* Modal Content */
  </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                             <li> <button  onclick="document.getElementById('id01').style.display='block'" onclick="btn()" style="margin-top: 8px;" class="btn btn-primary">Post</button> </li>
                        @endif
                    </ul>
                </div>
            </div>
            
         
<div class="w3-container">



<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">


  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Item')">New Item</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Post')">New Post</button>
  </div>

  <div id="Item" class="w3-container city">
 

    <div  id="ItemPost" class=" post modal-body">
<form action="/AddItem" method="post" enctype="multipart/form-data">
     {{csrf_field()}}
      <div class="row">
          <div class="col-sm-4">
<p>              Add photos 

<input name="image1" id="click" type="file" class="center cropit-image-input">
<input name="image2" id="click" type="file" class="center cropit-image-input">
<input name="image3" id="click" type="file" class="center cropit-image-input">
<input name="image4" id="click" type="file" class="center cropit-image-input">
<input name="image5" id="click" type="file" class="center cropit-image-input">
<input name="image6" id="click" type="file" class="center cropit-image-input">
<input name="image7" id="click" type="file" class="center cropit-image-input">
<input name="image8" id="click" type="file" class="center cropit-image-input">



          </div>
           <div class="col-sm-8">
            <div class="col-sm-4"></div>

            <div class="caption col-sm-8">
<div class="input-group">
<input type="text" class="form-control" placeholder="Name" name="name"aria-describedby="basic-addon2">

</div>
<br>
<div class="input-group">
<input type="text" class="form-control" placeholder="price" name="price" aria-describedby="basic-addon2">
<span class="input-group-addon" id="basic-addon2">boomie</span>
</div>
<br>
<div class="input-group">
<input type="text" class="form-control" placeholder="in-stock" name="stock" aria-describedby="basic-addon2">
<span class="input-group-addon" id="basic-addon2">Stock</span>
</div>
 <div class="form-group">
  <label for="comment">Item Caption:</label>
  <textarea maxlength="120" name="caption" class="form-control" rows="5" id="comment"></textarea>
</div> 
<input type="submit" value="Post" class="btn btn-primary" name="Post"> 

           </div>
           </div>

      </div>

</form>
    </div>

  </div>

  <div id="Post" class="w3-container city">
  
  <div  id="Post" class=" post modal-body">
<form action="/AddPost" method="post" enctype="multipart/form-data">
     {{csrf_field()}}
            <div class="row">
                <div class="col-sm-1">
                    <img class="small_avatar" src="/storage/1/1526362579.jpg">
                </div>
                <div class="col-sm-8">
                      <textarea maxlength="120" name="caption" class="form-control" rows="5" id="comment"></textarea><br>

                 <input type="file" accept="image/*, video/*"  name="file">
                 

                      <input type="submit" value="Post" class="btn bottom-left btn-primary" name="Post"> 
                </div>

            </div>
        </form>
        </div>

  </div>



  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Close</button>
  </div>
 </div>
</div>
</div>
    


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
            <span onclick="document.getElementById('myModal').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>

  <iframe  id="iframe" frameBorder="0"  height="100%" width="100%" id="iPost" src=></iframe>

  </div>

</div>

  </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
