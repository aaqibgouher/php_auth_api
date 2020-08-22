<?php include "include/header.php";?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form id="login_form">
                <div id="message"></div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button class="btn btn-primary btn-block" id="login_btn">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include "include/footer.php";?>

<script>

$(document).ready(function(){
    $("#login_form").submit(function(e){
        e.preventDefault();
        var form_data = $(this).serialize();
        
        $.ajax({
            url: api_url("login.php"),
            type: "get",
            data: form_data,
            dataType: "json",
            success: function(response){
                // response = JSON.parse(response);
                set_message(response, "#message");
                if(response.status){
                    localStorage.setItem("token", response.data.token);
                    localStorage.setItem("user_id", response.data.user_id);
                    localStorage.setItem("email", response.data.email);
                    localStorage.setItem("full_name", response.data.full_name);
                    window.location.href = "home.php";
                }
            }
        })
    })
})

</script>