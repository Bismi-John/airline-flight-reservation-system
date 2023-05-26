<?php
    require 'connection.php';
?>
<?php
    require 'header.php';
    ?>
<?php
   
    $sql='SELECT * FROM airport';
    $statement=$connection->prepare($sql);
    $statement->execute();
    $airports=$statement->fetchAll(PDO::FETCH_OBJ);
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("Location:login.php");
    
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
            <div
                class="collapse navbar-collapse"
                id="navbarSupportedContent"
            >
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link active text-light fw-bold"
                            aria-current="page"
                            href="#"
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
                <form class="d-flex me-2" method="POST" action="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-2">
                            <a
                                href="login.php"
                                class="btn btn-lg bg-secondary text-warning"
                                type="submit"
                            >
                                login
                            </a>
                        </li>
                    </ul>
                    <a
                        href="registration.php"
                        class="btn btn-lg bg-secondary text-warning"
                        type="submit"
                    >
                        signup
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <!--  -->
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div></div>
            </div>
        </nav>
        <div class="col-md-4"></div>
        <div class="col-md-4 home-opacity p-3">
            <div class="clear"></div>

            <h3 class="text-center mb-3 homehead" id="str"></h3>

            <form method="POST" action="booking.php">
                <div class="class container-fluid pe-5">
                    <div class="d-flex">
                        <div class="">
                            <h6
                                style="color: black"
                                class="text-start mt-2"
                            >
                                FROM
                            </h6>
                            <div class="dropdown">
                            <select class="col-md-6 rounded-2 form-control mt-3 fc" name="depart" id="places">
                            <option value="0">Departure</option>
                            <?php foreach($airports as $airport): ?>
                            <option value="<?= $airport->id;?>"><?= $airport->name;?></option>
                            <?php
                            endforeach; ?>
                            
                        </select>

                        </div>
                        <div>
                            <h6
                                style="color: black"
                                class="text-start mt-2"
                            >
                                TO
                            </h6>
                            <div class="dropdown">
                                 <select class="col-md-6 rounded-2 form-control fc mt-3" name="arrival" id="places">
                            <option value="0">Arrival</option>
                            <?php $i=1; foreach($airports as $airport): ?>
                            <option value="<?= $airport->id;?>"><?= $airport->name;?></option>
                            <?php $i=$i+1;
                            endforeach; ?>
                            
                        </select>
                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownMenuButton"
                                >
                                    <a class="dropdown-item" href="#"
                                        >Action</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="date">
                    <div class="depart">
                        <h6
                            style="color: black"
                            class="text-start mt-2 ms-2"
                        >
                            DATE
                        </h6>
                        <input
                            class="form-control ms-2"
                            type="date"
                            placeholder=""
                            name="date"
                        />
                    </div>
                    
                    <div class="clear"></div>
                </div>
                
                

                <div class="clear"></div>
                <div class="text-center">
                    <input
                        type="submit"
                        class="text-center mt-5 btn bg-success text-light"
                        value="Search Flights"
                        name="search_but"
                    />
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php
require 'footer.php';
?>