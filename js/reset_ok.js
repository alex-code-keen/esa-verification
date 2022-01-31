const togglePassword0 = document.querySelector('#reveal0');
const togglePassword1 = document.querySelector('#reveal1');

const myEye0 = document.querySelector('#togglePassword0');
const myEye1 = document.querySelector('#togglePassword1');

const password0 = document.querySelector('#enter_pass');
const password1 = document.querySelector('#reenter_pass');

const btnSubmit = document.querySelector('#verify');

togglePassword0.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password0.getAttribute('type') === 'password' ? 'text' : 'password';
  password0.setAttribute('type', type);
  // toggle the eye / eye slash icon
  myEye0.classList.toggle('bi-eye');
  return true;
});

togglePassword1.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
  password1.setAttribute('type', type);
  // toggle the eye / eye slash icon  
  myEye1.classList.toggle('bi-eye');
  return true;
});

password0.addEventListener('keydown', function(e){
  // e.preventDefault();
  var value = e.target.value;
  var idx = e.target.selectionStart;
  var key = e.key;
  if ( key.length > 1 ) return;
  
  var keyValid = validateKey( key );
  // console.log( key+'->'+res );  
  if ( !keyValid ){ e.preventDefault() };
  return true;
  // var passValid = validatePass( value + key );
  // if ( passValid ){
  //   document.getElementById("verify").disabled = false;
  // } else {
  //   document.getElementById("verify").disabled = true;
  // }
  // console.log( value + key+'->'+passValid );  
});

password1.addEventListener('keydown', function(e){
  var value = e.target.value;
  var idx = e.target.selectionStart;
  var key = e.key;
  if ( key.length > 1 ) return;
  
  var keyValid = validateKey( key );
  // console.log( key+'->'+res );  
  if ( !keyValid ){ e.preventDefault() };
  return true;
  // var passValid = validatePass( value + key );
  // if ( passValid ){
  //   document.getElementById("verify").disabled = false;
  // } else {
  //   document.getElementById("verify").disabled = true;
  // }
  // console.log( value + key+'->'+passValid );  
});

function validateKey( input ) {
  // var paswd = new RegExp("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,24}$/");  
  // var eval = /^[a-zA-Z0-9!@#$%^&*]/;
  if ( /^[a-zA-Z0-9!@#$%^&*]/.test( input )){ return true } else { return false };      
}


function validatePass( input ) {
  // var paswd = new RegExp("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,24}$/");  
  // var eval = /^[a-zA-Z0-9!@#$%^&*]/;
  if ( /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,32}$/.test( input )){ 
    return true 
  } else {
    return false
  };      
}

password0.addEventListener("keyup", function(e){  
  var passValid = validatePass( password0.value );
  
  if ( passValid ) {  
    password0.style.borderColor = "#2EFE2E";
    // password1.style.borderColor = "#2EFE2E";
    if ( password0.value == password1.value ) {      
      btnSubmit.disabled = false;
    } else {
      btnSubmit.disabled = true;        
    }
  } else {
    password0.style.borderColor = "red";
    btnSubmit.disabled = true;
  }
  return true;
});

password1.addEventListener("keyup", function(){  
  var passValid = validatePass( password1.value );

  if ( passValid ) {  
    password1.style.borderColor = "#2EFE2E";
    // password1.style.borderColor = "#2EFE2E";
    if ( password0.value == password1.value ) {  
      btnSubmit.disabled = false;
    } else {
      btnSubmit.disabled = true;  
    }
  } else {    
    password1.style.borderColor = "red";
    btnSubmit.disabled = true;
  }
  return true;
});

// function testpassword() {
//   var text1 = document.getElementById("enter_pass");
//   var text2 = document.getElementById("reenter_pass");
//   if (text1.value == text2.value) {
//     text2.style.borderColor = "#2EFE2E";    
//     document.getElementById("verify").disabled = false;
//   } else {
//     text2.style.borderColor = "red";
//     document.getElementById("verify").disabled = true;
//   }
// }

window.onload = function() {
  document.getElementById("verify").disabled = true;
};