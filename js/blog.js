$(document).ready(function () {

	$("#blog-category-search").hover(
		function () {
			$("#blog-category-list").finish().slideDown('medium');
		},
		function () {
			$("#blog-category-list").finish().slideUp('medium');
		}
	);

	$("#blog-category-list li a").click(function () {
		$(this).addClass("selected");
		var label_name = $(this).html();
		$("#blog-selected-category-list").append("<a>" + label_name + "</a>");
		$("#blog-selected-category-list").css({
			"display": "block"
		});
	});

	$("body").on("click", "#blog-selected-category-list a", function () {
		$(this).remove();
		var list = document.getElementById("blog-selected-category-list").hasChildNodes();
		if (list == false) {
			$("#blog-selected-category-list").css({
				"display": "none"
			});
		};
	});

	// Leave a reply
	$('#blog-leave-reply-btn').click(function (e) {

		var input_val = $('#blog-leave-reply-comment').val();
		var cfn_val = $('#blog-leave-reply-name').val();
		var csEmail = $('#blog-leave-reply-email').val();


		var cfn_val = $.trim(cfn_val);
		var csEmail = $.trim(csEmail);


		var cfnLen = cfn_val.length;
		var regex = new RegExp(/^\(\d{3}\)\s?\d{3}-\d{4}$/);

		var flag = 1;

		// For all fields
		if (cfn_val == '' && csEmail == '' && input_val == '') {
			$('#blog-leave-reply-comment').addClass('error');
			$('#blog-leave-reply-name').addClass('error');
			$('#blog-leave-reply-email').addClass('error');
			var flag = 0;
			return false;
		}

		// For Comment
		if (input_val == '') {
			$('#blog-leave-reply-comment').addClass('error');
			var flag = 0;
			return false;
		}

		// For First name
		if (cfn_val != '' && cfnLen <= 2) {
			$('#blog-leave-reply-comment').addClass('error');
			var flag = 0;
			return false;
		}

		// For Email Id
		if ($.trim(csEmail).length == 0) {
			// Please enter valid email address
			e.preventDefault();
			$('#blog-leave-reply-email').addClass('error');
			var flag = 0;
			return false;
		}
		if (validateEmail(csEmail)) {
			// Email is valid
			var flag = 1;
		} else {
			// Invalid Email Address
			e.preventDefault();
			$('#blog-leave-reply-email').addClass('error');
			var flag = 0;
			return false;
		}

		// Success Form
		if (flag == 1) {
			$("#reply-submitted").fadeIn();
		}

		setTimeout(function () {
			$('#blog-leave-reply-comment').val("");
			$('#blog-leave-reply-name').val("");
			$('#blog-leave-reply-email').val("");
			$("#reply-submitted").fadeOut();
		}, 1500);
	});

	$('.comment-reply-link').click(function () {
		$('#reply-message').remove();
		$(this).parent().append(`
			<div class="reply-message-box" id="reply-message">
				<a class="close-reply-message"><img src="images/nav-close.svg" class="anim"></a>
				<textarea placeholder="Your Reply"></textarea>
				<button>Post Reply</button>
			</div>
		`);
	});

	$("body").on("click", ".close-reply-message", function () {
		$('#reply-message').remove();
	});

});
