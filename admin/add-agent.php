<?php
require 'header.php';
?>
<div class="container-fluid">
    <div class="container p-2">
        <div class="row justify-content-center mt-2">
            <!-- <h3 class="text-warning text-center my-5">You're Welcome to Osun State APC 2023 Campaign Website</h3> -->
            <div class="card col-md-6 col-sm-10">
                <form action="" id="userform">
                    <div class="form-floating mt-2">
                        <input type="text" name="fullname" placeholder="Full Name" class="form-control" id="">
                        <label for="fullname">Full Name </label>
                        <strong class="text-danger" id="fullname_error"></strong>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" name="username" placeholder="Username" class="form-control " id="">
                        <label for="Phone">Username:</label>
                        <strong class="text-danger" id="user_error"></strong>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" name="phone" placeholder="08123456789" class="form-control " id="">
                        <label for="Phone">Phone No:</label>
                        <strong class="text-danger" id="phone_error"></strong>
                    </div>

                    <div class="form-floating mt-2">
                        <select class="form-control" name="lg" id="">
                            <option value=""> Select Local Goverment </option>
                            <option value="Aiyedaade"> Aiyedaade</option>
                            <option value="Aiyedire"> Aiyedire</option>
                            <option value="Atakunmosa East">Atakunmosa East </option>
                            <option value="Atakunmosa West">Atakunmosa West </option>
                            <option value="Boluwaduro"> Boluwaduro</option>
                            <option value="Boripe"> Boripe</option>
                            <option value="Ede North">Ede North </option>
                            <option value="Ede South"> Ede South</option>
                            <option value="Egbedore"> Egbedore</option>
                            <option value="Ejigbo"> Ejigbo</option>
                            <option value="Ife Central"> Ife Central</option>
                            <option value="Ife East">Ife East </option>
                            <option value="Ife North">Ife North </option>
                            <option value="Ife South">Ife South </option>
                            <option value="Ifedayo"> Ifedayo</option>
                            <option value="Ifelodun, Osun State"> Ifelodun, Osun State</option>
                            <option value="Ila, Osun"> Ila, Osun</option>
                            <option value="Ilesa East">Ilesa East </option>
                            <option value="Ilesa West"> Ilesa West</option>
                            <option value="Irepodun, Osun"> Irepodun, Osun</option>
                            <option value="Irewole"> Irewole</option>
                            <option value="Isokan"> Isokan</option>
                            <option value="Iwo, Osun"> Iwo, Osun</option>
                            <option value="Obokun"> Obokun</option>
                            <option value="Odo Otin">Odo Otin </option>
                            <option value="Ola Oluwa"> Ola Oluwa</option>
                            <option value="Olorunda"> Olorunda</option>
                            <option value="Oriade"> Oriade</option>
                            <option value="Orolu">Orolu </option>
                            <option value="Osogbo"> Osogbo</option>
                        </select>
                        <label for="lg">Local Government</label>
                        <strong class="text-danger" id="lg_error"></strong>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" name="ward" placeholder="Ward" class="form-control " id="">
                        <label for="ward">Ward</label>
                        <strong class="text-danger" id="ward_error"></strong>
                    </div>

                    <div class="form-floating mt-2">
                        <input type="text" name="poll" placeholder="Poll Unit" class="form-control " id="">
                        <label for="poll-unit">Poll Unit </label>
                        <strong class="text-danger" id="poll_error"></strong>
                    </div>
                    <div class="form-floating mt-2">
                        <select name="vote" class="form-control" id="">
                            <option value=""> Select Role</option>
                            <option value="Yes">user</optio>
                            <option value="No">Admin</optio>
                        </select>
                        <label for="poll-unit">Select Role</label>
                        <strong class="text-danger" id="role_error"></strong>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" name="password" placeholder="******************" class="form-control " id="">
                        <label for="poll-unit">Poll Unit </label>
                        <strong class="text-danger" id="poll_error"></strong>
                    </div>
                    <button type="submit" name="reg" class="btn form-control my-2 btn-success form-control btn-lg">Add User</button>
                    <a class="btn btn-warning  p-2 mt-1 text-light" href="index.php"> Go Back </a>
                    <a class="btn btn-danger  p-2 mt-1 text-light float-end" href="../logout.php">Logout </a>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Get my elements
    let userform = document.getElementById('userform');
    // display error
    function errors(id, message) {
        id = document.getElementById(id);
        id.innerHTML = message
    }

    function validation() {
        if (userform.fullname.value.trim() === '') {
            errors('fullname_error', "Fullname cannot be empty");
            return false
        }
        if (userform.phone.value.trim() === '') {
            errors('phone_error', "Phone No cannot be empty");
            return false;
        }
        if (userform.username.value.trim() === '') {
            errors('phone_error', "Phone No cannot be empty");
            return false;
        }
        if (userform.lg.value.trim() === '') {
            errors('lg_error', "local Government No cannot be empty");
            return false
        }
        if (userform.ward.value.trim() === '') {
            errors('ward_error', "Ward No cannot be empty");
            return false
        }
        if (userform.poll.value.trim() === '') {
            errors('poll_error', "Poll No cannot be empty")
            return false
        }
        if (userform.password.value.trim() === '') {
            errors('password_error', "Password  cannot be empty")
            return false
        }
        if (userform.role.value.trim() === '') {
            errors('vote_error', "You must Select one");
            return false
        }
        return true
    }

    userform.addEventListener('submit', (e) => {
        e.preventDefault();

        if (validation()) {
            fullname = userform['fullname'].value.trim();
            phone = userform['phone'].value.trim();
            lg = userform['lg'].value.trim();
            ward = userform['ward'].value.trim();
            poll = userform['poll'].value.trim();
            card = userform['card'].value.trim();
            vote = userform['vote'].value.trim();
            reason = userform['reason'].value.trim();
            comment = userform['comment'].value.trim();
            axios.post('reg-action.php', {
                fullname: fullname,
                phone: phone,
                lg: lg,
                ward: ward,
                poll: poll,
                card: card,
                vote: vote,
                reason: reason,
                comment: comment,
            }).then(function(response) {
                console.log(response);

                if (response.data.fullnameErr) {
                    errors('fullname_error', response.data.fullnameErr);
                }
                if (response.data.phoneErr) {
                    errors('phone_error', response.data.phoneErr);
                }
                if (response.data.lgErr) {
                    errors('lg_error', response.data.lgErr);
                }
                if (response.data.cardErr) {
                    errors('card_error', response.data.cardErr);
                }
                if (response.data.pollErr) {
                    errors('poll_error', response.data.pollErr);
                }
                if (response.data.wardErr) {
                    errors('ward_error', response.data.wardErr);
                }
                if (response.data.voteErr) {
                    errors('vote_error', response.data.voteErr);
                }
                if (response.data.exist) {
                    var alert = document.getElementById('alert');
                    alert.classList.remove('d-none');
                    errors("alert_text", response.data.exist);
                    window.scrollTo(0, 100)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.data.exist,
                    })
                }
                if (response.data.success && !response.data.exist) {
                    var alert = document.getElementById('alert');
                    alert.classList.remove('d-none', 'alert-danger');
                    alert.classList.add('alert-success');
                    errors("alert_text", response.data.success);
                    Swal.fire({
                        icon: 'success',
                        title: 'added',
                        text: 'Memeber added successfully',
                        footer: '<a href="welcome.php">Go to home page?</a>'
                    })

                    // window.scrollTo(0, 100)
                    // setTimeout(() => {
                    //   window.location.reload();
                    // }, 5000);
                }

            })
        }

    })
</script>
<?php require 'footer.php'; ?>