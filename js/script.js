$(document).ready(function() {

	$('.rsvp-option').click(function() {

		var targID = $(this).attr('id');

		$('.selected').removeClass('selected');
		$(this).addClass('selected');

		$('input[type="radio"][value='+targID+']').prop("checked", true);

		var thisDisplay = $('#' + targID + 'Section').css('display');

		if(thisDisplay != 'block') {
			$('.hiddenSection').slideUp( "slow" );
			$('#' + targID + 'Section').slideDown("slow");
		}

	});

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		 $('#content').css('padding-top', '240px');
	}

	$( "#name" ).keyup(function() {

		var thisText = $(this).val();

		var term1 = " and";
		var term2 = "&";
		var term3 = ",";
		var term4 = "/";

		if( thisText.indexOf( term1 ) != -1 ||  thisText.indexOf( term2 ) != -1 ||  thisText.indexOf( term3 ) != -1 ||  thisText.indexOf( term4 ) != -1) {
		    $('.plural').html('We');
		  }

	});

	$("#submitButton").click(function() {
	  $( "#properSubmitButton" ).trigger( "click" );
	});

});