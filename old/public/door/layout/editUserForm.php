<?php
    $currentUserProfile = new MySql();
    if($query = $currentUserProfile->query("SELECT * FROM users WHERE id = {$_SESSION['userId']} ")){
        while($myProfile = $currentUserProfile->fetch($query)){
           $profileUsername = $myProfile['username'];
           $profileEmail = $myProfile['email'];
           $profileRank = $myProfile['rank'];
        }
    }

?>
<form action="../CONTROLLERS/editUser.php" method="post" class="well-lg form-inline " id="signupForm"  >
    <legend>The form has already been populated with the current values, so just edit the values and click the update user button.(if you do not intend to change your password , then do not input any thing in the password field.)</legend>
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
            <input class="input-lg col-xs-12 signupFormSpacer " spellcheck="true" value="<?php echo($profileUsername); ?>"  title="Username" name="username" type="text" placeholder="Username" maxlength="30"   />
        </section>
        <section class="input-group-lg has-success " >
            <input class="input-lg col-xs-12 signupFormSpacer " spellcheck="true" value="<?php echo($profileEmail); ?>"  title="Email" name="email" type="email" placeholder="Email" maxlength="30"   />
        </section>
        <section class="input-group-lg has-success " >
            <input class="input-lg col-xs-12 signupFormSpacer " spellcheck="true"  title="Password" name="password" type="text" placeholder="Password" maxlength="30"   />
        </section>
        <section class="input-group-lg has-success " >
            <span><strong>User Type&nbsp;&nbsp;</strong></span>
            <select name="rank">
                <option value="">Choose Rank</option>
                <option value="Regular">Regular</option>
                <option value="Super">Super</option>
            </select>
            <span><strong>Current Rank :</strong> <?php echo($profileRank); ?></span>
        </section>

        <button type="submit" class="btn-block btn-success btn-lg signupFormSpacer2" name="submit">Update User</button>
    </fieldset>
</form>