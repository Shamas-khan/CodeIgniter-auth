<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="<?=base_url()?>">
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
                      <div class="d-flex flex-row align-items-center mb-1" id="emailwrap">

                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="Email"
                          />

                        </div>
                      </div>


                      <div class="d-flex flex-row align-items-center mb-1" id="passwrap">

                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="password"
                            id="password"
                            class="form-control"
                            placeholder="Password"
                          />
                       </div>
                      </div>
                      <div class="" id="result"></div>


                      <div
                        class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                      >
                        <button type="button" id="login" class="btn btn-primary btn-lg">
                          Login
                        </button>
                      </div>
                      <a href="user_register">Register yourself</a>
                    </form>

                    <script>
    $(document).ready(function () {
      $(' #email, #password').focus(function() {
        var fieldId = $(this).attr('id');
        $('#' + fieldId + '_error').html('');
        $('#result').html('')

      });
        $('#login').click(function (e) {
            e.preventDefault();

            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url: "UserController/index",
                method: "POST",
                data: { email: email, password: password },
                success: function (response) {
                  if(response.status == 'success'){
                    window.location.href = "<?php echo base_url('dashboard'); ?>";
                  }

                    if (response.status == "error") {
                        $('#passwrap').after('<div class="text-danger " id="password_error"></div>');
                        $('#emailwrap').after('<div class="text-danger " id="email_error"></div>');
                        $.each(response.errors, function (key, value) {
                            $('#' + key + '_error').html(value);
                        });
                        $('#result').addClass('text-danger').html(response.message)

                        console.log(response);
                    }
                }
            });
        });
    });
</script>


                  </div>
                  <div
                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2"
                  >
                    <img
                    src="<?php echo base_url() . 'assets\draw1.webp'; ?>"
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
    ></scrip>
  </body>
</html>
