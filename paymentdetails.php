<?php
session_start();
    require 'connection.php';
   ?>
<?php
    require 'header.php';
    ?>
<?php 

$name=$_SESSION["name"] ;
$class=$_SESSION["class"]; 
$price=$_SESSION["price"] ;
$u_id=$_SESSION['user_id'];
$depart1=$_SESSION['depart'];
$arrival=$_SESSION['arrival'];

  $sql='SELECT * from passenger where u_id=:id ';
  $statement=$connection->prepare($sql);
  $statement->execute([':id'=>$u_id]);
  $fly=$statement->fetchAll(PDO::FETCH_OBJ);
 
   
$sql='SELECT name FROM airport where id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$depart1]);
$depart_name=$statement->fetch(PDO::FETCH_OBJ);
$x=$depart_name->name;
$_SESSION['depart_name']=$x;
// echo $_SESSION['depart_name'];

$sql='SELECT name FROM airport where id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$arrival]);
$arrival_name=$statement->fetch(PDO::FETCH_OBJ);
$y=$arrival_name->name;
$_SESSION['arrival_name']=$y;




$sql='SELECT a_date FROM fly where a_airport_id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$arrival]);
$arrival_date=$statement->fetch(PDO::FETCH_OBJ);

$sql='SELECT a_time FROM fly where a_airport_id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$arrival]);
$arrival_time=$statement->fetch(PDO::FETCH_OBJ);

$sql='SELECT d_time FROM fly where d_airport_id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$depart1]);
$depart_time=$statement->fetch(PDO::FETCH_OBJ);

$sql='SELECT d_date FROM fly where d_airport_id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$depart1]);
$depart_date=$statement->fetch(PDO::FETCH_OBJ);


 ?>
<div class="container-fluid hero-background min-vh-100">
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
                        <a class="nav-link active text-light" href="#c4"
                            ><h5>Contact us</h5></a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="mt-5">
            <h2 class="text-center">Passengers Details</h2>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr class="">
                        <th>Passenger Name</th>
                        <th>Class</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            $i=1;
             foreach($fly as $flys): ?>
                    <tr>
                    <?php 
                        $name=$flys->name;
                        $class=$flys->class;
                        
                        ?>
                        <td><?=$flys->name?></td>
                        <td><?=$flys->class?></td>
                      
                    </tr>
                    <?php
            $i=$i+1;
             endforeach ?>
                </tbody>
            </table>
           
            <div class="table-responsive">
                <table class="table table-dark table-striped mt-4">
                    <thead>
                        <tr class="">
                            <th>Dept_airport</th>
                            <th>Arr_airport</th>
                            <th>Dept_date</th>
                            <th>Arr_date</th>
                            <th>dept_time</th>
                            <th>Arr_time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=$depart_name-> name; ?></td>
                            <td> <?= $arrival_name->name ?></td>
                            <td><?= $depart_date->d_date ?></td>
                            <td><?= $arrival_date->a_date ?></td>
                            <td><?= $depart_time->d_time ?></td>
                            <td><?= $arrival_time->a_time?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-warning rounded-4 text-center w-25 p-1 mx-auto">Total Fare:<h1><?= $price;?></h1></div>
        <div class="text-center rounded-3">
            <a class="btn btn-lg btn-success mt-5" href="payment/pay.php"
                >Make Payment</a
            >
        </div>
        <hr />
        <footer class="mt-3 text-center text-white">
            &copy;Travel story
            <div class="row mt-3" id="c4">
                <div class="col-sm-4"></div>
                <div class="col-sm-2">
                    <h6>Email</h6>
                    <p>travelstory@gmail.com</p>
                </div>
                <div class="col-sm-2">
                    <h6>Phone</h6>
                    <p>9876543210</p>
                </div>
            </div>
        </footer>
    </div>
    
    
</div>

<?php
require 'footer.php';
