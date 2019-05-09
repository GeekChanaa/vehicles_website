// DASHBOARD FUNCTIONS


// Toggle the underline of add-todo input ( show it when focused and hide it when blured)

$('.add-todo input').focus(function(e){
  $(this).next().css('visibility','visible');
  $(this).next().css('width','100%');
});
$('.add-todo input').blur(function(e){
  $(this).next().css('visibility','hidden');
  $(this).next().css('width','0%');
});

$('.update-content-todo').click(function(e){
    $(this).removeAttr('disabled');
});
// toggle line through the todo (line through when its done and normal styling when it's undone)

$('.check-btn').click(function(e){
  if($(this).hasClass('doneTodo')){
    $(this).removeClass('doneTodo');
    $(this).addClass('undoneTodo');
    $(this).next().addClass('done');
  }
  else{
    $(this).removeClass('undoneTodo');
    $(this).addClass('doneTodo');
    $(this).next().removeClass('done');
  }
});

function listnv(){
$('#list_nv').show();
$('#list_uv').hide();
$('#list_ncp').hide();
$('#list_ucp').hide();
}

function listuv(){
  $('#list_nv').hide();
  $('#list_uv').show();
  $('#list_ncp').hide();
  $('#list_ucp').hide();
}

function listucp(){
  $('#list_nv').hide();
  $('#list_uv').hide();
  $('#list_ncp').hide();
  $('#list_ucp').show();
}

function listncp(){
  $('.list_nv').hide();
  $('.list_uv').hide();
  $('.list_ncp').show();
  $('.list_ucp').hide();
}

function listposts(){
  $('.listposts').show();
  $('.listcomments').hide();
  $('.listreplies').hide();
}

function listcomments(){
  $('.listposts').hide();
  $('.listcomments').show();
  $('.listreplies').hide();
}

function listreplies(){
  $('.listposts').hide();
  $('.listcomments').hide();
  $('.listreplies').show();
}

function listbrands(){
  $('.listbrands').show();
  $('.listmodels').hide();
  $('.listgenerations').hide();
}

function listmodels(){
  $('.listbrands').hide();
  $('.listmodels').show();
  $('.listgenerations').hide();
}

function listgenerations(){
  $('.listbrands').hide();
  $('.listmodels').hide();
  $('.listgenerations').show();
}

// Display input and delete label tag
function changeupdate(id){
  $('.td-list-update'+id).css('display','none');
  $('.td-input-update'+id).css('display','initial');
}

function adduser(){
  $('.users-table').append('<tr><td> XX </td><td><input type="text" id="name"> </input></td><td><input type="text" id="email"> </input></td><td><input type="text" id="num_tel"> </input></td><td><input type="text" id="address"> </input></td><td><input type="text" id="rank"> </input></td><td><input type="text" id="blog_score"> </input></td><td> <button class="btn btn-primary adduser"> create! </button> </td><td> done </td><td> done </td><td> done </td></tr>');

}
