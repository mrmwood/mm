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
    body{ font: 14px sans-serif; min-height: 100vh; display: flex; justify-content: center; align-items: center;}
        .wrapper{ width: 361px; padding: 20px; }
        .no_rounding{border-radius: 0 !important;}
        .btn:focus {outline: none; box-shadow: none;}
        .mainbtn{width:160px;}
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
      showSection('student_register');
      document.querySelectorAll('button').forEach(button => {
        button.onclick = function() {
          showSection(this.dataset.section);
        }
      });
    });

  </script>


</head>
<body>
  <div class="wrapper border rounded">

    <div class="btn-group" role="group">
      <button type="button" data-section="student_register" class="btn btn-warning no_rounding mainbtn">Student</button>
      <button type="button" data-section="teacher_register" class="btn btn-danger no_rounding mainbtn">Teacher</button>
    </div>



    <div id="content">
    </div>

  </div>





</body>
</html>
