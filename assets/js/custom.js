"use strict";

$(document).ready(function () {


});


// Show Password

function showPassword(button) {
	var inputPassword = $(button).parent().find('input');
	if (inputPassword.attr('type') === "password") {
		inputPassword.attr('type', 'text');
	} else {
		inputPassword.attr('type', 'password');
	}
}

$('.show-password').on('click', function () {
	showPassword(this);
})


//validate matched password
function validatePasswordMatch() {
	var newPassword = $('#newPassword').val();
	var confirmNewPassword = $('#confirmNewPassword').val();

	if (newPassword !== confirmNewPassword) {
		$('#passwordError').text("Passwords do not match !!");
		return false; // Prevent form submission
	} else {
		$('#passwordError').text(""); // Clear error message
		return true; // Allow form submission
	}
}


// Validate password match on input event for both fields
$('#newPassword, #confirmNewPassword').on('input', function () {
	validatePasswordMatch();
});

// Attach validatePasswordMatch function to form submission
$('form').submit(function () {
	return validatePasswordMatch();
});


