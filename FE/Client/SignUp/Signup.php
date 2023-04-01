
<?php
error_reporting(0);
    include_once '../../../connection.php';

    if (isset($_POST['submit'])) {
       $post_data = array();
       $post_data['id'] = strval(time());
       $post_data['Email'] = $_POST['txtEmail']; 
       $post_data['name'] = $_POST['txtName']; 
       $post_data['password'] = $_POST['txtPass'];
    

       if (($post_data['Email']=="")||($post_data['name']=="")||($post_data['password']=="")) {
            echo "<div class='alert alert-danger'> Required fields empty! </div>";
        }else {
            $Account->insertOne($post_data);
            header("location: http://localhost:3000/FE/Client/login/login.php"); 
        }

       

       $post_data = array();
       $_POST = array();
       
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Login</title>

    <link rel="stylesheet" href="./Signup.css">

  </head>
  <body>
    
  <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="form-box">
              <div class="form-content">
                <h1>Sign up</h1>
                <form method="POST">
                  <input type="text" name="txtName" placeholder="Username">
                  <input type="email" name="txtEmail" placeholder="Email">
                  <input type="password" name="txtPass" placeholder="Password">
                  <button type="submit" name="submit">Xác nhận</button>
                </form>
              </div>
              <img
        class="software-engineer-bro-1"
        alt=""
        src="../../../IMG/software-engineerbro-1.svg"
      />
            </div>
          </div>
        </div>
      </div>

     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>