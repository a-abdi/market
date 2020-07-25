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
 