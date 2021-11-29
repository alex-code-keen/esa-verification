//console.log('in login');
const togglePassword  = document.querySelector('#reveal');
const password        = document.querySelector('#password');
const myEye           = document.querySelector('#togglePassword');
const btnSubmit       = document.querySelector('#verify');

togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye / eye slash icon
  myEye.classList.toggle('bi-eye');
  return true;
});


function validatePass( input ) {
  // var paswd = new RegExp("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,24}$/");  
  // var eval = /^[a-zA-Z0-9!@#$%^&*]/;
  if ( /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,32}$/.test( input )){ 
    return true 
  } else {
    return false
  };      
}

password.addEventListener("keyup", function(e){  
  var passValid = validatePass( password.value );
  
  if ( passValid ) {  
    password.style.borderColor = "#2EFE2E";
    btnSubmit.disabled = false;
  } else {
    password.style.borderColor = "red";
    btnSubmit.disabled = true;
  }
  return true;
});

window.onload = function() {
  btnSubmit.disabled = true;
};

/*
function onLoadHandler() {
  const loginInputsArray = Array.from(document.querySelectorAll('.login-form'));

  loginInputsArray.forEach(elem => {
    elem.addEventListener('blur', inputListener);
  });
}

function inputListener(e) {
  e.target.dataset.pristine = false;
  e.target.setCustomValidity('');
}

document.addEventListener('DOMContentLoaded', onLoadHandler);
*/
