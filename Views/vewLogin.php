<!DOCTYPE html>
<html>
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <form action="index.php?mdl=1" method="post" class="w3-light-grey w3-display-topmiddle" style="width:40%">
            <div class="w3-container" class="w3-card-4">
                <div class="w3-red w3-center">
                    <h2>Login</h2>
                </div>

                <div>
                    <p><span class="w3-invalid-feedback w3-text-red"><?php echo $this->model->message; ?></span></p>
                    <p><span class="w3-invalid-feedback w3-text-red"><?php echo $this->model->error; ?></span></p>
                </div>

                <label class="w3-text"><b>Email</b></label>
                <input class="w3-input w3-border w3-round" name="txtEmail" type="text" placeholder="Enter email.." value="<?php echo $this->model->cEmail; ?>">

                <label class="w3-text"><b>Password</b></label>
                <input class="w3-input w3-border w3-round" id="txtPassword" name="txtPassword" type="password" placeholder="Enter password.." value="<?php echo $this->model->nPass; ?>">
                <input class="w3-center" type="checkbox" onclick="showPassword()">Show Password<br><br>
                <a href="index.php?mdl=3">forgot password</a><br>

                <input class="w3-input w3-border" name="txtFlag" type="hidden" value="<?php echo $this->model->nFlag; ?>">

                <br>
                <div class="w3-center">
                    <button class="w3-btn w3-grey w3-round" id="btnClear" name="btnClear" type="submit" value="Clear">Clear</button>
                    <button class="w3-btn w3-btn-primary w3-green w3-round" id="btnLogin" name="btnLogin" type="submit" value="Save">Login</button>
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
</script>