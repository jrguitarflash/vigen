<?php

/* alertas.html */
class __TwigTemplate_0ce465c1ec0725158f88593647da782791baf57481ecdb4a1ea8e0ad9e8c8dde extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("home.html", "alertas.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "home.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<form name=\"alert\" method=\"post\" >

    <h3>Frecuencia</h3>
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["frecuAler"]) ? $context["frecuAler"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["frec"]) {
            // line 9
            echo "    <span>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["frec"], "vigen_frecu_des", array()), "html", null, true);
            echo "</span>&nbsp;<input type=\"radio\" name=\"alert_frecu\"  value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["frec"], "vigen_frecu_id", array()), "html", null, true);
            echo "\" >
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['frec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
    <h3>Vigencia</h3>
    <span>Estado:</span>
    <select id=\"estaVig\" name=\"estaVig\" >
        <option value=\"0\" >Todos</option>
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipVig"]) ? $context["tipVig"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tip"]) {
            // line 17
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
        // line 19
        echo "    </select>
    <span>Año:</span>
    <select id=\"anVig\" name=\"anVig\" >
        <option value=\"0\" >Todos</option>
        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["anVen"]) ? $context["anVen"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["an"]) {
            // line 24
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
        // line 26
        echo "    </select>
    <span>Tipo:</span>
    <select id=\"tipVig\" name=\"tipVig\" >
        <option value=\"0\" >Todos</option>
        ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tipProd"]) ? $context["tipProd"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tip"]) {
            // line 31
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
        // line 33
        echo "    </select>

    <br>
    <br>
    <input type=\"button\" value=\"Guardar\" onclick=\"config_alert()\" >
    <input type=\"hidden\" name=\"action\" value=\"alertar\" >
    <input type=\"hidden\" name=\"id_alert\" id=\"id_alert\" value=\"0\" >

</form>

<h3>Destinatarios</h3>

<span class=\"lbl_ale\" >Nombre</span><input type=\"text\" id=\"nom\" ><br><br>
<span class=\"lbl_ale\" >Email</span><input type=\"text\" id=\"mail\" >

<br>
<br>
<input type=\"button\" value=\"Agregar\" onclick=\"ope_desti('agre',0)\" >
<table class=\"table\">
    <!--<caption>Optional table caption.</caption>-->
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <td>Email</td>
            <td>-</td>
        </tr>
    </thead>
    <tbody id=\"desti_tab_ajax\" >
        ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["desti"]) ? $context["desti"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["des"]) {
            // line 63
            echo "        <tr>
            <td>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "id", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "nom", array()), "html", null, true);
            echo "</td>
            <td>";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "mail", array()), "html", null, true);
            echo "</td>
            <td><a href=\"Javascript:ope_desti('del','";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "id", array()), "html", null, true);
            echo "')\" >X</a></td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['des'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "alertas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 70,  166 => 67,  162 => 66,  158 => 65,  154 => 64,  151 => 63,  147 => 62,  116 => 33,  105 => 31,  101 => 30,  95 => 26,  84 => 24,  80 => 23,  74 => 19,  63 => 17,  59 => 16,  52 => 11,  41 => 9,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "home.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <form name="alert" method="post" >*/
/* */
/*     <h3>Frecuencia</h3>*/
/*     {% for frec in frecuAler %}*/
/*     <span>{{ frec.vigen_frecu_des }}</span>&nbsp;<input type="radio" name="alert_frecu"  value="{{ frec.vigen_frecu_id }}" >*/
/*     {% endfor %}*/
/* */
/*     <h3>Vigencia</h3>*/
/*     <span>Estado:</span>*/
/*     <select id="estaVig" name="estaVig" >*/
/*         <option value="0" >Todos</option>*/
/*         {% for tip in tipVig %}*/
/*         <option value="{{ tip.tip_vigen_id }}" >{{ tip.tip_vigen_des }}</option>*/
/*         {% endfor %}*/
/*     </select>*/
/*     <span>Año:</span>*/
/*     <select id="anVig" name="anVig" >*/
/*         <option value="0" >Todos</option>*/
/*         {% for an in anVen %}*/
/*         <option value="{{ an.anVen }}" >{{ an.anVen }}</option>*/
/*         {% endfor %}*/
/*     </select>*/
/*     <span>Tipo:</span>*/
/*     <select id="tipVig" name="tipVig" >*/
/*         <option value="0" >Todos</option>*/
/*         {% for tip in tipProd %}*/
/*         <option value="{{ tip.tip_prod_id }}" >{{ tip.tip_prod_des }}</option>*/
/*         {% endfor %}*/
/*     </select>*/
/* */
/*     <br>*/
/*     <br>*/
/*     <input type="button" value="Guardar" onclick="config_alert()" >*/
/*     <input type="hidden" name="action" value="alertar" >*/
/*     <input type="hidden" name="id_alert" id="id_alert" value="0" >*/
/* */
/* </form>*/
/* */
/* <h3>Destinatarios</h3>*/
/* */
/* <span class="lbl_ale" >Nombre</span><input type="text" id="nom" ><br><br>*/
/* <span class="lbl_ale" >Email</span><input type="text" id="mail" >*/
/* */
/* <br>*/
/* <br>*/
/* <input type="button" value="Agregar" onclick="ope_desti('agre',0)" >*/
/* <table class="table">*/
/*     <!--<caption>Optional table caption.</caption>-->*/
/*     <thead>*/
/*         <tr>*/
/*             <th>#</th>*/
/*             <th>Nombre</th>*/
/*             <td>Email</td>*/
/*             <td>-</td>*/
/*         </tr>*/
/*     </thead>*/
/*     <tbody id="desti_tab_ajax" >*/
/*         {% for des in desti %}*/
/*         <tr>*/
/*             <td>{{ des.id }}</td>*/
/*             <td>{{ des.nom }}</td>*/
/*             <td>{{ des.mail }}</td>*/
/*             <td><a href="Javascript:ope_desti('del','{{des.id}}')" >X</a></td>*/
/*         </tr>*/
/*         {% endfor %}*/
/*     </tbody>*/
/* </table>*/
/* */
/* {% endblock %}*/
