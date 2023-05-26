<?php
    
    require '../connection.php';
?>
<?php
    require '../header.php';

    $id=$_GET['id'];
    
    $sql="SELECT * FROM airline WHERE id=:id";
    $statement=$connection->prepare($sql);
    $statement->execute([':id'=>$id]);
    $airline=$statement->fetch(PDO::FETCH_OBJ);

    $idd= $airline->id;
    $sql="SELECT name FROM airline WHERE id=:id";
    $statement=$connection->prepare($sql);
    $statement->execute([':id'=>$idd]);
    $st1=$statement->fetch(PDO::FETCH_OBJ);
        
       

        if(isset($_POST['name'])){
           
            $name= $_POST['name'];

            $sql='SELECT * FROM airline WHERE name =:name LIMIT 1';
            $stmt = $connection->prepare($sql);
            $stmt->execute([':name' => $name]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) { // email already exists
            
                $error_message="airline name already exists";
            }
        
         else {
            $sql="UPDATE airline SET  name=:name WHERE id=$id";
            $statement=$connection->prepare($sql);
            
            if($statement -> execute([':name'=>$name])){
            
                $sql=('SELECT * FROM airline WHERE id = :id');
                $stmt = $connection->prepare($sql);
                $stmt->execute(['id' => $id]);
                $user2 = $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION['status'] = "updated sucessfullly";
            $_SESSION['status_code']="success";
            $_SESSION['message']="SUCCESS";
            $_SESSION['page']="view_airlines.php";  
               
            }
        } 
    } 
        if(isset($_POST['logout'])){
            session_unset();
            session_destroy();
           echo "<script>
                window.location='../login.php'
            </script>";
            }  
?>   
<nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid m-0 p-0">
            <a class="navbar-brand col-md-1"
                ><img src="../images/blue wing.png" class="logo"
            /></a>
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link active text-light fw-bold"
                            aria-current="page"
                            href="dashboard.php"
                            >Admin</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-bold" href="view_airport.php"
                            >List Airport</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-bold" href="flight_view.php"
                            >View Flights</a
                        >
                    </li>
                   <li class="nav-item">
                        <a class="nav-link active text-light fw-bold" href="add_root.php"
                            >Fly</a
                        >
                    </li>
            </ul>
                <form class="d-flex me-2">
                    
                    <div>
                        <a href="add_airport.php" class="btn btn-secondary me-2 fw-bold"
                            >Airports</a
                        >
                    </div>
                </form>
                    <form action="" method="POST" class="d-flex me-2">
                        <input class="btn btn-primary" type="submit" name="logout" value="logout">
                    </form>
                
            </div>
        </div>
    </nav>
<div class="container w-25 mt-2 text-center">
<?php
          if (isset($error_message)) {
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                    <strong>Airline name already exist</strong> You have to re-enter
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
           }
        ?>
        <form method="POST" action=""  onsubmit="return validate()">
            <h2 name="name"><?=$st1->name?></h2>
            <div class="mb-2">
                <input type="text" id="" name="name" value="<?=$st1->name?>" class="form-control bg-light " required>
            </div>
            

            <div>
                <button class="btn bg-primary" type="submit"  name="submit">Update</button> 
                
            </div>
        </form>
    </div>
    <?php

require '../footer.php';
?>

