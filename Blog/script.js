$(document).ready(function() {
	$("#accordion #control").collapse('show');
	$(".open-btn").click(function() {
		$("#accordion .collapse").collapse('show');
	})
	$(".close-btn").click(function() {
		$("#accordion .collapse").not("#control").collapse('hide');
	})
});

function target_popup(form) {
    window.open('', 'formpopup', 'width=600,height=800,resizeable,scrollbars');
    form.target = 'formpopup';
}