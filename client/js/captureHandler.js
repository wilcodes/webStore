import {updateUid} from "./uidAssign.js";

const form = document.querySelectorAll('.form');
const modalNodeShop = document.querySelector('.empty-cart-modal-shop');

function captureHandler(form) {
    const formData = new FormData(form);
    let result = {};
    for (let pair of formData.entries()) {
        result[pair[0]] = pair[1];
    }
    ;

    if (localStorage.getItem('collection')) {
        let current = JSON.parse(localStorage.getItem('collection'));
        current.forEach((item, i) => {

            if (item.id === result.id && item.size === result.size) {
                let newQuantity = parseInt(result.quantity) + parseInt(current[i].quantity);
                result.quantity = newQuantity.toString();
                current[i] = result;
                localStorage.setItem('collection', JSON.stringify(current));
            } else {
                let newCollection = [...current, result];
                localStorage.setItem('collection', JSON.stringify(newCollection));
            }
        });

    } else {
        localStorage.setItem('collection', JSON.stringify([result]))
    }
    console.log(JSON.parse(localStorage.getItem('collection')));
    modalNodeShop.style.display = 'block';
};

form.forEach(card => {

    card.addEventListener('submit', (event) => {
        event.preventDefault();
        console.log(event.target);
        captureHandler(event.target);

    });

});


const modalButton = document.querySelector('#modalHandler');

modalButton.addEventListener('click', (e) => {
    e.preventDefault();
    modalNodeShop.style.display = 'none';
    updateUid();
})
