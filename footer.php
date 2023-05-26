 <!-- JQuery CDN -->
 <script
            src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"
        ></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript">
    function generatePDF() {

      // Choose the element id which you want to export.
      var element = document.getElementById('editor');
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
       
<!-- custom CDN -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="JS/script.js"></script>
<script src="JS/ascript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if(isset($_SESSION["status"])&& $_SESSION["status"] != ""): ?>
                    <script>
                            Swal.fire({
                            icon: '<?=$_SESSION["status_code"] ?>',
                            title: '<?= $_SESSION['message']?>',
                            text: '<?=$_SESSION["status"] ?>',
                            }).then(function() {
                                window.location = "<?=$_SESSION["page"] ?>";
                             });
                                    
                    </script>
                    
                    <?php unset($_SESSION["status"]);?>
        
                   
                   
     <?php endif?>
</body>
</html>   