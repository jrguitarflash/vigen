<?php

    //subir imagen
    function subImg($ficheroName,$ficheroTmp,$ficheroSize,$ficheroType,$raiz)
    {
        if(is_uploaded_file($ficheroTmp))
        {
            // verifica haya sido cargado el archivo

            if(move_uploaded_file($ficheroTmp,$raiz."/".$ficheroName))
            {
                // se coloca en su lugar final
                //echo "<b>Upload exitoso!. Datos:</b><br>";
                //echo "Nombre: <i><a href=\"".$ficheroName."\">".$ficheroName."</a></i><br>";
                $ruta= $raiz."/".$ficheroName;
                //echo "Tipo MIME: <i>".$ficheroType."</i><br>";
                //echo "Peso: <i>".$ficheroSize." bytes</i><br>";
                //echo "<br><hr><br>";
            }
        }
        else
        {
            $ruta=null;
        }

        return $ruta;
    }

    //formatear fecha
    function formtFech($fech)
    {
        $arr=explode("/",$fech);
        $fechFn=$arr[2]."-".$arr[1]."-".$arr[0];
        return $fechFn;
    }

    //evaluar tipo producto
    function evaTipProd($tip)
    {
        $fil=array("acc","sum","ser","nin");
        $acc=strpos($tip,$fil[0]);
        $sum=strpos($tip,$fil[1]);
        $ser=strpos($tip,$fil[2]);
        $nin=strpos($tip,$fil[3]);
        $flag=4;

        if($acc!==false)
        {
            $flag=1;
        }

        if($sum!==false)
        {
            $flag=2;
        }

        if($ser!==false)
        {
            $flag=3;
        }

        return $flag;

    }

    //enviar email
    function envMail($msjTit,$msjSub,$msjAlt,$msjBod,$arrDesti,$arrAdju,$arrOcul)
    {
        $mail=new PHPMailer();

        $mail->IsSMTP();                           // telling the class to use SMTP
        //$mail->Mailer = 'anything';
        $mail->Host       = "smtp.gmail.com";      // SMTP server
        //$mail->SMTPDebug  = 1;                    // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";//"tls";                // sets the prefix to the servier
        //$mail->Host       = "smtp.electrowerke.com.pe";
        //"server90.websadministrables.com.websadministrables.com";
        //"smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;//587;//25;                   // set the SMTP port for the GMAIL server
        $mail->Username   = "jose.fernandez@electrowerke.com.pe";
        //"jrguitarflash@electrowerke.com";
        //"electrowerkeserver@gmail.com";  // GMAIL username
        $mail->Password   = "Sis0000ew";                    // GMAIL password

        $mail->SetFrom("jose.fernandez@electrowerke.com.pe", $msjTit);

        $mail->AddReplyTo("jose.fernandez@electrowerke.com.pe",$msjTit);

        $mail->Subject    = $msjSub;

        $mail->AltBody    = $msjAlt; // optional, comment out and test

        $mail->MsgHTML($msjBod);

        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';

        $arrEmail=array();
        $arrEmail=$arrDesti;

        for($i=0;$i<count($arrEmail);$i++)
        {
            $mail->AddAddress($arrEmail[$i],$arrEmail[$i]);
        }

        $arrDesOcul=array();
        $arrDesOcul=$arrOcul;

        for($i=0;$i<count($arrDesOcul);$i++)
        {
            $mail->AddCC($arrDesOcul[$i],'Vigencias');
        }

        $arrFile=array();
        $arrFile=$arrAdju;

        for($i=0;$i<count($arrFile);$i++)
        {
            $mail->addAttachment($arrFile[$i]);
        }


        if(!$mail->Send())
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
            $msj=6;
        }
        else
        {
            #echo "Message sent!";
            $msj=1;
        }

        return $msj;
    }

    //evaluar email
    function evaEmail($email)
    {
        $flag=0;
        $arrMail=explode("@",$email);

        if($arrMail[1]=="electrowerke.com.pe")
        {
            //1 ew
            $flag=1;
        }

        return $flag;

    }

?>