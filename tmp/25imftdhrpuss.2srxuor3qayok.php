<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= $blogger->getUsername() ?></title>
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
      <div class="row">
        <div class="col text-center">
          <h1><?= $blogger->getUsername() ?> Blogs</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-9">
          <div class="row">
            <div class="col">
              <h3><a href="../blog-post/">My most recent blog:</a></h3>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p><?= $blogger->getLatest() ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <h3>My blogs:</h3>
            </div>
          </div>
          <?php foreach (($blogs?:[]) as $blog): ?>
            <div class="row">
              <div class="col">
                <p><a href="../blog-post/<?= $blogger->getId() ?>"><?= $blog->getTitle() ?></a> - word count <?= $blog->getWordCount() ?> - <?= $blog->getDate() ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p><?= $blog->getPost() ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="col-sm-3">
          <div class="row">
            <div class="col">
              <img src="../images/<?= $blogger->getPhoto() ?>" width="100%" height=100%">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col text-center">
                  <h3><?= $blogger->getUsername() ?></h3>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <p>Bio: <?= $blogger->getBio() ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
