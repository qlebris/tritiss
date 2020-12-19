<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('reference', TextType::class)
            ->add('price', MoneyType::class)
            ->add('sold', CheckboxType::class, [
                'required' => false
            ])
            ->add(
                'imageFile1',
                FileType::class,
                [
                    'label' => 'Image 1',
                    'required' => empty($builder->getData()->getImageName1()),
                ]
            )
            ->add(
                'imageFile2',
                FileType::class,
                [
                    'label' => 'Image 2',
//                    'required' => empty($builder->getData()->getImageName2()),
                'required' => false
                ]
            )
            ->add(
                'imageFile3',
                FileType::class,
                [
                    'label' => 'Image 3',
//                    'required' => empty($builder->getData()->getImageName3()),
                    'required' => false
                ]
            )
            ->add(
                'imageFile4',
                FileType::class,
                [
                    'label' => 'Image 4',
//                    'required' => empty($builder->getData()->getImageName4()),
                    'required' => false
                ]
            )
            ->add(
                'categories',
                EntityType::class,
                [
                    'class' => Category::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'placeholder' => false,
                    'required' => true,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => Article::class,
            ]
        );
    }

}
