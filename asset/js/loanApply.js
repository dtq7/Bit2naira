$(document).ready(function() {

    $('#inputEmail').on('focus',function(){
      $('#emailErr').text('');
    });

     $('#inputContact').on('focus',function(){
      $('#phoneErr').text('');
    });


    $('#form').submit(function(){
        alert("Yes");
    });



  });

  function apply(){

       
    var amountA = $('#amountA');
    var loantypeA = $('#loantypeA');
    var firstnameA = $('#firstnameA');
    var lastnameA = $('#lastnameA');
    var inputEmail = $('#inputEmail');
    var inputContact = $('#inputContact');
    var incomeA = $('#incomeA');
    var maritalstatusA = $('#maritalstatusA');
    var countryA = $('#countryA');
    var cityA = $('#cityA');
    var occupationA = $('#occupationA');
    var addressA = $('#addressA');
    var durationA = $('#durationA');
    var refererA = $('#refererA');



    var passportA = $('#image').val();
    if (passportA == '') {
        alert("please select image");
        return false;
    } else {
        var extension_1 = $('#image').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension_1, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('Invalid image file');
            $('#image').val('');
            return false;
        }
    }


    var identityA = $('#image').val();
    if (identityA == '') {
        alert("please select image");
        return false;
    } else {
        var extension_2 = $('#image').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension_2, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('Invalid image file');
            $('#image').val('');
            return false;
        }
    }



    var purposeA = $('#purposeA');
    var genderA = $('input[name=gender]:checked');


    if(true){
        $.ajax({
            url:'apply.php',
            method:'POST',
            dataType:'text',
            data:{
                key:Thekey,
                bankToUpdate: bank.val(),
                accountToUpdate: account.val(),
                bitcoinToUpdate:bitcoin.val()
            },success: function (response){
            // alert(response);

            if(response == 'success'){
                $.alert("Your profile has been edited succesfully");
                $('#bankUp').val( bank.val());
                $('#accountUp').val(account.val());
                $('#bitcoinUp').val(bitcoin.val());
            }
    
            
            
        }
    });

    }

}