<!- Caleb Ostrander
    Blog Assignment
/>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your blogs</title>
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
          <h1>Your Blogs</h1>
        </div>
        <div class="col-sm-3">
          <img src="images/<?= $blogger->getPhoto() ?>" height="100%" width="100%">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-9">
          <table class="table table-bordered">
            <tr>
              <th>Blog</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
            <?php foreach (($blogs?:[]) as $blog): ?>
              <tr>
                <td><?= $blog->getTitle() ?></td>
                <td><a href="./update<?= $blog->getId() ?>">Edit</a></td>
                <td>
                  <form action="./my-blogs" method="POST">
                    <input class="btn hidden" type="hidden" name="id" value="<?= $blog->getId() ?>"/>
                    <input class="btn" type="submit" value="Delete"/>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="col-sm-3">
          <div class="row">
            <div class="col">
              <h2><?= $blogger->getUsername() ?></h2>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p><?= $blogger->getBio() ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
