const recordNode = document.querySelectorAll('.record-box');
recordNode.forEach(node => {
    node.addEventListener('click', (e) => {
        console.log(e.target.value);
    })
});


