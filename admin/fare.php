<?php
    require "../connection.php";
    require "../header.php";          
?>
    <?php
   
    $id=$_GET['id'];

    $sql="SELECT * FROM fly WHERE id=:id";
    $statement=$connection->prepare($sql);
    $statement->execute([':id'=>$id]);
    $flights=$statement->fetch(PDO::FETCH_OBJ);
    $id1=$flights->id;

    $idd= $flights->flight_id;
    $sql="SELECT name FROM flight WHERE id=:id";
    $statement=$connection->prepare($sql);
    $statement->execute([':id'=>$idd]);
    $st2=$statement->fetch(PDO::FETCH_OBJ);

    $id3= $flights->flight_id;
    $sql="SELECT total_seat FROM flight WHERE id=:id";
    $statement=$connection->prepare($sql);
    $statement->execute([':id'=>$id3]);
    $st3=$statement->fetch(PDO::FETCH_OBJ);

      if(isset($_POST['submit'])){
     
        $b_seat= $_POST['b_seat'];
        $e_seat= $_POST['e_seat'];
        $e_fare= $_POST['e_fare'];
        $b_fare= $_POST['b_fare'];
      

        // $sql = "INSERT into fly(b_seat,e_seat,e_fare,b_fare) VALUES (:b_seat,:e_seat,:e_fare,:b_fare)where id=$id";
        $sql="UPDATE fly SET  b_seat=:b_seat,e_seat=:e_seat,e_fare=:e_fare,b_fare=:b_fare WHERE id=$id";
        $statement = $connection -> prepare($sql);
        if($statement -> execute([':b_seat'=>$b_seat,':e_seat'=>$e_seat,':e_fare'=>$e_fare,':b_fare'=>$b_fare])){
            $_SESSION['status'] = "price added sucessfullly";
            $_SESSION['status_code']="success";
            $_SESSION['message']="SUCCESS";
            $_SESSION['page']="list_flightss.php"; 
    
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

    <div class="container col-12 col-sm-6 align-items-center bg-light mt-5">
        <div class="mb-5 text-center">
            <h1>FLIGHT PRICE</h1>
        </div>
        <?php
          if (isset($error_message)) {
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                    <strong>Airport already exist</strong> You have to re-enter
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
           }
        ?>
        <form action="" method="POST" class="justify-content-center" onsubmit="return price()">
        <h3 name="name" >Flight: <?=$st2->name?></h3>
                 <h6 name="total_seat">Total seat: <?=$st3->total_seat?></h6>   
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Business seats</label
                    >
                    <div class="col-sm-4">
                        <input
                            type="number" name="b_seat" id="b"
                            placeholder=""
                            value=""
                            class="form-control" 
                        />
                    </div>
                    
                </div>
                
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Economy seats</label
                    >
                    <div class="col-sm-4">
                        <input
                            type="number" name="e_seat" id="e"
                            placeholder=""
                            value=""
                            class="form-control" 
                        />
                    </div>
                    
                </div>
                    
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label"
                        >Economy rate</label
                    >
                    <div class="col-sm-4">
                        <input
                            type="number" name="e_fare" id="er"
                            placeholder="Price"
                            value=""
                            class="form-control" 
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label"
                        >Business rate</label
                    >
                    <div class="col-sm-4">
                        <input
                            type="number" name="b_fare" id="br"
                            placeholder="Price"
                            value=""
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="text-center p-2">
                    <button class="btn btn-primary" name="submit" type="submit" name="submit">Add price</button>
                </div>
            </div>
        </form>
    </div>

</div>

<?php
    require "../footer.php";
?>