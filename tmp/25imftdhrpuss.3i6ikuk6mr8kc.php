<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
          <h1>Welcome back!</h1>
          <h4>Please log in below</h4>
        </div>
        <div class="col-sm-3">
          <img src="#">
        </div>
      </div>
      <div class="row text-center">
        <div class="col">
          <form action="./login" method="post" class="form-vertical">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="row">
                  <div class="form-group col-sm-8">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="username" class="control-label col-sm">Username</label>
                  </div>
                  <div class="form-group col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="password" class="control-label col-sm">Password</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
                <input name="action" type="submit" value="Login" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
