import { v4 as uuidv4 } from 'https://jspm.dev/uuid'

const uiDInput = document.querySelectorAll('.uid');
uiDInput.forEach( input=>{
    input.value = uuidv4();
});