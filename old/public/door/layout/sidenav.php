  <div class="well sidebar-nav">
                        <ul class="nav">
                            <li>Facilities</li>
                            <li><a <?php Utility::linkHelper("dashboard") ?> href="dashboard.php">Add Facility</a></li>
                            <li><a <?php Utility::linkHelper("deleteFacility") ?> href="deleteFacility.php">Delete Facility</a></li>
                            <li>Careers</li>
                            <li><a <?php Utility::linkHelper("addVacancy") ?> href="addVacancy.php">Add Vacancy</a></li>
                            <li><a <?php Utility::linkHelper("deleteVacancy") ?> href="deleteVacancy.php">Delete Vacancy</a></li>
                            <li>Main Slider</li>
                            <li><a <?php Utility::linkHelper("addSlider") ?> href="addSlider.php">Add Image To Slider</a></li>
                            <li><a <?php Utility::linkHelper("deleteSlider") ?> href="deleteSlider.php">Delete Image From Slider</a></li>
                            <li>Facts </li>
                            <li><a <?php Utility::linkHelper("addFact") ?> href="addFact.php">Add Fact</a></li>
                            <li><a <?php Utility::linkHelper("deleteFact") ?> href="deleteFact.php">Delete Fact</a></li>
                            <li>User</li>
                             <?php
                             if($_SESSION['userRank'] == "Super"){
                                 echo("<li><a ");
                                 Utility::linkHelper("adduser");
                                 echo("href='adduser.php'>Add User</a></li>");
                             }?> 
                           <?php
                             if($_SESSION['userRank'] == "Super"){
                                 echo("<li><a ");
                                 Utility::linkHelper("editDelete");
                                 echo("href='editDelete.php'>Edit/Delete User</a></li>");
                             }?> 
                            <li><a href="#myModal" data-toggle="modal" data-target="#myModal">View Profile</a</li>
                        </ul>
                    </div><!--/.well -->