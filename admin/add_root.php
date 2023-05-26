<?php
    require "../connection.php";
    require "../header.php";          
?>
    <?php
   
    // airport
$sql="SELECT * FROM airport";
$statement=$connection->prepare($sql);
$statement->execute();
$airports=$statement->fetchAll(PDO::FETCH_ASSOC);

$sql="SELECT * FROM flight";
$statement=$connection->prepare($sql);
$statement->execute();
$flights=$statement->fetchAll(PDO::FETCH_ASSOC);

       

      if(isset($_POST['submit'])){
       
        $flight_name= $_POST['flight_name'];
        $source= $_POST['source'];
        $dest= $_POST['dest'];
        $d_date= $_POST['d_date'];
        $a_date= $_POST['a_date'];
        $d_time= $_POST['d_time'];
        $a_time= $_POST['a_time'];
       

       
        
        $sql="SELECT id FROM airport WHERE name=:name";
        $statement=$connection->prepare($sql);
        $statement->execute([':name'=>$source]);
        $airports=$statement->fetch(PDO::FETCH_ASSOC);
        $id=$airports['id'];

        $sql="SELECT id FROM airport WHERE name=:name";
        $statement=$connection->prepare($sql);
        $statement->execute([':name'=>$dest]);
        $airports=$statement->fetch(PDO::FETCH_ASSOC);
        $id1=$airports['id'];

        $sql="SELECT id FROM flight WHERE name=:name";
        $statement=$connection->prepare($sql);
        $statement->execute([':name'=>$flight_name]);
        $flights=$statement->fetch(PDO::FETCH_ASSOC);
        $id3=$flights['id'];

        


        $sql = 'INSERT into fly (flight_id,d_airport_id,a_airport_id,d_date,a_date,d_time,a_time) VALUES (:flight_id,:d_airport_id,:a_airport_id,:d_date,:a_date,:d_time,:a_time)';
        $statement = $connection -> prepare($sql);
        if($statement -> execute([':flight_id'=>$id3,':d_airport_id'=>$id,':a_airport_id'=>$id1,':d_date'=>$d_date,':a_date'=>$a_date,':d_time'=>$d_time,':a_time'=>$a_time])){
            $_SESSION['status'] = "data added sucessfullly";
            $_SESSION['status_code']="success";
            $_SESSION['message']="SUCCESS";
            $_SESSION['page']="view_airport.php"; 
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
            <h1>FLIGHT ROOT</h1>
        </div>
        <?php
          if (isset($error_message)) {
            echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">
                    <strong>Airport already exist</strong> You have to re-enter
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
           }
        ?>
        <form action="" method="POST">
            <div>
                
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Flight Name</label>
                    <div class="col-sm-9">
                       
                       <select class="form-select " name="flight_name" id="fly">
                        <option>Flight</option>
                            <?php 
                                foreach ($flights as $fly) {
                            ?>
                        <option>
                        <?php echo $fly['name']; ?> </option>
             <?php 
                 }
            ?>   
                       </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Source</label>
                    <div class="col-sm-9">
                    <select class="form-select " name="source" id="air" >
                        <option></option>
                        <?php 
                                foreach ($airports as $port) {
                            ?>
                        <option>
                        <?php echo $port['name']; ?> </option>
             <?php 
                 }
            ?>   
                        
                    </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Destination</label
                    >
                    <div class="col-sm-9">
                    <select class="form-select " name="dest" id="air">
                        <option></option>
                        <?php 
                                foreach ($airports as $port) {
                            ?>
                        <option>
                        <?php echo $port['name']; ?> </option>
             <?php 
                 }
            ?>   
                        
                    </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Departure Date</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="date" name="d_date"
                            placeholder="Departure Date"
                            value=""
                            class="form-control" id="date"
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Arrival Date
                    </label>
                    <div class="col-sm-9">
                        <input
                            type="date" name="a_date"
                            placeholder="Arrival Date"
                            value=""
                            class="form-control" id="date"
                        />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Departure Time</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="time" name="d_time"
                            placeholder="Departure Time"
                            value=""
                            class="form-control" id="time"
                        />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"
                        >Arrival Time</label
                    >
                    <div class="col-sm-9">
                        <input
                            type="time" name="a_time"
                            placeholder="Arrival Time"
                            value=""
                            class="form-control" id="time"
                        />
                    </div>
                </div>

                
                <div class="text-center p-2">
                
                <button class="btn btn-primary" type="submit" name="submit">Add root</button>
               
                </div>
            </div>
        </form>
    </div>

</div>

<?php
    require "../footer.php";
?>

