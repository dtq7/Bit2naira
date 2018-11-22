$(document).ready(function(){
    //Initialized data

    $('table#resTable').DataTable();

    $('thead.icorem th').removeClass('sorting_asc');
    $('thead.icorem th').removeClass('sorting');

    function getAgency(e){
        alert("Yep");
        alert(e);
    }

    function getData(){
        alert("Gotten");
    }


    $('td#ebsa_ocats').text("EBSA Plan Administration");
    $('td#msha_inspection').text("MSHA Inspections");
    $('td#ofccp_cmplnt_invstgtn').text("OFCCP Compliance");
    $('td#osha_inspection').text("OSHA Inspections");
    $('td#whd_whisard').text("WHD Cases");

    $('td#ebsa_ocats').on("click",function(){
        $('#setCurrentAgency').val("ebsa_ocats");
        $('#setCurrentAgencyFullName').val("EBSA Plan Administration");
        $('#submitTable').click();
        
    });

    $('td#msha_inspection').on("click",function(){
        $('#setCurrentAgency').val("msha_inspection");
        $('#setCurrentAgencyFullName').val("MSHA Inspections");
        $('#submitTable').click();
    });

    $('td#ofccp_cmplnt_invstgtn').on("click",function(){
        $('#setCurrentAgency').val("ofccp_cmplnt_invstgtn");
        $('#setCurrentAgencyFullName').val("OFCCP Compliance");
        $('#submitTable').click();
    });

    $('td#osha_inspection').on("click",function(){
        $('#setCurrentAgency').val("osha_inspection");
        $('#setCurrentAgencyFullName').val("OSHA Inspections");
        $('#submitTable').click();
    });

    $('td#whd_whisard').on("click",function(){
        $('#setCurrentAgency').val("whd_whisard");
        $('#setCurrentAgencyFullName').val("WHD Cases");
        $('#submitTable').click();
    });

    //Pictures click

    $('#PICebsa_ocats').on("click",function(){
        $('#setCurrentAgencyP').val("ebsa_ocats");
        $('#setCurrentAgencyFullNameP').val("EBSA Plan Administration");
        $('#submitTableP').click();
        
    });

    $('img#PICmsha_inspection').on("click",function(){
        $('#setCurrentAgencyP').val("msha_inspection");
        $('#setCurrentAgencyFullNameP').val("MSHA Inspections");
        $('#submitTableP').click();
    });

    $('img#PICofccp_cmplnt_invstgtn').on("click",function(){
        $('#setCurrentAgencyP').val("ofccp_cmplnt_invstgtn");
        $('#setCurrentAgencyFullNameP').val("OFCCP Compliance");
        $('#submitTableP').click();
    });

    $('img#PICosha_inspection').on("click",function(){
        $('#setCurrentAgencyP').val("osha_inspection");
        $('#setCurrentAgencyFullNameP').val("OSHA Inspections");
        $('#submitTableP').click();
    });

    $('img#PICwhd_whisard').on("click",function(){
        $('#setCurrentAgencyP').val("whd_whisard");
        $('#setCurrentAgencyFullNameP').val("WHD Cases");
        $('#submitTableP').click();
    });

    $('button#validate').on("click", function(e){
        if($('.allAgency').prop("checked") == false && $('.EBSA').prop("checked") == false && $('.MSHA').prop("checked") == false && $('.OFCCP').prop("checked") == false  && $('.OSHA').prop("checked") == false && $('.WHD').prop("checked") == false){
            e.preventDefault();
            alert("Select a dataset to search from");
        }else if($('.companyNameCheckBox').prop("checked") == false && $('.yearCheckBox').prop("checked") == false && $('.naicsCheckBox').prop("checked") == false && $('.sicCheckBox').prop("checked") == false && $('.violationCheckBox').prop("checked") == false && $('.penaltyAmountCheckBox').prop("checked") == false){
            e.preventDefault();
             alert("Select a filtering parameter");
        }else if($('#zipInput').val() == "" && $('#stateSelect').val() == "" && $('#companyNameInputBox').val() == "" && $('#naicsInputBox').val() == "" && $('#sicInputBox').val() == "" && $('#yearFromBox').val() == "" && $('#yearToBox').val() == ""){
            e.preventDefault();
            alert("Input value for atleast one search parameter");
        }
        
    });

    $('.allAgency').on("click",function(){
        $('.EBSA,.MSHA,.OFCCP,.OSHA,.WHD').prop('checked',false);
    });

    $('.EBSA,.MSHA,.OFCCP,.OSHA,.WHD').on("click",function(){
        $('.allAgency').prop('checked',false);
    });


    $('#zipRadio').on("click",function(){
        $('#stateSelect').css("display","none");
        $('#stateSelect').val("");
        $('#zipInput').css("display","block");
    });

    $('#stateRadio').on("click",function(){
        $('#stateSelect').css("display","block");
        $('#zipInput').css("display","none");
        $('#zipInput').val("");
    });

    $('.companyNameCheckBox').on("click",function(){
        $('#companyNameInputBox').val("");
        $('#companyNameInputBox').toggle();
    });

    $('.yearCheckBox').on("click",function(){
        $('#yearFromBox').val("");
        $('#yearToBox').val("");
        $('#yearInputBox').toggle();
    });

    $('.naicsCheckBox').on("click",function(){
        $('#naicsInputBox').val("");
        $('#naicsInputBox').toggle();
    });

    $('.sicCheckBox').on("click",function(){
        $('#sicInputBox').val("");
        $('#sicInputBox').toggle();
    });

    $('.violationCheckBox').on("click",function(){
        $('#violationSelectBox').val("");
        $('#violationInputBox').toggle();
    });

    $('.penaltyAmountCheckBox').on("click",function(){
        $('#penaltyAmountSelectBox').val("");
        $('#penaltyAmountValueBox').val("");
        $('#penaltyAmountInputBox').toggle();
    });

    $('#planEINCheckBox').on("click",function(){
        $('#planEINInputBox').val("");
        $('#planEINInputBox').toggle();
    });

    $('#planNameCheckBox').on("click",function(){
        $('#planNameInputBox').val("");
        $('#planNameInputBox').toggle();
    });

    $('#planAdminCheckBox').on("click",function(){
        $('#planAdminInputBox').val("");
        $('#planAdminInputBox').toggle();
    });


    $('#mineIdCheckBox').on("click",function(){
        $('#mineIdInputBox').val("");
        $('#mineIdInputBox').toggle();
    });

    $('#operatorIdCheckBox').on("click",function(){
        $('#operatorIdInputBox').val("");
        $('#operatorIdInputBox').toggle();
    });

    $('#controllerIdCheckBox').on("click",function(){
        $('#controllerIdInputBox').val("");
        $('#controllerIdInputBox').toggle();
    });

    $('#operatorNameCheckBox').on("click",function(){
        $('#operatorNameInputBox').val("");
        $('#operatorIdInputBox').toggle();
    });

    $('#controllerNameCheckBox').on("click",function(){
        $('#controllerNameInputBox').val("");
        $('#controllerNameInputBox').toggle();
    });

    $('#accidentCheckBox').on("click",function(){
        $('#accidentSelectBox').val("");
        $('#accidentInputBox').toggle();
    });

    $('#unionStatusCheckBox').on("click",function(){
        $('#unionStatusSelectBox').val("");
        $('#unionStatusInputBox').toggle();
    });
});