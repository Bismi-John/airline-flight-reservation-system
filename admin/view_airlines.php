<?php
    require "../connection.php";
    require "../header.php";          
?>
<?php
$sql="SELECT * FROM airline";
$statement=$connection->prepare($sql);
$statement->execute();
$name=$statement->fetchAll(PDO::FETCH_OBJ);
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
   echo "<script>
        window.location='../login.php'
    </script>";
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
                <form action="" method="POST" class="d-flex me-2">
                        <input class="btn btn-primary" type="submit" name="logout" value="logout">
                    </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="mt-5" id="divToExport">
            <h2 class="text-center">Airline Details</h2>
            <table class="table table-dark table-striped mt-4" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th  class="text-center">Add Flight</th>
                        <th  class="text-center">Edit Airline</th>
                        <!-- <th  class="text-center">Cancel Airline</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach($name as $nam):?>
                    <tr>
                    
                        <td><?=$nam->name;?></td>
                       
                        <td>
                        <div class="text-center">
                                <a class="btn btn-success"  href="add_flights.php?id=<?=$nam->id; ?>"
                                    >Add Flight</a
                                >
                        </div>
                        </td>
                        <td>
                        <div class="text-center">
                                <a class="btn btn-secondary" href="airline_edit.php?id=<?=$nam->id; ?>"
                                    >Edit</a
                                >
                        </div>
                        </td>
                        <!-- <td>
                        <div class="text-center">
                        <form action="airline_delete.php" method="POST">
                            <button class="btn btn-danger" type="submit" name="delete" onclick="return confirm('Are you sure?')"value="<?=$nam->id; ?>">
                                Cancel
                            </button>
                        
                        </form>
                        </div>
                        </td> -->
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="editor"></div>

  <p>
    <button type="button" onclick="generatePDF()" class="btn-sm btn-danger pull-right">Downlod ticket</button>
  </p>
<script type="text/javascript">
    function generatePDF() {

      // Choose the element id which you want to export.
      var element = document.getElementById('divToExport');
      element.style.width = 'auto';
      element.style.height = 'auto';
      var opt = {
        margin: 0.5,
        filename: 'myfile.pdf',
        image: {
          type: 'jpeg',
          quality: 1
        },
        html2canvas: {
          scale: 1
        },
        jsPDF: {
          unit: 'in',
          format: 'letter',
          orientation: 'portrait',
          precision: '12'
        }
      };

      // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
      html2pdf().set(opt).from(element).save();
    }
  </script>
<?php
    require "../footer.php";
?>