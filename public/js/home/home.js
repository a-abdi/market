


$( document ).ready(function() {
    axios.get('/goods')
    .then(function (response) {
        if(response.data.error) {

        } else {
            for(var i = 0; i<response.data.length; i++){
                
                $("#main").append(
                    
                    '<div id="img_'+response.data[i]['id']+'" onmouseover="enabel_show_seller('+ response.data[i]['id'] +')" onmouseout="disable_show_seller('+ response.data[i]['id'] +')" class ="col-sm-6 col-md-4 col-lg-3 p-1 text-center border"> \n\
                        <img src="'+response.data[i]['img_src']+'" onclick="info_image('+response.data[i]['id']+')" alt="تصویر کالا" class ="pointer" height="200" width="98%"> \n\
                        <hr class="new1">\n\
                        <div class="text-center">\n\
                           <span class="pointer" onclick="info_image()"> \n\
                               '+response.data[i]['name']+' \n\
                           </span> \n\
                        </div>\n\
                        <div class="text-center"> \n\
                           <span class="text"> \n\
                               '+response.data[i]['price']+' \n\
                           </span>\n\
                        </div> \n\
                        <div class="text-center seller"> \n\
                           <span id=' +response.data[i]['id'] +' class="text d-none"> \n\
                                فروشنده: \n\
                                '+ response.data[i]['first_name'] + " " + response.data[i]['last_name'] +' \n\
                            </span> \n\
                        </div> \n\
                    </div>');
            }
               
        }
    })
    .catch(function (error) {
        
    });
});
function info_image(id) {
   
    
    // $(location).attr('href','login');
    window.location.href = "infoimage/?id="+id+"";
}
 
function enabel_show_seller(id){
    $("#"+id+"")
        .removeClass("d-none");
    $("#"+id+"")
        .addClass("d-block");
}

function disable_show_seller(id){
    $("#"+id+"")
        .removeClass("d-block");
    $("#"+id+"")
        .addClass("d-none");
}

































































































































































// $( document ).ready(function() {
//     $(document).on('mouseenter', '[id*="img_"]', function(event) {
//         $('#'+this.children[4].id+'').removeClass("d-none");
//         $('#'+this.children[4].id+'').addClass("d-block");
//     });

//     $(document).on('mouseleave', '[id*="img_"]', function(event) {
//         $('#'+this.children[4].id+'').removeClass("d-block");
//         $('#'+this.children[4].id+'').addClass("d-none");
//     });

//     axios.get('/goods')
//     .then(function (response) {
//         if(response.data.error) {

//         } else {
//             for(var i = 0; i<response.data.length; i++){
                
//                 $("#main").append(
                    
//                     '<div id="img_'+response.data[i]['id']+'" class ="col-sm-6 col-md-4 col-lg-3 p-1 text-center border"> \n\
//                         <img src="'+response.data[i]['img_src']+'" onclick="info_image()" alt="تصویر کالا" class ="pointer" height="200" width="98%"> \n\
//                         <hr class="new1">\n\
//                         <div class="text-center">\n\
//                            <span class="pointer" onclick="info_image()"> \n\
//                                '+response.data[i]['name']+' \n\
//                            </span> \n\
//                         </div>\n\
//                         <div class="text-center"> \n\
//                            <span class="text"> \n\
//                                '+response.data[i]['price']+' \n\
//                            </span>\n\
//                         </div> \n\
//                         <div id="child_'+response.data[i]['id']+'" class="text-center d-none"> \n\
//                            <span class="text"> \n\
//                                 فروشنده: \n\
//                                 '+ response.data[i]['first_name'] + " " + response.data[i]['last_name'] +' \n\
//                             </span> \n\
//                         </div> \n\
//                     </div>');
//             }
               
//         }
//     })
//     .catch(function (error) {
        
//     });
// });
// function info_image() {
//     var url='login';
//     $().redirect('login', {'arg1': 'value1', 'arg2': 'value2'});
    
//     // $(location).attr('href','login');
//     // window.location.href = "login";
// }