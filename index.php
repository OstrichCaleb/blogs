<?php
/*
 * Caleb Ostrander
 * Blog site, IT 328
 */

    require_once('vendor/autoload.php');
	
	session_start();
	
	$bloggerDB = new BloggerDB();
	
    $f3 = Base::instance();
	
	$f3->set('DEBUG',3);
	
    $f3->route('GET|POST /', function($bloggerDB)
    {
		if (isset($_POST))
		{
			$pass = sha1($_POST['password']);
			$blogger = new Blogger($_POST['username'], $_POST['email'], $_POST['photo'], $_POST['bio'], -1, 0, $pass);
			$id = $bloggerDB->addBlogger($blogger);
			$_SESSION['id'] = $id;
		}
		
        echo Template::instance()->render('pages/home.html');
    }
    );
	
	$f3->route('GET /create-blog', function()
    {
        echo Template::instance()->render('pages/createBlog.html');
    }
    );
	
	$f3->route('GET /template', function()
    {
        echo Template::instance()->render('pages/template.html');
    }
    );
	
	$f3->route('GET /about-us', function()
    {
        echo Template::instance()->render('pages/aboutUs.html');
    }
    );
	
	$f3->route('GET|POST /login', function()
    {
		if (isset($_SESSION['member']))
		{
			$GLOBALS['f3']->reroute('/');
		}
        echo Template::instance()->render('pages/login.html');
    }
    );
    
	$f3->route('GET /new-blog', function()
    {
        echo Template::instance()->render('pages/new-blog.html');
    }
    );
	
	$f3->route('GET /new-blogger', function()
    {
        echo Template::instance()->render('pages/new-blogger.html');
    }
    );
	
    $f3->run();