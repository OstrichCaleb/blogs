<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Post</title>
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
          <h1>Change your mind?</h1>
        </div>
        <div class="col-sm-3">
          <img src="#">
        </div>
      </div>
      <div class="row">
        <form action="./update<?= $blog->getId() ?>" method="POST" id="postForm">
            <div class="form-group row">
              <div class="col-xs-10">
                <input class="form-control" name="title" id="title" type="text" value="<?= $blog->getTitle() ?>">
              </div>
              <div class="col-xs-2 text-center">
                <label for="title">Title</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col text-center">
                <label for="entry">Blog Entry</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col text-center">
                <textarea rows="4" cols="100%" name="post" id="entry" form="postForm"><?= $blog->getPost() ?></textarea>
              </div>
            </div>
            
            <div class="row">
              <div class="text-center">
                <input class="btn" type="submit" value="Submit" />
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
