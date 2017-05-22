<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>About Us</title>
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
    
    <?php if ($SESSION['id'] == NULL): ?>
      <?php echo $this->render('includes/sidebarAll.inc.html',NULL,get_defined_vars(),0); ?>
      <?php else: ?><?php echo $this->render('includes/sidebarUser.inc.html',NULL,get_defined_vars(),0); ?>
    <?php endif; ?>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-9">
          <h1>The Blog Site</h1>
          <h4>Your one-stop shop for internet blogs</h4>
        </div>
        <div class="col-sm-3">
          <img src="#">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h4><strong>The internet is abuzz with our blog content</strong></h4>
          <p>lorem ipsum dolor sit amen.lorem ipsum dolor sit amen.lorem ipsum dolor sit amen.lorem ipsum dolor sit amen.</p>
          <p>lorem ipsum dolor sit amen.lorem ipsum dolor sit amen.lorem ipsum dolor sit amen.lorem ipsum dolor sit amen.</p>
          <h4><strong>Hear what others are saying about us!</strong></h4>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-11">
          <p>"They have great blogs" - Long time user terry</p>
          <p>"I love all of their content" - Jack</p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
