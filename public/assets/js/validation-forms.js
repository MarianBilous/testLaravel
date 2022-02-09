$(function($) {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const form = document.querySelector('#validation-form');

    // Loop over them and prevent submission
    if (form) {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    }
});
