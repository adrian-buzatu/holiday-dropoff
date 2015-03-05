<div class="ourcampus-right-content1">
    <div class="ourcampus-right-content">
        <div class="login-heading-text1">
            <h1>Sign up</h1>
            <p>To create an account with us, please complete the form below</p>
            <form id="signup" method="post" action="<?php echo base_url()?>register">
                <?php echo validation_errors(); ?>
                <div class="signup-right-content">
                    <div class="formdetails"><span>Title:</span>
                        <p>
                            <select name="title" id="title">
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                        </p>
                    </div>
                    <div class="formdetails"><span>Forename:</span>
                        <p>
                            <input name="first_name" type="text" id="forename" value="<?php echo set_value('first_name')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Surname:</span>
                        <p>
                            <input name="last_name" type="text" id="surname" value="<?php echo set_value('last_name')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Username:</span>
                        <p>
                            <input name="username" type="text" id="username"  value="<?php echo set_value('username')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Password:</span>
                        <p>
                            <input name="password" type="password" id="password1" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Re-enter password:</span>
                        <p>
                            <input name="passconf" type="password" id="password2" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Email address:</span>
                        <p>
                            <input name="email" type="text" id="email"  value="<?php echo set_value('email')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Daytime phone number:</span>
                        <p>
                            <input name="landline" type="text" id="landline"  value="<?php echo set_value('landline')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Mobile phone number:</span>
                        <p>
                            <input name="phone_number" type="text" id="mobile"  value="<?php echo set_value('phone_number')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Address line 1:</span>
                        <p>
                            <input name="address1" type="text" id="add1" value="<?php echo set_value('address1')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Address line 2:</span>
                        <p>
                            <input name="address2" type="text" id="add2" value="<?php echo set_value('address2')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Address line 3:</span>
                        <p>
                            <input name="address3" type="text" id="add3" value="<?php echo set_value('address3')?>" />
                        </p>
                    </div>
                    <div class="formdetails"><span>Postcode:</span>
                        <p>
                            <input name="zip" type="text" id="postcode" <?php echo set_value('zip')?> />
                        </p>
                    </div>
                    <div class="formdetails"><span>Country</span>
                        <p>
                            <select name="country_id">
                                <?php foreach($countries as $id => $country):?>
                                    <option 
                                        <?php if(set_value('country_id') == $id):?>selected<?php endif;?>
                                        value="<?php echo $id?>"><?php echo $country?></option>
                                <?php endforeach;?>

                            </select>
                        </p>
                    </div>
                    <div class="formdetails"><span>Where did you hear about us:</span>
                        <p>
                            <input name="reference" type="text" id="ref" <?php echo set_value('reference')?> />
                        </p>
                    </div>
                    <div id="submit_holder">
                        <input type="submit" class="signupbt" value="Sign Up"  onclick="event.preventDefault(); return signup();"  />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="c1"></div>
</div>
<script type="text/javascript">
    function signup() {
        var $ = jQuery.noConflict();
        var title = $("#title").val();
        var forename = $("#forename").val();
        var surname = $("#surname").val();
        var username = $("#username").val();
        var password1 = $("#password1").val();
        var password2 = $("#password2").val();
        var email = $("#email").val();
        var add1 = $("#add1").val();
        var landline = $("#landline").val();
        var mobile = $("#mobile").val();
        var add1 = $("#add1").val();
        var add2 = $("#add2").val();
        var add3 = $("#add3").val();
        var postcode = $("#postcode").val();
        var country = $("#country").val();
        var ref = $("#ref").val();

        if (title == "") {
            $("#title").focus();
            alert("Title Must Not be Blank.");
            return false;
        }


        if (forename == "") {
            $("#forename").focus();
            alert("Forename Must Not be Blank.");
            return false;
        }

        if (surname == "") {
            $("#surname").focus();
            alert("Surname Must Not be Blank.");
            return false;
        }

        if (username.length < 4) {
            $("#username").focus();
            alert("Username Must be Atleast 4 Character Long.");
            return false;
        }


        if (password1.length < 4) {
            $("#password1").focus();
            alert("Password Must be Atleast 4 Character Long.");
            return false;
        }

        if (password1 != password2) {
            $("#password1").focus();
            alert("Password Must Match.");
            return false;
        }

        if (email.length < 10) {
            $("#email").focus();
            alert("Email Address is Not Valid.");
            return false;
        }

        if (landline == "") {
            $("#landline").focus();
            alert("Landline Must Not be Blank.");
            return false;
        }

        if (mobile == "") {
            $("#mobile").focus();
            alert("Mobile Must Not be Blank.");
            return false;
        }

        if (add1 == "") {
            $("#add1").focus();
            alert("Address Line 1 Must Not be Blank.");
            return false;
        }

        if (country == "") {
            $("#country").focus();
            alert("Country Must Not be Blank.");
            return false;
        }

        if (postcode == "") {
            $("#postcode").focus();
            alert("Postcode Must Not be Blank.");
            return false;
        }

        $("#signup").submit();

    }
</script>