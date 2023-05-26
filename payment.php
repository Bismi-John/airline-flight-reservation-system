<?php
    require "connection.php";
    require "header.php";          
?>

<div class="container-fluid p-0 background">
        <div class="card px-4">
            <h3 class="text-center">Payment Details</h3>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Person Name</p>
                        <input class="form-control mb-3  bg-secondary text-light" type="text" placeholder="Name" value="Barry Allen">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Flight Name</p>
                        <input class="form-control mb-3  bg-secondary text-light" type="text" placeholder="Flight Name" value="Boing">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Mobile</p>
                        <input class="form-control mb-3 bg-secondary text-light" type="text" placeholder="xxx xxx xxxx">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number</p>
                        <input class="form-control mb-3 bg-secondary text-light" type="text" placeholder="1234 5678 435678">
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Type</p>
                        <input class="form-control mb-3 bg-secondary text-light" type="text" placeholder="card type">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry</p>
                        <input class="form-control mb-3 bg-secondary text-light" type="date" placeholder="MM/YYYY">
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="btn btn-primary mb-3 text-center">
                        <span class="ps-3">Pay $243</span>
                        <span class="fas fa-arrow-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require "footer.php";
?>
