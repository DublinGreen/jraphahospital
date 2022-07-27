<?php require_once '../../MODELS/initialize.php'; ?>
<?php Utility::police("index.php?login=3") ?>
<?php
if ($_SESSION['userRank'] != "Super") {
    Utility::redirectPage("dashboard.php?rank=0");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'layout/header.php'; ?>
    <body>
        <?php require_once 'layout/topNav.php'; ?>
        <div class="container">
            <?php require_once 'layout/viewProfileModal.php'; ?>
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                    </p>
                    <!--                    <div class="jumbotron">
                                            <h1>Hello, world!</h1>
                                            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
                                        </div>-->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2>Add User</h2>
                            <?php
                            if (isset($_POST['submit'])) {
                                $addUser = new MySql();
                                $hashPassword = Utility::hashpassword($_POST['password']);
                                if ($query = $addUser->query("INSERT INTO users(username,email,password, rank) VALUES ('{$_POST['username']}','{$_POST['email']}','{$hashPassword}','{$_POST['rank']}')")) {
                                    $message = "{$_POST['username']} was sucessfully added.";
                                } else {
                                    $message2 = "Error : user was not added.<br/>" . $addUser->getdatabaseError();
                                }
                            }
                            ?>
                            <form action="#" method="post" class="well-lg form-inline " id="signupForm"  >
                                <fieldset>
                                    <p class="alert-success"><?php
                            if (isset($message)) {
                                echo $message;
                            }
                            ?></p>
                                    <p class="alert-danger"><?php
                                        if (isset($message2)) {
                                            echo $message2;
                                        }
                            ?></p>
                                    <section class="input-group-lg has-success " >
                                        <input class="input-lg col-xs-12 signupFormSpacer " spellcheck="true"  title="Username" name="username" type="text" placeholder="Username" maxlength="30" required  />
                                    </section>
                                    <section class="input-group-lg has-success " >
                                        <input class="input-lg col-xs-12 signupFormSpacer " spellcheck="true"  title="Email" name="email" type="email" placeholder="Email" maxlength="30" required  />
                                    </section>
                                    <section class="input-group-lg has-success " >
                                        <input class="input-lg col-xs-12 signupFormSpacer " spellcheck="true"  title="Password" name="password" type="text" placeholder="Password" maxlength="30" required  />
                                    </section>
                                    <section class="input-group-lg has-success " >
                                        <span><strong>User Type&nbsp;&nbsp;</strong></span>
                                        <select name="rank">
                                            <option value="Regular">Regular</option>
                                            <option value="Super">Super</option>
                                        </select>
                                    </section>

                                    <button type="submit" class="btn-block btn-success btn-lg signupFormSpacer2" name="submit">Create User</button>
                                </fieldset>
                            </form>
                        </div><!--/span-->
                    </div><!--/row-->
                </div><!--/span-->

                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <?php require_once 'layout/sidenav.php'; ?>
                </div><!--/span-->
            </div><!--/row-->

            <hr>
<?php require_once 'layout/footer.php'; ?>
        </div><!--/.container-->



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../VIEWS/asserts/b1229/assets/js/jquery.js"></script>
        <script src="../VIEWS/asserts/b1229/dist/js/bootstrap.min.js"></script>
        <script src="js/offcanvas.js"></script>
    </body>
</html>
