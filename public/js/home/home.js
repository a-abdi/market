$( document ).ready(function() {
    axios.get('/goods')
    .then(function (response) {
        if(response.data.error) {
            // show if an error occurred
        } else {
            show_all_goods(response, "main");    
        }
    })
    .catch(function (error) {
        
    });
});

function show_all_goods(goods, id){
    for(var i = 0; i < goods.data.length; i++){
        $("#" + id).append(
            '<div id="img_'+ goods.data[i]['id'] +'" onmouseover = "onmouseover_display_block('+ goods.data[i]['id'] +')" onmouseout="onmouseover_display_none('+ goods.data[i]['id'] +')" class ="col-sm-6 col-md-4 col-lg-3 p-1 text-center border"> \n\
                <img src="'+ goods.data[i]['img_src'] +'" onclick="get_goods_information('+ goods.data[i]['id'] +')" alt="تصویر کالا" class ="pointer" height="200" width="98%"> \n\
                <hr class = "new1"> \n\
                <div class = "container-fluid mb-1"> \n\
                    <div class="row"> \n\
                        <div class="col-6" id="avetar_'+ goods.data[i]['id'] +'">\n\
                        </div> \n\
                        <div class="col-6 p-1"> \n\
                            <div class="text-center py-1"> \n\
                                <span class="pointer strong font-weight-bold" onclick="get_goods_information('+ goods.data[i]['id'] +')"> \n\
                                    '+ goods.data[i]['name'] +' \n\
                                </span> \n\
                            </div> \n\
                            <div class="text-center py-1"> \n\
                                <span class="text strong f-price d-rtl"> \n\
                                    قیمت: '+ goods.data[i]['price'].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
                                    +' تومان\n\
                                </span> \n\
                            </div> \n\
                        </div> \n\
                    </div> \n\
                </div> \n\
            </div>');
        //append html avetar to pag
        show_avetar( goods , i , "avetar_"+goods.data[i]['id'] );
    }
}

function get_goods_information(goods_id) {
    // $(location).attr('href','login');
    window.location.href = "/goods/" + goods_id ;
    //param
    //  /search/user_id/1/good_id/4
    //string
    //  /search/?user_id=1&good_id=4
}
 
