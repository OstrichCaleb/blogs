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
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$pass = hash(sha1, $_POST['password']);
			$blogger = new Blogger($_POST['username'], $_POST['email'], $_POST['photo'], $_POST['bio'], -1, 0, $pass);
			$id = $bloggerDB->addBlogger($blogger);
			$f3->set('id', $id);
			unset($_POST);
		}
		
        echo Template::instance()->render('pages/home.html');
    }
    );
	
	$f3->route('GET /about-us', function()
    {
        echo Template::instance()->render('pages/aboutUs.html');
    }
    );
	
	$f3->route('GET /blog-post', function($f3)
    {
		if ($f3->get('id') == NULL)
		{
			$f3->reroute('/');
		}
        echo Template::instance()->render('pages/blog-post.html');
    }
    );
	
	$f3->route('GET|POST /login', function($f3)
    {
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$pass = hash(sha1, $password);
			
			$bloggerDB = $GLOBALS['bloggerDB'];
			
			$creds = $bloggerDB->login($user);
			echo $creds['password'] . "/        /";
			echo $pass;
			if ($creds['password'] == $pass)
			{
				$f3->set('id', $bloggerCreds['blogger_id']);
				unset($_POST);
			}
		}
		
		
		if ($f3->get('id') != NULL)
		{
			$f3->reroute('/');
		}
        echo Template::instance()->render('pages/login.html');
    }
    );
	
	$f3->route('GET /my-blogs', function($f3)
    {
		if ($f3->get('id') == NULL)
		{
			$f3->reroute('/');
		}
        echo Template::instance()->render('pages/my-blogs.html');
    }
    );
    
	$f3->route('GET /new-blog', function($f3)
    {
		if ($f3->get('id') == NULL)
		{
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
	
	$f3->route('GET /profile', function($f3)
    {
        echo Template::instance()->render('pages/profile.html');
    }
    );
	
	$f3->route('GET /logout', function($f3)
    {
		$f3->set('id', NULL);
        $f3->reroute('/');
    }
    );
	
	$f3->route('GET /template', function($f3)
    {
        echo Template::instance()->render('pages/template.html');
    }
    );
	
    $f3->run();