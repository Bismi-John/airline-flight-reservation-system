<?php
    
    require "connection.php";
?>
<?php
    require "header.php";
?>

<?php
      if(isset($_POST['submit']))
      {
       
        $name= $_POST['name'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $cpassword=$_POST['cpassword'];
        $phone= $_POST['phone'];

        $photo=$_FILES['photo']['name'];
        $temp=$_FILES['photo']['tmp_name'];
        $target="uploads/".basename($photo);
        $move_image=move_uploaded_file($temp,$target);

        $sql='SELECT * FROM registration WHERE email = :email LIMIT 1';
        $stmt = $connection->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user1 = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user1) { // email already exists
            $error_message1 = "email already exists.";
         }
        else if($password!=$cpassword)
        {
            $error_message = "password missmatch.";
        }
         else{ // email does not exist
        $sql = 'INSERT INTO registration (name,email,password,phone,photo,status_id) VALUES 
       (:name,:email,:password,:phone,:photo,:status_id)';
         $statement=$connection->prepare($sql);
        if($statement->execute([':name'=>$name,':email'=>$email,':password'=>md5($password),':phone'=>$phone,':photo'=>$photo,':status_id'=>'2']));
        {
            $sql=('SELECT * FROM registration WHERE email = :email');
            $stmt = $connection->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user2 = $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION['status'] = "data added sucessfullly";
            $_SESSION['status_code']="success";
            $_SESSION['message']="SUCCESS";
            $_SESSION['page']="login.php";  
        }
         }
        }
        
 
      
      ?>
      
      
  
<div class="container-fluid hero-background">
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
              
            </div>
        </div>
    </nav>

<div class="row ">
<div class="col-md-4"></div>
 <div class="col-md-4 text-center text-light reg-bg  p-4">
            <h2 class="mb-3 text-dark">PASSENGER REGISTRATION</h2>
            <?php
                    
                    if(isset($error_message1)){
                        echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                        <strong>email already exist!</strong> You have to re-enter the email.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                       }
                       if(isset($error_message)){
                        echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                        <strong>password mismatch!</strong> You have to re-enter the password.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                       }
                ?>
             <h3 class="text-center mb-3 homehead" id="str"></h3>       
            <form method="POST" action="" enctype="multipart/form-data"  >
            <div class="form-outline mb-4">
                  <input type="text" id="" name="name" class="form-control" placeholder="Name" required/>
              </div>
            
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
                <div class="form-outline mb-4">
                  <input type="password" id="" name="password" class="form-control" placeholder="Password" required/>
              </div>
 
              <div class="form-outline mb-4">
                  <input type="password" id="" name="cpassword" class="form-control" placeholder="Confirm Password" required/>
              </div>
              
              <div class="form-outline mb-4">
                  <input type="text" id="" name="phone" class="form-control" placeholder="Phone" required/>
              </div>
              <div class="form-outline mb-4">
              <input type="file" name="photo" class="form-control" id="customFile" />
              </div>
            
              
                <div>
                <input type="submit" class="btn bg-primary text-light" name="submit" ></button>
                </div>
      
                <div class="form-outline mb-2 mt-3">
                    <a
                        href="login.php"
                        class="btn bg-success text-light"
                    >
                        Already have an account?
                    </a>
                </div>
        </div>
           
    </form>
   
  </div>        
    </div>
</div>       
</div>
<?php
    require "footer.php";
?>