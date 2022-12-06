const buttonDelete = document.querySelectorAll('.btn.btn-secondary');
const buttonClose = document.querySelector('#close-update');
const modalUpdate = document.querySelector('.modal-update');
const formButton = document.querySelectorAll('#update-form');

buttonDelete.forEach(button => {
    button.addEventListener('click', (e) => {
        modalUpdate.style.display = 'block';
        const uid = e.target.value;
        if (uid){
           localStorage.setItem('currentItem', uid);
        }

    })
});



buttonClose.addEventListener('click',()=>{
    modalUpdate.style.display = 'none';
});

function updateData(form){
    //getting input data and storing them in the result object
    const uid = localStorage.getItem('currentItem');

    const formData = new FormData(form);
    let result = {};
    for (let pair of formData.entries()) {
        result[pair[0]] = pair[1];
    };
    // We have uid and the new data. call the collection and update those values!
    let collection = JSON.parse(localStorage.getItem('collection'));
    //iterate over the collection

    collection.forEach((record,i)=>{

        if (record.uid === uid){
            collection[i].size = result.size;
            collection[i].quantity = result.quantity;
        };

    });

    localStorage.setItem('collection', JSON.stringify(collection));
    modalUpdate.style.display = 'none';
    location.reload();
}

formButton.forEach(button=>{
    button.addEventListener('submit', (e) => {
        e.preventDefault();

        updateData(e.target);
    })
});




