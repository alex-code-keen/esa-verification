// console.log('in login');
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
