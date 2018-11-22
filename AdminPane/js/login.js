$(document).ready(function () {
    var password = $('#email');

    $(document).ready(function () {
        $('#res').text('');
        $('#retrieve').on('click', function () {
            $('#res').text('');


            if (isNotEmpty(password)) {
                $('.preloader').css('display','block').fadeIn("swing", function () {
                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        login: 1,
                        thepass: password.val(),

                    },
                    success: function (response) {

                        if (response == 'failed') {
                            $('.preloader').fadeOut('1000s',
                            'swing',
                            function () {
                            $('#res').text('Access Denied');
                        });

                        }
                        if (response == 'success') {
                            $('.preloader').fadeOut('1000s',
                            'swing',
                            function () {
                            window.location = 'dashboard.php';
                        });
                        }




                    }


                });
            });
            }

        });
        

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