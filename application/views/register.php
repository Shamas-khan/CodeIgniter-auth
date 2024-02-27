<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="<?= base_url() ?>">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Document</title>
  </head>
  <body>
    <section class="vh-100" style="background-color: #eee">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                      Sign up
                    </p>

                    <form class="mx-1 mx-md-4">
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="text"
                            id="username"
                            class="form-control"
                            name="username"
                          />
                          <label class="form-label" for="form3Example1c"
                            >User Name</label
                          >
                        </div>
                      </div>
                      <div class="text-danger m-3" id="username_error"></div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="email"
                            id="useremail"
                            class="form-control"
                            name="email"
                          />
                          <label class="form-label" for="form3Example3c"
                            >Your Email</label
                          >
                        </div>
                      </div>
                      <div class="text-danger m-3" id="email_error"></div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                          />
                          <label class="form-label" for="form3Example4c"
                            >Password</label
                          >
                        </div>
                      </div>
                      <div class="text-danger m-3" id="password_error"></div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="password"
                            id="cpassword"
                            class="form-control"
                          />
                          <label class="form-label" for="form3Example4cd"
                            >Repeat your password</label
                          >
                        </div>
                        
                      </div>
                      <div class="text-success m-3" id="result"></div>
                      <div
                        class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                      >
                        <button type="button" id="submit" class="btn btn-primary btn-lg">
                          Register
                        </button>
                      </div>
                      <a href="<?php echo base_url(); ?>">Already have an account</a>

                      
<script>
    $(document).ready(function(){
     
      $('#submit').click(function(e){
        e.preventDefault();
        var username= $('#username').val();
      var email = $('#useremail').val();
      var password=  $('#password').val();
      var cpass =$('#cpassword').val();

      if(password !==cpass){
        alert("password not match");

      }
        $.ajax({
          url:"UserController/userregister",
          method:"POST",
          data:{username,email,password },
          success: function(response){
            if(response.status=="success")
            {
              $('#result').html(response.message);
            }
           

            
            else if(response.status == "error"){
              // Clear previous error messages
              $('#result').html('');

              // Display validation errors
              $.each(response.errors, function(key, value){
                $('#' + key + '_error').html(value);
              });
            }
            console.log(response);
            
            

          }
          

        })

      
      })  
    });
</script>

                    </form>
                  </div>
                  <div
                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2"
                  >
                    <img
                      src="<?php echo base_url() . 'assets\draw1.webp';?>"
                      class="img-fluid"
                      alt="Sample image"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>