let list = JSON.parse(localStorage.getItem('collection'));
const parent = document.getElementById('tableBody');
let finalPrice = 0;
const modal = document.querySelector('.empty-cart-modal');
const formModal = document.querySelector('.checkout-modal');
if (!list) {
    modal.style.display = 'block';
}
;

function selectSize(l) {
    switch (l) {
        case 'l':
            return 'Large'
            break;
        case  's':
            return 'Small'
            break;
        default:
            return 'Medium';
    }
    ;
};

function addChild(id, size, quantity, uid, price, total = price * quantity) {
    finalPrice += total;
    const container = document.createElement('tr');
    const node1 = document.createElement('td');
    const node2 = document.createElement('td');
    const node3 = document.createElement('td');
    const node4 = document.createElement('td');
    const node5 = document.createElement('td');
    const node6 = document.createElement('td');
    const button = document.createElement('button');

    node1.textContent = id;
    node2.textContent = selectSize(size);
    node3.textContent = quantity;
    node4.textContent = `$${price}.00`;
    node5.textContent = `$${total}.00`;
    node1.scope = 'col';
    button.textContent = 'Delete record';
    button.className = 'btn btn-danger unique';
    button.value = uid;
    container.className = 'record-box'
    button.style.margin = '0';
    button.style.padding = '3px';

    parent.appendChild(container);
    container.appendChild(node1);
    container.appendChild(node2);
    container.appendChild(node3);
    container.appendChild(node4);
    container.appendChild(node5);
    container.appendChild(node6);
    node6.appendChild(button);
};

if (list) {
    list.forEach((item) => {
        addChild(item.id, item.size, item.quantity, item.uid, item.price);
    });

}

const buttonNode = document.querySelectorAll('.btn.btn-danger');
buttonNode.forEach(button => {
    button.addEventListener('click', (e) => {
        deleteRecord(e.target.value);
    })
});


function deleteRecord(uid) {
    const current = list.filter(record => record.uid !== uid);
    if (current.length === 0) {
        localStorage.clear();
    } else {
        localStorage.setItem('collection', JSON.stringify(current));
    }

    location.reload();
};


function updateFinalPrice() {
    const nodePrice = document.querySelector('.finalPrice');
    nodePrice.innerHTML = `$${finalPrice}.00`;

}

updateFinalPrice();

function closeFormModal() {
    const buttonClose = document.querySelector('#closeForm');

    buttonClose.addEventListener('click', () => {
        formModal.style.display = 'none';
    })
};

function openFormModal() {
    const buttonClose = document.querySelector('.submit');

    buttonClose.addEventListener('click', () => {
        formModal.style.display = 'block';
    })
}

closeFormModal();
openFormModal();

const bridge = document.querySelector('.bridge');

bridge.value = JSON.stringify(list);




