$(document).ready(function(){

    $('button#denyButton').on('click',function(e){
        var id = e.target.name;
        $('div#'+id).css('display', 'block');
    });

    $('button#cancelDeny').on('click',function(e){
        var ids = e.target.name;
        $('div#'+ids).css('display', 'none');
    });
});