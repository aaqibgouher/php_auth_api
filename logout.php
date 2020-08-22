<?php include "include/header.php";?>

<?php include "include/footer.php";?>

<script>

$(document).ready(function(){
    localStorage.setItem("token", "");
    localStorage.setItem("user_id", "");
    localStorage.setItem("email", "");
    localStorage.setItem("full_name", "");
    window.location.href = "index.php";
})

</script>