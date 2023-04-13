const chatform = document.querySelector('.chat-bottom');
const chatInput = document.querySelector('.chatmessage-input');
const messageContainer = document.querySelector('.chat-messages-container');

chatform.onsubmit = (e) => {
  e.preventDefault();

  // Ajax
  let xhr = new XMLHttpRequest(); // Creating XML object.
  xhr.open('POST', 'php/create-message.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;

        console.log(data);
        chatInput.value = '';
      }
    }
  };
  let formData = new FormData(chatform); // Creating new formData object
  xhr.send(formData); // Sending the form data to php
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'php/display-chat.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        messageContainer.innerHTML = data;
      }
    }
  };
  let formData = new FormData(form); // Creating new formData object
  xhr.send(formData); // Sending the form data to php
}, 500);

// function scrollToBottom() {
//   chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;
// }
