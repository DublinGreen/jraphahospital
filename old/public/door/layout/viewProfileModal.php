            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">User Profile</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            $viewUser = new MySql();
                            if ($query = $viewUser->query("SELECT username , email , rank , time_created FROM USERS WHERE id = {$_SESSION['userId']} LIMIT 1")) {
                                while ($userInfo = $viewUser->fetch($query)) {
                                    $_SESSION['userRank'] = $userInfo['rank'];
                                    echo("<p><strong>Username :</strong> {$userInfo['username']} </p>
                                          <p><strong>Email :</strong> {$userInfo['email']}</p>
                                          <p><strong>Rank :</strong> {$userInfo['rank']}</p>
                                          <p><strong>Time Created :</strong> {$userInfo['time_created']} </p>");
                                }
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->