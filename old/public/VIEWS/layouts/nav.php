<div class="navbar-wrapper">
    <div class="container">
        <a href="index.php"><img src="VIEWS/images/logo.png" style="position: absolute; top: -7px;" class="visible-lg " width="200px"/></a>
        <div class="navbar navbar-inverse navbar-static-top visible-lg" style="width: 700px;margin-left: 30%;opacity: 0.8; position: fixed;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li <?php Utility::linkHelper("index", " class = 'active' ") ?> ><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</li></a></li>
                        <li <?php Utility::linkHelper("careers", " class = 'active' ") ?> ><a href="careers.php">Careers</a></li>
                        <li <?php Utility::linkHelper("contact", " class = 'active' ") ?> ><a href="contact.php">Contact</a></li>
                    </ul>
                    <span class="pull-right">
                        <a href="#"><img src="VIEWS/images/facebook.png" height="50" alt="social" title="social"/></a>
                        <a href="#"><img src="VIEWS/images/linked-in.png" alt="social" height="50" title="social"/></a>
                    </span>
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse navbar-static-top hidden-lg navbar-fixed-top " style="opacity: 0.8">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <a href="index.php"><img src="VIEWS/images/logo.png" class="visible-md" width="200px"/></a>
                    <ul class="nav navbar-nav">
                        <li <?php Utility::linkHelper("index", " class = 'active' ") ?> ><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</li></a></li>
                        <li <?php Utility::linkHelper("careers", " class = 'active' ") ?> ><a href="careers.php">Careers</a></li>
                        <li <?php Utility::linkHelper("contact", " class = 'active' ") ?>  ><a href="contact.php">Contact</a></li>
                    </ul>
                    <span class="pull-right">
                        <a href="#"><img src="VIEWS/images/facebook.png" height="50" alt="social" title="social"/></a>
                        <a href="#"><img src="VIEWS/images/linked-in.png" alt="social" height="50" title="social"/></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>