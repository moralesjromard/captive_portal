const form = document.querySelector('.create-post-modal');
const formBtn = document.querySelector('.post-modal-button');
const error = document.querySelector('.error');

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#ImdID').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

form.onsubmit = (e) => {
  e.preventDefault();
};

formBtn.onclick = () => {
  // Ajax
  let xhr = new XMLHttpRequest();
  xhr.open('POST', './php/create-post.php');
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;

        if (data !== 'success') {
          error.style.display = 'flex';
          error.innerHTML = data;
        } else {
          window.location.reload();
        }
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};
