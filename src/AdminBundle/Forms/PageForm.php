<?php

namespace AdminBundle\Forms;

use PageBundle\Entity\Page;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title')->add('body');
        $builder->add('description');
        $builder->add('category');
        $builder->add('created');
        $builder->add('submit', SubmitType::class,[
            'label' => 'Save'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefault('data_class', Page::class);
    }
}