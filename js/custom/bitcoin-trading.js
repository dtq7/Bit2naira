$(document).ready(function () {
/* Sales of bitcoin handler */


$('#inputBitcoinAmount, #inputTransactionID, #inputRemarks').on('focus', function(){
    $('#errorMessage').text("");
});

$('button#sellButton').on('click', function (e) {
    e.preventDefault();
    var amount = $('#inputBitcoinAmount').val();
    var transactionID = $('#inputTransactionID').val();
    var remarks = $('#inputRemarks').val();
    if (isNotEmpty($('#inputBitcoinAmount')) && isNotEmpty($('#inputTransactionID'))) {
        $('.preloader').css('display','block').fadeIn("swing", function () {
            $.ajax({
                url: "bitcoin-trading.php",
                method: 'POST',
                data: {
                    sell: 1,
                    amount: amount,
                    transactionID: transactionID,
                    remarks: remarks
                },
                success: function (response) {
                    if (response == "failed") {
                        $('.preloader').fadeOut('1000s',
                            'swing',
                            function () {
                                $(
                                    '#errorMessage'
                                ).text(
                                    "Transaction Failed"
                                ).css('display',
                                    'block');
                            });

                    }

                    if (response == "success") {
                        $('.preloader').fadeOut('1000s',
                        'swing',
                        function () {
                            $(
                                '#errorMessage'
                            ).text(
                                "Transaction Completed"
                            ).css('display',
                                'block').css('color',
                                'green');
                        });

                        $('#inputBitcoinAmount').val("");
                        $('#inputTransactionID').val("");
                        $('#inputRemarks').val("");

                        setTimeout(function(){
                            $('#errorMessage').text("")
                        }, 7000);
                    }

                },
                dataType: 'text'
            });

        });
    }



});


/* Purchase of bitcoin handler */

$('#inputBitcoinAmountPD, #inputNairaAmountPD,#inputPOPD, #inputRemarksPD').on('click', function(){
    $('span.spanErr').text("");
});

setTimeout(function(){
    $('span.spanErr').text("");
},15000);


function isNotEmpty(caller) {
    if (caller.val() == '') {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}

});
