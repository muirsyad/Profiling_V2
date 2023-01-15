
// event.preventDefault();
var limit = 5;
$(document).ready(function () {
    // cstyle('D',limit);
    // cstyle('I',limit);
    // cstyle('S',limit);
    // cstyle('C',limit);

    // input1Length = $("#d_im1").val().length;
    // input2Length = $("#d_im2").val().length;
    // console.log("FIrst row::  " + input1Length);
    // console.log("scnd row::  " + input2Length);
    // $(".dlimit_im1").text("(" + input1Length + "/110)");
    // $(".dlimit_im2").text("(" + input2Length + "/110)");






    //   var input1Length = 0;
    //   var input2Length = 0;
    //   $(".form-control").on("input", function() {
    //     input1Length = $("#d_im1").val().length;
    //     input2Length = $("#d_im2").val().length;
    //     console.log("FIrst row::  "+input1Length);
    //     console.log("scnd row::  "+input2Length);
    //     $(".dlimit_im1").text("("+input1Length+"/110)");
    //   });








    $("#hide").click(function () {
        $("p").hide();
    });
    $("#show").click(function () {
        $("p").show();
    });
    $("#tshow").click(function () {
        $("#div1").fadeOut("slow");
    });
    $("#sh").click(function () {
        if ($("#div1").is(":hidden")) {
            $("#div1").fadeIn();
            $("#div3").fadeOut();
            $("#div3").hide();
        }

    });
    $("#sh2").click(function () {
        if ($("#div3").is(":hidden")) {
            $("#div3").fadeIn();
            $("#div1").fadeOut();
            $("#div1").hide();
        }
    });

    $("#btn-D").click(function () {
        console.log('tab D');
        if ($("#tab-D").is(":hidden")) {
            $("#tab-D").fadeIn();
            $("#tab-i").fadeOut();
            $("#tab-i").hide();
            $("#tab-S").fadeOut();
            $("#tab-S").hide();
            $("#tab-C").fadeOut();
            $("#tab-C").hide();
        }
    });
    $("#btn-i").click(function () {
        console.log("I");
        if ($("#tab-i").is(":hidden")) {
            $("#tab-i").fadeIn();
            $("#tab-D").fadeOut();
            $("#tab-D").hide();
            $("#tab-S").fadeOut();
            $("#tab-S").hide();
            $("#tab-C").fadeOut();
            $("#tab-C").hide();
        }
    });

    $("#btn-S").click(function () {
        if ($("#tab-S").is(":hidden")) {
            $("#tab-S").fadeIn();
            $("#tab-D").fadeOut();
            $("#tab-D").hide();
            $("#tab-i").fadeOut();
            $("#tab-i").hide();
            $("#tab-C").fadeOut();
            $("#tab-C").hide();
        }
    });
    $("#btn-C").click(function () {
        if ($("#tab-C").is(":hidden")) {
            $("#tab-C").fadeIn();
            $("#tab-D").fadeOut();
            $("#tab-D").hide();
            $("#tab-S").fadeOut();
            $("#tab-S").hide();
            $("#tab-i").fadeOut();
            $("#tab-i").hide();
        }
    });

    $("#btn-motivate").click(function () {
        if ($("#tab-motivate").is(":hidden")) {
            console.log('press motivate');
            $("#tab-motivate").fadeIn();
            $("#tab-best").fadeOut();
            $("#tab-best").hide();
            $("#tab-demotivate").fadeOut();
            $("#tab-demotivate").hide();
            $("#tab-worst").fadeOut();
            $("#tab-worst").hide();
        }

    });

    $("#btn-best").click(function () {
        if ($("#tab-best").is(":hidden")) {
            console.log('press best');
            $("#tab-best").fadeIn();
            $("#tab-motivate").fadeOut();
            $("#tab-motivate").hide();
            $("#tab-demotivate").fadeOut();
            $("#tab-demotivate").hide();
            $("#tab-worst").fadeOut();
            $("#tab-worst").hide();

        }

    });

    $("#btn-demotivate").click(function () {
        if ($("#tab-demotivate").is(":hidden")) {
            $("#tab-demotivate").fadeIn();
            $("#tab-motivate").fadeOut();
            $("#tab-motivate").hide();
            $("#tab-best").fadeOut();
            $("#tab-best").hide();
            $("#tab-worst").fadeOut();
            $("#tab-worst").hide();
        }
    });

    $("#btn-worst").click(function () {
        if ($("#tab-worst").is(":hidden")) {
            $("#tab-worst").fadeIn();
            $("#tab-motivate").fadeOut();
            $("#tab-motivate").hide();
            $("#tab-demotivate").fadeOut();
            $("#tab-demotivate").hide();
            $("#tab-best").fadeOut();
            $("#tab-best").hide();
        }
    });

    $("#btn-motivate1").click(function () {
        if ($("#tab-motivate1").is(":hidden")) {
            console.log('press motivate');
            $("#tab-motivate1").fadeIn();
            $("#tab-best1").fadeOut();
            $("#tab-best1").hide();
            $("#tab-demotivate1").fadeOut();
            $("#tab-demotivate1").hide();
            $("#tab-worst1").fadeOut();
            $("#tab-worst1").hide();
        }
    });

    $("#btn-best1").click(function () {
        if ($("#tab-best1").is(":hidden")) {
            console.log('press best1');
            $("#tab-best1").fadeIn();
            $("#tab-motivate1").fadeOut();
            $("#tab-motivate1").hide();
            $("#tab-demotivate1").fadeOut();
            $("#tab-demotivate1").hide();
            $("#tab-worst1").fadeOut();
            $("#tab-worst1").hide();
        }
    });

    $("#btn-demotivate1").click(function () {
        if ($("#tab-demotivate1").is(":hidden")) {
            $("#tab-demotivate1").fadeIn();
            $("#tab-motivate1").fadeOut();
            $("#tab-motivate1").hide();
            $("#tab-best1").fadeOut();
            $("#tab-best1").hide();
            $("#tab-worst1").fadeOut();
            $("#tab-worst1").hide();
        }
    });

    $("#btn-worst1").click(function () {
        if ($("#tab-worst1").is(":hidden")) {
            $("#tab-worst1").fadeIn();
            $("#tab-motivate1").fadeOut();
            $("#tab-motivate1").hide();
            $("#tab-demotivate1").fadeOut();
            $("#tab-demotivate1").hide();
            $("#tab-best1").fadeOut();
            $("#tab-best1").hide();
        }
    });
    $("#btn-motivate2").click(function () {
        if ($("#tab-motivate2").is(":hidden")) {
            console.log('press motivate');
            $("#tab-motivate2").fadeIn();
            $("#tab-best2").fadeOut();
            $("#tab-best2").hide();
            $("#tab-demotivate2").fadeOut();
            $("#tab-demotivate2").hide();
            $("#tab-worst2").fadeOut();
            $("#tab-worst2").hide();
        }
    });

    $("#btn-best2").click(function () {
        if ($("#tab-best2").is(":hidden")) {
            console.log('press best1');
            $("#tab-best2").fadeIn();
            $("#tab-motivate2").fadeOut();
            $("#tab-motivate2").hide();
            $("#tab-demotivate2").fadeOut();
            $("#tab-demotivate2").hide();
            $("#tab-worst2").fadeOut();
            $("#tab-worst2").hide();
        }
    });

    $("#btn-demotivate2").click(function () {
        if ($("#tab-demotivate2").is(":hidden")) {
            $("#tab-demotivate2").fadeIn();
            $("#tab-motivate2").fadeOut();
            $("#tab-motivate2").hide();
            $("#tab-best2").fadeOut();
            $("#tab-best2").hide();
            $("#tab-worst2").fadeOut();
            $("#tab-worst2").hide();
        }
    });

    $("#btn-worst2").click(function () {
        if ($("#tab-worst2").is(":hidden")) {
            $("#tab-worst2").fadeIn();
            $("#tab-motivate2").fadeOut();
            $("#tab-motivate2").hide();
            $("#tab-demotivate2").fadeOut();
            $("#tab-demotivate2").hide();
            $("#tab-best2").fadeOut();
            $("#tab-best2").hide();
        }
    });

    $("#btn-motivate3").click(function () {
        if ($("#tab-motivate3").is(":hidden")) {
            console.log('press motivate');
            $("#tab-motivate3").fadeIn();
            $("#tab-best3").fadeOut();
            $("#tab-best3").hide();
            $("#tab-demotivate3").fadeOut();
            $("#tab-demotivate3").hide();
            $("#tab-worst3").fadeOut();
            $("#tab-worst3").hide();
        }
    });

    $("#btn-best3").click(function () {
        if ($("#tab-best3").is(":hidden")) {
            console.log('press best1');
            $("#tab-best3").fadeIn();
            $("#tab-motivate3").fadeOut();
            $("#tab-motivate3").hide();
            $("#tab-demotivate3").fadeOut();
            $("#tab-demotivate3").hide();
            $("#tab-worst3").fadeOut();
            $("#tab-worst3").hide();
        }
    });

    $("#btn-demotivate3").click(function () {
        if ($("#tab-demotivate3").is(":hidden")) {
            $("#tab-demotivate3").fadeIn();
            $("#tab-motivate3").fadeOut();
            $("#tab-motivate3").hide();
            $("#tab-best3").fadeOut();
            $("#tab-best3").hide();
            $("#tab-worst3").fadeOut();
            $("#tab-worst3").hide();
        }
    });

    $("#btn-worst3").click(function () {
        if ($("#tab-worst3").is(":hidden")) {
            $("#tab-worst3").fadeIn();
            $("#tab-motivate3").fadeOut();
            $("#tab-motivate3").hide();
            $("#tab-demotivate3").fadeOut();
            $("#tab-demotivate3").hide();
            $("#tab-best3").fadeOut();
            $("#tab-best3").hide();
        }
    });

    // Test new query
    $(document).ready(function () {
        $("#hidep").click(function () {
            $("p").hide();
        });
        $("#showp").click(function () {
            $("p").show();
        });
    });




    // $('div.count>input[type=textbox]').focus(function () {

    //     focusCount = $(this).val().length;
    //     count = 0; $('div.count>input[type=textbox]').each(function () {
    //         count += $(this).val().length;
    //     });
    //     count -= focusCount;
    // });
    // $('div.count>input[type=textbox]').keyup(function () {
    //     focusCount = $(this).val().length;
    //     $('#charNum').text(500 - (count + focusCount));

    // });








    // $('input[type=textbox]').focus(function () {

    //     focusCount = $(this).val().length;
    //     count = 0; $('input[type=textbox]').each(function () {
    //         count += $(this).val().length;
    //     });
    //     count -= focusCount;
    // });
    // $('input[type=textbox]').keyup(function () {
    //     focusCount = $(this).val().length;
    //     $('#charNum').text(500 - (count + focusCount));

    // });
    //try new dunction

    jQuery.fn.extend({
        c_words: function (name) {
            console.log('newfunction' + name);
        }
    })
    $('#c1').c_words('baru');







    // for (let i = 0; i < 5; i++) {
    //     $('#c1'+i).on('keyup', function () {

    //         $('#limit_count'+i).html("(" + $(this).val().length + " / 100)");

    //         if ($(this).val().length > 100) {

    //             $(this).val($(this).val().substring(0, 100));

    //             $('#limit_count'+i).html("(100 / 100)");

    //         }

    //     });

    //     $('#c2'+i).on('keyup', function () {

    //         $('#limit_count2'+i).html("(" + $(this).val().length + " / 100)");

    //         if ($(this).val().length > 100) {

    //             $(this).val($(this).val().substring(0, 100));

    //             $('#limit_count2'+i).html("(100 / 100)");

    //         }

    //     });
    //     $('#c3'+i).on('keyup', function () {

    //         $('#limit_count3'+i).html("(" + $(this).val().length + " / 100)");

    //         if ($(this).val().length > 100) {

    //             $(this).val($(this).val().substring(0, 100));

    //             $('#limit_count3'+i).html("(100 / 100)");

    //         }

    //     });
    //     $('#c4'+i).on('keyup', function () {

    //         $('#limit_count4'+i).html("(" + $(this).val().length + " / 100)");

    //         if ($(this).val().length > 100) {

    //             $(this).val($(this).val().substring(0, 100));

    //             $('#limit_count4'+i).html("(100 / 100)");

    //         }

    //     });
    // }
    //first input
    // $('#ci1').on('keyup', function () {

    //     $('#limit_count1').html("(" + $(this).val().length + " / 100)");

    //     if ($(this).val().length > 100) {

    //         $(this).val($(this).val().substring(0, 100));

    //         $('#limit_count1').html("(100 / 100)");

    //     }

    // });
    // //secod input
    // $('#ci2').on('keyup', function () {

    //     $('#limit_count2').html("(" + $(this).val().length + " / 100)");

    //     if ($(this).val().length > 100) {

    //         $(this).val($(this).val().substring(0, 100));

    //         $('#limit_count2').html("(100 / 100)");

    //     }

    // });
    // //third
    // $('#ci3').on('keyup', function () {

    //     $('#limit_count3').html("(" + $(this).val().length + " / 100)");

    //     if ($(this).val().length > 100) {

    //         $(this).val($(this).val().substring(0, 100));

    //         $('#limit_count3').html("(100 / 100)");

    //     }

    // });
    // $('#ci4').on('keyup', function () {

    //     $('#limit_count4').html("(" + $(this).val().length + " / 100)");

    //     if ($(this).val().length > 100) {

    //         $(this).val($(this).val().substring(0, 100));

    //         $('#limit_count4').html("(100 / 100)");

    //     }

    // });

    // for(var i = 1; i<=4; i++){
    //     word_count(1,'c');
    // }
    // word_count(1,'c');
    // word_count(2,'c');
    // word_count(3,'c');
    // word_count(4,'c');
   



    // word_limit('c',1);
    // word_limit('c',2);
    // word_limit('c',3);
    // word_limit('c',4);

    

    baseWordCounter("d");
    baseWordCounter("i");
    baseWordCounter("s");
    baseWordCounter("c");

    function baseWordCounter(style) {

        wordCounter(style, "im");
        inputCount(style, "im");
        wordCounter(style, "bet");
        inputCount(style, "bet");
        wordCounter(style, "avo");
        inputCount(style, "avo");
        wordCounter(style, "env");
        inputCount(style, "env");
        console.log(style);
    }


    function wordCounter(style, att) {
        input1Length = $("#" + style + "_" + att + "1").val().length;
        input2Length = $("#" + style + "_" + att + "2").val().length;
        input3Length = $("#" + style + "_" + att + "3").val().length;
        input4Length = $("#" + style + "_" + att + "4").val().length;
        input5Length = $("#" + style + "_" + att + "5").val().length;

        $("." + style + "limit_" + att + "1").text("(" + input1Length + "/110)");
        $("." + style + "limit_" + att + "2").text("(" + input2Length + "/110)");
        $("." + style + "limit_" + att + "3").text("(" + input3Length + "/110)");
        $("." + style + "limit_" + att + "4").text("(" + input4Length + "/110)");
        $("." + style + "limit_" + att + "5").text("(" + input5Length + "/110)");

        console.log(style+"in");

    }
    function inputCount(style, att) {
        $(".form-control").on("input", function () {
            input1Length = $("#" + style + "_" + att + "1").val().length;
            input2Length = $("#" + style + "_" + att + "2").val().length;
            input3Length = $("#" + style + "_" + att + "3").val().length;
            input4Length = $("#" + style + "_" + att + "4").val().length;
            input5Length = $("#" + style + "_" + att + "5").val().length;

            $("." + style + "limit_" + att + "1").text("(" + input1Length + "/110)");
            $("." + style + "limit_" + att + "2").text("(" + input2Length + "/110)");
            $("." + style + "limit_" + att + "3").text("(" + input3Length + "/110)");
            $("." + style + "limit_" + att + "4").text("(" + input4Length + "/110)");
            $("." + style + "limit_" + att + "5").text("(" + input5Length + "/110)");
            console.log(style+"in2");

        });

    }





});

function cstyle(style, limit) {
    var str = 'count' + style;
    var str2 = 'btn-row' + style;
    var count = document.getElementById(str).value;
    console.log(typeof (count));
    count = parseInt(count);

    if (count > limit) {
        document.getElementById(str2).disabled = true;
    }


}
var count = 1
console.log(count);

function addrow1(type, style) {
    switch (type) {
        case 'High':
            //code

            stylecaseH(style);
            break;
        case 'Low':
            //code
            stylecaseL(style);
            break;
    }
}
function stylecaseH(style) {

    switch (style) {
        case 'D':
            //code

            var str = 'ch' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'H');
                if (count = 4) {
                    document.getElementById("btnH-rowD").disabled = true;
                }

            }
            else {

                debugger
            }

            break;
        case 'I':
            //code
            var str = 'ch' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'H');
                if (count = 4) {
                    document.getElementById("btnH-rowI").disabled = true;
                }
            }
            else {

                debugger
            }
            break;
        case 'S':
            //code
            var str = 'ch' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'H');
                if (count = 4) {
                    document.getElementById("btnH-rowS").disabled = true;
                }
            }
            else {

                debugger
            }
            break;
        case 'C':
            //code
            var str = 'ch' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'H');
                if (count = 4) {
                    document.getElementById("btnH-rowC").disabled = true;
                }
            }
            else {

                debugger
            }
            break;
    }

}
function stylecaseL(style) {
    switch (style) {
        case 'D':
            //code

            var str = 'cl' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'L');
                if (count = 4) {
                    document.getElementById("btnL-rowD").disabled = true;
                }
            }
            else {

                debugger
            }

            break;
        case 'I':
            //code
            var str = 'cl' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'L');
                if (count = 4) {
                    document.getElementById("btnL-rowI").disabled = true;
                }
            }
            else {

                debugger
            }
            break;
        case 'S':
            //code
            var str = 'cl' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'L');
                if (count = 4) {
                    document.getElementById("btnL-rowS").disabled = true;
                }
            }
            else {

                debugger
            }
            break;
        case 'C':
            //code
            var str = 'cl' + style;
            var count = document.getElementById(str).value;
            var count = parseInt(count);

            if (count <= 4) {

                incrow(count, style, 'L');
                if (count = 4) {
                    document.getElementById("btnL-rowC").disabled = true;
                }
            }
            else {

                debugger
            }
            break;
    }
}
function incrow(count, style, type) {

    num = count;
    qury = '.example' + style + type;
    style = stylevar(style);
    nv = 'value' + type + '[]';

    const newrow = document.querySelector(qury);
    //create element
    console.log(qury);
    console.log(newrow);
    const newdiv = document.createElement('div');
    newdiv.className = 'mb-3';
    newdiv.id = nv;
    const newinput = document.createElement('input');
    newinput.className = 'form-control';
    newinput.name = nv;

    newrow.appendChild(newdiv);
    newdiv.appendChild(newinput);

    //debugger


}
function decrow(count, style) {



}
function addrow() {

    count += 1;
    console.log(count);

    const newrow = document.querySelector('.example');
    //create element
    const newdiv = document.createElement('div');
    newdiv.className = 'mb-3';
    const newlabel = document.createElement('label');
    newlabel.className = 'form-label'
    newlabel.innerText = 'Email Address';
    const newinput = document.createElement('input');
    newinput.className = 'form-control';
    newinput.name = "email" + count;

    newrow.appendChild(newdiv);
    newdiv.appendChild(newlabel);
    newdiv.appendChild(newinput);

}

function addro(type, style) {

    if (type == 'High') {
        console.log(type + "in");
        cH += 1;
        num = cH;

        qury = '.example' + style;
        style = stylevar(style);
        nv = style + type + cH;

        console.log(nv + qury);

    }
    else {
        if (cL === 4) {
            document.getElementById("btn-dL").disabled = true;
            cL += 1;
            num = cL;
            qury = '.example2' + style;
            style = stylevar(style);
            nv = style + type + cL;
            console.log(nv);
        } else {
            cL += 1;
            num = cL;
            qury = '.example2' + style;
            style = stylevar(style);
            nv = style + type + cL;
            console.log(nv);
        }

    }


    const newrow = document.querySelector(qury);
    //create element
    const newdiv = document.createElement('div');
    newdiv.className = 'mb-3';
    newdiv.id = nv;
    const newinput = document.createElement('input');
    newinput.className = 'form-control';
    newinput.name = nv;

    newrow.appendChild(newdiv);
    newdiv.appendChild(newinput);
    console.log(cL);



}
function addro1(style) {

    switch (style) {
        case 'D':
            var couns = "count" + style;
            console.log(couns);
            var count = document.getElementById(couns).value;
            console.log(typeof (count));
            count = parseInt(count);
            console.log(couns)

            cL = count + 1;
            document.getElementById(couns).value = cL;
            console.log(cL);

            if (cL <= 5) {
                cH += 1;
                num = cH;
                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
            }
            else {
                document.getElementById("btn-rowD").disabled = true;

                cH += 1;
                num = cH;

                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
                console.log("OUT")
            }
            break;

        case 'I':
            var couns = "count" + style;
            console.log(couns);
            var count = document.getElementById(couns).value;
            console.log(typeof (count));
            count = parseInt(count);
            console.log(couns)

            cL = count + 1;
            document.getElementById(couns).value = cL;
            console.log(cL);

            if (cL <= 3) {
                cH += 1;
                num = cH;

                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
            }
            else {
                document.getElementById("btn-rowI").disabled = true;

                cH += 1;
                num = cH;

                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
                console.log("OUT")
            }
            break;

        case 'S':
            var couns = "count" + style;
            console.log(couns);
            var count = document.getElementById(couns).value;
            console.log(typeof (count));
            count = parseInt(count);
            console.log(couns)

            cL = count + 1;
            document.getElementById(couns).value = cL;
            console.log(cL);

            if (cL <= 3) {
                cH += 1;
                num = cH;

                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
            }
            else {
                document.getElementById("btn-rowS").disabled = true;

                cH += 1;
                num = cH;

                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
                console.log("OUT")
            }
            break;

        case 'C':
            var couns = "count" + style;
            console.log(couns);
            var count = document.getElementById(couns).value;
            console.log(typeof (count));
            count = parseInt(count);
            console.log(couns)

            cL = count + 1;
            document.getElementById(couns).value = cL;
            console.log(cL);

            if (cL <= 3) {
                cH += 1;
                num = cH;

                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
            }
            else {
                document.getElementById("btn-rowC").disabled = true;

                cH += 1;
                num = cH;

                qury = '.example' + style;
                style = stylevar(style);
                // nv = style+type+cH;
                nv = 'value[]';

                console.log(nv + qury);
                console.log("OUT")
            }
            break;

    }
    // if(style === 'D'){

    // }









    const newrow = document.querySelector(qury);
    //create element
    console.log(qury);
    console.log(newrow);
    const newdiv = document.createElement('div');
    newdiv.className = 'mb-3';
    newdiv.id = nv;
    const newinput = document.createElement('input');
    newinput.className = 'form-control';
    newinput.name = nv;

    newrow.appendChild(newdiv);
    newdiv.appendChild(newinput);
    console.log(cL);



}
function addron(type, style) {
    var count = document.getElementById('count').value;
    console.log(typeof (count));
    count = parseInt(count);

    cL = count + 1;
    document.getElementById("count").value = cL;
    console.log(cL);
    if (type == 'High') {

        if (cL < 4) {
            console.log(type + "in");
            cH += 1;
            num = cH;
            qury = '.example' + style;
            style = stylevar(style);
            // nv = style+type+cH;
            nv = "value[]";
            console.log(nv + qury);


        }
        else {
            console.log('OUT');
            console.log(count);
        }



    }
    else {
        if (cL === 4) {
            document.getElementById("btn-dL").disabled = true;
            cL += 1;
            num = cL;
            qury = '.example2' + style;
            style = stylevar(style);
            nv = style + type + cL;
            console.log(nv);
        } else {
            cL += 1;
            num = cL;
            qury = '.example2' + style;
            style = stylevar(style);
            nv = style + type + cL;
            console.log(nv);
        }

    }


    const newrow = document.querySelector(qury);
    //create element
    const newdiv = document.createElement('div');
    newdiv.className = 'mb-3';
    newdiv.id = nv;
    const newinput = document.createElement('input');
    newinput.className = 'form-control';
    newinput.name = nv;

    newrow.appendChild(newdiv);
    newdiv.appendChild(newinput);
    console.log(cL);



}

function removero(type, style, count) {
    const con = document.getElementById(ch + style);
    console.log(con);
    console.log(style + "_" + type + count);
    const element = document.getElementById(style + "_" + type + count);
    console.log(element);
    element.remove();
}
function stylevar(style) {
    switch (style) {
        case 'D':
            style = 'D';
            break;
        case 'i':
            style = 'i';
            break;
        case 'S':
            style = 'S';
            break;
        case 'C':
            break;
        default:
            console.log('ERROR')
    }
    return style;


}

//functionn jquery


//new function

// function word_count(att,style) {
//     for (let i = 1; i < 5; i++) {
//         console.log('#'+style+'_'+att+i);
//     $('#'+style+'_'+att+i).on('keyup', function () {

//         $('#'+style+'limit_'+att+i).html("(" + $(this).val().length + " / 100)");

//         if ($(this).val().length > 100) {

//             $(this).val($(this).val().substring(0, 100));

//             $('#'+style+'limit_'+att+i).html("(100 / 100)");

//         }

//     });
// }
// }

// function word_limit(style,att){

//     $('div.'+style+'_count_'+att+'>input[type=textbox]').focus(function () {
//         // count = 0; $('div.'+style+'_count_'+att+'>input[type=textbox]').each(function () {
//         focusCount = $(this).val().length;
//         console.log(focusCount);
//         count = 0; $('div.'+style+'_count_'+att+'>input[type=textbox]').each(function () {
//             count += $(this).val().length;
//         });
//         count -= focusCount;
//     });
//     $('div.'+style+'_count_'+att+'>input[type=textbox]').keyup(function () {
//         focusCount = $(this).val().length;
//         $('#'+style+'_charNum_'+att).text(500 - (count + focusCount));


//     });


// }




function looplimit(style) {
    word_count('im', style);
    word_count('bet', style);
    word_count('avo', style);
    word_count('env', style);
}

// function W_limit(style){
//     word_limit(style,'im');
//     word_limit(style,'bet');
//     word_limit(style,'avo');
//     word_limit(style,'env');
// }

