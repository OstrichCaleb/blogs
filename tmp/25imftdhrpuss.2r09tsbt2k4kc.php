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
  <script src="js/validate.js"></script>
  
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    
    <?php if ($SESSION['id'] == NULL): ?>
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
          <img src="images/notepad.png" height="70%" width="70%">
        </div>
      </div>
      <div class="row">
        <form action="./submit" method="post" enctype="multipart/form-data" id="blogger-form" class="form-vertical">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-8">
                <input type="text" id="username" class="form-control" name="username" placeholder="Username" value="<?= $SESSION['username'] ?>" required>
              </div>
              <div class="col-sm-4">
                <label for="username" class="control-label col-sm">Username</label>
              </div>
              <div class="alert alert-danger col-sm-8">
                <strong>Error: </strong><span id="username-error"></span>
              </div>
              <?php if ($SESSION['usernameError'] != NULL): ?>
                
                  <div class="alert-danger col-sm-8">
                    <strong>Error: </strong><span><?= $SESSION['usernameError'] ?></span>
                  </div>
                
              <?php endif; ?>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="<?= $SESSION['email'] ?>" required>
              </div>
              <div class="col-sm-4">
                <label for="email" class="control-label col-sm">Email</label>
              </div>
              <div class="alert alert-danger col-sm-8">
                <strong>Error: </strong><span id="email-error"></span>
              </div>
              <?php if ($SESSION['emailError'] != NULL): ?>
                
                  <div class="alert-danger col-sm-8">
                    <strong>Error: </strong><span><?= $SESSION['emailError'] ?></span>
                  </div>
                
              <?php endif; ?>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="col-sm-4">
                <label for="password" class="control-label col-sm">Password</label>
              </div>
              <div class="alert alert-danger col-sm-8">
                <strong>Error: </strong><span id="password-error"></span>
              </div>
              <?php if ($SESSION['passwordError'] != NULL): ?>
                
                  <div class="alert-danger col-sm-8">
                    <strong>Error: </strong><span><?= $SESSION['passwordError'] ?></span>
                  </div>
                
              <?php endif; ?>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <input type="password" id="verify" class="form-control" name="verify" placeholder="Verify" required>
              </div>
              <div class="col-sm-4">
                <label for="verfiy" class="control-label col-sm">Verify</label>
              </div>
              <div class="alert alert-danger col-sm-8">
                <strong>Error: </strong><span id="verify-error"></span>
              </div>
              <?php if ($SESSION['verifyError'] != NULL): ?>
                
                  <div class="alert-danger col-sm-8">
                    <strong>Error: </strong><span><?= $SESSION['verifyError'] ?></span>
                  </div>
                
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-8">
                <input id="photo" type="file" name="photo" accept="image/*" required/>
              </div>
              <div class="col-sm-4">
                <label for="photo" class="control-label col-sm">Upload Portrait</label>
              </div>
            </div>
            <div class="row text-center">
              <label for="bio" class="control-label col-sm">Quick Biography</label>
            </div>
            <div class="row">
              <textarea rows="4" cols="50%" id="bio" name="bio" required><?= $SESSION['bio'] ?></textarea>
              <div class="alert alert-danger col-sm-8">
                <strong>Error: </strong><span></span>
              </div>
              <?php if ($SESSION['bioError'] != NULL): ?>
                
                  <div class="alert-danger col-sm-8">
                    <strong>Error: </strong><span><?= $SESSION['bioError'] ?></span>
                  </div>
                
              <?php endif; ?>
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
</body>
</html>
