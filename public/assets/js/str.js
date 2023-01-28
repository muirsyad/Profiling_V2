$(document).ready(function () {

    var rowlimitstr = 1



    var inputCount1 = $("form input").filter(".inputDD").length;
    console.log("COUNT INPUT" + inputCount1);

    if (inputCount1 > rowlimitstr) {
        $("#row-D").attr("disabled", true);
    }

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


    $("#row-D").click(function () {

        // $("#inputconD").append("<p id='diD"+inputCount1+"'>(0/30)</p><div class='mb-3'><input maxlength='110' class='form-control inputDD' id='inputIDD"+inputCount1+"' name='value[]' placeholder='soalan'></input></div>");
        $("#inputconD").append("<p id='diD"+inputCount1+"'>(0/30)</p><div class='mb-3'><input maxlength='30' type='text'  class='form-control inputDD' id='inputIDD"+inputCount1+"' placeholder='soalan' name='value[]'></div>");

        console.log("CLICL BUTTON");
        inputCount1++;
        console.log("COUNT INPUT" + inputCount1);
        if (inputCount1 > rowlimitstr) {
            $("#row-D").attr("disabled", true);
        }
        focusCount(inputCount1,'D');
    });

    

    $("#row-I").click(function () {

        $("#inputconI").append("<p id='diI"+inputCount2+"'>(0/30)</p><div class='mb-3'><input maxlength='30' type='text'  class='form-control inputDI' id='inputIDI"+inputCount2+"' placeholder='soalan' name='value[]'></div>");
        console.log("CLICL BUTTON 2222");
        inputCount2++;
        console.log("COUNT INPUT" + inputCount2);
        if (inputCount2 > rowlimitstr) {
            $("#row-I").attr("disabled", true);
        }
        focusCount(inputCount2,'I');
    });

    $("#row-S").click(function () {

        $("#inputconS").append("<p id='diS"+inputCount3+"'>(0/30)</p><div class='mb-3'><input maxlength='30' type='text'  class='form-control inputDS' id='inputIDS"+inputCount3+"' placeholder='soalan' name='value[]'></div>");
        console.log("CLICL BUTTON 33333");
        inputCount3++;
        console.log("COUNT INPUT 3 =" + inputCount3);
        if (inputCount3 > rowlimitstr) {
            $("#row-S").attr("disabled", true);
        }
        focusCount(inputCount3,'S');
    });

    $("#row-C").click(function () {

        $("#inputconC").append("<p id='diC"+inputCount4+"'>(0/30)</p><div class='mb-3'><input maxlength='30' type='text'  class='form-control inputDC' id='inputIDC"+inputCount4+"' placeholder='soalan' name='value[]'></div>");
        console.log("CLICL BUTTON 33333");
        inputCount4++;
        console.log("COUNT INPUT" + inputCount4);
        if (inputCount4 > rowlimitstr) {
            $("#row-C").attr("disabled", true);
        }
        focusCount(inputCount4,'C');
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

    wordCount(inputCount1,'D');
    focusCount(inputCount1,'D');
    wordCount(inputCount2,'I');
    focusCount(inputCount2,'I');
    wordCount(inputCount3,'S');
    focusCount(inputCount3,'S');
    wordCount(inputCount4,'C');
    focusCount(inputCount4,'C');
    var i;
    for(i = 1; i < 5; i++) {
        window['value'+i] = + i;
    }
  
    console.log("value1=" + value1);
    console.log("value2=" + value2);
    console.log("value3=" + value3);
    console.log("value4=" + value4);


    function wordCount(lengthval,style) {
        for (var i = 0; i < lengthval; i++) {
            
            arr1[i] = $("#inputID"+style + i).val().length;
            // console.log("length" + input1Length);
            $("#di"+style + i).text("(" + arr1[i] + "/30)");


        }

    }
    function focusCount(lengthval,style) {
        $(".form-control").on("input", function () {
            for (var i = 0; i < lengthval; i++) {
                
                arr2[i] = $("#inputID"+style + i).val().length;
                console.log(arr2[i]);
                $("#di"+style + i).text("(" + arr2[i] + "/30)");
            }
           


        });
    }













});