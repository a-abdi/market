function just_persian(str){
    var p = /^[\u0600-\u06FF\s]+$/;

    if (!p.test(str)) {
        alert("not format");
    }
}

