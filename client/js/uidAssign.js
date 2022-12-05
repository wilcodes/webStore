import {v4 as uuidv4} from 'https://jspm.dev/uuid'


export function updateUid() {
    const uiDInput = document.querySelectorAll('.uid');
    uiDInput.forEach(input => {
        input.value = uuidv4();
    });
};

updateUid();