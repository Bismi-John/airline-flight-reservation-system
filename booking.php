<?php
    session_start();
    require "connection.php";
    if(isset($_POST['book'])){
        if(isset($_SESSION['email'])){
            // header("Location:passenger.php");
            echo "<script>
                    window.location='passenger.php'
                </script>";

        }
        else{
            // header("Location:login1.php");
            echo "<script>
                    window.location='login1.php'
                </script>";

        }

    }
    
?>
<?php
    require "header.php";
?>
<?php
  
    $sql='SELECT * FROM airport';
    $statement=$connection->prepare($sql);
    $statement->execute();
    $airports=$statement->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['depart'])&&isset($_POST['arrival'])&&isset($_POST['date'])){
       $depart= $_POST['depart'];
       $arrival= $_POST['arrival'];
       $date= $_POST['date'];

       $_SESSION['depart']=$_POST['depart'];
       $_SESSION['arrival']=$_POST['arrival'];
       $_SESSION['date']=$_POST['date'];
     

        $sql='SELECT * from fly where d_airport_id=:depart AND a_airport_id=:arrival AND d_date=:date';
        $statement=$connection->prepare($sql);
        $statement->execute([':depart'=>$depart,':arrival'=>$arrival,':date'=>$date]);
        $flights=$statement->fetchAll(PDO::FETCH_OBJ);
        $x=$flights[0]->id;
        $_SESSION['fly_id']=$x;
        
    }
    // if(isset($_POST['logout'])){
    //     session_unset();
    //     session_destroy();
    //     header("Location:login.php");
    
    // }


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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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

    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">Flight Details</h1>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Date</th>
                        <th>Economy Rate</th>
                        <th>Business Rate</th>
                        <th class="text-center">Book tickets</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            $i=1;
             foreach($flights as $flight): ?>
                <tr>
                    <!-- <td><?= $i?></td> -->
                    <?php 
                        $id=$flight->flight_id;
                        $depart=$flight->d_airport_id;
                        $arrival=$flight->a_airport_id;

                        $sql='SELECT * FROM flight where id=:id';
                        $statement=$connection->prepare($sql);
                        $statement->execute([':id'=>$id]);
                        $fly=$statement->fetch(PDO::FETCH_OBJ);
                        

                        $sql='SELECT * FROM airport where id=:id';
                        $statement=$connection->prepare($sql);
                        $statement->execute([':id'=>$depart]);
                        $depart_name=$statement->fetch(PDO::FETCH_OBJ);

                       
                        $sql='SELECT * FROM airport where id=:id';
                        $statement=$connection->prepare($sql);
                        $statement->execute([':id'=>$arrival]);
                        $arrival_name=$statement->fetch(PDO::FETCH_OBJ);

                        $sql='SELECT * FROM fare where fly_id=:id';
                        $statement=$connection->prepare($sql);
                        $statement->execute([':id'=>$flight->id]);
                        $fare=$statement->fetch(PDO::FETCH_OBJ);?>
                        
                        
                        <td><?=$fly->name?></td>
                        <td><?= $depart_name->name ?></td>
                        <td><?= $arrival_name->name ?></td>
                        <td><?= $flight->d_date ?></td>
                        <td ><?= $flight-> e_fare?></td>
                        <td ><?= $flight->b_fare?></td>
                        <td><form action="" method="POST"><input type="submit" name="book" value="Book Now"></form></td>
                         <!--<td><form ><i href="passenger.php?id=<?=$flight->id ?>"class="btn btn-success">BOOK NOW</a></form> -->
                    
                </td>
                        
                </td>
                </tr>
            <tr>
            
            <?php
            $i=$i+1;
             endforeach ?>
        </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    require "footer.php";
?>