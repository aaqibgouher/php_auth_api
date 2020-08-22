function set_message(response, selector){
    if(response.status){
        // success
        $(selector).html(`<div class="alert alert-success">${response.message}</div>`);
    }else{
        // error
        $(selector).html(`<div class="alert alert-danger">${response.message}</div>`);
    }
}

function api_url(url = ""){
    return "http://localhost/aaqib/php_auth_api/api/"+url;
}

function is_login(){
    return (localStorage.getItem("token")) ? true : false;
}

function redirect_if_not_login(){
    if(!is_login()) window.location.href = "login.php";
}

$(document).ready(function(){
    $("#tab_login,#tab_register,#tab_logout,#tab_home").hide();
    if(is_login()){
        $("#tab_home,#tab_logout").show();
    }else{
        $("#tab_login,#tab_register").show();
    }
})