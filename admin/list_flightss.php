<?php
    require '../connection.php';
    require '../header.php';
  
//     $sql='SELECT  * FROM fly';
//     $developer_records = array();

// $stmt = $connection->prepare($sql);
// $stmt->execute();


// // $user = $stmt->fetch(PDO::FETCH_OBJ);
// while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     $developer_records[] = $rows;
// }
// if (isset($_POST["export_data"])) {
//     $filename = "excel" . ".xls";
//     header("Content-Type: application/vnd.ms-excel");
//     header("Content-Disposition: attachment; filename=\"$filename\"");
//     $show_coloumn = false;
//     if (!empty($developer_records)) {
//         foreach ($developer_records as $record) {
//             if (!$show_coloumn) {
//                 // display field/column names in first row
//                 echo implode("\t", array_keys($record)) . "\n";
//                 $show_coloumn = true;
//             }
//             echo implode("\t", array_values($record)) . "\n";
//         }
//     }
//     exit;
// }
    $sql='SELECT  * FROM fly';
    $statement=$connection->prepare($sql);
    $statement->execute();
    $flights=$statement->fetchAll(PDO::FETCH_OBJ);

    

    if(isset($_POST['submit'])){
       
        $flight_name=$_POST['flight_name'];
        $dname=$_POST['d_airport_name'];
        $aname=$_POST['a_airport_name'];
        $a='admin';
    
        $sql='SELECT * FROM flight WHERE name=:name';
        $sta=$connection->prepare($sql);
        $sta->execute([':name'=>$flight_name]);
        $fs=$sta->fetch(PDO::FETCH_OBJ);
        $fid=$fs->id;

        $sql='SELECT * FROM airline WHERE name=:name';
        $sta=$connection->prepare($sql);
        $sta->execute([':name'=>$airline_name]);
        $airline=$sta->fetch(PDO::FETCH_OBJ);
        $aid=$airline->id;

        $q='SELECT * FROM airport WHERE name=:n';
        $sta=$connection->prepare($q);
        $sta->execute([':n'=>$dname]);
        $departures=$sta->fetch(PDO::FETCH_OBJ);
        $did=$departures->id;

        $q='SELECT * FROM airport WHERE name=:n';
        $sta=$connection->prepare($q);
        $sta->execute([':n'=>$aname]);
        $arrivals=$sta->fetch(PDO::FETCH_OBJ);
        $aid=$arrivals->id;

        

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

    <div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <div class="mt-5">
            <h2 class="text-center">Flights</h2>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Sl.no</th>
                        
                        <th>Flight name</th>
                        <th>source</th>
                        <th>Destination</th>
                        <th>Dept_date</th>
                        <th>Arr_date</th>
                        <th>Dept_time</th>
                        <th>Arr_time</th>
                        <th>B_seat</th>
                        <th>E_seat</th>
                        <th>B_fare</th>
                        <th>E_fare</th>
                        
                        <th colspan="3"class="text-center">Action</th>
                    </tr>
                </thead>
                
        <tbody>
            <?php
            $i=1;
            foreach($flights as $flight): ?>
            <tr>
                    <td><?= $i ?></td>
                    

                    <?php
                    $F= $flight->flight_id;
                    $sql='SELECT name FROM flight WHERE id=:id';
                    $statement=$connection->prepare($sql);
                    $statement->execute([':id'=>$F]);
                    $st=$statement->fetch(PDO::FETCH_OBJ);
                    
                    
                    ?>
                    <td><?=$st->name;?></td>
                    
                    <?php
                    $d= $flight->d_airport_id;
                    $sql='SELECT name FROM airport WHERE id=:id';
                    $statement=$connection->prepare($sql);
                    $statement->execute([':id'=>$d]);
                    $st1=$statement->fetch(PDO::FETCH_OBJ);
                    ?>
                    <td><?=$st1->name;?></td>

                    <?php
                    $d= $flight->a_airport_id;
                    $sql='SELECT name FROM airport WHERE id=:id';
                    $statement=$connection->prepare($sql);
                    $statement->execute([':id'=>$d]);
                    $st1=$statement->fetch(PDO::FETCH_OBJ);
                    ?>
                    <td><?=$st1->name;?></td>
                    <td><?=$flight->d_date;?></td>
                    <td><?=$flight->a_date;?></td>
                    <td><?=$flight->d_time;?></td>
                    <td><?=$flight->a_time;?></td>
                    <td><?=$flight->b_seat;?></td>
                    <td><?=$flight->e_seat;?></td>
                    <td><?=$flight->b_fare;?></td>
                    <td><?=$flight->e_fare;?></td>
                   
                    
                <td ><a href="fare.php?id=<?=$flight->id; ?>" class="btn btn-success" >Price</a></td>
                <td ><a href="fly_edit.php?id=<?=$flight->id; ?>" class="btn btn-secondary" >Edit</a></td> 
                      
            <tr>

            
            <?php
            $i=$i+1;
             endforeach ?>
        </tbody>
    </table>
   
            <button type="" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
        </form>
</div> 
<?php

    require '../footer.php';
?>

