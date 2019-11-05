
  
  

$( document ).ready(function() {
  
    axios.get('/goods')
    .then(function (response) {
        if(response.data.error) {

        } else {
            for(var i = 0;i<response.data.length;i++){
                
                $("#main").append(
                    '<div class ="col-sm-6 col-md-4 col-lg-3 p-3 mx=auto text-center my-4">\n\
                        <img src="'+response.data[i]['img_src']+'" alt="Smiley face" height="200" width="98%">\n\
                        <hr>\n\
                        <div class="text-center">\n\
                            '+response.data[i]['name']+'\n\
                        </div>\n\
                        <div class="text-center">\n\
                            '+response.data[i]['price']+'\n\
                        </div> \n\
                    </div>');
            }
        }
    })
    .catch(function (error) {
        
    });
});