$(function () {
    let formSwitch = $('#is_published');

    formSwitch.change(function () {
        formSwitch.val(formSwitch.is(':checked') ? 1 : 0);
    })
})
