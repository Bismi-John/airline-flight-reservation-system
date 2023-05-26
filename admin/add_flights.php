<?php
    require "../connection.php";
    require "../header.php";          
?>
    <?php
   $id=$_GET['id'];
    
   $sql='SELECT * FROM airline WHERE id=:id';
   $statement=$connection->prepare($sql);
   $statement->execute([':id'=>$id]);
   $st1=$statement->fetch(PDO::FETCH_OBJ);


      if(isset($_POST['submit'])){

        $flight_name= $_POST['flight_name'];
        $total_seat= $_POST['total_seat'];
        
        $sql='SELECT * FROM flight WHERE name =:name LIMIT 1';
        $stmt = $connection->prepare($sql);
        $stmt->execute([':name' => $flight_name]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) { // email already exists
            
            $error_message="flight name already exists";
        }
    
     else { // email does not exist
        $sql = "INSERT INTO flight(name,airline_id,total_seat) VALUES (:name,:airline_id,:total_seat)";
        $statement = $connection -> prepare($sql);
        if($statement->execute([':name'=>$flight_name,':total_seat'=>$total_seat,':airline_id'=>$id])){
    
            $_SESSION['status'] = "data added sucessfullly";
            $_SESSION['status_code']="success";
            $_SESSION['message']="SUCCESS";
            $_SESSION['page']="flight_view.php";           
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
<div class="container-fluid main m-0 p-0">
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
                <form action="" method="POST" class="d-flex me-2">
                    
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

    <div class="container col-12 col-sm-6 align-items-center bg-light mt-5">
        <div class="mb-5 text-center">
            <h1>ADD FLIGHT </h1>
        </div>
        <?php
          if (isset($error_message)) {
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                    <strong>Flight already exist</strong> You have to re-enter
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
           }
        ?>
        <form action="" method="POST" onsubmit="return flight()">
            <div>
                <div class="mb-3 row">
                   
                    <h3 name="airline_name" class="fw-bold text-center"><span><?=$st1->name?></h3>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Flight Name</label>
                    <div class="col-sm-9">
                        <input
                            type="text" name="flight_name"
                            placeholder="Name"
                            value=""
                            class="form-control"id="fly"
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Total seat</label>
                    <div class="col-sm-9">
                        <input
                            type="text" name="total_seat"
                            placeholder="total seat"
                            value=""
                            class="form-control" id="seat"
                        />
                    </div>
                </div>
               
                
                <div class="text-center p-2">
                    <button class="btn btn-primary" name="submit" type="submit">Add Flight</button>
                </div>
            </div>
        </form>
    </div>

</div>

<?php
    require "../footer.php";
?>
