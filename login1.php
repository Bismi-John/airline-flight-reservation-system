<?php
session_start();
    require 'connection.php';
   ?>
<?php
    require 'header.php';
    ?>
<?php

if (isset($_POST['email'])&& isset($_POST['password'])) {

    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $stmt = $connection->prepare("SELECT * FROM registration WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

     // Verify the password
     if ($user && $password == $user['password'] &&  $user['status_id'] =='2') {
        $_SESSION["user_id"] = $user["id"];
         echo "<script>
                window.location='passenger.php'
            </script>";
       
    }
    
    elseif($user && $password == $user['password']&& $user['status_id'] =='1'){
        $_SESSION["user_id"] = $user["id"];
      
        echo "<script>
                 window.location='admin/dashboard.php'
            </script>";
    }
     else { 
        $error_message = "Invalid email or password";
    
    }
}

    ?>
<div class="container-fluid hero-background ">
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid p-0 m-0 mt-3">
            <h3 class="me-4 font">Travel Story</h3>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse"
                id="navbarSupportedContent"
            >
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link active text-light fw-bold"
                            aria-current="page"
                            href="index.php"
                            ><h5>Home</h5></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#"
                            ><h5>About</h5></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#"
                            ><h5>Contact us</h5></a
                        >
                    </li>
                </ul>
                <form class="d-flex me-2" method="POST" action="">
                    
                    <a
                        href="registration.php"
                        class="btn btn-lg  bg-secondary text-warning"
                        type="submit"
                    >
                        signup
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-12 "></div>
    </div>
    <div class="row">
        <div class="col-md-12 "></div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-5 text-center text-light login-bg">
            <h2 class="mb-3 text-dark">LOGIN</h2>
            <?php
              if (isset($error_message)) {
                echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                        <strong>Invalid email or password </strong> You have to re-enter 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
               }
            ?>
            <form method="POST" action="">
                <!-- email input -->
                <div class="form-outline mb-4">
                    <input
                        type="email"
                        id=""
                        name="email"
                        class="form-control"
                        placeholder="Email"
                    />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input
                        type="password"
                        id=""
                        name="password"
                        class="form-control"
                        placeholder="Password"
                    />
                </div>

                <button type="submit" class="btn bg-primary text-light">
                    LOGIN
                </button>
                
                <div class="col mt-2">
                    <a
                        href=""
                        data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"
                        >Forgot password?</a
                    >
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
 
<?php
require 'footer.php';
?>

