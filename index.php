<?php
/*
 * Caleb Ostrander
 * Dating site, IT 328
 */

    require_once('vendor/autoload.php');
	
	session_start();
	
	$memberDB = new MemberDB();
	
    $f3 = Base::instance();
	
	$f3->set('DEBUG',3);
	
    $f3->route('GET /', function()
    {
        $view = new View;
        echo $view->render
            ('pages/home.html');
    }
    );
    
    $f3->route('GET /personal-information', function()
        {
            $view = new View;
            echo $view->render('pages/personal-information.html');
        }
    );
    
    $f3->route('POST /profile', function()
        {
			if ($_POST['premium'])
			{
				$profile = new PremiumMember($_POST['firstName'], $_POST['lastName'], $_POST['age'], $_POST['gender'], $_POST['phone']);
			} else
			{
				$profile = new Member($_POST['firstName'], $_POST['lastName'], $_POST['age'], $_POST['gender'], $_POST['phone']);
			}
			
			$_SESSION['profile'] = $profile;
			
            $view = new View;
            echo $view->render('pages/profile.html');
        }
    );
    
    $f3->route('POST /interests', function()
        {
			$profile = $_SESSION['profile'];
			
			$profile->setEmail($_POST['email']);
			$profile->setState($_POST['state']);
			$profile->setPref($_POST['pref']);
			$profile->setBio($_POST['bio']);
			
			$_SESSION['profile'] = $profile;
			
            $view = new View;
			
			if (get_class($profile) == "PremiumMember") echo $view->render('pages/interests.html');
			else $GLOBALS['f3']->reroute('/summary');
        }
    );
    
    $f3->route('GET|POST /summary', function()
        {
			$profile = $_SESSION['profile'];
			$members = $GLOBALS['memberDB'];
			
			if ($profile->checkPremium())
			{
				$profile->setInDoorInterests($_POST['indoor']);
				$profile->setOutDoorInterests($_POST['outdoor']);
				
				// Set upload if it is uploaded or unset it
				if (move_uploaded_file($_FILES["photo"]["tmp_name"], "images/" . basename($_FILES["photo"]["name"])))
				{
					$profile->setPhoto($_FILES["photo"]["name"]);
					$_SESSION['uploaded'] = true;
				}
				
				$entryID = $members->addMember($profile);
				$members->addPremiumMember($entryID, $profile);
				$profile->setID($entryID);
				
			} else $profile->setID($members->addMember($profile));
			
			$_SESSION['profile'] = $profile;
            
            $view = new View;
            echo $view->render('pages/summary.php');
        }
    );
	
	$f3->route('GET /admin', function($f3)
    {
		$members = $GLOBALS['memberDB']->allMembers();
		$f3->set('members', $members);
		
        $view = new View;
        echo $view->render
            ('pages/admin.html');
    }
    );
	
	$f3->route('GET /@id', function($f3, $params)
        {
			$_SESSION['id'] = $params['id'];
			$view = new View;
			echo $view->render
				('pages/premium.php');
        }
    );
    
    $f3->run();