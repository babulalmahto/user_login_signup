<!DOCTYPE html>
<html>
    <title>sign up page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <form action="index.php?mdl=2" method="post" class="w3-light-grey w3-display-topmiddle" style="width:40%">
            <div class="w3-container" class="w3-card-4" >
                <div class="w3-red w3-center">
                    <h2>Sign Up</h2>
                </div>

                <div>
                    <p><span class="w3-invalid-feedback w3-text-red"><?php echo $this->model->message; ?></span></p>
                    <p><span class="w3-invalid-feedback w3-text-red"><?php echo $this->model->error; ?></span></p>
                </div>

                <label class="w3-text"><b>Name</b></label>
                <input class="w3-input w3-border w3-round" name="txtName" type="text" maxlength="15" placeholder="Enter name.." value="<?php echo $this->model->cName; ?>">

                <label class="w3-text"><b>Email</b></label>
                <input class="w3-input w3-border w3-round" id="txtEmail" name="txtEmail" type="email" maxlength="30" placeholder="Enter email.." value="<?php echo $this->model->cEmail; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onclick="myEmail()">

                <label class="w3-text"><b>Password</b></label>
                <input class="w3-input w3-border w3-round" id="txtPassword" name="txtPassword" type="password" maxlength="50" placeholder="Enter password.." value="<?php echo $this->model->nPassword; ?>">
                <input class="w3-center" type="checkbox" onclick="showPassword()">Show Password<br>

                <label class="w3-text"><b>Confirm Password</b></label>
                <input class="w3-input w3-border w3-round" name="txtConfirmPassword" type="password" maxlength="50" placeholder="Enter confirm password.." value="<?php echo $this->model->nConfirmPassword; ?>">

                <label class="w3-text"><b>Sign Up Date</b></label>
                <input class="w3-input w3-border w3-round" id="txtDate" name="txtDate" type="date" value="<?php echo $this->model->nDate; ?>">

                <input class="w3-input w3-border w3-round" name="txtFlag" type="hidden" value="<?php echo $this->model->nFlag; ?>">

                <br>
                <div class="w3-center">
                    <button class="w3-btn w3-grey w3-round" id="btnClear" name="btnClear" type="submit" value="Clear">Clear</button>
                    <button class="w3-btn w3-btn-primary w3-green w3-round" id="btnSignUp" name="btnSignUp" type="submit" value="Save">Sign Up</button>
                    <a href="index.php" class="w3-btn w3-teal w3-round">Close</a>
                </div>
                <br>
            </div>
        </form>
    </body>
</html> 

<script>
function showPassword() {
  var x = document.getElementById("txtPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
//function myEmail() {
//  var yourEmail = document.getElementById("txtEmail").pattern;
//  document.getElementById("demo").value = yourEmail;
}
</script>