<?php require_once '../MODELS/initialize.php'; ?>
<?php
if (!isset($_GET['view'])) {
    Utility::redirectPage("index.php");
} else {
    $package = new MySql();
    $currentPackgage = $package->queryAndFetch("SELECT * FROM packages WHERE id = {$_GET['view']}");

    if (empty($currentPackgage)) {
        Utility::redirectPage("index.php");
    }
}

//    print_r($currentPackgage);
?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once 'VIEWS/layouts/head.php'; ?>
    <body>   
        <noscript><h1 style="color: #ff0000;">Javascript is turn off on your browser , this site needs javascript to function properly.</h1></noscript>
        <?php require_once 'VIEWS/layouts/nav.php'; ?>

        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container custom_container" style="margin-top: 5%;" >
            <br/><br/>
            <div class="col-lg-12" >
                <div class="col-lg-7">
                    <div class="col-lg-6"><img class="img-rounded" src="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image']); ?>" width="300" alt="<?php echo($currentPackgage['name']); ?>" title="<?php echo($currentPackgage['name']); ?>"/></div>
                    <div class="col-lg-6"><img class="img-rounded" src="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image2']); ?>" width="300" alt="<?php echo($currentPackgage['name']); ?>" title="<?php echo($currentPackgage['name']); ?>"/></div>
                    <p>&nbsp</p>
                    <div class="alert-success">
                        <h3 style="padding: 6px 10px 0px;">Description</h3>
                        <p style="text-align: justify;padding: 10px;"><?php echo($currentPackgage['description']); ?></p>
                    </div>
                </div>
                <div class="col-lg-1">&nbsp;</div>
                <div style="background-color: #EEEEEE;" class="col-lg-4">
                    <ul style="list-style: none;padding: 10px;">
                        <li class="alert-info"><p><strong>Facility Name : </strong><?php echo($currentPackgage['name']); ?></p></li>
                    </ul>     
                    <p style="clear: both;"><br/><strong>Gallery</strong></p>
                    <div class="col-lg-12 visible-lg">
                        <div id="gallery">
                            <ul>
                                <li>
                                    <a href="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image5']); ?>" >
                                        <img src="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image5']); ?>" width="100" height="100" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image4']); ?>" >
                                        <img src="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image4']); ?>" width="100" height="100" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image3']); ?>" >
                                        <img src="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image3']); ?>" width="100" height="100" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image2']); ?>" >
                                        <img src="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image2']); ?>" width="100" height="100" alt="" />
                                    </a>
                                </li>
                                <li>
                                    <a href="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image']); ?>" >
                                        <img src="CONTROLLERS/savedPackageImages/_sml<?php echo($currentPackgage['image']); ?>" width="100" height="100" alt="" />
                                    </a>
                                </li>
                            </ul>
                        </div><br/>
                    </div><br/>
                    <h4>Quick Contact</h4>
                    <address>
                        <p style="font-family: monospace"><strong>Tel :</strong> +23433009198</p>
                        <p style="font-family: monospace"><strong>Email :</strong> care@jraphahospital.com</p>
                        <p style="font-family: monospace"><strong>Address :</strong> 40-Langbasa Road Owode-Ajah, 
   Lekki Peninsula , Lagos Nigeria</p>
                    </address>
                </div>
            </div>
            <p style="clear: both;">&nbsp</p>
            <br/><br/><br/><br/>
            <p style="clear: both;">&nbsp</p>
            <!-- FOOTER -->
            <?php require_once 'VIEWS/layouts/footer.php'; ?>
        </div><!-- /.container -->
        <?php require_once 'VIEWS/layouts/jsFiles.php'; ?>
        <script type="text/javascript" src="jquery-lightbox-0.5/js/jquery.lightbox-0.5.js"></script>
        <!-- Ativando o jQuery lightBox plugin -->
        <script type="text/javascript">
            $(function() {
                $('#gallery a').lightBox();
            });
        </script>

    </body>
</html>
