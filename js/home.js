const createPostModal = document.querySelector('.create-post-modal-banner');
const triggerInput = document.querySelector('.create-post-input');
const modalCloseIcon = document.querySelector('.fa-times');

triggerInput.onclick = () => {
  createPostModal.classList.add('active');
  document.body.style.overflow = 'hidden';
};

modalCloseIcon.onclick = () => {
  createPostModal.classList.remove('active');
  document.body.style.overflow = 'auto';
};

// createPostModal.onclick = () => {
//   createPostModal.classList.remove('active');
//   document.body.style.overflow = 'auto';
// };
