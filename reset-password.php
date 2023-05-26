<?php
require "connection.php";


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    if(isset($_POST['pass'])&&isset(($_POST['cpass']))){
        $pass=md5($_POST['pass']);
        $cpass=md5($_POST['cpass']);
        if($pass!=$cpass){
            echo"Password not same";
        }
        else{
            // $pass=md5($cpass);
            $sql='UPDATE registration SET password=:pass WHERE token=:token';
            $statement=$connection->prepare($sql);
            if($statement->execute(['pass'=>$pass,'token'=>$token])){
                echo "Success";
            }
            else{
                echo "Failed";
            }
        }

    }
}
else{
    echo "Token not found";
}


?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <title>Send Reset Password Link with Expiry Time in PHP MySQL</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
    <div class="">
        <form action="" method="post" class="w-50 text-center">
                                    
            <div id="pass_div" class="mt-3">
                    <input type="password" placeholder="Password" class="form-control " id="" name="pass">
                    <input type="password" placeholder="Confirm Password" class="form-control mt-2" id="" name="cpass">
                    <input type="submit" value="Submit" class="btn btn-success d-block mt-3 w-100" />
                    <a href="login.php"class="btn btn-success m-3">back to login</a>
            </div>
                                        
                                        
        </form>
        </div>

    </body>
</html>