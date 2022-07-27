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
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2>Edit User</h2>
                            <p>For the sake of integrity you can only edit your profile</p>
                            <form action="#" method="post">
                                <select name="allUsers" required>
                                    <?php
                                    $selectAllUsers = new MySql();
                                    if ($query = $selectAllUsers->query("SELECT id , username FROM users WHERE id = '{$_SESSION['userId']}' ORDER BY username")) {
                                        while ($resultSet = $selectAllUsers->fetch($query)) {
                                            echo("<option value='{$resultSet['id']}'>{$resultSet['username']}</option>");
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-warning " name="editSubmit">Edit Profile</button>
                            </form>
                            <?php
                            if (isset($_POST['editSubmit'])) {
                                require_once 'layout/editUserForm.php';
                            }
                            ?>
                            <hr>
                            <h2>Delete User</h2>
                            <p>Choose the user to delete and click the Delete User button  (Note super users cannot be deleted)</p>
                            <form action="../CONTROLLERS/deleteUser.php" method="post" id="deleteForm">
                                <select name="deleteUser" required>
                                    <option value="">Choose a user</option>
                                    <?php
                                    $deleteUser = new MySql();
                                    if ($query = $deleteUser->query("SELECT id , username FROM users WHERE id != {$_SESSION['userId']} AND rank != 'Super' ORDER BY username")) {
                                        while ($resultSet = $deleteUser->fetch($query)) {
                                            echo("<option value='{$resultSet['id']}'>{$resultSet['username']}</option>");
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-danger " name="deleteSubmit">Delete User</button>
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


        <?php
        if (isset($_GET['userDelete']) && $_GET['userDelete'] == 1) {
            echo("
                        <script>
                            alert('User was sucessfully deleted. ');
                        </script>
                    ");
        }
        ?>
        <?php
        if (isset($_GET['editUser']) && $_GET['editUser'] == 0) {
            echo("
                    <script>
                        alert('Editing the user was unsuccessfull .');
                    </script>
                        ");
        }
        ?>
        <?php
        if (isset($_GET['editUser']) && $_GET['editUser'] == 1) {
            echo("
                    <script>
                        alert('{$_GET['message']}');
                    </script>
                        ");
        }
        ?>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../VIEWS/asserts/b1229/assets/js/jquery.js"></script>
        <script src="../VIEWS/asserts/b1229/dist/js/bootstrap.min.js"></script>
        <script src="js/offcanvas.js"></script>

        <script>

            document.getElementById("deleteForm").onsubmit = function confirmDelete() {
                if (confirm("Are you sure you want to delete this user . \n Note user will be permanently deleted.")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </body>
</html>
