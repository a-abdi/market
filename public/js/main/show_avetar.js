function show_avetar(response,i,id){
    $("#"+id+"").html(
    '<span class="s-f text d-rtl">زمان ارسال '+response.data[i]["created_at"]+'</span> \n\
    <div class="border-0 card mb-1"> \n\
        <div class="row no-gutters"> \n\
            <div class="col-8"> \n\
                <div class="card-body px-1 py-0 text-right"> \n\
                    <div class="d-rtl pointer"> \n\
                        <span class="card-title s-f">'+response.data[i]["first_name"] + ' ' + response.data[i]["last_name"]+'</span> \n\
                    </div> \n\
                    <div class="d-rtl text"> \n\
                        <span class="s-f d-none" id=' +response.data[i]['id'] +'> امتیاز کاربر: </span> \n\
                    </div> \n\
                </div> \n\
            </div> \n\
            <div class="col-4 pointer" id=l_avetar_'+ response.data[i]['id'] +' onmouseover="show_avetar_larg(this)" onmouseout="show_avetar_defult(this)"> \n\
                <img src="avetar.png" class="card-img img-avetar-size" alt="avetar"> \n\
            </div> \n\
        </div> \n\
    </div>');

}

function show_avetar_larg(id){
    $("main").append(
        '<div class="p-r"> \n\
            <img src="avetar.png" class="card-img img-avetar-size_larg" alt="avetar"> \n\
        </div> \n\
      ');
  
       
}

function show_avetar_defult(id){
    
}