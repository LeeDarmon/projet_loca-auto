$(document).ready(function () {
	console.log("script connecté");

	$("#click").click(function () {
		var date1 = $("input[name=start_date]").val();
		var date2 = $("input[name=end_date]").val();
		var Diff_temps = date2.getTime() - date1.getTime();
		var Diff_jours = Diff_temps / (1000 * 3600 * 24);
		alert(Diff_jours);
	});
});

// Button Scroll to Top
mybutton = document.getElementById("myBtn");
window.onscroll = function () {
	scrollFunction();
};

function scrollFunction() {
	if (
		document.body.scrollTop > 400 ||
		document.documentElement.scrollTop > 400
	) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}

function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}
