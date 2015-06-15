<?php

/* OVTFrontEndProviderBundle:Provider:sessionsTable.html.twig */
class __TwigTemplate_5253b7e9f15d90016b316be5e577741371d38b060b5656113a4703fab9a4ec40 extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sessions"]) ? $context["sessions"] : $this->getContext($context, "sessions")));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 2
            echo "\t<div class=\"type_historique subtitle_color_text\" ng-click=\"setSelectedSession(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "id", array()), "html", null, true);
            echo ")\">
\t\t<div class=\"element_historique_container_historique element_historique_container_historique_date\">
\t\t\t<div class=\"content_element_historique content_element_historique_date\">
\t\t\t\t";
            // line 5
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["s"], "requestdate", array()), "d/m/y H:i:s"), "html", null, true);
            echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"element_historique_container_historique element_historique_container_historique_name\">
\t\t\t<div class=\"content_element_historique content_element_historique_name\">
\t\t\t\t<td>";
            // line 10
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["s"], "client", array()), "user", array()), "firstname", array()) . " ") . $this->getAttribute($this->getAttribute($this->getAttribute($context["s"], "client", array()), "user", array()), "lastname", array())), "html", null, true);
            echo "</td>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"element_historique_container_historique element_historique_container_historique_duree\">
\t\t\t<div class=\"content_element_historique\">
\t\t\t\t";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "title", array()), "html", null, true);
            echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"element_historique_container_historique element_historique_container_historique_canal\">
\t\t\t<div class=\"content_element_historique content_element_historique_canal\">
\t\t\t\t";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["s"], "service", array()), "name", array()), "html", null, true);
            echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"element_historique_container_historique element_historique_container_historique_date\">
\t\t\t<div class=\"content_element_historique content_element_historique_date\">
\t\t\t\t";
            // line 25
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["s"], "starttime", array()), "d/m/y H:i:s"), "html", null, true);
            echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"element_historique_container_historique element_historique_container_historique_date\">
\t\t\t<div class=\"content_element_historique content_element_historique_date\">
\t\t\t\t";
            // line 30
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["s"], "endtime", array()), "d/m/y H:i:s"), "html", null, true);
            echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"element_historique_container_historique element_historique_container_historique_commentaire\">
\t\t\t<div class=\"content_element_historique content_element_historique_commentaire\">
\t\t\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\" width=\"10\" height=\"12\" viewBox=\"0 0 19 23\" class=\"title_color_fill\">
\t\t\t\t\t<use xlink:href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/commentaire_logo.svg"), "html", null, true);
            echo "#commentaire_logo\"></use>
\t\t\t\t</svg>
\t\t\t\t<div class=\"container_drop_down_commentaire\">
\t\t\t\t\t<div class=\"arrow_drop_down_commentaire\">
\t\t\t\t\t\t<img src=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/arrow_drop_down.png"), "html", null, true);
            echo "\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"drop_down_commentaire\">
\t\t\t\t\t\t<div class=\"cross_close_drop_down_commentaire\">
\t\t\t\t\t\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\" width=\"7\" height=\"7\" viewBox=\"0 0 13 13\" class=\"subtitle_color_fill\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/cross_close_drop_down.svg"), "html", null, true);
            echo "#cross_close_drop_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<textarea class=\"subtitle_color_border_08 subtitle_color_text textarea_commentaire\" placeholder=\"Ajouter votre commentaire...\">";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute($context["s"], "description", array()), "html", null, true);
            echo "</textarea> 
\t\t\t\t\t</div>
\t\t\t\t</div> 
\t\t\t</div>
\t\t</div> 
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "OVTFrontEndProviderBundle:Provider:sessionsTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 48,  94 => 45,  86 => 40,  79 => 36,  70 => 30,  62 => 25,  54 => 20,  46 => 15,  38 => 10,  30 => 5,  23 => 2,  19 => 1,);
    }
}
