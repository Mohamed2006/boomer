$(document).ready(function(){
var editBtn = document.getElementById('editBtn');
var editables = document.querySelectorAll('#title, #author, #content')

editBtn.addEventListener('click', function(e) {
  if (!editables[0].isContentEditable) {
    editables[0].contentEditable = 'true';
    editables[1].contentEditable = 'true';
    editables[2].contentEditable = 'true';

    editBtn.innerHTML = 'Save Changes';
    $('.avatar').addClass('change');
    editBtn.classList.add("save");
    editBtn.style.backgroundColor = '#6F9';
  } else {
    // Disable Editing
    editables[0].contentEditable = 'false';
    editables[1].contentEditable = 'false';
    editables[2].contentEditable = 'false';
    // Change Button Text and Color
    editBtn.innerHTML = 'Enable Editing';
    editBtn.style.backgroundColor = '#F96';
    // Save the data in localStorage 
    for (var i = 0; i < editables.length; i++) {
      localStorage.setItem(editables[i].getAttribute('id'), editables[i].innerHTML);    
    }
    var post = {
        name: editables[0].innerText,
        bio:  editables[2].innerText
    };
    console.log(post);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 


    $.ajax({
        url: '/profile/edit',
        data:  post,
        type: 'POST',
        datatype: 'JSON',
        success: function(d){
            console.log(d);
         },
        catch: function(e){
            console.log(e);
        }
        
    });  
  }
});
});

