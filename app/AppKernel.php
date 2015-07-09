<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(

            new FOS\UserBundle\FOSUserBundle(),

            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new OVT\UserBundle\OVTUserBundle(),
            new OVT\BackEnd\AdminBundle\OVTBackEndAdminBundle(),
            new OVT\BackEnd\AccountingBundle\OVTBackEndAccountingBundle(),
            new OVT\FrontEnd\ClientBundle\OVTFrontEndClientBundle(),
            new OVT\FrontEnd\ProviderBundle\OVTFrontEndProviderBundle(),
            new OVT\API\WebRTCBundle\OVTAPIWebRTCBundle(),
            new OVT\Services\LFSBundle\OVTServicesLFSBundle(),
            new OVT\Services\VelotypieBundle\OVTServicesVelotypieBundle(),
            new OVT\Services\PostSyncBundle\OVTServicesPostSyncBundle(),
            new OVT\Services\voiceRecognitionBundle\OVTServicesvoiceRecognitionBundle(),
            new OVT\BackEnd\StatsBundle\OVTBackEndStatsBundle(),
            new OVT\TestBundle\OVTTestBundle(),
            new OVT\GeneralBundle\OVTGeneralBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new OVT\API\NotificationBundle\OVTAPINotificationBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            //$bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
