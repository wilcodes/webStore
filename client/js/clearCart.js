const buttonClear = document.querySelector('.clear');


buttonClear.addEventListener('click', () => {
    localStorage.clear();
    location.reload();
});