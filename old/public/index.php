<?php require_once '../MODELS/initialize.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once 'VIEWS/layouts/head.php'; ?>
    <body>        
        <?php require_once 'VIEWS/layouts/nav.php'; ?>
        <?php require_once 'VIEWS/layouts/slider.php'; ?>
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container marketing custom_container" >
            <?php require_once 'VIEWS/layouts/modal.php'; ?>
            <?php require_once 'VIEWS/layouts/modal2.php'; ?>
            <br/><br/>
            <?php require_once 'VIEWS/layouts/body.php'; ?>
            <!-- FOOTER -->
            <?php require_once 'VIEWS/layouts/footer.php'; ?>
        </div><!-- /.container -->
        <?php require_once 'VIEWS/layouts/jsFiles.php'; ?>
    </body>
</html>
