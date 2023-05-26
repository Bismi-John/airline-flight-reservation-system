<?php
    session_start();
    require 'connection.php';
    // if(!isset($_SESSION['email'])){
    //     header("Location:passenger.php");
    // }
?>
<?php
    require 'header.php';
?>
<?php 

$depart1=$_SESSION['depart'];
$arrival=$_SESSION['arrival'];
$fly_id=$_SESSION['fly_id'];
$u_id=$_SESSION['user_id'];
// echo $u_id;
// echo $depart1;
// echo $fly_id;
$sql='SELECT * FROM fly where id=:fly_id';
    $statement=$connection->prepare($sql);
    $statement->execute([':fly_id'=>$fly_id]);
    $f=$statement->fetch(PDO::FETCH_OBJ);
    $bf=$f->b_fare;
    $ef=$f->e_fare;

$sql='SELECT name FROM airport where id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$depart1]);
$depart_name=$statement->fetch(PDO::FETCH_OBJ);

$sql='SELECT name FROM airport where id=:id';
$statement=$connection->prepare($sql);
$statement->execute([':id'=>$arrival]);
$arrival_name=$statement->fetch(PDO::FETCH_OBJ);




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

if(isset($_POST['make-payment'])){
    $name1=$_POST['p1'];
    $name2=$_POST['p2'];
    $name3=$_POST['p3'];
    $c1=$_POST['c1'];
    $c2=$_POST['c2'];
    $c3=$_POST['c3'];
    $c=array($c1,$c2,$c3);
    $k=array($name1,$name2,$name3);
    $class=array();
    $name=array();
   
    $j=0;
    for($i=0;$i<3;$i++){
        if($c[$i]==0||$c[$i]==1){
            $class[$j]=$c[$i];
            $name[$j]=$k[$i];
           
            $j++;
        }
    }
    $_SESSION["name"] = $name;
    $_SESSION["class"] = $class;
    $n=count($class);
    // echo $n;
    $sql='SELECT * FROM fly where id=:fly_id';
    $statement=$connection->prepare($sql);
    $statement->execute([':fly_id'=>$fly_id]);
    $f=$statement->fetch(PDO::FETCH_OBJ);
    $b= $f->b_seat;
    $e=$f->e_seat;
    $bf=$f->b_fare;
    $ef=$f->e_fare;
    $tot=0;
    $_SESSION["price"] =$tot;
    for($i=0;$i<$n;$i++){
        if($class[$i]==0){
            $b=$b-1;
            $tot=$tot+$bf;
            $c="business";
        }
        else{
            $e=$e-1;
            $tot=$tot+$ef;
            $c="economy";
        }
        $sql='UPDATE fly SET b_seat=:b_seat,e_seat=:e_seat WHERE id=:fly_id';
        $statement=$connection->prepare($sql);
        $statement->execute([':b_seat'=>$b,':e_seat'=>$e,':fly_id'=>$fly_id]);

        // updating passenger table 
        $sql='INSERT INTO passenger (name,fly_id,u_id,class) VALUES (:name,:fly_id,:uid,:class)';
        $statement=$connection->prepare($sql);
        if($statement->execute([':name'=>$name[$i],':fly_id'=>$fly_id,':uid'=>$u_id,':class'=>$c])){
            echo "Sucess";
        }
    }
    $_SESSION["price"] =$tot;
    header("Location: paymentdetails.php");
    
    
}   



?>

<div class="container-fluid row m-0 p-0 ">
    <div
        class="container col-md-9 mt-5  bg-light rounded-4 justify-content-center align-items-center"
    >
        <h3 class="fw-bolder text-center ms-5 mt-4">
            PASSENGER COUNT: <span id="passengerCount">1</span>

            <button
                class="btn btn-secondary"
                id="plus"
                onclick="addPassenger()"
            >
                +
            </button>
            <button
                class="btn btn-secondary"
                id="minus"
                onclick="subtractpassenger()"
            >
                −
            </button>
        </h3>
        <form action="" method="post">
            <div class="row justify-content-center p-4">
                <div class="rounded-3 p-3">
                    <div class="row mb-4">
                        <div class="col-md-5 m-0">
                            <label class="fw-bold" for="">PASSENGER 1</label>
                            <input
                                type="text"
                                name="p1"
                                id=""
                                placeholder="NAME"
                                class="form-control mt-2"
                            />
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold" for="">SEAT</label>
                            <select
                                class="form-select form-control mt-2"
                                aria-label="Default select example" name="c1"
                            >
                                <option selected>Select Seat</option>
                                <option value=0>
                                    Business Class
                                </option>
                                <option value=1>
                                    Economy class
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 m-0">
                            <label class="fw-bold" for="">FARE FOR BUSINESS CLASS </label>
                                <P><?php echo $bf; ?></P>
                            <label class="fw-bold" for="">FARE FOR ECONOMIC CLASS </label>
                                <P><?php echo $ef; ?></P>
                            
                            <p></p>
                        </div>
                    </div>

                    <div class="row mb-4" id="passenger2">
                        <div class="col-md-5 m-0">
                            <label class="fw-bold" for="">PASSENGER 2</label>
                            <input
                                type="text"
                                name="p2"
                                id=""
                                placeholder="NAME"
                                class="form-control mt-2"
                            />
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold" for="">SEAT</label>
                            <select
                                class="form-select form-control mt-2"
                                aria-label="Default select example" name="c2"
                            >
                                <option selected>Select Seat</option>
                                <option value=0>
                                    Business Class
                                </option>
                                <option value=1>
                                    Economy class
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 m-0">
                            <!-- <label class="fw-bold" for="">FARE</label> -->
                        </div>
                    </div>
                    <div class="row mb-4" id="passenger3">
                        <div class="col-md-5 m-0">
                            <label class="fw-bold" for="">PASSENGER 3</label>
                            <input
                                type="text"
                                name="p3"
                                id=""
                                placeholder="NAME"
                                class="form-control mt-2"
                            />
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold" for="">SEAT</label>
                            <select
                                class="form-select form-control mt-2"
                                aria-label="Default select example" name="c3"
                            >
                                <option selected>Select Seat</option>
                                <option value=0>
                                    Business Class
                                </option>
                                <option value=1>
                                    Economy class
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 m-0">
                            <!-- <label class="fw-bold" for="">FARE</label> -->
                        </div>
                    </div>

                    <div class="row mb-4 mt-5">
                        <div class="col-5 col-sm-5 text-md-start">
                            <!--  place From   -->
                            <h5 class="fw-bolder">From</h5>
                            <p class="mb-0 text-grey">
                                <?= $depart_name->name ?>
                            </p>
                        </div>

                        <div class="col-2 text-center">
                            <i class="fa-solid fa-plane"></i>
                        </div>

                        <div class="col-5 col-sm-5">
                            <!--  place From   -->
                            <h5 class="fw-bolder">To</h5>
                            <p class="mb-0 text-grey">
                                <?= $arrival_name->name ?>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h5 class="fw-bold">
                                Departure:<?= $depart_name->name ?>
                            </h5>
                            <h5 class="fw-bold">
                                Departure Date:<?= $depart_date->d_date ?>
                            </h5>
                            <h5 class="fw-bold">
                                Departure Time:<?= $depart_time->d_time ?>
                            </h5>
                        </div>

                        <div class="col-6">
                            <h5 class="fw-bold">
                                Arrival:<?= $arrival_name->name ?>
                            </h5>
                            <h5 class="fw-bold">
                                Arrival Date:<?= $arrival_date->a_date ?>
                            </h5>
                            <h5 class="fw-bold">
                                Arrival Time:<?= $arrival_time->a_time?>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
            <div class="row m-0 p-0">
                <div class="fw-bolder mt-3 col-7 ms-5 fs-3"></P></div>
                <div class="col-3 mt-3">
                    <input type="submit" value="Make Payment" name="make-payment" class="btn btn-success text-light fw-bolder p-2">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require 'footer.php';
?>