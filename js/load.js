window.onload=function()
{
    view=document.getElementById('view').value;

    switch(view)
    {
        case 'login':

            console.log("hello view: "+view);
            evaSesi(view);

        break;

        case 'home':

            console.log("hello view: "+view);
            evaSesi(view);

            obt_ccVig();

            //events
            $('#est_fil, #anu_fil, #tip_fil').click(function(event)
            {
                console.log('event..');
                obt_vigen();
            });

            $('#vigen_cc_des').keyup(function(event)
            {
                console.log('event..');
                obt_vigen();
            });


        break;

        case 'index':

            console.log("hello view: "+view);
            location.href="index.php?view=login";

        break;

        case 'alertas':

            console.log("hello view: "+view);
            evaSesi(view);
            obt_ultAler();

        break;

        case 'importar':

            console.log("hello view: "+view);
            evaSesi(view);

         break;

        default:
        break;
    }

}

//salir del modulo
function salir()
{
    if(confirm("�Desea Salir del modulo?"))
    {
        //location.href="index.php?view=login";

        param="view=salir";

        $.getJSON('json.php?'+param,{format: "json"}, function(data)
        {
            if(data[0]==1)
            {
                location.reload();
            }
        });
    }

}

//ingresar al modulo
function ingresar()
{
    //location.href="index.php?view=home";
    document.login.submit();
}

//evaluar sesion
function evaSesi(view)
{
    param="view=evaSesi";

    $.getJSON('json.php?'+param,{format: "json"}, function(data)
    {
        //si existe
        console.log(data[0]);
        if(data[0]>0)
        {
            if(view=="login")
            {
                location.href="index.php?view=home";
            }
            else
            {
                //location.href="index.php?view=login";
            }
        }
        //no existe
        else
        {
            if(view!="login")
            {
                location.href="index.php?view=login";
            }
        }


    });
}

//importar
function importar()
{
    document.import.submit();
}

//cargar data
function cargData()
{
    $('#mensaje').html("<img src='images/loading.gif' width='10%' >");

    file=$('#fileCarg').text();
    console.log(file);

    param="view=cargData";
    param+="&file="+file;

    $.getJSON('json.php?'+param,{format: "json"}, function(data)
    {
        console.log(data[0]);
        if(data[0]>0)
        {
            $('#mensaje').text("data cargada correctamente...!");
            $('#dataExcel').html("");
            $('#fileCarg').html("");
        }
        else
        {
            $('#mensaje').text("data no cargada....!");
        }
    });
}

//obtener cc
function obt_ccVig()
{
    autoComp_ini('obt_ccVig','json','vigen_cc_id','vigen_cc_des');
}

//obtener vigen
function obt_vigen()
{
    view="obt_vigen";
    est=$('#est_fil').val();
    anu=$('#anu_fil').val();
    tip=$('#tip_fil').val();
    cc=$('#vigen_cc_des').val();


    var request = $.ajax(
    {
        url: "ajax.php",
        type: "POST",
        data: {view:view,est:est,anu:anu,tip:tip,cc:cc},
        dataType: "html"
    });

    request.done(function(msg)
    {
        $("#vigen_tab_ajax").html( msg );
    });

    request.fail(function(jqXHR, textStatus)
    {
        alert( "Request failed: " + textStatus );
    });
}

//configurar alerta
function config_alert()
{
    //alert("alertar");
    document.alert.submit();
}

//obt ult alert
function obt_ultAler()
{
    param="view=obt_ultAler";

    $.getJSON('json.php?'+param,{format: "json"}, function(data)
    {
        if(data.length>0)
        {
            //id alert
            $('#id_alert').val(data[0]['vigen_alert_id']);

            console.log(data);
            //ini config frecu
            $("input[name=alert_frecu]").each(function()
            {
                if($(this).val()==data[0]['vigen_frecu_id'])
                {
                    $(this).prop('checked', true);
                }
            });

            //ini esta
            $('#estaVig').val(data[0]['vigen_est_id']);

            //ini year
            $('#anVig').val(data[0]['vigen_anu']);

            //ini tip
            $('#tipVig').val(data[0]['vigen_tip_id']);
        }
        else
        {
            $('#id_alert').val(0);
        }
    });
}

//ope desti
function ope_desti(op,id)
{
    param="view=ope_desti";
    param+="&ope="+op;
    param+="&id="+id;
    param+="&nom="+$('#nom').val();
    param+="&mail="+$('#mail').val();

    $.getJSON('json.php?'+param,{format: "json"}, function(data)
    {
        if(data[0]>0)
        {
            if(op=="agre")
            {
                $('#mensaje').html("destinatario agregado...!");

                $('#nom').val("");
                $('#mail').val("");

                obte_desti();
            }
            else if(op=="del")
            {
                $('#mensaje').html("destinatario eliminado...!");

                obte_desti();
            }

        }
    });
}

//obte desti
function obte_desti()
{

    view="obte_desti";

    var request = $.ajax(
        {
            url: "ajax.php",
            type: "POST",
            data: {view:view},
            dataType: "html"
        });

    request.done(function(msg)
    {
        $("#desti_tab_ajax").html( msg );
    });

    request.fail(function(jqXHR, textStatus)
    {
        alert( "Request failed: " + textStatus );
    });
}