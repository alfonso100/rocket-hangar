</div> <!-- grid -->

</div> <!-- container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <!-- Light Switch -->
    <script src="assets/js/switch.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <?php 
      if (isset($additionalScripts)) {
        foreach($additionalScripts as $script) {
          echo "<script src=\"$script\"></script>";
        }
      }
    ?>
    <script src="assets/js/scripts.js"></script>
    <script>
      $(document).ready(function () {
        $('.grid').masonry({
          itemSelector: '.grid-item',
          percentPosition: true
        });
      });
    </script>
    
  </body>
</html>