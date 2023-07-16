const btnOpenModal = document.getElementById("cta-button-open");
const btnCloseModal = document.getElementById("cta-button-close");
const modalOverlay = document.querySelector('.modal-overlay');

btnOpenModal.addEventListener('click', () => {
    modalOverlay.classList.add('open');
    document.body.style.overflowY = 'hidden';
});

btnCloseModal.addEventListener('click', () => {
    modalOverlay.classList.remove('open');
    document.body.style.overflowY = 'auto';
});