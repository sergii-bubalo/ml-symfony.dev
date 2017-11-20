<?php
/**
 * This file contains ArticleType class
 *
 * @author Sergii Bubalo <sergii.bubalo@gmail.com>
 *
 * Free license
 */

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * This class define form for adding blog articles
 *
 * Class ArticleType
 * @package BlogBundle\Form
 */
class ArticleType extends AbstractType
{
    /**
     * This method build a new blog article adding form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['attr' => ['class' => 'title_field']])
            ->add('summary')
            ->add('body')
            ->add('save', SubmitType::class, ['label' => 'Create blog article']);
    }
}