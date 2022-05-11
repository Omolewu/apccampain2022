<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="style.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New User || Osun APC Campaign 2022</title>
</head>
<style>
     .bg-c{
         background-color: rgb(4 21 64)
     }
  
</style>
<body>
    <div class="container-fluid bg-c">
        <div class="container p-2">
            <div class="row justify-content-center mt-2">
                <!-- <h3 class="text-warning text-center my-5">You're Welcome to Osun State APC 2023 Campaign Website</h3> -->
                
                <div class="col-md-6  col-sm-10">
                    <div class="text-center ">
                     <img src="Images/logo.png"   class="img-fluid" alt="">
                        <p class="mt-2 text-warning" ><i>Osun State Apc 2022</i></p>
                    </div>

                    <div id="alert" class="alert  d-none alert-danger alert-dismissible">
                     <button type="btn" data-bs-dismiss="alert" class="btn-close"></button>
                     <strong id="alert_text"></strong>
                    </div>

                    <form action="" id="regform">

                        <div class="form-floating mt-2">
                            <input type="text" name="fullname" placeholder="Full Name" class="form-control" id="">
                            <label for="fullname">Full Name   </label>
                             <strong class="text-danger" id="fullname_error"></strong>
                        </div>
                                            
                             <div class="form-floating mt-2">
                            <input type="text" name="phone" placeholder="08123456789" class="form-control " id="">
                            <label for="Phone">Phone No:</label>
                            <strong class="text-danger" id="phone_error"></strong>
                           </div>
                           
                           <div class="form-floating mt-2">
                            <input type="text" name="lg" placeholder="Atiba LG" class="form-control " id="">
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
                                <input type="text" name="card" placeholder="Vin 964f" class="form-control " id="">
                                <label for="Votes">Votes Card number</label>
                                <strong class="text-danger" id="card_error"></strong>
                                </div>
    
                                 <div class="form-floating mt-2">
                                   <select name="vote"  class="form-control" id="">
                                       <option value="">Select Option</option>
                                        <option value="Yes">Yes</optio>
                                        <option value="No">No</optio>
                                   </select>  
                                <label for="poll-unit">Will you like to vote for APC in 2022 Governorship Election ?</label>
                                <strong class="text-danger" id="vote_error"></strong>
                                </div>

                                <div class="form-floating mt-2">
                                  <input type="text" name="reason" placeholder="Vin 964f" class="form-control " id="">
                                  <label for="Votes">If No, Reason</label>
                                  <strong class="text-danger" id="reason_error"></strong>
                                </div>

                                <div class="form-floating mt-2">
                                  <textarea name="comment" id="" class="form-control" cols="30" rows="10"></textarea>
                                  <label for="Votes">Comment</label>
                                  <strong class="text-danger" id="comment_error"></strong>
                                </div>
                                <input type="submit" name="reg" value="Register" class="btn form-control my-2 btn-success form-control btn-lg" >
                                <button class="btn btn-warning form-control p-2 mt-1">  <a class="text-light" style="text-decoration: none;" href="welcome.php"> Go Back </a> </button>

                        </form>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
      // Get my elements
      let form = document.getElementById('regform'); 

      // functions

      // display error
      function errors(id, message){
        id =document.getElementById(id);
        id.innerHTML = message
      }

      function validation(){

        if (form.fullname.value.trim() === '') {
            errors('fullname_error', "Fullname cannot be empty");
            return false
        }
        if (form.phone.value.trim() === '') {
          errors('phone_error', "Phone No cannot be empty");
          return false;
        }
        if (form.lg.value.trim() === '') {
          errors('lg_error', "local Government No cannot be empty");
          return false
        }
        if (form.ward.value.trim() === '') {
          errors('ward_error', "Ward No cannot be empty");
          return false
        }
        if (form.poll.value.trim() === '') {
          errors('poll_error', "Poll No cannot be empty")
          return false
        }
        if (form.card.value.trim() === '') {
          errors('card_error', "Voters card  No cannot be empty");
          return false
        }
        if (form.vote.value.trim() === '') {
          errors('vote_error', "You must Select one");
          return false
        }
        return true
      }

      form.addEventListener('submit', (e)=>{
        e.preventDefault();
        
        if (validation()) {
       fullname = form['fullname'].value.trim();
       phone = form['phone'].value.trim();
       lg = form['lg'].value.trim();
       ward = form['ward'].value.trim();
       poll = form['poll'].value.trim();
       card = form['card'].value.trim();
       vote = form['vote'].value.trim();
       reason = form['reason'].value.trim();
       comment = form['comment'].value.trim();

   
       axios.post('reg-action.php', {
         fullname:fullname,
         phone:phone,
         lg:lg,
         ward:ward,
         poll:poll,
         card:card,
         vote:vote,
         reason:reason,
         comment:comment,
       }).then(function(response){
         console.log(response);

         if (response.data.fullnameErr) {
           errors('fullname_error', response.data.fullnameErr );
         }
         if (response.data.phoneErr) {
           errors('phone_error', response.data.phoneErr );
         }
         if (response.data.lgErr) {
           errors('lg_error', response.data.lgErr );
         }
         if (response.data.cardErr) {
           errors('card_error', response.data.cardErr );
         }
         if (response.data.pollErr) {
           errors('poll_error', response.data.pollErr );
         }
         if (response.data.wardErr) {
           errors('ward_error', response.data.wardErr );
         }
         if (response.data.voteErr) {
           errors('vote_error', response.data.voteErr );
         }
         if (response.data.exist) {
          var alert = document.getElementById('alert');
          alert.classList.remove('d-none'); 
          errors( "alert_text" , response.data.exist )  ; 
          window.scrollTo(0, 100)
         }
         if (response.data.success) {
          var alert = document.getElementById('alert');
          alert.classList.remove('d-none', 'alert-danger'); 
          alert.classList.add('alert-success');   
          errors( "alert_text" , response.data.success )  ; 
          window.scrollTo(0, 100) 
          setTimeout(() => {
             window.location.reload();
                    }, 5000); 
         }
       
       })
        }
        
      })
    </script>
</body>
</html>