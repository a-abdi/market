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
    .catch(function (error){

    });
        
}