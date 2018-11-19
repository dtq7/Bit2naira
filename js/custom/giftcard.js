$(document).ready(function () {


    $('#inputAmountD, #inputCardTypeD, #inputDenominationD,#inputRemarksD, #inputGiftCardD').on('click', function () {
        $('span.spanErr').text("");
    });

    setTimeout(function () {
        $('span.spanErr').text("");
    }, 15000);



});