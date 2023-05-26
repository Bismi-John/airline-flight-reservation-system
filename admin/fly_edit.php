<?php
    
    require '../connection.php';
?>
<?php
    require '../header.php';

    $id=$_GET['id'];
   
        $sql="SELECT * FROM fly WHERE id=:id";
        $statement=$connection->prepare($sql);
        $statement->execute([':id'=>$id]);
        $flights=$statement->fetch(PDO::FETCH_OBJ);
        $id5=$flights->id;

        // $id5= $flights->id;
        // $sql="SELECT id FROM fly WHERE id=:id";
        // $statement=$connection->prepare($sql);
        // $statement->execute([':id'=>$id5]);
        // $st1=$statement->fetch(PDO::FETCH_OBJ);

        $idd= $flights->flight_id;
        $sql="SELECT name FROM flight WHERE id=:id";
        $statement=$connection->prepare($sql);
        $statement->execute([':id'=>$idd]);
        $st1=$statement->fetch(PDO::FETCH_OBJ);

        $id1= $flights->d_airport_id;
        $sql="SELECT name FROM airport WHERE id=:id";
        $statement=$connection->prepare($sql);
        $statement->execute([':id'=>$id1]);
        $st2=$statement->fetch(PDO::FETCH_OBJ);

        $id2= $flights->a_airport_id;
        $sql="SELECT name FROM airport WHERE id=:id";
        $statement=$connection->prepare($sql);
        $statement->execute([':id'=>$id2]);
        $st3=$statement->fetch(PDO::FETCH_OBJ);
        

        if(isset($_POST['d_airport_id'])&&isset($_POST['a_airport_id'])&&isset($_POST['d_date'])&&isset($_POST['a_date'])&&isset($_POST['d_time'])&&isset($_POST['a_time'])){
           
            $d_airport_id= $_POST['d_airport_id'];
            $a_airport_id= $_POST['a_airport_id'];
            $d_date= $_POST['d_date'];
            $a_date= $_POST['a_date'];
            $d_time= $_POST['d_time'];
            $a_time= $_POST['a_time'];

            // $sql="UPDATE fly SET  d_airport_id=:d_airport_id,a_airport_id=:a_airport_id,d_date=:d_date,a_date=:a_date,d_time=:d_time,a_time=:a_time WHERE id=$id";
            $sql="UPDATE fly SET  d_date=:d_date,a_date=:a_date,d_time=:d_time,a_time=:a_time WHERE id=$id";
            $statement=$connection->prepare($sql);
            
            // if($statement -> execute([':d_airport_id'=>$d_airport_id,':a_airport_id'=>$a_airport_id,':d_date'=>$d_date,':a_date'=>$a_date,':d_time'=>$d_time,':a_time'=>$a_time])){
                if($statement -> execute([':d_date'=>$d_date,':a_date'=>$a_date,':d_time'=>$d_time,':a_time'=>$a_time])){
            
                $sql=('SELECT * FROM fly WHERE id = :id');
                $stmt = $connection->prepare($sql);
                $stmt->execute(['id' => $id]);
                $user2 = $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION['status'] = "schedule edited sucessfullly";
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
<div class="container w-25 mt-2 ">
        <form method="POST" action=""  onsubmit="return validate()">
            <h2 name="flight_name"><?=$st1->name?></h2>
            <div class="mb-2">
                <input type="text" id="" name="d_airport_id" value="<?=$st2->name?>" class="form-control bg-light " required>
            </div>
            <div class="mb-2">
                <input type="text" id="" name="a_airport_id" value="<?=$st3->name?>" class="form-control bg-light" required>
            </div>
            <div class="mb-2">
                <input type="text" id="" name="d_date" value="<?=$flights->d_date?>" class="form-control bg-light" required>
            </div>
            <div class="mb-2">
                <input type="text" id="" name="d_time" value="<?=$flights->d_time?>" class="form-control bg-light" required>
            </div>
            <div class="mb-2">
                <input type="text" id="" name="a_date" value="<?=$flights->a_date?>" class="form-control bg-light" required>
            </div>
            <div class="mb-2">
                <input type="text" id="" name="a_time" value="<?=$flights->a_time?>" class="form-control bg-light"required>
            </div>
            <div>
                <button class="btn bg-primary" type="submit" name="submit">Update</button> 
                
            </div>
        </form>
    </div>
    <?php

require '../footer.php';
?>
