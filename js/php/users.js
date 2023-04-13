const usersContainer = document.getElementById('chat-user-container');
const form = document.querySelector('.search-part');
const searchInput = document.querySelector('.search-input');

form.onsubmit = (e) => {
  e.preventDefault();

  let searchInputValue = searchInput.value;

  // Ajax
  let xhr = new XMLHttpRequest(); // Creating XML object.
  xhr.open('POST', './php/search.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersContainer.innerHTML = data;
      }
    }
  };

  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('searchTerm=' + searchInputValue);
};
