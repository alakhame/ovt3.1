<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // ovt_general_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_general_homepage')), array (  '_controller' => 'OVT\\GeneralBundle\\Controller\\DefaultController::indexAction',));
        }

        // ovt_services_join
        if ($pathinfo === '/session/join') {
            return array (  '_controller' => 'OVT\\GeneralBundle\\Controller\\DefaultController::sessionJoinAction',  '_route' => 'ovt_services_join',);
        }

        if (0 === strpos($pathinfo, '/test')) {
            // ovt_test_homepage
            if ($pathinfo === '/test/interface') {
                return array (  '_controller' => 'OVT\\TestBundle\\Controller\\DefaultController::interfaceAction',  '_route' => 'ovt_test_homepage',);
            }

            // ovt_test_view
            if ($pathinfo === '/test/view') {
                return array (  '_controller' => 'OVT\\TestBundle\\Controller\\DefaultController::viewAction',  '_route' => 'ovt_test_view',);
            }

            // ovt_test
            if (preg_match('#^/test/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_test')), array (  '_controller' => 'OVT\\TestBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/hello')) {
            // ovt_back_end_stats_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_stats_homepage')), array (  '_controller' => 'OVT\\BackEnd\\StatsBundle\\Controller\\DefaultController::indexAction',));
            }

            // ovt_servicesvoice_recognition_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_servicesvoice_recognition_homepage')), array (  '_controller' => 'OVT\\Services\\voiceRecognitionBundle\\Controller\\DefaultController::indexAction',));
            }

            // ovt_services_post_sync_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_services_post_sync_homepage')), array (  '_controller' => 'OVT\\Services\\PostSyncBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        // ovt_services_velotypie_join
        if (0 === strpos($pathinfo, '/velotypie/session/participate') && preg_match('#^/velotypie/session/participate/(?P<userType>[^/]++)/(?P<hashLink>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_services_velotypie_join')), array (  '_controller' => 'OVT\\Services\\VelotypieBundle\\Controller\\SessionController::joinAction',));
        }

        if (0 === strpos($pathinfo, '/API')) {
            if (0 === strpos($pathinfo, '/API/session')) {
                if (0 === strpos($pathinfo, '/API/session/addString')) {
                    // ovt_services_velotypie_API_add_content_by_id
                    if (preg_match('#^/API/session/addString/(?P<sessionID>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_services_velotypie_API_add_content_by_id')), array (  '_controller' => 'OVT\\Services\\VelotypieBundle\\Controller\\ContentAPIController::addStringAction',));
                    }

                    // ovt_services_velotypie_API_add_content_by_id_bis
                    if (0 === strpos($pathinfo, '/API/session/addStringBis') && preg_match('#^/API/session/addStringBis/(?P<sessionID>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_services_velotypie_API_add_content_by_id_bis')), array (  '_controller' => 'OVT\\Services\\VelotypieBundle\\Controller\\ContentAPIController::addStringBisAction',));
                    }

                }

                // ovt_services_velotypie_API_get_content_by_id
                if (0 === strpos($pathinfo, '/API/session/get') && preg_match('#^/API/session/get/(?P<sessionID>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_services_velotypie_API_get_content_by_id')), array (  '_controller' => 'OVT\\Services\\VelotypieBundle\\Controller\\ContentAPIController::getAction',));
                }

            }

            // ovt_services_velotypie_API_add_chat_message
            if ($pathinfo === '/API/chatmessage/add/new') {
                return array (  '_controller' => 'OVT\\Services\\VelotypieBundle\\Controller\\ChatBoxController::addnewMessageAction',  '_route' => 'ovt_services_velotypie_API_add_chat_message',);
            }

            // ovt_services_velotypie_API_session_authentification
            if ($pathinfo === '/API/sessionAuth') {
                return array (  '_controller' => 'OVT\\Services\\VelotypieBundle\\Controller\\SessionController::authAction',  '_route' => 'ovt_services_velotypie_API_session_authentification',);
            }

            // ovt_services_velotypie_API_get_chat_by_session_id
            if (0 === strpos($pathinfo, '/API/chatmessage/get') && preg_match('#^/API/chatmessage/get/(?P<sessionID>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_services_velotypie_API_get_chat_by_session_id')), array (  '_controller' => 'OVT\\Services\\VelotypieBundle\\Controller\\ChatBoxController::getChatBySessionAction',));
            }

        }

        // ovt_services_lfs_join
        if (0 === strpos($pathinfo, '/lfs/session/participate') && preg_match('#^/lfs/session/participate/(?P<userType>[^/]++)/(?P<hashLink>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_services_lfs_join')), array (  '_controller' => 'OVT\\Services\\LFSBundle\\Controller\\SessionController::joinAction',));
        }

        // ovtapi_web_rtc_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovtapi_web_rtc_homepage')), array (  '_controller' => 'OVT\\API\\WebRTCBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/provider')) {
            // ovt_front_end_provider_homepage
            if (rtrim($pathinfo, '/') === '/provider') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ovt_front_end_provider_homepage');
                }

                return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::indexAction',  '_route' => 'ovt_front_end_provider_homepage',);
            }

            // ovt_front_end_provider_my_sessions
            if ($pathinfo === '/provider/mysessions') {
                return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::mySessionsAction',  '_route' => 'ovt_front_end_provider_my_sessions',);
            }

            // ovt_front_end_provider_calendar
            if (0 === strpos($pathinfo, '/provider/calendar') && preg_match('#^/provider/calendar(?:/(?P<idWorker>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_provider_calendar')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::calendarViewAction',  'idWorker' => -1,  'coreCalendar' => -1,));
            }

            // ovt_front_end_provider_archives
            if ($pathinfo === '/provider/archives') {
                return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::archivesViewAction',  '_route' => 'ovt_front_end_provider_archives',);
            }

            // ovt_front_end_provider_retrieve_affected_sessions_to_worker
            if (0 === strpos($pathinfo, '/provider/myaffectedsessions') && preg_match('#^/provider/myaffectedsessions/(?P<idWorker>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ovt_front_end_provider_retrieve_affected_sessions_to_worker;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_provider_retrieve_affected_sessions_to_worker')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::retrieveAffectedSessionsAction',));
            }
            not_ovt_front_end_provider_retrieve_affected_sessions_to_worker:

            // ovt_front_end_provider_retrieve_affected_sessions_to_worker_by_user
            if (0 === strpos($pathinfo, '/provider/affectedsessions') && preg_match('#^/provider/affectedsessions/(?P<idUser>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ovt_front_end_provider_retrieve_affected_sessions_to_worker_by_user;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_provider_retrieve_affected_sessions_to_worker_by_user')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::retrieveAffectedSessionsByUserAction',));
            }
            not_ovt_front_end_provider_retrieve_affected_sessions_to_worker_by_user:

            // ovt_front_end_provider_profile
            if ($pathinfo === '/provider/profile/view') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ovt_front_end_provider_profile;
                }

                return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::profileViewAction',  '_route' => 'ovt_front_end_provider_profile',);
            }
            not_ovt_front_end_provider_profile:

            if (0 === strpos($pathinfo, '/provider/adminprovider')) {
                // ovt_front_end_admin_provider_homepage
                if ($pathinfo === '/provider/adminprovider') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::indexAction',  '_route' => 'ovt_front_end_admin_provider_homepage',);
                }

                // ovt_front_end_admin_provider_set_sessions
                if ($pathinfo === '/provider/adminprovider/setsession') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::setSessionsAction',  '_route' => 'ovt_front_end_admin_provider_set_sessions',);
                }

                // ovt_front_end_admin_provider_worker
                if ($pathinfo === '/provider/adminprovider/worker') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::workerAction',  '_route' => 'ovt_front_end_admin_provider_worker',);
                }

                // ovt_front_end_admin_provider_group
                if ($pathinfo === '/provider/adminprovider/group') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::groupAction',  '_route' => 'ovt_front_end_admin_provider_group',);
                }

                if (0 === strpos($pathinfo, '/provider/adminprovider/new')) {
                    // ovt_front_end_admin_provider_new_worker
                    if ($pathinfo === '/provider/adminprovider/new/worker') {
                        return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::addNewWorkerAction',  '_route' => 'ovt_front_end_admin_provider_new_worker',);
                    }

                    // ovt_front_end_admin_provider_new_group
                    if ($pathinfo === '/provider/adminprovider/new/group') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_ovt_front_end_admin_provider_new_group;
                        }

                        return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::addNewGroupAction',  '_route' => 'ovt_front_end_admin_provider_new_group',);
                    }
                    not_ovt_front_end_admin_provider_new_group:

                }

                // ovt_front_end_admin_provider_get_json_groups_by_admin
                if ($pathinfo === '/provider/adminprovider/groups/json') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::renderJSONProviderGroupsAction',  '_route' => 'ovt_front_end_admin_provider_get_json_groups_by_admin',);
                }

                // ovt_front_end_admin_provider_get_services_json
                if ($pathinfo === '/provider/adminprovider/services/json') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::getAllServicesJSONAction',  '_route' => 'ovt_front_end_admin_provider_get_services_json',);
                }

                // ovt_front_end_admin_provider_get_group_by_id
                if (0 === strpos($pathinfo, '/provider/adminprovider/group') && preg_match('#^/provider/adminprovider/group/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_provider_get_group_by_id')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::getGroupByIdAction',));
                }

                // ovt_front_end_admin_provider_get_session_by_id
                if (0 === strpos($pathinfo, '/provider/adminprovider/session') && preg_match('#^/provider/adminprovider/session/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_provider_get_session_by_id')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::getSessionByIdAction',));
                }

                // ovt_front_end_admin_provider_get_worker_by_id
                if (0 === strpos($pathinfo, '/provider/adminprovider/worker') && preg_match('#^/provider/adminprovider/worker/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_provider_get_worker_by_id')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::getWorkerByIdAction',));
                }

                if (0 === strpos($pathinfo, '/provider/adminprovider/delete')) {
                    // ovt_front_end_admin_provider_delete_worker_by_id
                    if ($pathinfo === '/provider/adminprovider/delete/worker') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_ovt_front_end_admin_provider_delete_worker_by_id;
                        }

                        return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::deleteWorkerByIdAction',  '_route' => 'ovt_front_end_admin_provider_delete_worker_by_id',);
                    }
                    not_ovt_front_end_admin_provider_delete_worker_by_id:

                    // ovt_front_end_admin_provider_delete_group_by_id
                    if ($pathinfo === '/provider/adminprovider/delete/group') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_ovt_front_end_admin_provider_delete_group_by_id;
                        }

                        return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::deleteGroupByIdAction',  '_route' => 'ovt_front_end_admin_provider_delete_group_by_id',);
                    }
                    not_ovt_front_end_admin_provider_delete_group_by_id:

                }

                // ovt_front_end_admin_provider_set_worker_group
                if ($pathinfo === '/provider/adminprovider/setgroup/worker') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_front_end_admin_provider_set_worker_group;
                    }

                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::setGroupWorkerAction',  '_route' => 'ovt_front_end_admin_provider_set_worker_group',);
                }
                not_ovt_front_end_admin_provider_set_worker_group:

                // ovt_front_end_admin_provider_set_worker_to_session
                if ($pathinfo === '/provider/adminprovider/affect/worker/session') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_front_end_admin_provider_set_worker_to_session;
                    }

                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::affectWorkerToSessionAction',  '_route' => 'ovt_front_end_admin_provider_set_worker_to_session',);
                }
                not_ovt_front_end_admin_provider_set_worker_to_session:

                if (0 === strpos($pathinfo, '/provider/adminprovider/update')) {
                    // ovt_front_end_admin_provider_update_session
                    if ($pathinfo === '/provider/adminprovider/update/session') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_ovt_front_end_admin_provider_update_session;
                        }

                        return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::updateSessionAction',  '_route' => 'ovt_front_end_admin_provider_update_session',);
                    }
                    not_ovt_front_end_admin_provider_update_session:

                    // ovt_front_end_admin_provider_update_group
                    if ($pathinfo === '/provider/adminprovider/update/group') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_ovt_front_end_admin_provider_update_group;
                        }

                        return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::updateGroupAction',  '_route' => 'ovt_front_end_admin_provider_update_group',);
                    }
                    not_ovt_front_end_admin_provider_update_group:

                    // ovt_front_end_admin_provider_update_worker
                    if ($pathinfo === '/provider/adminprovider/update/worker') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_ovt_front_end_admin_provider_update_worker;
                        }

                        return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::updateWorkerAction',  '_route' => 'ovt_front_end_admin_provider_update_worker',);
                    }
                    not_ovt_front_end_admin_provider_update_worker:

                }

                // ovt_front_end_admin_provider_action_session
                if (preg_match('#^/provider/adminprovider/(?P<action>[^/]++)/session$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_front_end_admin_provider_action_session;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_provider_action_session')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::updateStateSessionAction',));
                }
                not_ovt_front_end_admin_provider_action_session:

                // ovt_front_end_admin_provider_worker_calendar
                if (0 === strpos($pathinfo, '/provider/adminprovider/calendar') && preg_match('#^/provider/adminprovider/calendar(?:/(?P<idWorker>[^/]++)(?:/(?P<coreCalendar>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_provider_worker_calendar')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::calendarViewAction',  'idWorker' => -1,  'coreCalendar' => -1,));
                }

                // ovt_front_end_provider_admin_retrieve_affected_sessions_to_worker
                if (0 === strpos($pathinfo, '/provider/adminprovider/worker/affectedSessions') && preg_match('#^/provider/adminprovider/worker/affectedSessions/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ovt_front_end_provider_admin_retrieve_affected_sessions_to_worker;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_provider_admin_retrieve_affected_sessions_to_worker')), array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderAdminController::workerAffectedSessionsAction',));
                }
                not_ovt_front_end_provider_admin_retrieve_affected_sessions_to_worker:

            }

            if (0 === strpos($pathinfo, '/provider/test')) {
                // test
                if ($pathinfo === '/provider/testpro') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::testAction',  '_route' => 'test',);
                }

                // testFeed
                if ($pathinfo === '/provider/test/feed') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ProviderBundle\\Controller\\ProviderController::JSONFeedAction',  '_route' => 'testFeed',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/client')) {
            // ovt_front_end_client_homepage
            if (rtrim($pathinfo, '/') === '/client') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ovt_front_end_client_homepage');
                }

                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::indexAction',  '_route' => 'ovt_front_end_client_homepage',);
            }

            // ovt_front_end_client_profile
            if ($pathinfo === '/client/profile/view') {
                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::profileViewAction',  '_route' => 'ovt_front_end_client_profile',);
            }

            // ovt_front_end_client_session_new
            if ($pathinfo === '/client/new/session') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ovt_front_end_client_session_new;
                }

                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::addSessionAction',  '_route' => 'ovt_front_end_client_session_new',);
            }
            not_ovt_front_end_client_session_new:

            if (0 === strpos($pathinfo, '/client/document')) {
                // ovt_front_end_client_document
                if ($pathinfo === '/client/document') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::documentViewAction',  '_route' => 'ovt_front_end_client_document',);
                }

                // ovt_front_end_admin_client_get_pdf_document_by_id
                if (0 === strpos($pathinfo, '/client/document/getpdf') && preg_match('#^/client/document/getpdf/(?P<idSession>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_get_pdf_document_by_id')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::getPDFBySessionIdAction',));
                }

            }

            // ovt_front_end_client_calendar
            if (0 === strpos($pathinfo, '/client/calendar') && preg_match('#^/client/calendar(?:/(?P<idClient>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_client_calendar')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::calendarViewAction',  'idClient' => -1,  'coreCalendar' => -1,));
            }

            // ovt_front_end_client_authorized_services
            if (0 === strpos($pathinfo, '/client/getAllowedServices') && preg_match('#^/client/getAllowedServices(?:/(?P<orgID>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_client_authorized_services')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::authorizedServicesAction',  'orgID' => -1,));
            }

            if (0 === strpos($pathinfo, '/client/myreservations')) {
                // ovt_front_end_client_retrieve_client_sessions
                if (preg_match('#^/client/myreservations/(?P<idClient>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ovt_front_end_client_retrieve_client_sessions;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_client_retrieve_client_sessions')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::retrieveClientSessionsAction',));
                }
                not_ovt_front_end_client_retrieve_client_sessions:

                // ovt_front_end_client_retrieve_client_sessions_by_user_id
                if (0 === strpos($pathinfo, '/client/myreservations/byuser') && preg_match('#^/client/myreservations/byuser/(?P<idUser>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ovt_front_end_client_retrieve_client_sessions_by_user_id;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_client_retrieve_client_sessions_by_user_id')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::retrieveClientSessionsByUserIdAction',));
                }
                not_ovt_front_end_client_retrieve_client_sessions_by_user_id:

            }

            // ovt_front_end_client_list_sessions
            if ($pathinfo === '/client/listsessions') {
                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::listSessionsAction',  '_route' => 'ovt_front_end_client_list_sessions',);
            }

            // ovt_front_end_client_get_orgs_by_service
            if (0 === strpos($pathinfo, '/client/getOrgByService') && preg_match('#^/client/getOrgByService(?:/(?P<serviceId>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_client_get_orgs_by_service')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::getOrgByServiceAction',  'serviceId' => -1,));
            }

            // ovt_front_end_admin_client_homepage
            if ($pathinfo === '/client/adminclient') {
                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientController::indexAction',  '_route' => 'ovt_front_end_admin_client_homepage',);
            }

            // ovt_front_end_admin_client_get_session_by_id
            if (0 === strpos($pathinfo, '/client/session') && preg_match('#^/client/session/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_get_session_by_id')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::getSessionByIdAction',));
            }

            // ovt_front_end_admin_client_action_session
            if (preg_match('#^/client/(?P<action>[^/]++)/session$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ovt_front_end_admin_client_action_session;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_action_session')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::updateStateSessionAction',));
            }
            not_ovt_front_end_admin_client_action_session:

            if (0 === strpos($pathinfo, '/client/adminclient')) {
                if (0 === strpos($pathinfo, '/client/adminclient/user')) {
                    // ovt_front_end_admin_client_users
                    if ($pathinfo === '/client/adminclient/users') {
                        return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::usersAction',  '_route' => 'ovt_front_end_admin_client_users',);
                    }

                    // ovt_front_end_admin_client_get_user_by_id
                    if (preg_match('#^/client/adminclient/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_get_user_by_id')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::getClientByIdAction',));
                    }

                }

                // ovt_front_end_admin_client_get_json_groups_by_admin
                if ($pathinfo === '/client/adminclient/groups/json') {
                    return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::renderJSONClientServiceGroupsAction',  '_route' => 'ovt_front_end_admin_client_get_json_groups_by_admin',);
                }

            }

            // ovt_front_end_admin_client_delete_user_by_id
            if ($pathinfo === '/client/delete/user') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ovt_front_end_admin_client_delete_user_by_id;
                }

                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::deleteUserByIdAction',  '_route' => 'ovt_front_end_admin_client_delete_user_by_id',);
            }
            not_ovt_front_end_admin_client_delete_user_by_id:

            // ovt_front_end_admin_client_set_user_group
            if ($pathinfo === '/client/setgroup/user') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ovt_front_end_admin_client_set_user_group;
                }

                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::setGroupUserAction',  '_route' => 'ovt_front_end_admin_client_set_user_group',);
            }
            not_ovt_front_end_admin_client_set_user_group:

            // ovt_front_end_admin_client_update_user
            if ($pathinfo === '/client/update/user') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ovt_front_end_admin_client_update_user;
                }

                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::updateClientAction',  '_route' => 'ovt_front_end_admin_client_update_user',);
            }
            not_ovt_front_end_admin_client_update_user:

            if (0 === strpos($pathinfo, '/client/adminclient')) {
                // ovt_front_end_admin_client_new_user
                if ($pathinfo === '/client/adminclient/new/user') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_front_end_admin_client_new_user;
                    }

                    return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::addNewClientAction',  '_route' => 'ovt_front_end_admin_client_new_user',);
                }
                not_ovt_front_end_admin_client_new_user:

                if (0 === strpos($pathinfo, '/client/adminclient/group')) {
                    // ovt_front_end_admin_client_group
                    if ($pathinfo === '/client/adminclient/group') {
                        return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::groupAction',  '_route' => 'ovt_front_end_admin_client_group',);
                    }

                    // ovt_front_end_admin_client_get_group_by_id
                    if (preg_match('#^/client/adminclient/group/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_get_group_by_id')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::getGroupByIdAction',));
                    }

                }

                // ovt_front_end_admin_client_delete_group_by_id
                if ($pathinfo === '/client/adminclient/delete/group') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_front_end_admin_client_delete_group_by_id;
                    }

                    return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::deleteGroupByIdAction',  '_route' => 'ovt_front_end_admin_client_delete_group_by_id',);
                }
                not_ovt_front_end_admin_client_delete_group_by_id:

                // ovt_front_end_admin_client_update_group
                if ($pathinfo === '/client/adminclient/update/group') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_front_end_admin_client_update_group;
                    }

                    return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::updateGroupAction',  '_route' => 'ovt_front_end_admin_client_update_group',);
                }
                not_ovt_front_end_admin_client_update_group:

                // ovt_front_end_admin_client_new_group
                if ($pathinfo === '/client/adminclient/new/group') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_front_end_admin_client_new_group;
                    }

                    return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::addNewGroupAction',  '_route' => 'ovt_front_end_admin_client_new_group',);
                }
                not_ovt_front_end_admin_client_new_group:

                // ovt_front_end_admin_client_manage_org_group
                if (0 === strpos($pathinfo, '/client/adminclient/group/manageOrg') && preg_match('#^/client/adminclient/group/manageOrg(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_manage_org_group')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::manageOrgGroupAction',  'id' => -1,));
                }

                if (0 === strpos($pathinfo, '/client/adminclient/services/choice')) {
                    // ovt_front_end_admin_client_services_choice
                    if (preg_match('#^/client/adminclient/services/choice/(?P<idClient>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_ovt_front_end_admin_client_services_choice;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_services_choice')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::servicesChoiceAction',));
                    }
                    not_ovt_front_end_admin_client_services_choice:

                    // ovt_front_end_admin_client_service_toggle
                    if (preg_match('#^/client/adminclient/services/choice/(?P<idClient>[^/]++)/(?P<idService>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_ovt_front_end_admin_client_service_toggle;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_front_end_admin_client_service_toggle')), array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::serviceToggleAction',));
                    }
                    not_ovt_front_end_admin_client_service_toggle:

                }

            }

            // ovt_front_end_admin_client_test
            if ($pathinfo === '/client/test') {
                return array (  '_controller' => 'OVT\\FrontEnd\\ClientBundle\\Controller\\ClientAdminController::testAction',  '_route' => 'ovt_front_end_admin_client_test',);
            }

        }

        // ovt_back_end_accounting_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'ovt_back_end_accounting_homepage');
            }

            return array (  '_controller' => 'OVT\\BackEnd\\AccountingBundle\\Controller\\DefaultController::indexAction',  '_route' => 'ovt_back_end_accounting_homepage',);
        }

        if (0 === strpos($pathinfo, '/superadmin')) {
            // ovt_back_end_admin_homepage
            if (rtrim($pathinfo, '/') === '/superadmin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ovt_back_end_admin_homepage');
                }

                return array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\SuperAdminController::indexAction',  '_route' => 'ovt_back_end_admin_homepage',);
            }

            if (0 === strpos($pathinfo, '/superadmin/gestion')) {
                // ovt_back_end_admin_gestion
                if (preg_match('#^/superadmin/gestion(?:/(?P<gestion>adminClient|adminProvider|client|provider|service))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\SuperAdminController::gestionAction',  'gestion' => 'user',));
                }

                // ovt_back_end_admin_gestion_new
                if (preg_match('#^/superadmin/gestion/(?P<gestion>adminClient|adminProvider|client|provider|service)/addnew$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ovt_back_end_admin_gestion_new;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_new')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\SuperAdminController::addNewAction',  'gestion' => 'user',));
                }
                not_ovt_back_end_admin_gestion_new:

                if (0 === strpos($pathinfo, '/superadmin/gestion/service')) {
                    // ovt_back_end_admin_gestion_new_service
                    if ($pathinfo === '/superadmin/gestion/service/addnew') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_ovt_back_end_admin_gestion_new_service;
                        }

                        return array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\ServiceAdminController::addNewAction',  '_route' => 'ovt_back_end_admin_gestion_new_service',);
                    }
                    not_ovt_back_end_admin_gestion_new_service:

                    // ovt_back_end_admin_gestion_get_service_by_id
                    if (preg_match('#^/superadmin/gestion/service/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_get_service_by_id')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\ServiceAdminController::getServiceByIdAction',));
                    }

                }

                // ovt_back_end_admin_gestion_get_organisation_by_id
                if (preg_match('#^/superadmin/gestion/(?P<organisation>[^/]++)/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_get_organisation_by_id')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrganisationAdminController::getOrgByIdAction',));
                }

                // ovt_back_end_admin_gestion_new_user
                if ($pathinfo === '/superadmin/gestion/user/addnew') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_back_end_admin_gestion_new_user;
                    }

                    return array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\UserAdminController::addNewAction',  '_route' => 'ovt_back_end_admin_gestion_new_user',);
                }
                not_ovt_back_end_admin_gestion_new_user:

                // ovt_back_end_admin_gestion_new_organisation
                if (preg_match('#^/superadmin/gestion/(?P<organisation>[^/]++)/addnew$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_back_end_admin_gestion_new_organisation;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_new_organisation')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrganisationAdminController::addNewOrgAction',));
                }
                not_ovt_back_end_admin_gestion_new_organisation:

                // ovt_back_end_admin_gestion_organisation_setadmin
                if (preg_match('#^/superadmin/gestion/(?P<org>[^/]++)/setadmin$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_back_end_admin_gestion_organisation_setadmin;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_organisation_setadmin')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrganisationAdminController::setAdminAction',));
                }
                not_ovt_back_end_admin_gestion_organisation_setadmin:

                // ovt_back_end_admin_gestion_organisation_update
                if (preg_match('#^/superadmin/gestion/(?P<org>[^/]++)/update/(?P<idOrg>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ovt_back_end_admin_gestion_organisation_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_organisation_update')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrganisationAdminController::updateAction',));
                }
                not_ovt_back_end_admin_gestion_organisation_update:

                // ovt_back_end_admin_gestion_organisation_update_post
                if (preg_match('#^/superadmin/gestion/(?P<org>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_back_end_admin_gestion_organisation_update_post;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_organisation_update_post')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrganisationAdminController::updatePostAction',));
                }
                not_ovt_back_end_admin_gestion_organisation_update_post:

                // ovt_back_end_admin_gestion_organisation_deleteadmin
                if (preg_match('#^/superadmin/gestion/(?P<org>[^/]++)/deleteadmin/(?P<idOrg>[^/]++)/(?P<idAdmin>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ovt_back_end_admin_gestion_organisation_deleteadmin;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_organisation_deleteadmin')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrganisationAdminController::deleteAdminAction',));
                }
                not_ovt_back_end_admin_gestion_organisation_deleteadmin:

                // ovt_back_end_admin_gestion_organisation_delete
                if (preg_match('#^/superadmin/gestion/(?P<org>[^/]++)/delete/(?P<idOrg>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ovt_back_end_admin_gestion_organisation_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_gestion_organisation_delete')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrganisationAdminController::deleteOrgAction',));
                }
                not_ovt_back_end_admin_gestion_organisation_delete:

            }

            // ovt_back_end_admin_manage_service
            if (preg_match('#^/superadmin/(?P<organisation>client|provider)/manage/service/(?P<idOrg>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_back_end_admin_manage_service')), array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\OrgServiceAdminController::manageServicesAction',));
            }

            // ovt_back_end_admin_profile
            if ($pathinfo === '/superadmin/profile/view') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ovt_back_end_admin_profile;
                }

                return array (  '_controller' => 'OVT\\BackEnd\\AdminBundle\\Controller\\ProfileAdminController::viewAction',  '_route' => 'ovt_back_end_admin_profile',);
            }
            not_ovt_back_end_admin_profile:

        }

        // ovt_user_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ovt_user_homepage')), array (  '_controller' => 'OVTUserBundle:Default:index',));
        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/profil')) {
                // ovt_user_profil_rediction
                if ($pathinfo === '/profilRedirection') {
                    return array (  '_controller' => 'OVT\\UserBundle\\Controller\\UserInfosController::profilRedirectionAction',  '_route' => 'ovt_user_profil_rediction',);
                }

                // ovt_user_profil_update
                if ($pathinfo === '/profile/update') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ovt_user_profil_update;
                    }

                    return array (  '_controller' => 'OVT\\UserBundle\\Controller\\UserInfosController::updateProfileAction',  '_route' => 'ovt_user_profil_update',);
                }
                not_ovt_user_profil_update:

            }

            // ovt_user_password_update
            if ($pathinfo === '/password/update') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ovt_user_password_update;
                }

                return array (  '_controller' => 'OVT\\UserBundle\\Controller\\UserInfosController::updatePasswordAction',  '_route' => 'ovt_user_password_update',);
            }
            not_ovt_user_password_update:

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
