</div> <!-- grid -->

</div> <!-- container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
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
  </body>
</html>