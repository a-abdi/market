function enabel_shadow(elment)
{
    
    $("#"+ elment.id)
        .addClass("shadow-sm text-primary");
}

function disable_shadow(elment)
{
    $("#"+ elment.id)
        .removeClass("shadow-sm text-primary");
    
}

function set_cookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function get_cookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}


function preview_input_file(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function (e) {
            $('#image_preview')
              .attr('src', e.target.result);
            $("#image_preview")
              .addClass("d-inline");
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// If The Format Was Persian Return True
function just_persian(str) {
    var p = /^[\u0600-\u06FF\s]+$/;
    return p.test(str);
}
 
// function duration(timeStart) {
//     var today = new Date();
//     var end_dd = today.getDate();
//     var end_mm = today.getMonth()+1; //January is 0!
//     var end_yyyy = today.getFullYear();

//     var strat_dd = timeStart.getDate();
//     var strat_mm = timeStart.getMonth();
//     var strat_yyyy = timeStart.getFullYear();

//     var duration_dd = end_dd - strat_dd;
//     var duration_mm = end_mm - strat_mm;
//     var duration_yyyy = end_yyyy-strat_yyyy;
//     if(duration_yyyy > 0)
//         return "سال قبل:" +  duration_yyyy;
//     else if(duration_mm > 0)
//         return " ماه قبل:" + duration_mm;
//     else if(duration_dd > 0)
//         return " روز قبل:" + duration_dd;
//     return "همین حالا:";    

    // if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = dd+'/'+mm+'/'+yyyy;  //Current Date

    // var valuestart ="8:00 AM";
    // var valuestop = "4:00 PM";//$("select[name='timestop']").val();

    // //create date format  
    // var timeStart = new Date(today + "" + valuestart).getHours();
    // var timeEnd = new Date(today + "" + valuestop).getHours();

    // var hourDiff = timeEnd - timeStart;  
    // alert("duration:"+hourDiff);

// }