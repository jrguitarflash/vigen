<?php

#print "hello world controlador";

//instancia conexion
	require_once("/conf.php");

//instancia sql
	require_once("/class/sql/sql.class.php");

//instancia libreria twig
	require_once("/class/library/Twig-1.24.0/lib/Twig/Autoloader.php");
	Twig_Autoloader::register();
	$loader = new Twig_Loader_Filesystem('html/');
	$twig = new Twig_Environment($loader, array(
		'cache' => 'cache/',
	));

#instancia modelo
	require_once("/class/model/user.class.php");
	require_once("/class/model/vigen.class.php");
	require_once("/class/model/tip_prod.class.php");

#instancia core
	require_once("/class/core/core.class.php");

#instancia phpExcel
	require_once("/class/library/phpExcel/Excel/reader.php");

#instancia funciones
	require_once("/functions.php");

#instancia firephp
	require_once("/firephp/lib/FirePHPCore/fb.php");
	ob_start();

	if(isset($_REQUEST['view']))
	{
		$view=$_REQUEST['view'];
		fb($view,"var:");
		session_start();

		switch($view)
		{
			//JSON
			case 'evaSesi':

				$flag=0;

				if(isset($_SESSION['user']))
				{
					$flag=1;
				}

				$data=Array();
				$data[0]=$flag;

				print json_encode($data);

			break;

			case 'salir':

				session_destroy();

				$flag=0;

				if(isset($_SESSION['user']))
				{
					$flag=1;
				}

				$data=Array();
				$data[0]=$flag;

				print json_encode($data);

			break;

			case 'cargData':

				//code
				fb($_GET['file'],"file");
				$excel=$_GET['file'];

				//leer excel
				$data = new Spreadsheet_Excel_Reader();
				$data->setOutputEncoding('CP1251');
				$data->read($excel);
				$arrData=Array();
				$fil=0;

				for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++)
				{
					$col=0;
					for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++)
					{
						if($j==9 or $j==10)
						{
							$fech=$data->sheets[0]['cells'][$i][$j];
							$arrData[$fil][$col]=formtFech($fech);
						}
						else
						{
							$arrData[$fil][$col]=$data->sheets[0]['cells'][$i][$j];
						}

						$col++;
					}

					$fil++;
				}

				fb($arrData,"arr");

				$flag=0;

				for($i=0;$i<count($arrData);$i++)
				{
					//cargar data vigencia
					fb(evaTipProd($arrData[$i][3]));

					vigen::vigen_cc_set($arrData[$i][0]);
					vigen::vigen_proy_set($arrData[$i][1]);
					vigen::vigen_cli_set($arrData[$i][2]);
					vigen::tip_prod_id_set(evaTipProd($arrData[$i][3]));
					vigen::vigen_fac_set($arrData[$i][4]);
					vigen::vigen_des_set($arrData[$i][5]);
					vigen::vigen_seri_set($arrData[$i][6]);
					vigen::vigen_mar_set($arrData[$i][7]);
					vigen::vigen_fechIni_set($arrData[$i][8]);
					vigen::vigen_fechVigen_set($arrData[$i][9]);

					desconectar();
					conectar();

					$sql=vigen::insert_vigen();
					$response=core::getVal($sql,'response');

					if($response==1)
					{
						$flag++;
					}
				}

				$data=Array();
				$data[0]=$flag;

				fb($flag,"flag");

				print json_encode($data);

			break;

			//AJAX

			//HTML
			case 'login':

				$mensaje="";

				//up
				if(isset($_POST['action']))
				{
					switch($_POST['action'])
					{
						case 'logear':

							conectar();

							user::user_alias_set($_POST['user']);
							user::user_pass_set($_POST['password']);
							$sql=user::vali_usu();
							$user=core::getData($sql);

							$cont=count($user);

							if($cont>0)
							{
								$mensaje="correct user";

								//iniciar sesion
								$_SESSION['user']=$_POST['user'];
								$_SESSION['pass']=$_POST['password'];
							}
							else
							{
								$mensaje="incorrect user";
								session_destroy();
							}

						break;

						default:
						break;
					}
				}


				//down

				echo $twig->render('login.html', array('mensaje' =>$mensaje));

			break;

			case 'home':

				//up

				//down
				session_start();
				$user=$_SESSION['user'];

				$sql=vigen::obt_vigen();
				$dataVig=core::getData($sql);

				desconectar();
				conectar();

				$sql=tip_prod::obt_tipProd();
				$dataTip=core::getData($sql);

				desconectar();
				conectar();

				$sql=vigen::obt_anVen();
				$dataAn=core::getData($sql);

				echo $twig->render('home.html', array('mensaje' => 'Mensaje','usuario'=>$user,'vigen'=>$dataVig,'tipProd'=>$dataTip,'anVen'=>$dataAn));

			break;

			case 'importar':

				$str="";
				//up
				if(isset($_POST['action']))
				{
					switch($_POST['action'])
					{
						case 'importar':

							//subir archivo
							$excel=subImg($_FILES['file']['name'],
											$_FILES['file']['tmp_name'],
											$_FILES['file']['size'],
											$_FILES['file']['type'],
											'files');

							//leer excel
							$data = new Spreadsheet_Excel_Reader();
							$data->setOutputEncoding('CP1251');
							$data->read($excel);
							$str="<table id='tabImpor' >";
							for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
								$str.="<tr>";
								for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
									$str.="<td>".$data->sheets[0]['cells'][$i][$j] ."</td>";
								}
								$str.="</tr>";

							}
								$str.="</table>";

						break;
					}
				}


				//down
				$user=$_SESSION['user'];

				echo $twig->render('importar.html', array('mensaje' => 'Mensaje','usuario'=>$user,'excel'=>$str,'file'=>$excel));

			break;
			
			default:

				//up

				//down

			break;
		}
	}
	else
	{
		echo $twig->render('index.html', array('mensaje' => 'Fabien'));
	}

?>