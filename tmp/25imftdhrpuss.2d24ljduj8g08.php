<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    
    <?php if ($SESSION['id'] == NULL): ?>
      <?php echo $this->render('includes/allProfile.inc.html',NULL,get_defined_vars(),0); ?>
      <?php else: ?><?php echo $this->render('includes/userProfile.inc.html',NULL,get_defined_vars(),0); ?>
    <?php endif; ?>

    <div class="col-sm-9">
      <div class="frame">
        <div class="col">
          <img src="../images/<?= $blogger->getPhoto() ?>" class="pull-right img-thumbnail" height="20%" width="20%">
          <h1 class="text-center"><?= $blog->getTitle() ?></h1>
        </div>
      </div>
      <div class="frame">
        <p><?= $blog->getPost() ?></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
