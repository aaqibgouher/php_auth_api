<?php include "include/header.php";?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <p><b>Name: </b><span id="user_full_name"></span></p>
            <p><b>Email: </b><span id="user_email"></span></p>
            <p><b>User ID: </b><span id="user_id"></span></p>
        </div>
    </div>
</div>

<?php include "include/footer.php";?>

<script>

$(document).ready(function(){
    redirect_if_not_login();

    $.ajax({
        url: api_url("home.php"),
        type: "get",
        data: {
            token: localStorage.getItem("token")
        },
        dataType: "json",
        success: function(response){
            // response = JSON.parse(response);
            if(response.status){
                $("#user_full_name").text(response.data.full_name);
                $("#user_email").text(response.data.email);
                $("#user_id").text(response.data.user_id);
            }
        }
    })
})

</script>