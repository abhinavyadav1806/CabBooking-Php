// On Select CedMicro Disable Input Field
$(document).ready(function() 
{
    $(".nosamelocation").change(function() 
    {
        $("select option").prop("disabled", false);
        $(".nosamelocation").not($(this)).find("option[value='" + $(this).val() + "']").prop("disabled", true);
    });
});

function cartype()
{   $('#calculate-fare').show();
    $('#book-now').hide();

    var cartype = $('#selectcartype').val();

    if(cartype =='cedmicro')
    {
		$('#luggage').attr("disabled",true);
		$("#luggage").val("Luggage facility is not available for CedMicro");
	}
    else
    {
		$('#luggage').attr("disabled",false);
		$('#luggage').val("");
	}
}

function disable() 
{
	$('#calculate-fare').show();
    var x = $(".pickup").val();
    var y=$(".drop option[value='"+x+"']").val();
    $(".drop option[value='"+x+"']").attr("disabled", "disabled").siblings().removeAttr("disabled");
    $('#pickmsg').hide();
    $('#book-now').hide();
}

function dis() 
{
	$('#calculate-fare').show();
	$('#book-now').hide();
    var x = $(".drop").val();
    $(".pickup option[value='"+x+"']").attr("disabled", "disabled").siblings().removeAttr("disabled");
    $('#dropmsg').hide();
   
}

function onlynumber(button) 
{ 
	console.log(button.which);
    var code = button.which;
    if (code > 31 && (code < 48 || code > 57)) 
        return false; 
    return true; 
}