<?php
/*
 * Caleb Ostrander
 * Blog site, IT 328
 */

    require_once('vendor/autoload.php');
	
	session_start();
	
    $f3 = Base::instance();
	
	$f3->set('DEBUG',3);
	
    $f3->route('GET /', function()
    {
        echo Template::instance()->render('pages/home.html');
    }
    );
    
    $f3->run();