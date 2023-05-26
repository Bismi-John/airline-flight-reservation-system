<?php
    require '../connection.php';
?>
<?php
    require '../header.php';
?>
<?php
if(isset($_POST['delete']))
{
    $id=$_POST['delete'];
    try{ 
        $query="DELETE FROM airline WHERE id=:id";
        $statement=$connection->prepare($query);
        $data=[':id'=>$id];
        $query_execute=$statement->execute($data);

        $query="DELETE FROM flight WHERE _id=:$id";
        $statement=$connection->prepare($query);
        $data1=[':id'=>$id];
        $query_execute=$statement->execute($data1);

        if($query_execute)
        {
            echo "<script>alert('deleted successfully')</script>";
            header('location:view_airlines.php');
            exit(0);
        }
        else{
            echo "<script>alert('unsuccessfull')</script>";
            header("location:view_airlines.php");
            exit(0);
            }
      }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
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
                    <button class="btn btn-primary fw-bold" type="submit">
                        Logout
                    </button>
                
            </div>
        </div>
    </nav>
<?php
require '../footer.php';
?>