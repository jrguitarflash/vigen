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


    <!-- jquery -->

        <script src=\"js/jquery-2.2.3.js\" type=\"text/javascript\"></script>


    <!-- jquery ui-->

        <!-- jquery ui css -->
        <link href=\"js/jquery-ui-1.11.4.custom/jquery-ui.min.css\" rel=\"stylesheet\" >

        <!-- jquery ui -->
        <script src=\"js/jquery-ui-1.11.4.custom/jquery-ui.js\" type=\"text/javascript\" ></script>


    <!-- OWNER -->

        <!-- functions -->
        <script src=\"functions.js\" type=\"text/javascript\"></script>

        <!-- js -->
        <script src=\"js/load.js\" type=\"text/javascript\" ></script>

        <!-- css -->
        <link href=\"css/estilos.css\" rel=\"stylesheet\">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>

<!-- view -->
<input type=\"hidden\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["view"]) ? $context["view"] : null), "html", null, true);
        echo "\" id=\"view\" >

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
                <li><a href=\"index.php?view=alertas\" >Alertas</a></li>
                <li><a href=\"Javascript:salir()\">Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<span class=\"user\" >
    ";
        // line 78
        echo twig_escape_filter($this->env, (isset($context["usuario"]) ? $context["usuario"] : null), "html", null, true);
        echo "
</span>

<span id=\"mensaje\" >";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["mensaje"]) ? $context["mensaje"] : null), "html", null, true);
        echo "</span>

";
        // line 83
        $this->displayBlock('content', $context, $blocks);
        // line 159
        echo "
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src=\"html/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    // line 83
    public function block_content($context, array $blocks = array())
    {
        // line 84
        echo "
<section>
    <select id=\"est_fil\" >
        <option value=\"0\" >Todas</option>
        ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipVig"]) ? $context["tipVig"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tip"]) {
            // line 89
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tip"], "tip_vigen_id", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tip"], "tip_vigen_des", array()), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "    </select>
    <select id=\"anu_fil\" >
        <option value=\"0\" >Todas</option>
        ";
        // line 94
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["anVen"]) ? $context["anVen"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["an"]) {
            // line 95
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["an"], "anVen", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["an"], "anVen", array()), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['an'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "    </select>
    <select id=\"tip_fil\" >
        <option value=\"0\" >Todas</option>
        ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipProd"]) ? $context["tipProd"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tip"]) {
            // line 101
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tip"], "tip_prod_id", array()), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tip"], "tip_prod_des", array()), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "    </select>
    <input type=\"text\" placeholder=\"CC\" id=\"vigen_cc_des\" >
    <input type=\"hidden\" placeholder=\"CC\" id=\"vigen_cc_id\" >
    <!--<input type=\"text\" placeholder=\"Factura\" >-->
    <!--<input type=\"text\" placeholder=\"Serie\" >-->
</section>

<table class=\"table\">
    <!--<caption>Optional table caption.</caption>-->
    <thead>
    <tr>
        <th>#</th>
        <th>CC</th>
        <th>Proyecto</th>
        <th>Cliente</th>
        <th>Factura</th>
        <th>Contacto</th>
        <th>Email</th>
        <th>Tip Prod</th>
        <th>Des Prod</th>
        <th>Serie</th>
        <th>Marca</th>
        <th>Fecha Inicial</th>
        <th>Fecha de vigencia</th>
        <th>vigencia</th>
        <th>Dias</th>
    </tr>
    </thead>
    <tbody id=\"vigen_tab_ajax\" >
    ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vigen"]) ? $context["vigen"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["vig"]) {
            // line 133
            echo "    <tr>
        <th scope=\"row\">";
            // line 134
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_id", array()), "html", null, true);
            echo "</th>
        <td>";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_cc", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 136
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_proy", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 137
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_cli", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_fac", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 139
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_contac", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 140
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_mail", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 141
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "tip_prod", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_des", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_seri", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 144
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_mar", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 145
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_fechIni", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_fechVigen", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 147
            echo $this->getAttribute($context["vig"], "esta_vigen", array());
            echo "</td>
        ";
            // line 148
            if (($this->getAttribute($context["vig"], "dif_fech", array()) > 0)) {
                // line 149
                echo "        <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "dif_fech", array()), "html", null, true);
                echo "</td>
        ";
            } else {
                // line 151
                echo "        <td>";
                echo twig_escape_filter($this->env, ($this->getAttribute($context["vig"], "dif_fech", array()) *  -1), "html", null, true);
                echo "</td>
        ";
            }
            // line 153
            echo "    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vig'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 155
        echo "    </tbody>
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
        return array (  304 => 155,  297 => 153,  291 => 151,  285 => 149,  283 => 148,  279 => 147,  275 => 146,  271 => 145,  267 => 144,  263 => 143,  259 => 142,  255 => 141,  251 => 140,  247 => 139,  243 => 138,  239 => 137,  235 => 136,  231 => 135,  227 => 134,  224 => 133,  220 => 132,  189 => 103,  178 => 101,  174 => 100,  169 => 97,  158 => 95,  154 => 94,  149 => 91,  138 => 89,  134 => 88,  128 => 84,  125 => 83,  115 => 159,  113 => 83,  108 => 81,  102 => 78,  71 => 50,  20 => 1,);
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
/* */
/*         <link href="html/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/* */
/*     <!-- jquery -->*/
/* */
/*         <script src="js/jquery-2.2.3.js" type="text/javascript"></script>*/
/* */
/* */
/*     <!-- jquery ui-->*/
/* */
/*         <!-- jquery ui css -->*/
/*         <link href="js/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" >*/
/* */
/*         <!-- jquery ui -->*/
/*         <script src="js/jquery-ui-1.11.4.custom/jquery-ui.js" type="text/javascript" ></script>*/
/* */
/* */
/*     <!-- OWNER -->*/
/* */
/*         <!-- functions -->*/
/*         <script src="functions.js" type="text/javascript"></script>*/
/* */
/*         <!-- js -->*/
/*         <script src="js/load.js" type="text/javascript" ></script>*/
/* */
/*         <!-- css -->*/
/*         <link href="css/estilos.css" rel="stylesheet">*/
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
/* <input type="hidden" value="{{ view }}" id="view" >*/
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
/*                 <li><a href="index.php?view=alertas" >Alertas</a></li>*/
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
/* <span id="mensaje" >{{ mensaje }}</span>*/
/* */
/* {% block content %}*/
/* */
/* <section>*/
/*     <select id="est_fil" >*/
/*         <option value="0" >Todas</option>*/
/*         {% for tip in tipVig %}*/
/*         <option value="{{ tip.tip_vigen_id }}" >{{ tip.tip_vigen_des }}</option>*/
/*         {% endfor %}*/
/*     </select>*/
/*     <select id="anu_fil" >*/
/*         <option value="0" >Todas</option>*/
/*         {% for an in anVen %}*/
/*         <option value="{{ an.anVen }}" >{{ an.anVen }}</option>*/
/*         {% endfor %}*/
/*     </select>*/
/*     <select id="tip_fil" >*/
/*         <option value="0" >Todas</option>*/
/*         {% for tip in tipProd %}*/
/*         <option value="{{ tip.tip_prod_id }}" >{{ tip.tip_prod_des }}</option>*/
/*         {% endfor %}*/
/*     </select>*/
/*     <input type="text" placeholder="CC" id="vigen_cc_des" >*/
/*     <input type="hidden" placeholder="CC" id="vigen_cc_id" >*/
/*     <!--<input type="text" placeholder="Factura" >-->*/
/*     <!--<input type="text" placeholder="Serie" >-->*/
/* </section>*/
/* */
/* <table class="table">*/
/*     <!--<caption>Optional table caption.</caption>-->*/
/*     <thead>*/
/*     <tr>*/
/*         <th>#</th>*/
/*         <th>CC</th>*/
/*         <th>Proyecto</th>*/
/*         <th>Cliente</th>*/
/*         <th>Factura</th>*/
/*         <th>Contacto</th>*/
/*         <th>Email</th>*/
/*         <th>Tip Prod</th>*/
/*         <th>Des Prod</th>*/
/*         <th>Serie</th>*/
/*         <th>Marca</th>*/
/*         <th>Fecha Inicial</th>*/
/*         <th>Fecha de vigencia</th>*/
/*         <th>vigencia</th>*/
/*         <th>Dias</th>*/
/*     </tr>*/
/*     </thead>*/
/*     <tbody id="vigen_tab_ajax" >*/
/*     {% for vig in vigen %}*/
/*     <tr>*/
/*         <th scope="row">{{ vig.vigen_id }}</th>*/
/*         <td>{{ vig.vigen_cc }}</td>*/
/*         <td>{{ vig.vigen_proy }}</td>*/
/*         <td>{{ vig.vigen_cli }}</td>*/
/*         <td>{{ vig.vigen_fac }}</td>*/
/*         <td>{{ vig.vigen_contac }}</td>*/
/*         <td>{{ vig.vigen_mail }}</td>*/
/*         <td>{{ vig.tip_prod }}</td>*/
/*         <td>{{ vig.vigen_des }}</td>*/
/*         <td>{{ vig.vigen_seri }}</td>*/
/*         <td>{{ vig.vigen_mar }}</td>*/
/*         <td>{{ vig.vigen_fechIni }}</td>*/
/*         <td>{{ vig.vigen_fechVigen }}</td>*/
/*         <td>{{ vig.esta_vigen|raw }}</td>*/
/*         {% if vig.dif_fech>0 %}*/
/*         <td>{{ vig.dif_fech }}</td>*/
/*         {% else %}*/
/*         <td>{{ vig.dif_fech*-1 }}</td>*/
/*         {% endif %}*/
/*     </tr>*/
/*     {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
/* {% endblock %}*/
/* */
/* <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->*/
/* <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->*/
/* <!-- Include all compiled plugins (below), or include individual files as needed -->*/
/* <script src="html/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>*/
/* </body>*/
/* </html>*/
