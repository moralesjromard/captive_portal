const form = document.querySelector('.container');
const formBtn = document.querySelector('#login-btn');
const error = document.querySelector('.error');

const emailInput = document.querySelector('.email-input');
const passwordInput = document.querySelector('.password-input');

form.onsubmit = (e) => {
  e.preventDefault();
};

formBtn.onclick = () => {
  // Ajax
  let xhr = new XMLHttpRequest();
  xhr.open('POST', './php/login.php');
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;

        if (data !== 'success') {
          error.style.display = 'flex';
          error.innerHTML = data;
          emailInput.value = '';
          passwordInput.value = '';
        } else {
          window.location.href = './home.php';
        }
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};
