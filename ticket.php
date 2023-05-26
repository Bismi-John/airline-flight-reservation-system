<?php
    require 'connection.php';
    session_start();
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
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
   echo "<script>
        window.location='login.php'
    </script>";
    }
   ?>
<?php
    require 'header.php';
    ?>  
<div id="editor">
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
                            ><h5>Contact us</h5></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#"
                            ><h5>Ticket</h5></a
                        >
                    </li>
                </ul>
                <form class="d-flex" method="POST" action="">
                    <ul class="navbar-nav  ">
                        <li class="nav-item">
                            <form action="" method="POST" class="">
                                <input class="btn btn-secondary" type="" name="dashboard" value="dashboard">
                            </form>
                        </li>
                        <li class="nav-item ms-3 ">
                            <form action="" method="POST" class="">
                                <input class="btn btn-lg btn-secondary text-warning" type="submit" name="logout" value="logout">
                            </form>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
<div class="container-fluid ">
     <div class=" row justify-content-center p-lg-5 my-lg-5 p-0 m-0">
       <div class=" row  w-100 justify-content-center ">
            <div class="row w-75 border border-primary p-lg-5 p-0 bgimage  rounded-5">
                   <h1 class="text-center">TICKET</h1>
                   <table class="">
                        <thead>
                            <th >NAME</th>
                            <th>class</th>
                        
                            
                            
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
                <table class="table  table-striped mt-4">
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
            <p class="text-center text-danger">GATE CLOSES 40MIN BEFORE DEPARTURE</p>
         </div>
          
       </div>
      
      
     </div> 
     </div>
</div>
<div class="text-center">
    
    <p>
      <button type="button" onclick="generatePDF()" class=" pull-right">download</button>
    </p>
  </div> 
</div>
<?php
require 'footer.php';
?>
