
$(document).ready(function() {
	/* Set starting values to 1 */
	$("#WhoAmI").val(1);
	$("#WhatIDo").val(1);
	$("#Interests").val(1);
	$("#WatchList").val(1);
	/* Flip All */
	$(".header").click(function() {
		var rotateDir = $("#WhoAmI").val();
		var rotateStr = 'rotateY(' + ($("#WhoAmI").val() * 180) + 'deg)';
		if (rotateDir == 0) {
			$(".flipcard").val(1);
		}
		else {
			$(".flipcard").val(0);
		}
		$(".flipcard").css({'-webkit-transform':rotateStr});
			
	})
	
	$("#WhoAmI").click(function() {
		var rotateDir = $("#WhoAmI").val();
		var rotateStr = 'rotateY(' + ($("#WhoAmI").val() * 180) + 'deg)';
		if (rotateDir == 1) {
			$("#WhoAmI").val(0);
		}
		else {
			$("#WhoAmI").val(1);
		}
		$("#WhoAmI").css({'-webkit-transform':rotateStr});
			
	})
	$("#WhatIDo").click(function() {
		var rotateDir = $("#WhatIDo").val();
		var rotateStr = 'rotateY(' + ($("#WhatIDo").val() * 180) + 'deg)';
		if (rotateDir == 1) {
			$("#WhatIDo").val(0);
		}
		else {
			$("#WhatIDo").val(1);
		}
		$("#WhatIDo").css({'-webkit-transform':rotateStr});
			
	})
	$("#Interests").click(function() {
		var rotateDir = $("#Interests").val();
		var rotateStr = 'rotateY(' + ($("#Interests").val() * 180) + 'deg)';
		if (rotateDir == 1) {
			$("#Interests").val(0);
		}
		else {
			$("#Interests").val(1);
		}
		$("#Interests").css({'-webkit-transform':rotateStr});
			
	})
	$("#WatchList").click(function() {
		var rotateDir = $("#WatchList").val();
		var rotateStr = 'rotateY(' + ($("#WatchList").val() * 180) + 'deg)';
		if (rotateDir == 1) {
			$("#WatchList").val(0);
		}
		else {
			$("#WatchList").val(1);
		}
		$("#WatchList").css({'-webkit-transform':rotateStr});
			
	})
	
	/* Flip JS
	$("#WhoAmI").flip( {
		axis: "y",
		reverse: false,
		trigger: "click",
		speed: 1000
	});
	$("#WhatIDo").flip( {
		axis: "y",
		reverse: false,
		trigger: "click",
		speed: 1000
	});
	$("#Interests").flip( {
		axis: "y",
		reverse: false,
		trigger: "click",
		speed: 1000
	});
	$("#WatchList").flip( {
		axis: "y",
		reverse: false,
		trigger: "click",
		speed: 1000
	});*/
	$(".back").css({'opacity':'100%'});
});


/* Try 1 (Button Themes)
function toNormal() {
	$(".btn_container").css({'background-color':'#eaeaef'});
	$(".text-container").css({'background-color':'#f9f9f9'});
	$(".btn_container, #ProfilePanel").css({'border-color':'#5a5a5b'});
}

function toSpace() {
	$(".btn_container").css({'background-color':'#d8d6ff'});
	$(".text-container").css({'background-color':'#ebeaff'});
	$(".btn_container, #ProfilePanel").css({'border-color':'#271a82'});
}

function toFestive() {
	$(".btn_container").css({'background-color':'#ffe5d6'});
	$(".text-container").css({'background-color':'#f2e9e3'});
	$(".btn_container, #ProfilePanel").css({'border-color':'#c92502'});
}

function toWater() {
	$(".btn_container").css({'background-color':'#c4e4ff'});
	$(".text-container").css({'background-color':'#e3eff9'});
	$(".btn_container, #ProfilePanel").css({'border-color':'#0679d8'});
}
*/