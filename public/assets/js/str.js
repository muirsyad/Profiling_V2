$(document).ready(function () {



    var inputCount1 = $("form input").filter("#inputIDD").length;
    console.log("COUNT INPUT" + inputCount1);

    if (inputCount1 > 4) {
        $("#row-D").attr("disabled", true);
    }

    var inputCount2 = $("form input").filter("#inputIDI").length;
    console.log("COUNT INPUT" + inputCount2);

    if (inputCount2 > 4) {
        $("#row-I").attr("disabled", true);
    }

    var inputCount3 = $("form input").filter("#inputIDS").length;
    console.log("COUNT INPUT 3 = " + inputCount3);

    if (inputCount3 > 4) {

        $("#row-S").attr("disabled", true);
    }

    var inputCount4 = $("form input").filter("#inputIDC").length;
    console.log("COUNT INPUT CCC" + inputCount4);

    if (inputCount4 > 4) {

        $("#row-C").attr("disabled", true);
    }


    $("#row-D").click(function () {

        $("#inputconD").append("<div class='mb-3'><input maxlength='110' class='form-control' id='inputIDD' name='value[]' placeholder='remarks' rows='2'></input></div>");
        console.log("CLICL BUTTON");
        inputCount1++;
        console.log("COUNT INPUT" + inputCount1);
        if (inputCount1 > 4) {
            $("#row-D").attr("disabled", true);
        }
    });

    $("#row-I").click(function () {

        $("#inputconI").append("<div class='mb-3'><input maxlength='110' class='form-control' id='inputIDI' name='value[]' placeholder='remarks' rows='2'></input></div>");
        console.log("CLICL BUTTON 2222");
        inputCount2++;
        console.log("COUNT INPUT" + inputCount2);
        if (inputCount2 > 4) {
            $("#row-I").attr("disabled", true);
        }
    });

    $("#row-S").click(function () {

        $("#inputconS").append("<div class='mb-3'><input maxlength='110' class='form-control' id='inputIDS' name='value[]' placeholder='remarks' rows='2'></input></div>");
        console.log("CLICL BUTTON 33333");
        inputCount3++;
        console.log("COUNT INPUT 3 =" + inputCount3);
        if (inputCount3 > 4) {
            $("#row-S").attr("disabled", true);
        }
    });

    $("#row-C").click(function () {

        $("#inputconC").append("<div class='mb-3'><input maxlength='110' class='form-control' id='inputIDC' name='value[]' placeholder='remarks' rows='2'></input></div>");
        console.log("CLICL BUTTON 33333");
        inputCount4++;
        console.log("COUNT INPUT" + inputCount4);
        if (inputCount4 > 4) {
            $("#row-C").attr("disabled", true);
        }
    });



    $(".form-control").on("input", function () {
        input1Length = $("#inputIDD1").val().length;

        $("#did").text("(" + input1Length + "/110)");


    });

    wordCount

    function wordCount(input1Length) {
        input1Length = $("#inputIDD1").val().length;
        console.log("length" + input1Length);
        $("#did").text("(" + input1Length + "/110)");
    }











});