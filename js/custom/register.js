$(document).ready(function () {

$('#inputName').on('click', function (e) {
    $('#usernameErr').text('');
    $('#inputName').removeClass("Error_Border");
});

$('#inputEmail').on('focus', function () {
    $('#emailErr').text('');
    $('#inputEmail').removeClass("Error_Border");
});

$('#inputPassword').on('focus', function () {
    $('#passowrdErr').text('');
    $('#inputPassword').removeClass("Error_Border");
});



$('#insert').click(function () {

   
});



});
