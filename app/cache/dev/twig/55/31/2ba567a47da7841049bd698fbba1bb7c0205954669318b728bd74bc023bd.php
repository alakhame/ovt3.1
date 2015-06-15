<?php

/* OVTFrontEndProviderBundle:Provider:sessions.html.twig */
class __TwigTemplate_55312ba567a47da7841049bd698fbba1bb7c0205954669318b728bd74bc023bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::baseProfil.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'tabTitle' => array($this, 'block_tabTitle'),
            'menu' => array($this, 'block_menu'),
            'containerTab' => array($this, 'block_containerTab'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::baseProfil.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "\t\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ress/css/gestion.css"), "html", null, true);
        echo "\" /> 
\t<link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ress/css/bootstrap.css"), "html", null, true);
        echo "\" /> 
\t<script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ress/js/angular.js"), "html", null, true);
        echo "\" > </script>
\t<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ress/js/jquery.js"), "html", null, true);
        echo "\" > </script>
\t<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>

\t<script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ress/js/bootstrap.min.js"), "html", null, true);
        echo "\" > </script>

\t";
    }

    // line 16
    public function block_tabTitle($context, array $blocks = array())
    {
        echo " 
 \t\t<div class=\"header_tab_4 header_tab\" style=\"display: block;\">
\t\t\t<div class=\"title_tab title_tab_4\">Gestion des demandes  </div>
\t\t</div> \t
\t";
    }

    // line 22
    public function block_menu($context, array $blocks = array())
    {
        // line 23
        echo "\t\t";
        $this->env->loadTemplate("OVTFrontEndProviderBundle:Provider:menuNew.html.twig")->display($context);
        // line 24
        echo "\t";
    }

    // line 26
    public function block_containerTab($context, array $blocks = array())
    {
        echo "   
\t<div id=\"wrap\" class=\"container_tab_1 container_tab \" ng-app=\"OVTApp\" ng-controller=\"sessionsCtrl\" data-ng-init=\"init()\" >
\t\t<div class=\"container_notif_rdv\">
\t\t\t<div class=\"SessionTabbuttons theme_color_background\"  ng-click=\"viewPlanifiees()\" >    \t\t\t\t 
\t\t\t\tDemandes planifiées
\t\t\t</div>
\t\t\t<div class=\"SessionTabbuttons theme_color_background\"  ng-click=\"viewAnnulees()\" >
\t\t\t\tDemandes annulées \t\t\t
\t\t\t</div>  
\t\t\t<div class=\"SessionTabbuttons theme_color_background\"  ng-click=\"viewRefusees()\">
\t\t\t\tDemandes refusées
\t\t\t</div> 
\t\t</div>

\t\t<div class=\"container_historique\" style=\"height:55%\">
\t\t\t<div class=\"header_container_historique title_color_text\">
\t\t\t\t<div class=\"element_header_container_historique element_header_container_historique_date\">
\t\t\t\t\tDate Demande
\t\t\t\t\t<div class=\"container_arrow_element_heade_historique\">
\t\t\t\t\t\t<div class=\"container_arrow_element_heade_historique_position active\">
\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"8\" height=\"6\" viewBox=\"0 0 12 7\" class=\"title_color_text\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/arrow_down.svg"), "html", null, true);
        echo "#arrow_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div><div class=\"element_header_container_historique element_header_container_historique_name\">
\t\t\t\t\t<span class=\"name_element_1\"> Client </span> 
\t\t\t\t\t<div class=\"container_arrow_element_heade_historique\">
\t\t\t\t\t\t<div class=\"container_arrow_element_heade_historique_position\">
\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"8\" height=\"6\" viewBox=\"0 0 12 7\" class=\"title_color_text\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/arrow_down.svg"), "html", null, true);
        echo "#arrow_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div> <div class=\"element_header_container_historique element_header_container_historique_duree\">
\t\t\t\t\t<span class=\"name_element_1\"> Intitulé </span> 
\t\t\t\t\t<div class=\"container_arrow_element_heade_historique\">
\t\t\t\t\t\t<div class=\"container_arrow_element_heade_historique_position\">
\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"8\" height=\"6\" viewBox=\"0 0 12 7\" class=\"title_color_text\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/arrow_down.svg"), "html", null, true);
        echo "#arrow_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div><div class=\"element_header_container_historique element_header_container_historique_canal\">
\t\t\t\t\t<span class=\"name_element_1\">Service</span> 
\t\t\t\t\t<div class=\"container_arrow_element_heade_historique\">
\t\t\t\t\t\t<div class=\"container_arrow_element_heade_historique_position\">
\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"8\" height=\"6\" viewBox=\"0 0 12 7\" class=\"title_color_text\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/arrow_down.svg"), "html", null, true);
        echo "#arrow_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div><div class=\"element_header_container_historique element_header_container_historique_date\">
\t\t\t\t\tDebut 
\t\t\t\t\t<div class=\"container_arrow_element_heade_historique\">
\t\t\t\t\t\t<div class=\"container_arrow_element_heade_historique_position active\">
\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"8\" height=\"6\" viewBox=\"0 0 12 7\" class=\"title_color_text\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/arrow_down.svg"), "html", null, true);
        echo "#arrow_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div><div class=\"element_header_container_historique element_header_container_historique_date\">
\t\t\t\t\tFin
\t\t\t\t\t<div class=\"container_arrow_element_heade_historique\">
\t\t\t\t\t\t<div class=\"container_arrow_element_heade_historique_position active\">
\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"8\" height=\"6\" viewBox=\"0 0 12 7\" class=\"title_color_text\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/arrow_down.svg"), "html", null, true);
        echo "#arrow_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div><div class=\"element_header_container_historique element_header_container_historique_commentaire\">
\t\t\t\t\tDescription
\t\t\t\t\t<div class=\"container_arrow_element_heade_historique\">
\t\t\t\t\t\t<div class=\"container_arrow_element_heade_historique_position\">
\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"8\" height=\"6\" viewBox=\"0 0 12 7\" class=\"title_color_text\">
\t\t\t\t\t\t\t\t<use xlink:href=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/arrow_down.svg"), "html", null, true);
        echo "#arrow_down\"></use>
\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div> 
\t\t\t</div>

\t\t\t<!-- SEPARATOR --> 
\t\t\t<!-- Begin list sessions -->
\t\t\t<div id=\"sessionElementsTab\">
\t\t\t<div id=\"tablePlanifees\"  ng-show=\"!atraiterFlag && planifieesFlag && !annuleesFlag && !refuseesFlag \">
\t\t\t\t";
        // line 115
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("OVTFrontEndProviderBundle:Provider:getSessionsByState", array("state" => "ACCEPTED")));
        echo "
\t\t\t</div>

\t\t\t<div id=\"tableAnnulees\" ng-show=\"!atraiterFlag && !planifieesFlag && annuleesFlag && !refuseesFlag \">
\t\t\t\t";
        // line 119
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("OVTFrontEndProviderBundle:Provider:getSessionsByState", array("state" => "CANCELED")));
        echo "
\t\t\t</div>

\t\t\t<div id=\"tableARefusees\"   ng-show=\"!atraiterFlag && !planifieesFlag && !annuleesFlag && refuseesFlag \">
\t\t\t\t";
        // line 123
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("OVTFrontEndProviderBundle:Provider:getSessionsByState", array("state" => "REFUSED")));
        echo "
\t\t\t</div>
\t\t\t</div> 
\t\t\t<!-- end list sessions -->
\t\t</div>

\t\t<!-- SEPARATOR -->
\t\t<div class=\"container_middle_historique\" style=\"height:5%; margin-top:15px;margin-bottom:10px;\">
\t\t\t<div class=\"bar_container_middle_historique subtitle_color_background_08\"></div>
\t\t\t<div class=\"div_historique subtitle_color_text\">DETAILS</div>
\t\t</div> 

\t\t<!--- DETAILS -->
\t\t<div class=\"container_info_details\"> 
\t\t\t<div id=\"apercuPlanifiees\" ng-show=\"!firstload && planifieesFlag && !loading\">
\t\t\t\t<div class=\"SessionTabbuttons theme_color_background\" ng-click=\"refuse(session.id)\" >
\t\t\t\t\tREFUSER
\t\t\t\t</div>
\t\t\t\t<div class=\"SessionTabbuttons theme_color_background\" ng-click=\"cancel(session.id)\" >
\t\t\t\t\tANNULER
\t\t\t\t</div> 
\t\t\t</div>
\t\t\t<div id=\"apercuAnnulees\" ng-show=\"!firstload && annuleesFlag && !loading\">
\t\t\t\t<div class=\"SessionTabbuttons theme_color_background\" ng-click=\"delete(session.id)\" >
\t\t\t\t\tSUPPRIMER
\t\t\t\t</div>    
\t\t\t</div>
\t\t\t<div id=\"apercuRefusees\" ng-show=\"!firstload && refuseesFlag && !loading\">
\t\t\t\t<div class=\"SessionTabbuttons theme_color_background\" ng-click=\"delete(session.id)\" >
\t\t\t\t\tSUPPRIMER
\t\t\t\t</div>
\t\t\t\t<div class=\"SessionTabbuttons theme_color_background\" ng-click=\"restaure(session.id)\" >
\t\t\t\t\tRESTAURER
\t\t\t\t</div>  
\t\t\t</div>

\t\t\t";
        // line 197
        echo "
\t\t\t<div id=\"sessionDetails\" ng-show=\"atraiterFlag || planifieesFlag || annuleesFlag || refuseesFlag  \">
\t\t\t\t<div class=\"column_1_tab_4 column_tab_4_style\">
\t\t\t\t\t<div class=\"container_info_editable_user_style\">
\t\t\t\t\t\t<div class=\"content_info_editable_user_style title_color_text\">{{session.client}}</div>
\t\t\t\t\t\t<div class=\"name_info_editable_user_style subtitle_color_text\">Client</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"container_info_editable_user_style\">
\t\t\t\t\t\t<div class=\"content_info_editable_user_style title_color_text\">{{session.title}}</div>
\t\t\t\t\t\t<div class=\"name_info_editable_user_style subtitle_color_text\">Intitulé</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"container_info_editable_user_style\">
\t\t\t\t\t\t<div class=\"content_info_noneditable_user_style title_color_text\">{{session.type}}</div>
\t\t\t\t\t\t<div class=\"name_info_editable_user_style subtitle_color_text\">Contexte</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"container_info_editable_user_style\">
\t\t\t\t\t\t<div class=\"content_info_editable_user_style title_color_text\">
\t\t\t\t\t\t\t{{session.requestDate}}</div>
\t\t\t\t\t\t<div class=\"name_info_editable_user_style subtitle_color_text\">Demande</div>
\t\t\t\t\t</div> 
\t\t\t\t</div>
\t\t\t\t<div class=\"column_2_tab_4 column_tab_4_style\">
\t\t\t\t\t<div class=\"container_info_editable_user_style\">
\t\t\t\t\t\t<div class=\"content_info_editable_user_style title_color_text\">{{session.startTime}}</div>
\t\t\t\t\t\t<div class=\"name_info_editable_user_style subtitle_color_text\">Début</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"container_info_editable_user_style\">
\t\t\t\t\t\t<div class=\"content_info_editable_user_style title_color_text\">{{session.endTime}}</div>
\t\t\t\t\t\t<div class=\"name_info_editable_user_style subtitle_color_text\">Fin</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"container_info_editable_user_style\">
\t\t\t\t\t\t<div class=\"content_info_editable_user_style title_color_text\">
\t\t\t\t\t\t\t<textarea disabled>{{session.description}}</textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"name_info_editable_user_style subtitle_color_text\">Détails</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>\t\t\t\t
\t\t\t";
        echo "
\t\t</div>

 \t\t<div class=\"modal hide modal-static fade\"   id=\"waitingModal\"  data-backdrop=\"static\" data-keyboard=\"false\" href=\"#\" role=\"dialog\" aria-hidden=\"true\">
\t\t    <div class=\"modal-dialog\">
\t\t        <div class=\"modal-content\">
\t\t            <div class=\"modal-body\">
\t\t                <div class=\"text-center\">
\t\t                    <img src=\"http://www.travislayne.com/images/loading.gif\" class=\"icon\" />
\t\t                    <h4>Veuillez patienter... </h4>
\t\t                </div>
\t\t            </div>
\t\t        </div>
\t\t    </div>
\t\t</div>\t
  
\t\t
\t\t<script type=\"text/javascript\">
\t\t\tvar app = angular.module('OVTApp', []);
\t\t\t
\t\t\tapp.controller('sessionsCtrl', function(\$scope,\$http,\$location,\$window) {
\t\t\t\t
\t\t\t\t\$scope.init = function (){
\t\t\t\t\t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t\$scope.firstload=true;
\t\t\t\t\t//flags
\t\t\t\t\t\$scope.atraiterFlag   = false;
\t\t\t\t\t\$scope.planifieesFlag = true;
\t\t\t\t\t\$scope.annuleesFla    = false;
\t\t\t\t\t\$scope.refuseesFlag   = false;
\t\t\t\t\t
\t\t\t\t}

\t\t\t\t\$scope.setSelectedSession= function(idsession){
\t\t\t\t\t\$scope.firstload=false;
\t\t\t\t\t\$scope.loading = true; \$('#waitingModal').modal('show');
\t\t   \t\t\t";
        // line 233
        echo " var link=Routing.generate('ovt_front_end_admin_provider_get_session_by_id', {id:idsession}); ";
        echo "
\t\t   \t\t\t\$http.get(link).
\t\t\t\t  \tsuccess(function(data, status, headers, config) {
\t\t\t\t\t    \$scope.session=data;
\t\t\t\t\t    \$scope.loading = false; \$('#waitingModal').modal('hide');

\t\t\t\t  \t}).
\t\t\t\t \terror(function(data, status, headers, config) { });
\t\t\t\t}

\t\t\t\t\$scope.viewATraiter= function (){
\t\t\t\t\t\$scope.atraiterFlag=true;
\t\t\t\t\t\$scope.planifieesFlag=false;
\t\t\t\t\t\$scope.annuleesFlag=false;
\t\t\t\t\t\$scope.refuseesFlag=false;
\t\t\t\t\t\$scope.firstload=true;
\t\t\t\t}

\t\t\t\t\$scope.viewPlanifiees= function (){
\t\t\t\t\t\$scope.atraiterFlag=false;
\t\t\t\t\t\$scope.planifieesFlag=true;
\t\t\t\t\t\$scope.annuleesFlag=false;
\t\t\t\t\t\$scope.refuseesFlag=false;
\t\t\t\t\t\$scope.firstload=true;
\t\t\t\t}

\t\t\t\t\$scope.viewAnnulees= function (){
\t\t\t\t\t\$scope.atraiterFlag=false;
\t\t\t\t\t\$scope.planifieesFlag=false;
\t\t\t\t\t\$scope.annuleesFlag=true;
\t\t\t\t\t\$scope.refuseesFlag=false;
\t\t\t\t\t\$scope.firstload=true;
\t\t\t\t}

\t\t\t\t\$scope.viewRefusees= function (){
\t\t\t\t\t\$scope.atraiterFlag=false;
\t\t\t\t\t\$scope.planifieesFlag=false;
\t\t\t\t\t\$scope.annuleesFlag=false;
\t\t\t\t\t\$scope.refuseesFlag=true;
\t\t\t\t\t\$scope.firstload=true;
\t\t\t\t}

\t\t\t\t\$scope.refuse = function(idsession){
\t\t   \t\t\t";
        // line 277
        echo "var link=Routing.generate('ovt_front_end_admin_provider_action_session',{action:'refuse'});
\t\t   \t\t\t";
        echo "
\t\t\t\t\t\$scope.loading = true; \$('#waitingModal').modal('show');
\t\t\t\t\tvar confirmation = confirm(\"Voulez vraiment refuser cette réunion ?\");
\t\t\t\t\tif(confirmation){
\t\t\t\t\t\t\$http({
\t\t\t\t\t\t    method: 'POST',
\t\t\t\t\t\t    url: link,
\t\t\t\t\t\t    data: \"idSession=\"+idsession,
\t\t\t\t\t\t    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
\t\t\t\t\t\t}).
\t\t\t\t\t\tsuccess(function(data, status, headers, config) {
\t\t\t\t\t  \t\talert(\"Refus mené avec succès ! \");
\t\t\t\t\t     \t\$window.location.href=Routing.generate('ovt_front_end_provider_my_sessions'); 
\t\t\t\t\t  \t}).
\t\t\t\t\t  \terror(function(data, status, headers, config) {
\t\t\t\t\t    \talert(\"Refus échoué !\"+data);
\t\t\t\t\t    \t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t  \t});
\t\t\t\t\t  \t
\t\t\t\t\t}else {
\t\t\t\t\t\t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t}
\t\t   \t\t}

\t\t   \t\t\$scope.accept = function(idsession){
\t\t   \t\t\t";
        // line 303
        echo "var link=Routing.generate('ovt_front_end_admin_provider_action_session',{action:'accept'});
\t\t   \t\t\t";
        echo "
\t\t\t\t\t\$scope.loading = true; \$('#waitingModal').modal('show');
\t\t\t\t\tvar confirmation = confirm(\"Voulez vraiment accepter cette réunion ?\");
\t\t\t\t\tif(confirmation){
\t\t\t\t\t\t\$http({
\t\t\t\t\t\t    method: 'POST',
\t\t\t\t\t\t    url: link,
\t\t\t\t\t\t    data: \"idSession=\"+idsession,
\t\t\t\t\t\t    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
\t\t\t\t\t\t}).
\t\t\t\t\t\tsuccess(function(data, status, headers, config) {
\t\t\t\t\t  \t\talert(\"Acceptation menée avec succès ! \");
\t\t\t\t\t     \t\$window.location.href=Routing.generate('ovt_front_end_provider_my_sessions'); 
\t\t\t\t\t  \t}).
\t\t\t\t\t  \terror(function(data, status, headers, config) {
\t\t\t\t\t    \talert(\"Acceptation échouée !\"+data);
\t\t\t\t\t    \t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t  \t});
\t\t\t\t\t  \t
\t\t\t\t\t}else {
\t\t\t\t\t\t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t}
\t\t   \t\t}

\t\t   \t\t\$scope.delete = function(idsession){
\t\t   \t\t\t";
        // line 329
        echo "var link=Routing.generate('ovt_front_end_admin_provider_action_session',{action:'delete'});
\t\t   \t\t\t";
        echo "
\t\t\t\t\t\$scope.loading = true; \$('#waitingModal').modal('show');
\t\t\t\t\tvar confirmation = confirm(\"Voulez vraiment supprimer cette réunion ?\");
\t\t\t\t\tif(confirmation){
\t\t\t\t\t\t\$http({
\t\t\t\t\t\t    method: 'POST',
\t\t\t\t\t\t    url: link,
\t\t\t\t\t\t    data: \"idSession=\"+idsession,
\t\t\t\t\t\t    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
\t\t\t\t\t\t}).
\t\t\t\t\t\tsuccess(function(data, status, headers, config) {
\t\t\t\t\t  \t\talert(\"Suppression menée avec succès ! \");
\t\t\t\t\t     \t\$window.location.href=Routing.generate('ovt_front_end_provider_my_sessions'); 
\t\t\t\t\t  \t}).
\t\t\t\t\t  \terror(function(data, status, headers, config) {
\t\t\t\t\t    \talert(\"Suppression  échouée !\"+data);
\t\t\t\t\t    \t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t  \t});
\t\t\t\t\t  \t
\t\t\t\t\t}else {
\t\t\t\t\t\t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t}
\t\t   \t\t}

\t\t   \t\t\$scope.restaure = function(idsession){
\t\t   \t\t\t";
        // line 355
        echo "var link=Routing.generate('ovt_front_end_admin_provider_action_session',{action:'restaure'});
\t\t   \t\t\t";
        echo "
\t\t\t\t\t\$scope.loading = true; \$('#waitingModal').modal('show');
\t\t\t\t\tvar confirmation = confirm(\"Voulez vraiment restaurer cette réunion ?\");
\t\t\t\t\tif(confirmation){
\t\t\t\t\t\t\$http({
\t\t\t\t\t\t    method: 'POST',
\t\t\t\t\t\t    url: link,
\t\t\t\t\t\t    data: \"idSession=\"+idsession,
\t\t\t\t\t\t    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
\t\t\t\t\t\t}).
\t\t\t\t\t\tsuccess(function(data, status, headers, config) {
\t\t\t\t\t  \t\talert(\"Restauration menée avec succès ! \");
\t\t\t\t\t     \t\$window.location.href=Routing.generate('ovt_front_end_provider_my_sessions'); 
\t\t\t\t\t  \t}).
\t\t\t\t\t  \terror(function(data, status, headers, config) {
\t\t\t\t\t    \talert(\"Restauration  échouée !\"+data);
\t\t\t\t\t    \t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t  \t});
\t\t\t\t\t  \t
\t\t\t\t\t}else {
\t\t\t\t\t\t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t}
\t\t   \t\t}

\t\t   \t\t\$scope.cancel = function(idsession){
\t\t   \t\t\t";
        // line 381
        echo "var link=Routing.generate('ovt_front_end_admin_provider_action_session',{action:'cancel'});
\t\t   \t\t\t";
        echo "
\t\t\t\t\t\$scope.loading = true; \$('#waitingModal').modal('show');
\t\t\t\t\tvar confirmation = confirm(\"Voulez vraiment annuler cette réunion ?\");
\t\t\t\t\tif(confirmation){
\t\t\t\t\t\t\$http({
\t\t\t\t\t\t    method: 'POST',
\t\t\t\t\t\t    url: link,
\t\t\t\t\t\t    data: \"idSession=\"+idsession,
\t\t\t\t\t\t    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
\t\t\t\t\t\t}).
\t\t\t\t\t\tsuccess(function(data, status, headers, config) {
\t\t\t\t\t  \t\talert(\"Annulation menée avec succès ! \");
\t\t\t\t\t     \t\$window.location.href=Routing.generate('ovt_front_end_provider_my_sessions'); 
\t\t\t\t\t  \t}).
\t\t\t\t\t  \terror(function(data, status, headers, config) {
\t\t\t\t\t    \talert(\"Annulation  échouée !\"+data);
\t\t\t\t\t    \t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t  \t});
\t\t\t\t\t  \t
\t\t\t\t\t}else {
\t\t\t\t\t\t\$scope.loading = false; \$('#waitingModal').modal('hide');
\t\t\t\t\t}
\t\t   \t\t}
\t\t\t});
\t\t</script>

\t</div>
\t\t

\t
\t
\t";
    }

    public function getTemplateName()
    {
        return "OVTFrontEndProviderBundle:Provider:sessions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  505 => 381,  476 => 355,  447 => 329,  418 => 303,  389 => 277,  343 => 233,  266 => 197,  227 => 123,  220 => 119,  213 => 115,  199 => 104,  186 => 94,  173 => 84,  161 => 75,  149 => 66,  137 => 57,  124 => 47,  99 => 26,  95 => 24,  92 => 23,  89 => 22,  79 => 16,  72 => 12,  67 => 10,  63 => 9,  59 => 8,  55 => 7,  51 => 6,  47 => 5,  42 => 4,  39 => 3,  11 => 1,);
    }
}
