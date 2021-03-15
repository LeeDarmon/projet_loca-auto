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

var today = new Date().toISOString().split("T")[0];
console.log("script connecté");
console.log(today);

$("#end_date").change(function () {
	var date1 = new Date($("#start_date").val());
	var date2 = new Date($("#end_date").val());
	var Diff_temps = date2.getTime() - date1.getTime();
	var Diff_jours = Diff_temps / (1000 * 3600 * 24);
	$("#final_days").html(Diff_jours);

	var price = $("#forfait").html();
	console.log(price);
	var final_price = price * Diff_jours;
	$("#final_price").html(final_price);
	$("#cost").val(final_price);
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
