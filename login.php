<!-- link to form templates: https://freefrontend.com/bootstrap-login-forms/ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://kit.fontawesome.com/37ea782f7c.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    /* body{ font: 14px sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: center;}
        .wrapper{ width: 361px; padding: 20px; }
        .no_rounding{border-radius: 0 !important;}
        .btn:focus {outline: none; box-shadow: none;}
        .mainbtn{width:160px;} */

        body {
          background: #007bff;
          background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .card-img-left {
          width: 45%;
          /* Link to your background image using in the property below! */
          background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
          background-size: cover;
        }

        .btn-login {
          font-size: 0.9rem;
          letter-spacing: 0.05rem;
          padding: 0.75rem 1rem;
        }

        .card{
          border-radius: 2rem;
        }


    </style>

    <script>

    function showSection(section){
      fetch(`${section}.php`)
      .then(response => response.text())
      .then(text => {
        document.querySelector('#content').innerHTML = text;
      });
    }
    // document.addEventListener("load", function(){
    //   showSection(student_register);
    // });
    document.addEventListener('DOMContentLoaded', function() {
      showSection('student_login');
      document.querySelectorAll('button').forEach(button => {
        button.onclick = function() {
          showSection(this.dataset.section);
        }
      });
    });

  </script>


</head>
<body>
  <!-- <div class="wrapper border rounded">

    <div class="btn-group" role="group">
      <button type="button" data-section="student_login" class="btn btn-warning no_rounding mainbtn">Student</button>
      <button type="button" data-section="teacher_login" class="btn btn-danger no_rounding mainbtn">Teacher</button>
    </div>



    <div id="content">
    </div>

  </div> -->



  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-5 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
            <form>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="myusername" required autofocus>
                <label for="floatingInputUsername">Username</label>
              </div>

              <hr>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="d-grid mb-2">
                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Login</button>
              </div>

              <a class="d-block text-center mt-2 small" href="#">Don't have an account? Sign Up</a>

              <hr class="my-4">


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




</body>
</html>
