<?php

#print "hello world controlador";
require_once("class/library/Twig-1.24.0/lib/Twig/Autoloader.php");
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('html/');
$twig = new Twig_Environment($loader, array(
	'cache' => 'cache/',
));

	if( (isset($_GET['view'])) or (isset($_POST['action'])) )
	{
		switch($_GET['view'])
		{

			case 'login':

				//up

				//down

				echo $twig->render('login.html', array('name' => 'Fabien'));

			break;

			case 'home':

				//up

				//down

				echo $twig->render('home.html', array('name' => 'Fabien'));

			break;

			case 'importar':

				//up

				//down

				echo $twig->render('importar.html', array('name' => 'Fabien'));

			break;
			
			default:
			break;
		}
	}

?>