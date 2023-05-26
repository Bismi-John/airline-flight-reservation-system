<?php
    require 'connection.php';
    session_start();
?>

<?php
    require 'header.php';
if(!isset($_SESSION['email'])){
    
}
else{
    $id=$_SESSION['email'];
    $sql='SELECT * FROM registration WHERE email=:id';
    $stmt=$connection->prepare($sql);
    $stmt->execute([':id'=>$id]);
    $reg=$stmt->fetch(PDO::FETCH_OBJ);
}
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
   echo "<script>
        window.location='login.php'
    </script>";
    }
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
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#"
                            ><h5>Ticket</h5></a
                        >
                    </li>
                </ul>
                <form class="d-flex me-2" method="POST" action="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-2">
                        <form action="" method="POST" class="d-flex me-2">
                        <input class="btn btn-lg btn-secondary text-warning" type="submit" name="logout" value="logout">
                    </form>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center fonts">Welcome <?=$reg->name?></h1>
        <div class="text-center mt-5">
            <a href="index.php" class="btn btn-success btn-lg">Search flights</a>
        </div>
    </div>
</div>
<?php
    require 'footer.php';
?>