<br/><div class="col-lg-12 visible-lg" style="background-color: #EEEEEE;border-radius: 5px;box-shadow: 5px 5px 5px #333;padding: 10px;">
                <h2 style="color: #f00;font-family: cursive;">Welcome</h2>
                <p>J-RAPHA Hospital Is Located Where A Health Facility Ought To Be :  Right Where People Live.</p>
                <p>We Provide Healthcare With Empathy And Because Outcome Is Important To Us We Are Open And Accessible 24/7 , 
                    We Stock State Of The Art Laboratory Equipment That Are Manned By Seasoned Professionals . Our Medical And Support Staff Are Thorough Bred And Are Client Friendly .</p>
                <p>J-RAPHA Is Family Care Practice , Where Excellent Primary As Well As Secondary Care Is Administered With An Attitude That Inspires Confidence</p>
                 <h4 class="heading">MISSION STATEMENT</h4>
                 <p>Our Mission Is To Inspire Confidence In All Classes Of Patients By Providing Quick Relief Of Pain , Cure Of Ailments & Distress In A Friendly & Hygienic Environment At Affordable Cost.</p>
            </div>
            <div class="col-lg-12 visible-md visible-sm visible-xs" style="background-color: #EEEEEE;border-radius: 5px;box-shadow: 5px 5px 5px #333;margin-top: 15%;">
                <h2 class="heading">Welcome</h2>
                <p>J-RAPHA Hospital Is Located Where A Health Facility Ought To Be :  Right Where People Live.</p>
                <p>We Provide Healthcare With Empathy And Because Outcome Is Important To Us We Are Open And Accessible 24/7 , 
                    We Stock State Of The Art Laboratory Equipment That Are Manned By Seasoned Professionals . Our Medical And Support Staff Are Thorough Bred And Are Client Friendly .</p>
                <p>J-RAPHA Is Family Care Practice , Where Excellent Primary As Well As Secondary Care Is Administered With An Attitude That Inspires Confidence</p>
                <h3 class="heading">MISSION STATEMENT</h3>
                <p>Our Mission Is To Inspire Confidence In All Classes Of Patients By Providing Quick Relief Of Pain , Cure Of Ailments & Distress In A Friendly & Hygienic Environment At Affordable Cost.</p>
            </div>
        <br/>
            <!-- Three columns of text below the carousel -->
            <div class="row" >
                <div class="col-lg-4">
                    <img class="img-rounded" src="VIEWS/images/facts.png" alt="Generic placeholder image">
                    <h2>Health Facts</h2>
                    <p>
                    <?php 
                            $displayFact = new MySql();
                            $queryCount = $displayFact->query("SELECT id FROM facts ORDER BY id ");
                            $factCount = $displayFact->numRows($queryCount);
                            $randFact = rand(8, $factCount);
                                                                    
                            if($query = $displayFact->query("SELECT fact FROM facts WHERE id  = {$randFact} LIMIT 1")){
                               $_SESSION['factNow'] = $randFact;
                                while($result = $displayFact->fetch($query)){
                                    echo($result['fact']);
                                }
                            }
                        ?>
                    </p>
                    <p><a class="btn btn-default"data-toggle="modal" data-target="#myModal2">View More &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <a href="#">
                        <img class="img-circle" src="VIEWS/images/download.png"  alt="Generic placeholder image">
                        <h2>Download Registration Form</h2>
                    </a>

                </div><!-- /.col-lg-4 -->
                                <div class="col-lg-4">
                    <h2>Ask The Doctor</bh2>
                    <?php
                        
                    if(isset($_POST['submit'])){
                        $mailer = new Mailer("doc@jraphahospital.com" , "Question from jraphahospital.com" , "
                                    Message : {$_POST['message']}\n\n
                                        This message is from the ask the Doctor panel on jraphahospital.com
                                ", "From : {$_POST['email']}");
                                echo("<p style='font-size: 70%;'>Message Sent</p>");
                    }
                    
                    ?>
                    <form action="#" method="post" class="well-lg form-inline " >
                        <fieldset>
                            <section class="input-group-lg has-error">
                                <textarea name="message" placeholder="Ask the doctor a question" style="border: 1px solid #c0c0c0" required class="input-lg col-xs-12 signupFormSpacer" title="Ask the doctor a question"   ></textarea>
                            </section>
                            <section class="input-group-lg has-success" >
                                <input class="input-lg col-xs-12 signupFormSpacer" title="Email" id="signupEmail" name="email" type="email"  placeholder="Email" required />              
                            </section>
                            <button type="submit" class="btn-block btn-success btn-lg signupFormSpacer2" name="submit">Submit</button>
                        </fieldset>
                    </form>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <hr/>
            <!-- START THE FEATURETTES -->
            <h2 class="heading">Our Facilities</h2>
            <?php
                $fetchPackage = new MySql();
                if($query = $fetchPackage->query("SELECT * FROM packages ORDER BY time_created DESC")){
                    while($resultSet = $fetchPackage->fetch($query)){
                        //print_r($resultSet);
                        echo("
                <div class=\"row featurette\">
                    <div class=\"col-md-7\"> 
                        <h3 class=\"featurette-heading\">{$resultSet['name']}</h3>
                                <p style=\"text-align: justified;height: 8.8em; overflow: hidden;\"><br/>{$resultSet['description']}</p><br/>
                </div>
                <div class=\"col-md-5\"> 
                    <img class='featurette-image img-responsive img-circle' src='CONTROLLERS/savedPackageImages/_sml"); echo($resultSet['image']); echo("' alt='Package Image'/>
                        <a class=\"btn btn-success\" href=\"packages.php?view=");echo(urlencode($resultSet['id'])); 
                        echo('">More Details</a>
                </div>
                </div>
                 <hr class="featurette-divider">');
                    }
                }
            ?>
            <!-- /END THE FEATURETTES -->