const form = document.querySelector('.comment-input-container');
const formInput = document.querySelector('.comment-input');

form.onsubmit = (e) => {
  e.preventDefault();

  // Ajax
  let xhr = new XMLHttpRequest();
  xhr.open('POST', './php/create-comment.php');
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;

        console.log(data);
        formInput.value = '';
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
};
