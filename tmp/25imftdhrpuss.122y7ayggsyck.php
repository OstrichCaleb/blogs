<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog Page</title>
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
    
    <?php if ($SESSION['id']== NULL): ?>
      <?php echo $this->render('includes/sidebarAll.inc.html',NULL,get_defined_vars(),0); ?>
      <?php else: ?><?php echo $this->render('includes/sidebarUser.inc.html',NULL,get_defined_vars(),0); ?>
    <?php endif; ?>

    <div class="col-sm-9">
      <div class="row">
        <?php foreach (($bloggers?:[]) as $blogger): ?>
          <div class="col-sm-4">
              <div class="row">
                <div class="col">
                  <img src="images/<?= $blogger->getPhoto() ?>" height="50%" width="50%">
                  <p><?= $blogger->getUsername() ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <a href="./profile/<?= $blogger->getId() ?>">view blogs</a>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                  <p>Total: <?= $blogger->getNumPosts() ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p>Something from my latest blog: </p>
                  <p><?= $blogger->getLatest() ?></p>
                </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

</body>
</html>
