//  source : @designcouch https://codepen.io/designcouch/pen/obvKxm

// 
$('.app-main .playWrapper .myform-container [name="jitsi"] #gameSide #controlBars #playerControls .btnGroup button').click(function () {
  var buttonId = $(this).attr('id');
  $('#modal-container').removeAttr('class').addClass(buttonId);
  $('body').addClass('modal-active');
})

// ferme la modale si on clique sur le bouton X
$('#modal-container .modal-background .modal .close').click(function () {
  $('#modal-container').addClass('out');
  $('body').removeClass('modal-active');
  $('body').addClass('modal-hidden');
});

// ferme la modale si on clique à l'extérieur
var parentDOM = document.getElementById("modal-container");
var modal = parentDOM.getElementsByClassName("modal-background")[0];

window.onclick = function (event) {
  if (event.target == modal) {
    $('#modal-container').addClass('out');
    $('body').removeClass('modal-active');
    $('body').addClass('modal-hidden');
  }
}
