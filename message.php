<?php
    require 'connection.php';
?>
<?php
    require 'header.php';
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
                        <a class="nav-link active text-light" href="#c4"
                            ><h5>Contact us</h5></a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center mt-5">
        <div>
            <h4>
                Password reset link is sent to your mail. Please check your mail
            </h4>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>

