<?php

/* OVTFrontEndProviderBundle:Provider:menuNew.html.twig */
class __TwigTemplate_29b35118c03603685b7fd7dfd9c88f21be472f52af0e01d19bce225a6c1f8023 extends Twig_Template
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
        echo "<a href=\"";
        echo $this->env->getExtension('routing')->getPath("ovt_front_end_provider_calendar");
        echo "\" >
 \t<div class=\"tab_bar_left tab_bar_left_1  subtitle_color_fill\">
\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\" width=\"32\" height=\"26\" viewBox=\"0 0 64 53\">
\t\t\t<use xlink:href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/logo_2.svg"), "html", null, true);
        echo "#logo_2\"></use>
\t\t</svg>
\t</div>
</a>

<a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("ovt_front_end_provider_my_sessions");
        echo "\" >
\t<div class=\"tab_bar_left tab_bar_left_2 subtitle_color_fill\">
\t\t<span style=\"z-index:100;float:right\">
\t\t\t(";
        // line 12
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("OVTFrontEndProviderBundle:ProviderAdmin:getPlanifiedSessions"));
        echo ")
\t\t</span>
\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\" width=\"24\" height=\"26\" viewBox=\"0 0 47 52\">
\t\t\t<use xlink:href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/logo_4.svg"), "html", null, true);
        echo "#logo_4\"></use>
\t\t</svg>
\t</div>
</a>

<a \thref=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("ovt_front_end_provider_archives");
        echo "\" >
\t<div class=\"tab_bar_left tab_bar_left_3 subtitle_color_fill\">
\t\t<div class=\"notif_round_tab_bar theme_color_background\"></div>
\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\" width=\"33\" height=\"20\" viewBox=\"0 0 66 41\">
\t\t\t<use xlink:href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/logo_3.svg"), "html", null, true);
        echo "#logo_3\"></use>
\t\t</svg>
\t</div>
</a>

<a  href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("ovt_front_end_provider_profile");
        echo "\"  > 
\t<div class=\"tab_bar_left tab_bar_left_4 subtitle_color_fill \">
\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\" width=\"24\" height=\"27\" viewBox=\"0 0 48 54\">
\t\t\t<use xlink:href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/logo_5.svg"), "html", null, true);
        echo "#logo_5\"></use>
\t\t</svg>
\t</div>
</a>";
    }

    public function getTemplateName()
    {
        return "OVTFrontEndProviderBundle:Provider:menuNew.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 32,  69 => 29,  61 => 24,  54 => 20,  46 => 15,  40 => 12,  34 => 9,  26 => 4,  19 => 1,);
    }
}
