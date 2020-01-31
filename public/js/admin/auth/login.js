function login()
{
   var password = $('#password').val();
   var user_name = $('#user_name').val();
//    alert(password+user_name);
    var fomData = new FormData();
    fomData.append("name", user_name);
    fomData.append("password", password);
    
    axios.post('/admin/auth/login', fomData)
    .then(function (response){
        if(response.data.error){
            $("#msg").html(
                '<div class="alert text-center alert-danger d-rtl" width="200px"> \n\
                  '+ response.data.error +' \n\
                </div>'
            )
            $("#forgot").html(
                'پسورد را فراموش کردم'
              )

        }else{
            window.location.href = "/admin";
        }

    })
    .catch(function (e){
        if(e.response.status == 422){
            validationErrors = e.response.data.errors;
            if(validationErrors.name){
                error = validationErrors.name[0];
            }else {
                error = validationErrors.password[0];
            }

            $("#msg").html(
                '<div class="alert text-center alert-danger d-rtl" width="200px"> \n\
                  '+ error +' \n\
                </div>'
            ) 

        }
    });
    
}