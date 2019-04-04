// DASHBOARD FUNCTIONS



// Display input and delete label tag
function changeupdate(id){
  $('.td-list-update'+id).css('display','none');
  $('.td-input-update'+id).css('display','initial');
}

function adduser(){
  $('.users-table').append('<tr><td> XX </td><td><input type="text" id="name"> </input></td><td><input type="text" id="email"> </input></td><td><input type="text" id="num_tel"> </input></td><td><input type="text" id="address"> </input></td><td><input type="text" id="rank"> </input></td><td><input type="text" id="blog_score"> </input></td><td> <button class="btn btn-primary adduser"> create! </button> </td><td> done </td><td> done </td><td> done </td></tr>');

}
