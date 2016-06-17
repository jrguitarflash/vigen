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
	require_once("/class/model/tip_prod.class.php");
	require_once("/class/model/tip_vigen.class.php");
	require_once("/class/model/user.class.php");
	require_once("/class/model/vigen.class.php");
	require_once("/class/model/vigen_alert.class.php");
	require_once("/class/model/vigen_desti.class.php");
	require_once("/class/model/vigen_frecu.class.php");
	require_once("/class/model/vigen_hist.class.php");
	require_once("/class/model/vigen_rep.class.php");


#instancia core
	require_once("/class/core/core.class.php");

#instancia phpReadExcel
	require_once("/class/library/phpReadExcel/Excel/reader.php");

#instancia phpExcel
	require_once("/class/library/phpExcel/Classes/PHPExcel.php");
	require_once("/class/library/phpExcel/Classes/PHPExcel/Writer/Excel2007.php");

#instancia PHPMailer
	require_once("/class/library/PHPMailer-master/PHPMailerAutoload.php");

#instancia funciones
	require_once("/functions.php");

#instancia firephp
	require_once("/firephp/lib/FirePHPCore/fb.php");
	ob_start();

	if(isset($_REQUEST['view']))
	{
		$view=$_REQUEST['view'];
	}
	else if(isset($argv[1]))
	{
		$view=$argv[1];
	}

	if(isset($view))
	{
		fb($view,"var:");
		session_start();

		switch($view)
		{
			//CRONJOB

			case 'venciVigDia':

				conectar();

				//obtener todas las vencidas, del año actual, todos los tip prod, todos los cc
				vigen::est_fil_set(1);
				vigen::anu_fil_set(date('Y'));
				vigen::tip_prod_id_set(0);
				vigen::vigen_cc_set('');
				$sql=vigen::obt_vigen();
				$dataVig=core::getData($sql);

				foreach($dataVig as $data)
				{
					//si vig vence envio correo con datos de vigencia
					if($data['dif_fech']==0)
					{
						//obt data vig
						$contac=$data['vigen_contac'];
						$fac=$data['vigen_fac'];
						$seri=$data['vigen_seri'];
						$proy=$data['vigen_proy'];
						$fechVig=$data['vigen_fechVigen'];

						//param env
						$email=$data['vigen_mail'];
						$tit="Notificacion de Vigencia";
						$sub="Vigencia";
						$alt="Vigencia";
						$desti=array($email);

						$msj="Sr. ".$contac." el equipo con referencia de N° factura ".$fac." y numero de serie";
						$msj.=" ".$seri." del proyecto ".$proy." ha vencido el dia de hoy ya que tiene como fecha";
						$msj.=" de vigencia ".$fechVig." le enviamos este correo para confirmarle la vigencia.";
						$msj.="<br><br>";
						$msj.="Atte. Electrowerke";

						$adju=array();

						//obte ocul
						desconectar();
						conectar();

						$sql=vigen_desti::obte_desti();
						$dataDesti=core::getData($sql);
						$arrMail=array();
						$ind=0;

						foreach($dataDesti as $data)
						{

							if(evaEmail($data['mail'])==1)
							{
								$mail=$data['mail'];
							}
							else
							{
								$mail=$data['mail'];
							}

							$arrMail[$ind]=$mail;
							$ind++;
						}

						fb($arrMail,"var");

						$ocul=array();
						$ocul=$arrMail;

						//send mail
						$envi=envMail($tit,$sub,$alt,$msj,$desti,$adju,$ocul);
						$vig_id=$data['vigen_id'];

						desconectar();
						conectar();

						//insert hist mail
						vigen_hist::vigen_id_set($vig_id);
						vigen_hist::vigen_hist_envi_set($envi);
						vigen_hist::vigen_hist_fechEnv_set(date('Y-m-d'));
						vigen_hist::vigen_hist_msg_set($msj);

						$sql=vigen_hist::insert_hist();
						$val=core::getVal($sql,'response');

						fb($sql,'query');

						echo $val;
					}

				}


			break;

			case 'venciAlertConf':

				$val=0;

				//read config
				conectar();

				$sql=vigen_alert::obt_ultAler();
				$dataConf=core::getData($sql);

				$frecu=$dataConf[0]['vigen_frecu_id'];
				$alert_id=$dataConf[0]['vigen_alert_id'];
				$est_id=$dataConf[0]['vigen_est_id'];
				$tip_id=$dataConf[0]['vigen_tip_id'];
				$anu=$dataConf[0]['vigen_anu'];

				fb($dataConf,"conf");

				//read num day
				$day=date('d');

				//today actu
				$fechActu=date('Y-m-d');

					//semanal multi 7 $day%7==0 and
					if($frecu==1)
					{

						//obt vigen
						desconectar();
						conectar();

						vigen::est_fil_set($est_id);
						vigen::anu_fil_set($anu);
						vigen::tip_prod_id_set($tip_id);
						vigen::vigen_cc_set('');
						$sql=vigen::obt_vigen();
						$dataVig=core::getData($sql);

						fb($dataVig,"vig");

						//gen rep and save

						// Create new PHPExcel object
						echo date('H:i:s') . " Create new PHPExcel object\n";
						$objPHPExcel = new PHPExcel();

						// Set properties
						echo date('H:i:s') . " Set properties\n";
						$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
						$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
						$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
						$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
						$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


						// Add some data
						echo date('H:i:s') . " Add some data\n";
						$objPHPExcel->setActiveSheetIndex(0);
						$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'CC');
						$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Proyecto');
						$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Cliente');
						$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Factura');
						$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contacto');
						$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Email');
						$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Tip Prod');
						$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Des Prod');
						$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Serie');
						$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Marca');
						$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Fecha Inicial');
						$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Fecha Vigencia');
						$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Vigencias');
						$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Dias');


						//detalles de vigencias
						$ind=2;
						foreach($dataVig as $data)
						{
							//fil
							if($data['dif_fech']>0)
							{
								$dif=$data['dif_fech'];
							}
							else
							{
								$dif=$data['dif_fech']*-1;
							}

							$objPHPExcel->setActiveSheetIndex(0)
														 ->SetCellValue('A'.$ind,$data['vigen_cc'])
														 ->SetCellValue('B'.$ind,$data['vigen_proy'])
														 ->SetCellValue('C'.$ind,$data['vigen_cli'])
														 ->SetCellValue('D'.$ind,$data['vigen_fac'])
														 ->SetCellValue('E'.$ind,$data['vigen_contac'])
														 ->SetCellValue('F'.$ind,$data['vigen_mail'])
														 ->SetCellValue('G'.$ind,$data['tip_prod'])
														 ->SetCellValue('H'.$ind,$data['vigen_des'])
														 ->SetCellValue('I'.$ind,$data['vigen_seri'])
														 ->SetCellValue('J'.$ind,$data['vigen_mar'])
														 ->SetCellValue('K'.$ind,$data['vigen_fechIni'])
														 ->SetCellValue('L'.$ind,$data['vigen_fechVigen'])
														 ->SetCellValue('M'.$ind,$data['esta_vigen_des'])
														 ->SetCellValue('N'.$ind,$dif);

							$ind++;
						}

						// Rename sheet
						echo date('H:i:s') . " Rename sheet\n";
						$objPHPExcel->getActiveSheet()->setTitle('Vigencias');


						// Save Excel 2007 file
						echo date('H:i:s') . " Write to Excel2007 format\n";
						$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
						//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
						$objWriter->save("files/alerts/vigen_".$fechActu.".xls");

						// Echo done
						echo date('H:i:s') . " Done writing file.\r\n";

						//obt desti
						desconectar();
						conectar();

						$sql=vigen_desti::obte_desti();
						$dataDesti=core::getData($sql);
						$arrMail=array();
						$ind=0;

						foreach($dataDesti as $data)
						{
							if(evaEmail($data['mail'])==1)
							{
								$mail=$data['mail'];
							}
							else
							{
								$mail=$data['mail'];
							}

							$arrMail[$ind]=$mail;
							$ind++;
						}

						//param env
						#$email=$data['vigen_mail'];
						$tit="Reporte de Vigencias";
						$sub="Vigencias";
						$alt="Vigencias";
						$desti=$arrMail;

						$msj="Buenos dias, se ha generado el reporte de vigencias";
						$msj.=" segun la configuracion realizada en el modulo.";
						$msj.="<br><br>";
						$msj.="Atte. Electrowerke";


						$adju=array("files/alerts/vigen_".$fechActu.".xls");

						$ocul=array();

						//send mail
						$envi=envMail($tit,$sub,$alt,$msj,$desti,$adju,$ocul);

						//save env
						desconectar();
						conectar();

						vigen_rep::vigen_alert_id_set($alert_id);
						vigen_rep::vigen_rep_nom_set('');
						vigen_rep::vigen_rep_fech_set(date('Y-m-d'));
						vigen_rep::vigen_rep_msg_set($msj);
						vigen_rep::vigen_rep_env_set($envi);
						$sql=vigen_rep::insert_rep();
						$val=core::getVal($sql,'response');

					}
					//quincenal multi 15
					else if($day%15==0 and $frecu==2)
					{
						//rep
					}
					//mensual multi 30
					else if($day%30==0 and $frecu==3 )
					{
						//rep
					}

				echo $val;

			break;

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
					vigen::vigen_contac_set($arrData[$i][10]);
					vigen::vigen_mail_set($arrData[$i][11]);

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

			case 'obt_ccVig':

				$sql=vigen::obt_ccVig();
				$dataCc=core::getData($sql);

				fb($dataCc,"arr:");

				print json_encode($dataCc);

			break;

			case 'obt_ultAler':

				conectar();

				$sql=vigen_alert::obt_ultAler();
				$dataAlert=core::getData($sql);

				fb($dataAlert,"arr");

				print json_encode($dataAlert);

			break;

			case 'ope_desti':

				conectar();

				vigen_desti::vigen_desti_nom_set($_GET['nom']);
				vigen_desti::vigen_desti_email_set($_GET['mail']);
				vigen_desti::vigen_desti_id_set($_GET['id']);
				vigen_desti::vigen_desti_op_set($_GET['ope']);
				$sql=vigen_desti::ope_desti();

				fb($sql,"arr");

				$val=core::getVal($sql,'response');

				$data=Array();
				$data[0]=$val;

				print json_encode($data);


			break;


			//AJAX

			case 'obt_vigen':

				vigen::est_fil_set($_POST['est']);
				vigen::anu_fil_set($_POST['anu']);
				vigen::tip_prod_id_set($_POST['tip']);
				vigen::vigen_cc_set($_POST['cc']);
				$sql=vigen::obt_vigen();
				$dataVig=core::getData($sql);

				echo $twig->render('home_vig.html',array('vigen'=>$dataVig));

			break;

			case 'obte_desti':

				conectar();

				$sql=vigen_desti::obte_desti();
				$dataDesti=core::getData($sql);

				echo $twig->render('alertas_desti.html',array('desti'=>$dataDesti));

			break;

			//HTML
			case 'login':

				//vars
				$mensaje="";
				$view="login";

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

				echo $twig->render('login.html', array('mensaje' =>$mensaje,
														'view'=>$view));

			break;

			case 'home':

				//vars
				$view="home";

				//up

				//down
				session_start();
				$user=$_SESSION['user'];

				vigen::est_fil_set(0);
				vigen::anu_fil_set(0);
				vigen::tip_prod_id_set(0);
				vigen::vigen_cc_set('');
				$sql=vigen::obt_vigen();
				$dataVig=core::getData($sql);

				fb($dataVig,"arr");

				desconectar();
				conectar();

				$sql=tip_prod::obt_tipProd();
				$dataTip=core::getData($sql);

				desconectar();
				conectar();

				$sql=vigen::obt_anVen();
				$dataAn=core::getData($sql);

				desconectar();
				conectar();

				$sql=tip_vigen::obt_tipVig();
				$dataTipVig=core::getData($sql);

				echo $twig->render('home.html', array('mensaje' => 'Mensaje',
														'view'=>$view,
														'usuario'=>$user,
														'vigen'=>$dataVig,
														'tipProd'=>$dataTip,
														'anVen'=>$dataAn,
														'tipVig'=>$dataTipVig));

			break;

			case 'importar':

				//vars
				$str="";
				$view="importar";

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

				echo $twig->render('importar.html', array('mensaje' => 'Mensaje',
															'view'=>$view,
															'usuario'=>$user,
															'excel'=>$str,
															'file'=>$excel));

			break;

			case 'alertas':

				//vars
				$view="alertas";
				$mensaje='Mensaje';

				//UP
				if(isset($_POST['action']))
				{
					switch($_POST['action'])
					{
						case 'alertar':

							fb($_POST['id_alert'],"id");

							vigen_alert::vigen_alert_id_set($_POST['id_alert']);
							vigen_alert::vigen_frecu_id_set($_POST['alert_frecu']);
							vigen_alert::vigen_est_id_set($_POST['estaVig']);
							vigen_alert::vigen_tip_id_set($_POST['tipVig']);
							vigen_alert::vigen_anu($_POST['anVig']);
							$sql=vigen_alert::config_alert();
							$val=core::getVal($sql,'response');

							if($val>0)
							{
								$mensaje="Configurar guardada..!";
							}
							else
							{
								$mensaje="Configurar no guardada";
							}


						break;
					}
				}

				//DOWN
				session_start();
				$user=$_SESSION['user'];

				$sql=tip_prod::obt_tipProd();
				$dataTip=core::getData($sql);

				desconectar();
				conectar();

				$sql=vigen::obt_anVen();
				$dataAn=core::getData($sql);

				desconectar();
				conectar();

				$sql=vigen_frecu::obt_frecu();
				$dataFrecu=core::getData($sql);

				desconectar();
				conectar();

				$sql=tip_vigen::obt_tipVig();
				$dataTipVig=core::getData($sql);

				desconectar();
				conectar();

				$sql=vigen_desti::obte_desti();
				$dataDesti=core::getData($sql);

				fb($dataFrecu,"array");

				echo $twig->render('alertas.html',array('mensaje'=>$mensaje,
														'view'=>$view,
														'usuario'=>$user,
														'tipProd'=>$dataTip,
														'anVen'=>$dataAn,
														'frecuAler'=>$dataFrecu,
														'tipVig'=>$dataTipVig,
														'desti'=>$dataDesti));

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