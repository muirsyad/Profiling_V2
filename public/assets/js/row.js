$(document).ready(function () {

    
    

    var dcount = [];
    const rowlength = 4;
    // function countbase(){
    //     for(var i=0; i<rowlength; i++){
    //         var 
    //     }

    // }

    var inputCount1 = $("form input").filter(".formD1").length;
    console.log("COUNT D1 =" + inputCount1);

    if (inputCount1 > 4) {
        $("#row1").attr("disabled", true);
    }

    var inputCount2 = $("form input").filter(".formD2").length;
    console.log("COUNT D2 =" + inputCount2);

    if (inputCount2 > 4) {
        $("#row2").attr("disabled", true);
    }

    var inputCount3 = $("form input").filter(".formD3").length;
    console.log("COUNT D3 = " + inputCount3);

    if (inputCount3 > 4) {
        $("#row3").attr("disabled", true);
    }

    var inputCount4 = $("form input").filter(".formD4").length;
    console.log("COUNT D4 = " + inputCount4);

    if (inputCount4 > 4) {
        $("#row3").attr("disabled", true);
    }


$("#row1").click(function () {

    $("#elementId").append("<div class='mb-3'><textarea maxlength='110' class='form-control' id='rem1inputId' name='value[]' placeholder='remarks' rows='2'></textarea></div>");
    console.log("CLICL BUTTON");
    inputCount1++;
    console.log("COUNT INPUT" + inputCount1);
    if (inputCount1 > 4) {
        $("#row1").attr("disabled", true);
    }
});

$("#row2").click(function () {

    $("#elementId2").append("<div class='mb-3'><textarea maxlength='110' class='form-control' id='rem2inputId' name='value[]' placeholder='remarks' rows='2'></textarea></div>");
    console.log("CLICL BUTTON 2222");
    inputCount2++;
    console.log("COUNT INPUT" + inputCount2);
    if (inputCount2 > 4) {
        $("#row2").attr("disabled", true);
    }
});

$("#row3").click(function () {

     $("#elementId3").append("<div class='mb-3'><textarea maxlength='110' class='form-control' id='rem2inputId' name='value[]' placeholder='remarks' rows='2'></textarea></div>");
    console.log("CLICL BUTTON 33333");
    inputCount3++;
    console.log("COUNT INPUT" + inputCount3);
    if (inputCount3 > 4) {
        $("#row3").attr("disabled", true);
    }
});










});