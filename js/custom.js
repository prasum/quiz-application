/* Bootstrap Contact Form
 ***************************************************************************/
$(document).ready(function(){
	// validate signup form on keyup and submit

	var validator = $("#contactform").validate({
		errorClass:'has-error',
		validClass:'has-success',
		errorElement:'div',
		highlight: function (element, errorClass, validClass) {
			$(element).closest('.form-control').addClass(errorClass).removeClass(validClass);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
		},
		rules: {
			name: {
				required: true,
				minlength: 2
			},
			school: {
				required: true
			},
			standard: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			contactnumber: {
				required: true,
				minlength: 10
			}
		},
		messages: {
			name: {
				required: '<span class="help-block">Please enter your name.</span>',
				minlength: jQuery.format('<span class="help-block">Your name needs to be at least {0} characters.</span>')
			},
			school: {
				required: '<span class="help-block">You need to select your school.</span>'
			},
			standard: {
				required: '<span class="help-block">You need to select your class.</span>'
			},
			email: {
				required: '<span class="help-block">Please enter a valid email address.</span>',
				minlength: '<span class="help-block">Please enter a valid email address.</span>'
			},
			contactnumber: {
				required: '<span class="help-block">You need to enter a phone number.</span>',
				minlength: jQuery.format('<span class="help-block">Enter at least {0} characters.</span>')
			}
		}
	});
});
