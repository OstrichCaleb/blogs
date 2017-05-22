<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Blogger</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    
    <?php if ($id == NULL): ?>
      <?php echo $this->render('includes/sidebarAll.inc.html',NULL,get_defined_vars(),0); ?>
      <?php else: ?><?php echo $this->render('includes/sidebarUser.inc.html',NULL,get_defined_vars(),0); ?>
    <?php endif; ?>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-9">
          <h1>Become a Blogger!</h1>
          <h4>Create a new account below</h4>
        </div>
        <div class="col-sm-3">
          <img src="#">
        </div>
      </div>
      <div class="row">
        <form action="./" method="post" class="form-vertical">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-8">
                <input type="text" id="username" class="form-control" name="username" placeholder="Username" required>
              </div>
              <div class="col-sm-4">
                <label for="username" class="control-label col-sm">Username</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <input type="text" id="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="col-sm-4">
                <label for="email" class="control-label col-sm">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="col-sm-4">
                <label for="password" class="control-label col-sm">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <input type="password" id="verify" class="form-control" name="verify" placeholder="Verify" required>
              </div>
              <div class="col-sm-4">
                <label for="verfiy" class="control-label col-sm">Verify</label>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-8">
                <input id="photo" type="file" id="photo" name="photo" accept="image/*" />
              </div>
              <div class="col-sm-4">
                <label for="photo" class="control-label col-sm">Upload Portrait</label>
              </div>
            </div>
            <div class="row text-center">
              <label for="bio" class="control-label col-sm">Quick Biography</label>
            </div>
            <div class="row">
              <textarea rows="4" cols="50%" id="bio" name="bio" required></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col text-center">
              <input name="action" type="submit" value="Start Blogging!" class="btn">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("verify");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</body>
</html>
