commentContainer = document.querySelector('.comments');

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open('GET', './php/display_comment.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        commentContainer.innerHTML = data;
      }
    }
  };
  xhr.send();
}, 1000);
