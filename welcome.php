<?php
require_once "inc/header.php";
require_once "inc/welcomeloader.php";
?>
<div class="container-fluid bg-c d-none" id="mainpage" style="background-color: rgb(4 21 64)">
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-10">
                <h3 class="text-center text-warning">Click on the button below to Add New Users</h3>
                <div class="button mt-3">
                    <a href="registration.php" class="text-center btn btn-success btn-block mx-5 my-3">Add User</a>
                    <a href="logout.php" class="text-center btn btn-warning mx-5 my-3">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Loading Script
    function loading() {
        setTimeout(function() {
            document.getElementById("loader").classList.add("d-none");
            document.getElementById("mainpage").classList.remove("d-none");
        }, 1000);
    }
</script>
<?php require_once "inc/footer.php"; ?>