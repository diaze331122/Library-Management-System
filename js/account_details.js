var loginForm = document.getElementById("edit_login_form");
var emailForm = document.getElementById("edit_email_form");
var nameForm = document.getElementById("edit_name_form");
var addressForm = document.getElementById("edit_address_form");
var phoneForm = document.getElementById("edit_phone_form");

$('#edit_username').click(function(){
  setFormsInvisible()
  loginForm.style.display = "inline";
});

$('#edit_password').click(function(){
  setFormsInvisible()
  loginForm.style.display = "inline";
});

$('#edit_email').click(function(){
  setFormsInvisible()
  emailForm.style.display = "inline";
});

$('#edit_fn').click(function(){
  setFormsInvisible()
  nameForm.style.display = "inline";
});

$('#edit_ln').click(function(){
  setFormsInvisible()
  nameForm.style.display = "inline";
});

$('#edit_address').click(function(){
  setFormsInvisible()
  addressForm.style.display = "inline";
});

$('#edit_phone').click(function(){
  setFormsInvisible()
  phoneForm.style.display = "inline";
});

function setFormsInvisible(){
  loginForm.style.display = "none";
  emailForm.style.display = "none";
  nameForm.style.display = "none";
  addressForm.style.display = "none";
  phoneForm.style.display = "none";
}