
<head>
	
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<link href="/css/style.css" rel="stylesheet">
	<script src="/js/upload_img.js"></script>
<style >
	body{

	background-color: #f8f8f8;
	overflow: hidden;

}

.center{
       width: 50%;
    margin: 0 auto; 

}


.cropit-preview {
  background-color: #f8f8f8;
  background-size: cover;
  border: 5px solid #ccc;
  border-radius: 3px;
  margin-top: 7px;
  width: 250px;
  height: 250px;
   display: inline-block;
}

.cropit-preview-image-container {
  cursor: move;
}

.cropit-preview-background {
  opacity: .2;
  cursor: auto;
}

.image-size-label {
  margin-top: 10px;
}

input, .export {
  /* Use relative position to prevent from being covered by image background */
  position: relative;
  z-index: 10;
  display: block;
}
</style>

</head>
<body>

<div class="image-editor">
	<form action="/profile/edit/1" method="post" enctype="multipart/form-data"> 
		{{csrf_field()}}
   <input name="image" id="click" type="file" class="center cropit-image-input">
   <div class="cropit-preview"></div>
   <br>
   <input id="zoomer" type="range" class="center cropit-image-zoom-input">
   <button class="center btn btn-success export">Save</button>
</form>
 </div>
 <script>
$(document).ready(function(){

	$('#click').trigger('click');
});
 </script>
</body>
</html>
