function remove_error(input_id) {
	$('#' + input_id).removeClass('error');
}

// Add 1 before USA phone number 
$("#contact_number").keyup(function () {
	var firstLetter = $('#contact_number').val().charAt(0); //alert(firstLetter);
	var secondLetter = $('#contact_number').val().charAt(1); //alert(firstLetter);
	if (firstLetter == '(') {
		if (firstLetter == '1' || secondLetter == '1') {
			$('#contact_number').inputmask("9(999) 999-9999");
		} else {
			$('#contact_number').inputmask("(999) 999-9999");
		}
	} else {
		if (firstLetter == '1' || secondLetter == '1') {
			$('#contact_number').inputmask("9(999) 999-9999");
		} else if (firstLetter != '1') {
			$('#contact_number').inputmask("(999) 999-9999");
		}
	}
});

// Join Network
$('#contact_btn').click(function (e) {

	var cfn_val = $('#contact_name').val();
	var csEmail = $('#contact_email').val();
	var input_val = $('#contact_number').val();

	var cfn_val = $.trim(cfn_val);
	var csEmail = $.trim(csEmail);
	var input_val = $.trim(input_val);

	var cfnLen = cfn_val.length;
	var inpVal = input_val.replace(/["'\(\- )]/g, "");
	var regex = new RegExp(/^\(\d{3}\)\s?\d{3}-\d{4}$/);

	var flag = 1;

	// For all fields
	if (cfn_val == '' && csEmail == '' && input_val == '') {
		$('#contact_name').addClass('error');
		$('#contact_email').addClass('error');
		$('#contact_number').addClass('error');
		var flag = 0;
		return false;
	}

	// For First name
	if (cfn_val != '' && cfnLen <= 2) {
		$('#contact_name').addClass('error');
		var flag = 0;
		return false;
	}

	// For Email Id
	if ($.trim(csEmail).length == 0) {
		// Please enter valid email address
		e.preventDefault();
		$('#contact_email').addClass('error');
		var flag = 0;
		return false;
	}
	if (validateEmail(csEmail)) {
		// Email is valid
		var flag = 1;
	} else {
		// Invalid Email Address
		e.preventDefault();
		$('#contact_email').addClass('error');
		var flag = 0;
		return false;
	}

	// For Phone number
	if (!input_val.match(regex)) {
		$('#contact_number').addClass('error');
		var flag = 0;
		return false;
	} else {
		var cases = ['(000) 000-0000', '(111) 111-1111', '(222) 222-2222', '(333) 333-3333', '(444) 444-4444', '(555) 555-5555', '(666) 666-6666', '(777) 777-7777', '(888) 888-8888', '(999) 999-9999'];
		if (jQuery.inArray(input_val, cases) != -1) {
			$('#number_input').addClass('error');
			var flag = 0;
			return false;
		}
	}

	// Success Form
	if (flag == 1) {
		alert("Thank You");
	}

	setTimeout(function () {
		location.reload();
	}, 2000);
});

$(document).ready(function () {

	$('.menu-icon').click(function () {
		$('.navigation').css("right", "0px");
	});

	$('.nav-close').click(function () {
		$('.navigation').css("right", "-360px");
	});

	var minSlides;
	var maxSlides;

	function windowWidth() {
		if ($(window).width() < 420) {
			minSlides = 1;
			maxSlides = 1;
		} else if ($(window).width() < 769) {
			minSlides = 2;
			maxSlides = 2;
		} else if ($(window).width() < 1300) {
			minSlides = 3;
			maxSlides = 3;
		} else {
			minSlides = 4;
			maxSlides = 4;
		}
	}

	windowWidth();
	$('.blogs-listing-bxslider').bxSlider({
		startSlide: 0,
		moveSlides: 1,
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 30,
		infiniteLoop: true,
		slideWidth: 400,
		speed: 800,
		minSlides: minSlides,
		maxSlides: maxSlides,
	});

	$(window).on("orientationchange resize", function () {
		windowWidth();
	})

});


// Email validation
function validateEmail(sEmail) {
	var sEmail = $.trim(sEmail);
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if (filter.test(sEmail)) {
		return true;
	} else {
		return false;
	}
}
// End
