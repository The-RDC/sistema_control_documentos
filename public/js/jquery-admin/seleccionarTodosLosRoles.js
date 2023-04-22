$('#seleccionar-todos-roles').click(function(){
    if ($('#seleccionar-todos-roles').prop('checked') == true) 
    {
        $.each($('input'), function (indexInArray, valueOfElement) {
            if ($(this).attr('type') == "checkbox") {
                $(this).prop('checked',true);  
            } 
       });    
    }
    else
    {
        $.each($('input'), function (indexInArray, valueOfElement) {
            if ($(this).attr('type') == "checkbox") {
                $(this).prop('checked',false);  
            } 
       });
    }
    
});