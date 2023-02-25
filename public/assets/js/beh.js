$(document).ready(function () {

    var rowlimitstr = 4


    //start
    //D
    var inputCountDHH = $("form input").filter(".inputDHH").length;
    console.log("COUNT INPUT HIGHest  D " + inputCountDHH);

    if (inputCountDHH > rowlimitstr) {
        $("#row-DHH").attr("disabled", true);
    }

    var inputCountDH = $("form input").filter(".inputDH").length;
    console.log("COUNT INPUT HIGH D " + inputCountDH);

    if (inputCountDH > rowlimitstr) {
        $("#row-DH").attr("disabled", true);
    }

    var inputCountDL = $("form input").filter(".inputDL").length;
    console.log("COUNT INPUT LOW D " + inputCountDL);

    if (inputCountDL > rowlimitstr) {
        $("#row-DL").attr("disabled", true);
    }

    //I

    var inputCountIHH = $("form input").filter(".inputIHH").length;
    console.log("COUNT INPUT HIGHest  I " + inputCountIHH);


    var inputCountIH = $("form input").filter(".inputIH").length;
    console.log("COUNT INPUT HIGH I " + inputCountIH);

    if (inputCountIH > rowlimitstr) {
        $("#row-IH").attr("disabled", true);
    }

    var inputCountIL = $("form input").filter(".inputIL").length;
    console.log("COUNT INPUT LOW I " + inputCountIL);

    if (inputCountIL > rowlimitstr) {
        $("#row-IL").attr("disabled", true);
    }

    //S

    var inputCountSHH = $("form input").filter(".inputSHH").length;
    console.log("COUNT INPUT HIGHest  S " + inputCountSHH);


    var inputCountSH = $("form input").filter(".inputSH").length;
    console.log("COUNT INPUT HIGH S" + inputCountSH);

    if (inputCountSH > rowlimitstr) {
        $("#row-SH").attr("disabled", true);
    }

    var inputCountSL = $("form input").filter(".inputSL").length;
    console.log("COUNT INPUT LOW S " + inputCountSL);

    if (inputCountSL > rowlimitstr) {
        $("#row-SL").attr("disabled", true);
    }

    //C

    var inputCountCHH = $("form input").filter(".inputCHH").length;
    console.log("COUNT INPUT HIGHest  D " + inputCountCHH);

    var inputCountCH = $("form input").filter(".inputCH").length;
    console.log("COUNT INPUT HIGH C" + inputCountCH);

    if (inputCountCH > rowlimitstr) {
        $("#row-CH").attr("disabled", true);
    }

    var inputCountCL = $("form input").filter(".inputCL").length;
    console.log("COUNT INPUT LOW C " + inputCountCL);

    if (inputCountCL > rowlimitstr) {
        $("#row-CL").attr("disabled", true);
    }

    //end
    var inputCount2 = $("form input").filter(".inputDI").length;
    console.log("COUNT INPUT" + inputCount2);

    if (inputCount2 > rowlimitstr) {
        $("#row-I").attr("disabled", true);
    }

    var inputCount3 = $("form input").filter(".inputDS").length;
    console.log("COUNT INPUT 3 = " + inputCount3);

    if (inputCount3 > rowlimitstr) {

        $("#row-S").attr("disabled", true);
    }

    var inputCount4 = $("form input").filter(".inputDC").length;
    console.log("COUNT INPUT CCC" + inputCount4);

    if (inputCount4 > rowlimitstr) {

        $("#row-C").attr("disabled", true);
    }


    $("#row-DHH").click(function () {


        $("#inputconDHH").append("<p id='diDHH" + inputCountDHH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputDH'  id='inDHH" + inputCountDHH + "' placeholder='soalan' name='valueHH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountDHH++;
        console.log("COUNT INPUT" + inputCountDHH);
        if (inputCountDHH > rowlimitstr) {
            $("#row-DHH").attr("disabled", true);
        }
        focusCount(inputCountDHH, 'DHH');
    });

    $("#row-DH").click(function () {


        $("#inputconDH").append("<p id='diDH" + inputCountDH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputDH'  id='inDH" + inputCountDH + "' placeholder='soalan' name='valueH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountDH++;
        console.log("COUNT INPUT" + inputCountDH);
        if (inputCountDH > rowlimitstr) {
            $("#row-DH").attr("disabled", true);
        }
        focusCount(inputCountDH, 'DH');
    });

    $("#row-DL").click(function () {


        $("#inputconDL").append("<p id='diDL" + inputCountDL + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputDL'  id='inDL" + inputCountDL + "' placeholder='soalan' name='valueL[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountDL++;
        console.log("COUNT INPUT" + inputCountDL);
        if (inputCountDL > rowlimitstr) {
            $("#row-DL").attr("disabled", true);
        }
        focusCount(inputCountDL, 'DL');
    });

    $("#row-IHH").click(function () {


        $("#inputconIHH").append("<p id='diIHH" + inputCountIHH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputDH'  id='inIHH" + inputCountIHH + "' placeholder='soalan' name='valueHH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountIHH++;
        console.log("COUNT INPUT" + inputCountIHH);
        if (inputCountIHH > rowlimitstr) {
            $("#row-IHH").attr("disabled", true);
        }
        focusCount(inputCountIHH, 'IHH');
    });

    $("#row-IH").click(function () {


        $("#inputconIH").append("<p id='diIH" + inputCountIH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputIH'  id='inIH" + inputCountIH + "' placeholder='soalan' name='valueH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountIH++;
        console.log("COUNT INPUT" + inputCountIH);
        if (inputCountIH > rowlimitstr) {
            $("#row-IH").attr("disabled", true);
        }
        focusCount(inputCountIH, 'IH');
    });

    $("#row-IL").click(function () {


        $("#inputconIL").append("<p id='diIL" + inputCountIL + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputIL'  id='inIL" + inputCountIL + "' placeholder='soalan' name='valueL[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountIL++;
        console.log("COUNT INPUT" + inputCountIL);
        if (inputCountIL > rowlimitstr) {
            $("#row-IL").attr("disabled", true);
        }
        focusCount(inputCountIL, 'IL');
    });


    $("#row-SHH").click(function () {


        $("#inputconSHH").append("<p id='diSHH" + inputCountSHH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputDH'  id='inSHH" + inputCountSHH + "' placeholder='soalan' name='valueHH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountSHH++;
        console.log("COUNT INPUT" + inputCountSHH);
        if (inputCountSHH > rowlimitstr) {
            $("#row-SHH").attr("disabled", true);
        }
        focusCount(inputCountSHH, 'SHH');
    });


    $("#row-SH").click(function () {


        $("#inputconSH").append("<p id='diSH" + inputCountSH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputSH'  id='inSH" + inputCountSH + "' placeholder='soalan' name='valueH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountSH++;
        console.log("COUNT INPUT" + inputCountSH);
        if (inputCountSH > rowlimitstr) {
            $("#row-SH").attr("disabled", true);
        }
        focusCount(inputCountSH, 'SH');
    });

    $("#row-SL").click(function () {


        $("#inputconSL").append("<p id='diSL" + inputCountSL + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputSL'  id='inSL" + inputCountSL + "' placeholder='soalan' name='valueL[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountSL++;
        console.log("COUNT INPUT" + inputCountSL);
        if (inputCountSL > rowlimitstr) {
            $("#row-SL").attr("disabled", true);
        }
        focusCount(inputCountSL, 'SL');
    });

    $("#row-CHH").click(function () {


        $("#inputconCHH").append("<p id='diCHH" + inputCountCHH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputDH'  id='inCHH" + inputCountCHH + "' placeholder='soalan' name='valueHH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountCHH++;
        console.log("COUNT INPUT" + inputCountCHH);
        if (inputCountCHH > rowlimitstr) {
            $("#row-CHH").attr("disabled", true);
        }
        focusCount(inputCountCHH, 'CHH');
    });

    $("#row-CH").click(function () {


        $("#inputconCH").append("<p id='diCH" + inputCountCH + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputCH'  id='inCH" + inputCountCH + "' placeholder='soalan' name='valueH[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountCH++;
        console.log("COUNT INPUT" + inputCountCH);
        if (inputCountCH > rowlimitstr) {
            $("#row-SH").attr("disabled", true);
        }
        focusCount(inputCountCH, 'CH');
    });

    $("#row-CL").click(function () {


        $("#inputconCL").append("<p id='diCL" + inputCountCL + "'>(0/100)</p><div class='mb-3'><input type='text' class='form-control inputSL'  id='inSL" + inputCountCL + "' placeholder='soalan' name='valueL[]' maxlength='100'></div>");

        console.log("CLICL BUTTON");
        inputCountCL++;
        console.log("COUNT INPUT" + inputCountCL);
        if (inputCountCL > rowlimitstr) {
            $("#row-CL").attr("disabled", true);
        }
        focusCount(inputCountCL, 'CL');
    });





    $("#row-I").click(function () {

        $("#inputconI").append("<p id='diI" + inputCount2 + "'>(0/80)</p><div class='mb-3'><input maxlength='80' type='text'  class='form-control inputDI' id='inputIDI" + inputCount2 + "' placeholder='soalan' name='value[]'></div>");
        console.log("CLICL BUTTON 2222");
        inputCount2++;
        console.log("COUNT INPUT" + inputCount2);
        if (inputCount2 > rowlimitstr) {
            $("#row-I").attr("disabled", true);
        }
        focusCount(inputCount2, 'I');
    });

    $("#row-S").click(function () {

        $("#inputconS").append("<p id='diS" + inputCount3 + "'>(0/80)</p><div class='mb-3'><input maxlength='80' type='text'  class='form-control inputDS' id='inputIDS" + inputCount3 + "' placeholder='soalan' name='value[]'></div>");
        console.log("CLICL BUTTON 33333");
        inputCount3++;
        console.log("COUNT INPUT 3 =" + inputCount3);
        if (inputCount3 > rowlimitstr) {
            $("#row-S").attr("disabled", true);
        }
        focusCount(inputCount3, 'S');
    });

    $("#row-C").click(function () {

        $("#inputconC").append("<p id='diC" + inputCount4 + "'>(0/80)</p><div class='mb-3'><input maxlength='80' type='text'  class='form-control inputDC' id='inputIDC" + inputCount4 + "' placeholder='soalan' name='value[]'></div>");
        console.log("CLICL BUTTON 33333");
        inputCount4++;
        console.log("COUNT INPUT" + inputCount4);
        if (inputCount4 > rowlimitstr) {
            $("#row-C").attr("disabled", true);
        }
        focusCount(inputCount4, 'C');
    });


    // var arr1 = [];
    // arr1[0] = $("#inputIDD0").val().length;
    // // console.log("length" + input1Length);
    // $("#did0").text("(" + arr1[0] + "/110)");

    // arr1[1] = $("#inputIDD1").val().length;
    // // console.log("length" + input1Length);
    // $("#did1").text("(" + arr1[1] + "/110)");


    // $(".form-control").on("input", function () {
    //     arr1[0] = $("#inputIDD0").val().length;

    //     $("#did0").text("(" + arr1[0] + "/110)");


    // });
    // $(".form-control").on("input", function () {
    //     arr1[1] = $("#inputIDD1").val().length;

    //     $("#did1").text("(" + arr1[1] + "/110)");


    // });
    var arr1 = [];
    var arr2 = [];

    wordCount(inputCountDHH, 'DHH');
    focusCount(inputCountDHH, 'DHH');

    wordCount(inputCountDH, 'DH');
    focusCount(inputCountDH, 'DH');
    wordCount(inputCountDL, 'DL');
    focusCount(inputCountDL, 'DL');

    wordCount(inputCountIHH, 'IHH');
    focusCount(inputCountIHH, 'IHH');

    wordCount(inputCountIH, 'IH');
    focusCount(inputCountIH, 'IH');
    wordCount(inputCountIL, 'IL');
    focusCount(inputCountIL, 'IL');


    wordCount(inputCountSHH, 'SHH');
    focusCount(inputCountSHH, 'SHH');
    wordCount(inputCountSH, 'SH');
    focusCount(inputCountSH, 'SH');
    wordCount(inputCountSL, 'SL');
    focusCount(inputCountSL, 'SL');

    wordCount(inputCountCHH, 'CHH');
    focusCount(inputCountCHH, 'CHH');
    wordCount(inputCountCH, 'CH');
    focusCount(inputCountCH, 'CH');
    wordCount(inputCountCL, 'CL');
    focusCount(inputCountCL, 'CL');

    // wordCount(inputCount2, 'I');
    // focusCount(inputCount2, 'I');
    // wordCount(inputCount3, 'S');
    // focusCount(inputCount3, 'S');
    // wordCount(inputCount4, 'C');
    // focusCount(inputCount4, 'C');


    function wordCount(lengthval, style) {
        for (var i = 0; i < lengthval; i++) {

            arr1[i] = $("#in" + style + i).val().length;
            console.log(arr1[i] + style);
            // console.log("length" + input1Length);
            $("#di" + style + i).text("(" + arr1[i] + "/100)");


        }

    }
    function focusCount(lengthval, style) {
        $(".form-control").on("input", function () {
            for (var i = 0; i < lengthval; i++) {

                arr2[i] = $("#in" + style + i).val().length;
                console.log(arr2[i] + style);
                $("#di" + style + i).text("(" + arr2[i] + "/100)");
            }



        });
    }













});