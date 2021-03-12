
$( document ).ready(function() {

    console.log("script connecté");

    $( "#click" ).click(function() {
        var date1 = $('input[name=start_date]').val();
        var date2 = $('input[name=end_date]').val();
        var Diff_temps = date2.getTime() - date1.getTime(); 
        var Diff_jours = Diff_temps / (1000 * 3600 * 24); 
        alert(Diff_jours);
      });


});