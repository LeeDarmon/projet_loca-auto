
$( document ).ready(function() {

    var today = new Date().toISOString().split('T')[0];
    console.log("script connecté");
    console.log(today);


    $( "#end_date" ).change(function() {
        var date1 = new Date($('#start_date').val());
        var date2 = new Date($('#end_date').val());
        var Diff_temps = date2.getTime() - date1.getTime(); 
        var Diff_jours = Diff_temps / (1000 * 3600 * 24); 
        $( "#final_days" ).html(Diff_jours);

        var price = $( "#forfait" ).html();
        console.log(price);
        var final_price = price * Diff_jours;
        $( "#final_price" ).html(final_price);
        $("#cost").val(final_price);

    });




    

    


});