<?php require_once '../MODELS/initialize.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once 'VIEWS/layouts/head.php'; ?>
    <body>        
        <?php require_once 'VIEWS/layouts/nav.php'; ?>
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container">
            <div class="col-lg-4" style="margin-top: 14%;">
                <img src="VIEWS/images/support1.jpg" class="img-responsive img-rounded" width="250" alt="Contact Image" /><br/><br/>
                <address>
                    <p style="font-family: monospace"><span class="glyphicon glyphicon-phone"></span> +2348179047388 , +2348033009198</p>
                    <p style="font-family: monospace"><span class="glyphicon glyphicon-envelope"></span> care@jraphahospital.com ,  jrapha24@gmail.com , jrapha1@yahoo.com</p>
                    <p style="font-family: monospace"><span class="glyphicon glyphicon-home"></span> 40-Langbasa Road Owode-Ajah, <br/>
                        &nbsp;&nbsp; Lekki Peninsula ,
                        Lagos Nigeria</p>
                </address>
            </div>
            <div class="col-lg-8" style="background-color: #EEEEEE;border-radius: 5px;box-shadow: 5px 5px 5px #333;margin-top: 14%;">
                <h2 style="color: #f00;font-family: cursive;">We will like to hear from you.</h2>
                  <form action="#" method="post" class="well-lg form-inline " id="signupForm"  >
                    <?php
                        
                    if(isset($_POST['submit'])){
                        $mailer = new Mailer("care@jraphahospital.com , greendublin007@gmail.com " , "Contact from jraphahospital.com" , "
                                    First Name : {$_POST['fname']} \n
                                    Last Name : {$_POST['lname']}\n
                                    Email : {$_POST['email']}\n
                                    Email : {$_POST['mobile']}\n    
                                    Message : {$_POST['message']}\n\n
                                        This message is from the contact form on jraphahospital.com
                                    
                                ", "From : {$_POST['email']}");
                                echo("<p>Message Sent</p>");
                    }
                    
                    ?>
                    <fieldset>
                        <section class="input-group-lg has-success " >
                            <input class="input-lg col-xs-6 signupFormSpacer " spellcheck="true"  title="First Name " name="fname" type="text" placeholder="First Name" maxlength="30" required  />
                            <input class="input-lg col-xs-6 signupFormSpacer" spellcheck="true" title="Last Name" name="lname" type="text" placeholder="Last Name" maxlength="30" required />
                        </section>
                        <section class="input-group-lg has-success" >
                            <input class="input-lg col-xs-6 signupFormSpacer" title="Email" id="signupEmail" name="email" type="email"  placeholder="Email" required />              
                            <input class="input-lg col-xs-6 signupFormSpacer" title="Mobile" id="signupEmail" name="mobile" type="text"  placeholder="Mobile" required />             
                        </section>
                        <section class="input-group-lg has-error">
                            <textarea placeholder="Message" style="border: 1px solid #c0c0c0" required name="message" class="input-lg col-xs-12 signupFormSpacer" title="Message"   ></textarea>
                        </section>
                        <button type="submit" class="btn-block btn-success btn-lg signupFormSpacer2" name="submit">Submit</button>
                    </fieldset>
                </form>
            </div>
            <br/>
            <p style="clear: both">&nbsp;</p>
            <!-- FOOTER -->
            <?php require_once 'VIEWS/layouts/footer.php'; ?>
        </div><!-- /.container -->
        <?php require_once 'VIEWS/layouts/jsFiles.php'; ?>
    </body>
</html>
