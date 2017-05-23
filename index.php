<?php
/*
 * Caleb Ostrander
 * Blog site, IT 328
 */

    require_once('vendor/autoload.php');
	
	session_start();
	
	new Session();
	
	$bloggerDB = new BloggerDB();
	
    $f3 = Base::instance();
	
	$f3->set('DEBUG',3);
	
    $f3->route('GET|POST /', function($f3)
    {
		$bloggerDB = $GLOBALS['bloggerDB'];
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			if (move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . basename($_FILES["photo"]["name"]))){
				$photo = $_FILES["photo"]["name"];
			}
			
			$username = $_POST['username'];
			$email = $_POST['email'];
			$bio = $_POST['bio'];
			$pass = md5($_POST['password']);
			
			$blogger = new Blogger($username, $email, $photo, $bio, -1, 0, $pass, "NA");
			
			$id = $bloggerDB->addBlogger($blogger);
			
			$_SESSION['id'] = $id;
			$f3->set('SESSION.id', $id);
			
			unset($_POST);
		}
		
		$f3->set('bloggers', $bloggerDB->allBloggers());
		
        echo Template::instance()->render('pages/home.html');
    }
    );
	
	$f3->route('GET /about-us', function()
    {
        echo Template::instance()->render('pages/aboutUs.html');
    }
    );
	
	$f3->route('GET /blog-post/@blogId', function($f3, $params)
    {
		$blogId = $params['blogId'];
		
		$bloggerDB = $GLOBALS['bloggerDB'];
		
		$f3->set('blog', $bloggerDB->blogById($blogId));
		$blog = $f3->get('blog');
		$memberId = $blog->getMemberId();
		
		$f3->set('blogger', $bloggerDB->bloggerById($memberId));
		
        echo Template::instance()->render('pages/blog-post.html');
    }
    );
	
	$f3->route('GET|POST /login', function($f3)
    {
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$user = $_POST['username'];
			$pass = md5($_POST['password']);
			
			$bloggerDB = $GLOBALS['bloggerDB'];
			
			$creds = $bloggerDB->login($user);
			
			if ($creds['password'] == $pass){
				$f3->set('SESSION.id', $id);
				$_SESSION['id'] = $creds['blogger_id'];
				unset($_POST);
			}
		}
		
		if ($_SESSION['id'] != NULL){
			$f3->reroute('/');
		}
        echo Template::instance()->render('pages/login.html');
    }
    );
	
	$f3->route('GET|POST /my-blogs', function($f3)
    {
		if ($_SESSION['id'] == NULL){
			$f3->reroute('/');
		}
		
		$bloggerDB = $GLOBALS['bloggerDB'];
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			if (sizeof($_POST[0]) > 1){
				$title = $_POST['title'];
				$post = $_POST['post'];
				
				$post = new BlogPost($title, $post);
				$post->setMemberId($_SESSION['id']);
				
				$bloggerDB->addPost($post);
				
				unset($_POST);
			} else{
				$bloggerDB->delPost($_POST['id']);
			}
			
		}
		
		$f3->set('blogs', $bloggerDB->blogsById($_SESSION['id']));
		$f3->set('blogger', $bloggerDB->bloggerById($_SESSION['id']));
		
        echo Template::instance()->render('pages/my-blogs.html');
    }
    );
    
	$f3->route('GET /new-blog', function($f3)
    {
		if ($_SESSION['id'] == NULL){
			$f3->reroute('/');
		}
        echo Template::instance()->render('pages/new-blog.html');
    }
    );
	
	$f3->route('GET /new-blogger', function()
    {
        echo Template::instance()->render('pages/new-blogger.html');
    }
    );
	
	$f3->route('GET /profile/@id', function($f3, $params)
    {
		$bloggerDB = $GLOBALS['bloggerDB'];
		
		$f3->set('blogs', $bloggerDB->blogsById($params['id']));
		$f3->set('blogger', $bloggerDB->bloggerById($params['id']));
		
        echo Template::instance()->render('pages/profile.html');
    }
    );
	
	$f3->route('GET /logout', function($f3)
    {
		$_SESSION['id'] = NULL;
        $f3->reroute('/');
    }
    );
	
	$f3->route('GET /template', function($f3)
    {
        echo Template::instance()->render('pages/template.html');
    }
    );
	
	$f3->route('GET|POST /update@id', function($f3, $params)
    {
		if ($_SESSION['id'] == NULL){
			$f3->reroute('/');
		}
		
		$bloggerDB = $GLOBALS['bloggerDB'];
			
		$blogId = $params['id'];
		
		$f3->set('blog', $bloggerDB->blogById($blogId));
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$title = $_POST['title'];
			$postInfo = $_POST['post'];
			
			$post = new BlogPost($title, $postInfo);
			$post->setMemberId($_SESSION['id']);
			$post->setId($blogId);
			
			$bloggerDB->updatePost($post);
			$f3->reroute('/my-blogs');
		}
		
        echo Template::instance()->render('pages/update.html');
    }
    );
	
    $f3->run();