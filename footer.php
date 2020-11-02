<footer class="footer p-4 mt-4 text-center">
    <p>&copy; <?= date("Y"); ?> - Exame WP Challenge</p>
</footer>

<?php 
    $home = get_template_directory_uri(); 
?>

    <!-- Option 1 (Bootstrap): jQuery and Bootstrap Bundle (includes Popper) -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <!-- custom js -->

    <?php
        if($jss) {
            foreach ($jss as $js) {
    ?>
        <script src="<?= $home; ?>/assets/js/<?= $js; ?>.js"></script>
    <?php
            }
        }
    ?>

<?php wp_footer(); ?>
</body>
</html>