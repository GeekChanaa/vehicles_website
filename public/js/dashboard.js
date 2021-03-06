// DASHBOARD FUNCTIONS


// Toggle the underline of add-todo input ( show it when focused and hide it when blured)



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

// Toggle the sidebar when collapse-btn is clicked

$('.collapse-btn').click(function(e){
  if($(this).attr('name')=='close'){
    $(this).attr('name','menu');
    $('.sidebar').removeClass('active');
  }
  else{
    $(this).attr('name','close');
    $('.sidebar').addClass('active');
  }
});

// Display input and delete label tag
function changeupdate(id){
  $('.td-list-update'+id).css('display','none');
  $('.td-input-update'+id).css('display','initial');
}

function adduser(){
  $('.users-table').append('<tr><td> XX </td><td><input type="text" id="name"> </input></td><td><input type="text" id="email"> </input></td><td><input type="text" id="num_tel"> </input></td><td><input type="text" id="address"> </input></td><td><input type="text" id="rank"> </input></td><td><input type="text" id="blog_score"> </input></td><td> <button class="btn btn-primary adduser"> create! </button> </td><td> done </td><td> done </td><td> done </td></tr>');

}

$('.todo').hover(function(){
  $(this).children('.todo-incharge').addClass('col-2');
  $(this).children('.todo-incharge').addClass('offset-1');
  $(this).children('.todo-incharge').removeClass('offset-2');
  $(this).children('.todo-delete').css('display','initial');
  $(this).children('.todo-delete').animate({
    'opacity' : '1'
  },300);
},function(){
  $(this).children('.todo-incharge').removeClass('col-2');
  $(this).children('.todo-incharge').removeClass('offset-2');
  $(this).children('.todo-incharge').addClass('col-1');
  $(this).children('.todo-incharge').addClass('offset-2');
  $(this).children('.todo-delete').css('display','none');
  $(this).children('.todo-delete').animate({
    'opacity' : '0'
  },300);
});
