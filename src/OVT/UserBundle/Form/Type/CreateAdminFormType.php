<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OVT\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateAdminFormType extends AbstractType
{   

    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname','text',array('label'=>'Prénom'))
            ->add('lastname','text',array('label'=>'Nom'))
            ->add('email', 'email', array('label' => 'Adresse Mail'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Resaisir mot de passe'),
                'invalid_message' => 'Désolé, les mots de passe ne correspondent pas',
            ))
        ;
    }

      
    

    public function getName()
    {
        return 'createAdmin';
    }

    
}
