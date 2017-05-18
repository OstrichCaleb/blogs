<!-- Caleb Ostrander
Blog Assignment -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>New Post</title>

    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="row">
      <?php echo $this->render('includes/sidebarUser.inc.html',NULL,get_defined_vars(),0); ?>
      <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <div class="row">
          <div class="col-sm-10">
            <h2>Whats on your mind?</h2>
          </div>
          <div class="col-sm-2">
            <img src="#">
          </div>
        </div>
        
        <form action="./" method="POST" id="postForm">
          
          <div class="form-group row">
            <div class="col-xs-10">
              <input class="form-control" id="title" type="text">
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
              <textarea rows="4" cols="100%" name="post" id="entry" form="postForm"></textarea>
            </div>
          </div>
          
          <div class="row">
            <div class="text-center">
              <input class="btn" type="submit" value="Submit" />
            </div>
          </div>
        </form>
      </main>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>