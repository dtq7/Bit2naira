$(document).ready(function () {


    $('thead.icorem th').removeClass('sorting_asc');
    $('thead.icorem th').removeClass('sorting');


    //Handle update perfect money price


    $('#inputBitcoin, #inputPerfectmoney, #inputGiftcard').on('focus', function () {
        $('#errorMessage').text("");
    });

    $('button#updatePrice').on('click', function (e) {
        e.preventDefault();
        var bitcoin = $('#inputBitcoin').val();
        var giftcard = $('#inputGiftcard').val();
        var perfectmoney = $('#inputPerfectmoney').val();
        if (true) {
            $('.preloader').css('display', 'block').fadeIn("swing", function () {
                $.ajax({
                    url: "dashboard.php",
                    method: 'POST',
                    data: {
                        updatePrice: 1,
                        bitcoin: bitcoin,
                        giftcard: giftcard,
                        perfectmoney: perfectmoney
                    },
                    success: function (response) {
                        if (response == "failed") {
                            $('.preloader').fadeOut('1000s',
                                'swing',
                                function () {
                                    $(
                                        '#errorMessage'
                                    ).text(
                                        "Update Failed"
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
                                        "Update Succesful"
                                    ).css('display',
                                        'block').css('color',
                                        'green');
                                });

                            $('#inputBitcoin').val(bitcoin);
                            $('#inputGiftcard').val(giftcard);
                            $('#inputPerfectmoney').val(perfectmoney);

                            setTimeout(function () {
                                $('#errorMessage').text("")
                            }, 7000);
                        }

                    },
                    dataType: 'text'
                });

            });
        }






    });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    var activationCode;
    var suspensionCode;
    $('#addNew').on('click', function () {
        $('#exampleModalLongTitle').html('ADD USER');
        $('#fullNameA').val('');
        $('#userNameA').val('');
        $('#passwordA').val('');
        $('#emailA').val('');
        $('#phoneNumberA').val('');
        $('#bitcoinA').val('');
        $('#unitA').val('');
        $("#isActivatedA").prop("checked", false);
        $("#isSuspendedA").prop("checked", false);
        $('#addNewUser').modal('show');
    });

    $('#addNewUser').on('hidden.bs.modal', function () {
        $('#showContent').fadeOut();
        $('#payContent').fadeIn();
        $('#editContent').fadeIn();
        $('editRowID').val(0);
        $('#fullNameA').val('');
        $('#userNameA').val('');
        $('#passwordA').val('');
        $('#emailA').val('');
        $('#phoneNumberA').val('');
        $('#bitcoinA').val('');
        $('#unitA').val('');
        $("#isActivatedA").prop("checked", false);
        $("#isSuspendedA").prop("checked", false);
        $('#manageBtn').attr('value', 'Save').attr('onclick', 'saveData("addNew")').fadeIn();

    });

    getExistingData(0, 10);


   

   

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
    //End hanle perfect  money price
});

function deleteRow(rowID) {
    if (confirm('Are you sure you want to delete this user?')) {
        $.ajax({
            url: 'dashboard.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'deleteRow',
                rowID: rowID
            },
            success: function (response) {
                $("#username" + rowID).parent().remove();
                alert(response);
            }


        });
    }
}

function viewORedit(rowID, type) {
    $.ajax({
        url: 'dashboard.php',
        method: 'POST',
        dataType: 'json',
        data: {
            key: 'getRowData',
            rowID: rowID
        },
        success: function (response) {

            if (type == "pay") {
                $('#payContent').fadeIn();
                $('#editRowID').val(rowID);
                $('#manageBtn').attr('value', 'Pay').attr('onclick',
                    'payUp()');
                $('#exampleModalLongTitle').html("PAY USER");
            }


            $('#addNewUser').modal('show');


        }
    });

}

function getExistingData(start, limit) {

    $.ajax({
        url: 'dashboard.php',
        method: 'POST',
        dataType: 'text',
        data: {
            key: 'getExistingData',
            start: start,
            limit: limit
        },
        success: function (response) {
            if (response != 'reachedMax') {
                $('tbody').append(response);
                start += limit;
                getExistingData(start, limit);
            } else {
                $(".table").DataTable();
            }
        }
    });
}



function saveData(Thekey) {

    var editRowID = $('#editRowID')

    if (isNotEmpty(nameS) && isNotEmpty(userS) && isNotEmpty(passS) && isNotEmpty(emailS) && isNotEmpty(
            phoneNumberS)) {
        $.ajax({
            url: 'dashboard.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: Thekey,
                nameToSave: nameS.val(),
                userToSave: userS.val(),
                passToSave: passS.val(),
                emailToSave: emailS.val(),
                phoneNumberToSave: phoneNumberS.val(),
                bitcoinToSave: bitcoinS.val(),
                unitToSave: unitS.val(),
                isActivatedToSave: isActivatedS,
                isSuspendedToSave: isSuspendedS,
                rowID: editRowID.val()
            },
            success: function (response) {
                // alert (response);
                if (response != "success") {
                    alert('failed');
                    // $('#addNewUser').modal('hide');
                }

                if (response == "success") {
                    // alert ('yep');

                    var niceSuspensionValue = (isSuspendedS == 0) ? 'Active' : 'Suspended';

                    $("#fullname" + editRowID.val()).html(nameS.val());
                    $("#username" + editRowID.val()).html(userS.val());
                    $("#email" + editRowID.val()).html(emailS.val());
                    $("#phonenumber" + editRowID.val()).html(phoneNumberS.val());
                    $("#unit" + editRowID.val()).html(unitS.val());

                    $("#suspended" + editRowID.val()).html(niceSuspensionValue);




                    nameS.val('');
                    userS.val('');
                    passS.val('');
                    emailS.val('');

                    phoneNumberS.val('');

                    bitcoinS.val('');

                    unitS.val('');
                    $("#isActivatedA").prop("checked", false);

                    $("#isSuspendedA").prop("checked", false);

                    $('#addNewUser').modal('hide');
                    $('#manageBtn').attr('value', 'Save').attr('onclick', 'saveData("addNew")');
                    $('#exampleModalLongTitle').html('ADD USER');


                    //  header('Location: login.php');
                    // exit();


                }





            }
        });
    }
}

function payUp() {

    var amountS = $('#fullAmountA');
    var editRowID = $('#editRowID')

    if (isNotEmpty(amountS)) {
        $.ajax({
            url: 'dashboard.php',
            method: 'POST',
            dataType: 'json',
            data: {
                key: "payNew",
                amountToSave: amountS.val(),

                rowID: editRowID.val()
            },
            success: function (response) {
                // alert (response);
                if (response.successMessage != "success") {

                    // $('#addNewUser').modal('hide');
                }

                if (response.successMessage == "success") {


                    $("#bit2nairaAB" + editRowID.val()).html(response.balance);
                    amountS.val('');


                    $('#addNewUser').modal('hide');
                    $('#manageBtn').attr('value', 'Save').attr('onclick', 'saveData("addNew")');
                    $('#exampleModalLongTitle').html('ADD USER');


                    //  header('Location: login.php');
                    // exit();


                }





            }
        });
    }
}

function isNotEmpty(caller) {
    if (caller.val() == '') {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}