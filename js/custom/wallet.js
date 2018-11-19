$(document).ready(function () {
    
    $('#inputAmount').on('focus', function(){
        $('#errorMessage').text("");
    });
    
    $('button#withdrawButton').on('click', function (e) {
        e.preventDefault();
        var amount = $('#inputAmount').val();
        
        if (isNotEmpty($('#inputAmount')) ) {
            $('.preloader').css('display','block').fadeIn("swing", function () {
                $.ajax({
                    url: "wallet.php",
                    method: 'POST',
                    data: {
                        withdraw: 1,
                        amount: amount
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

                        if (response == "Insufficient Balance") {
                            $('.preloader').fadeOut('1000s',
                                'swing',
                                function () {
                                    $(
                                        '#errorMessage'
                                    ).text(
                                        "Insufficient Balance"
                                    ).css('display',
                                        'block');
                                });
    
                        }

                        if (response == "Invalid Amount") {
                            $('.preloader').fadeOut('1000s',
                                'swing',
                                function () {
                                    $(
                                        '#errorMessage'
                                    ).text(
                                        "Invalid Amount"
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
    
                            $('#inputAmount').val("");
    
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
    
    
    
    function isNotEmpty(caller) {
        if (caller.val() == '') {
            caller.css('border', '1px solid red');
            return false;
        } else
            caller.css('border', '');
    
        return true;
    }
    
    });
    