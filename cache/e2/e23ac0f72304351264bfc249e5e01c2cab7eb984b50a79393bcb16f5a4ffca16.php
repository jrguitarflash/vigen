<?php

/* home.html */
class __TwigTemplate_ffa6e26beb89519f21bc02212e588035365fba1639b1bb052c9706a06be2d3e7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href=\"html/bootstrap-3.3.6-dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- estilos -->
    <link href=\"css/estilos.css\" rel=\"stylesheet\">

    <!-- js -->
    <script src=\"js/load.js\" type=\"text/javascript\" ></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>

<!-- view -->
<input type=\"hidden\" value=\"home\" id=\"view\" >

<div class=\"page-header\">
    <h1>Modulo Vigencias <small>datos de vigencias</small></h1>
</div>

<nav class=\"navbar navbar-inverse\">

    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-9\" aria-expanded=\"false\">
                <span class=\"sr-only\">Toggle navigation</span> <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"#\">Inicio</a>
        </div>
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-9\">
            <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"index.php?view=home\">Vigencias</a></li>
                <li><a href=\"index.php?view=importar\">Importar Data</a></li>
                <li><a href=\"Javascript:salir()\">Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<span class=\"user\" >
    ";
        // line 56
        echo twig_escape_filter($this->env, (isset($context["usuario"]) ? $context["usuario"] : null), "html", null, true);
        echo "
</span>

<span>";
        // line 59
        echo twig_escape_filter($this->env, (isset($context["mensaje"]) ? $context["mensaje"] : null), "html", null, true);
        echo "</span>

";
        // line 61
        $this->displayBlock('content', $context, $blocks);
        // line 143
        echo "
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src=\"html/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    // line 61
    public function block_content($context, array $blocks = array())
    {
        // line 62
        echo "
<section>
    <select>
        <option>todas</option>
        <option>vencidas</option>
        <option>por vencer</option>
    </select>
    <select>
        <option>todas</option>
        <option>2016</option>
        <option>2015</option>
        <option>2014</option>
        <option>2013</option>
    </select>
    <select>
        <option>Todas</option>
        <option>Suministros</option>
        <option>Accesorios</option>
        <option>Servicios</option>
    </select>
    <input type=\"text\" placeholder=\"Factura\" >
    <input type=\"text\" placeholder=\"Serie\" >
</section>

<table class=\"table\">
    <!--<caption>Optional table caption.</caption>-->
    <thead>
    <tr>
        <th>#</th>
        <th>Tipo</th>
        <th>Descripcion</th>
        <th>Serie</th>
        <th>Marca</th>
        <th>Cliente</th>
        <th>Factura</th>
        <th>Fecha Inicial</th>
        <th>Tiempo de vigencia</th>
        <th>vigencia</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope=\"row\">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <th scope=\"row\">2</th>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <th scope=\"row\">3</th>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
    </tr>
    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 62,  100 => 61,  90 => 143,  88 => 61,  83 => 59,  77 => 56,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->*/
/*     <title>Bootstrap 101 Template</title>*/
/* */
/*     <!-- Bootstrap -->*/
/*     <link href="html/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/*     <!-- estilos -->*/
/*     <link href="css/estilos.css" rel="stylesheet">*/
/* */
/*     <!-- js -->*/
/*     <script src="js/load.js" type="text/javascript" ></script>*/
/* */
/*     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>*/
/*     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* </head>*/
/* <body>*/
/* */
/* <!-- view -->*/
/* <input type="hidden" value="home" id="view" >*/
/* */
/* <div class="page-header">*/
/*     <h1>Modulo Vigencias <small>datos de vigencias</small></h1>*/
/* </div>*/
/* */
/* <nav class="navbar navbar-inverse">*/
/* */
/*     <div class="container-fluid">*/
/*         <div class="navbar-header">*/
/*             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">*/
/*                 <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span> <span class="icon-bar"></span>*/
/*             </button>*/
/*             <a class="navbar-brand" href="#">Inicio</a>*/
/*         </div>*/
/*         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">*/
/*             <ul class="nav navbar-nav">*/
/*                 <li class="active"><a href="index.php?view=home">Vigencias</a></li>*/
/*                 <li><a href="index.php?view=importar">Importar Data</a></li>*/
/*                 <li><a href="Javascript:salir()">Salir</a></li>*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/* </nav>*/
/* */
/* <span class="user" >*/
/*     {{ usuario }}*/
/* </span>*/
/* */
/* <span>{{ mensaje }}</span>*/
/* */
/* {% block content %}*/
/* */
/* <section>*/
/*     <select>*/
/*         <option>todas</option>*/
/*         <option>vencidas</option>*/
/*         <option>por vencer</option>*/
/*     </select>*/
/*     <select>*/
/*         <option>todas</option>*/
/*         <option>2016</option>*/
/*         <option>2015</option>*/
/*         <option>2014</option>*/
/*         <option>2013</option>*/
/*     </select>*/
/*     <select>*/
/*         <option>Todas</option>*/
/*         <option>Suministros</option>*/
/*         <option>Accesorios</option>*/
/*         <option>Servicios</option>*/
/*     </select>*/
/*     <input type="text" placeholder="Factura" >*/
/*     <input type="text" placeholder="Serie" >*/
/* </section>*/
/* */
/* <table class="table">*/
/*     <!--<caption>Optional table caption.</caption>-->*/
/*     <thead>*/
/*     <tr>*/
/*         <th>#</th>*/
/*         <th>Tipo</th>*/
/*         <th>Descripcion</th>*/
/*         <th>Serie</th>*/
/*         <th>Marca</th>*/
/*         <th>Cliente</th>*/
/*         <th>Factura</th>*/
/*         <th>Fecha Inicial</th>*/
/*         <th>Tiempo de vigencia</th>*/
/*         <th>vigencia</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody>*/
/*     <tr>*/
/*         <th scope="row">1</th>*/
/*         <td>Mark</td>*/
/*         <td>Otto</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>Mark</td>*/
/*         <td>Otto</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <th scope="row">2</th>*/
/*         <td>Otto</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>Mark</td>*/
/*         <td>Otto</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <th scope="row">3</th>*/
/*         <td>Otto</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>Mark</td>*/
/*         <td>Otto</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*         <td>@mdo</td>*/
/*     </tr>*/
/*     </tbody>*/
/* </table>*/
/* */
/* {% endblock %}*/
/* */
/* <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->*/
/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>*/
/* <!-- Include all compiled plugins (below), or include individual files as needed -->*/
/* <script src="html/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>*/
/* </body>*/
/* </html>*/
