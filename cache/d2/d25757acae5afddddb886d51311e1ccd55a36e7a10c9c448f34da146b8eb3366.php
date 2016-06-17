<?php

/* home_vig.html */
class __TwigTemplate_69e0f05ff3dcc025f958731b1a7a9919a66958a675b2b8b1048d01bc57233310 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vigen"]) ? $context["vigen"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["vig"]) {
            // line 2
            echo "<tr>
    <th scope=\"row\">";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_id", array()), "html", null, true);
            echo "</th>
    <td>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_cc", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_proy", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_cli", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_fac", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_contac", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_mail", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "tip_prod", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_des", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_seri", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_mar", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_fechIni", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "vigen_fechVigen", array()), "html", null, true);
            echo "</td>
    <td>";
            // line 16
            echo $this->getAttribute($context["vig"], "esta_vigen", array());
            echo "</td>
    ";
            // line 17
            if (($this->getAttribute($context["vig"], "dif_fech", array()) > 0)) {
                // line 18
                echo "    <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["vig"], "dif_fech", array()), "html", null, true);
                echo "</td>
    ";
            } else {
                // line 20
                echo "    <td>";
                echo twig_escape_filter($this->env, ($this->getAttribute($context["vig"], "dif_fech", array()) *  -1), "html", null, true);
                echo "</td>
    ";
            }
            // line 22
            echo "</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vig'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "home_vig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 22,  90 => 20,  84 => 18,  82 => 17,  78 => 16,  74 => 15,  70 => 14,  66 => 13,  62 => 12,  58 => 11,  54 => 10,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }
}
/* {% for vig in vigen %}*/
/* <tr>*/
/*     <th scope="row">{{ vig.vigen_id }}</th>*/
/*     <td>{{ vig.vigen_cc }}</td>*/
/*     <td>{{ vig.vigen_proy }}</td>*/
/*     <td>{{ vig.vigen_cli }}</td>*/
/*     <td>{{ vig.vigen_fac }}</td>*/
/*     <td>{{ vig.vigen_contac }}</td>*/
/*     <td>{{ vig.vigen_mail }}</td>*/
/*     <td>{{ vig.tip_prod }}</td>*/
/*     <td>{{ vig.vigen_des }}</td>*/
/*     <td>{{ vig.vigen_seri }}</td>*/
/*     <td>{{ vig.vigen_mar }}</td>*/
/*     <td>{{ vig.vigen_fechIni }}</td>*/
/*     <td>{{ vig.vigen_fechVigen }}</td>*/
/*     <td>{{ vig.esta_vigen|raw }}</td>*/
/*     {% if vig.dif_fech>0 %}*/
/*     <td>{{ vig.dif_fech }}</td>*/
/*     {% else %}*/
/*     <td>{{ vig.dif_fech*-1 }}</td>*/
/*     {% endif %}*/
/* </tr>*/
/* {% endfor %}*/
