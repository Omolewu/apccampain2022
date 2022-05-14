<?php
require_once "inc/header.php";
require('inc/loading.php');
?>
<div class="container-fluid bg-c d-none" id="mainpage">
  <div class="container p-5">
    <div class="row justify-content-center mt-5">
      <!-- <h3 class="text-warning text-center my-5">You're Welcome to Osun State APC 2023 Campaign Website</h3> -->
      <div class="col-md-4 col-sm-10 mt-5">

        <!-- Carousel -->
        <div id="demo" class="carousel slide mt-2" data-bs-ride="carousel">

          <!-- Indicators/dots -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>

          </div>
          <!-- The slideshow/carousel -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Images/tola.jpg" alt="Gov_Oyetola_Osun" class="d-block w-100">
            </div>
            <div class="carousel-item">
              <img src="Images/cir (1).png" alt="Apc logo" class="d-block w-100">
            </div>

          </div>

          <!-- Left and right controls/icons -->
          <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>

      </div>
      <div class="col-md-6 mt-3 col-sm-10">
        <div class="text-center ">
          <img src="Images/logo.png" class="img-fluid" alt="">
          <p class="mt-2 text-warning"><i>Osun State Apc 2022</i></p>
        </div>

        <div id="alert" class="alert alert-danger d-none alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong id="alert_text"></strong>
        </div>

        <form action="" id="logform">
          <div class="form-floating mt-2">
            <input type="text" id="username" name="username" placeholder="Username" class="form-control" id="">
            <label for="username">Username</label>
          </div>
          <strong class="text-danger" id="username_error"></strong>
          <div class="form-floating mt-2">
            <input type="password" id="password" name="password" placeholder="Username" class="form-control " id="">
            <label for="password">Password</label>
          </div>
          <strong class="text-danger" id="password_error"></strong>

          <button type="submit" class="btn  btn-success form-control btn-lg mt-2" id="loginBtn">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  // Get my elements
  let form = document.getElementById('logform');
  let username = form['username'];
  let password = form['password'];

  // functions

  // display error
  function errors(id, message) {
    id = document.getElementById(id);
    id.innerHTML = message
  }
  //usrname validations 
  function username_validate() {
    let username = form['username'];

    let pattern = /^[a-zA-Z]/;
    if (username.value.trim() === '' || username.value.trim() === null) {
      errors("username_error", "Username cannot be Empty")
      username.style.border = "2px solid #f2796e"
      return false
    } else if (!(pattern.test(username.value.trim()))) {
      errors("username_error", "Username cannot start with number")
      username.style.border = "2px solid #f2796e"
      return false
    }
    errors("username_error", "") // when there is no error
    username.style.border = "2px solid green"
    return username.value.trim()
  }

  // password validation
  function password_validate() {
    let password = form['password'];
    if (password.value.trim() == '' || password.value.trim() == null) {
      errors("password_error", "Password cannot be Empty");
      password.style.border = "2px solid #f2796e"
      return false
    } else if (password.value.trim().length < 6) {
      errors("password_error", "Password must be equal to six character or more");
      password.style.border = "2px solid #f2796e"
      return false
    }
    errors("password_error", "")
    password.style.border = "2px solid green"
    return password.value.trim()
  }

  //  /functions

  form.addEventListener('submit', (e) => {

    e.preventDefault();
    let submitBtn = document.getElementById('loginBtn');
    submitBtn.innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
    submitBtn.disabled = true;
    //alart
    var alert = document.getElementById('alert');
    username = username_validate()
    password = password_validate()
    if (username && password) {
      axios.post('log-in.php', {
        username: username,
        password: password,
      }).then(function(response) {
        submitBtn.innerHTML = "Login";
        submitBtn.disabled = false;
        console.log(response);
        if (response.data.usernameErr) {
          // document.getElementById('username_error').innerHTML = response.data.usernameErr;
          errors("username_error", response.data.usernameErr);
        }
        if (response.data.passwordErr) {
          errors("password_error", response.data.passwordErr);
        }
        if (response.data.loginErr) {
          document.getElementById("password").style.border = "2px solid #f2796e"
          document.getElementById("username").style.border = "2px solid #f2796e"
          document.getElementById("alert").classList.remove('d-none');
          errors("alert_text", response.data.loginErr);
        }
        if (response.data.success) {
          // alert(response.data.success);
          document.getElementById("alert").classList.remove('d-none', 'alert-danger');
          document.getElementById("alert").classList.add('alert-success');
          errors("alert_text", response.data.success);
          if(response.data.role === 'user'){
          
             session = response.data.id;
            // $_SESSION['username']  = response.data.username;
             setTimeout(() => {
            window.location.assign('welcome.php');
          }, 1000);
          }

          if(response.data.role === 'admin'){
            var session = '$_SESSION["id"]'
            session  = response.data.id;
            // $_SESSION['username']  = response.data.username;
             setTimeout(() => {
            window.location.assign('admin/index.php');
          }, 1000);
          }
         

        }

      }).catch(function(error) {
        console.log(error);
      })
    } else {
      submitBtn.innerHTML = "Login";
      submitBtn.disabled = false;

    }

  })
</script>
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