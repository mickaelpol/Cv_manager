<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Content;
use App\Repository\CategorieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $options['user'];

        $builder
            ->add('title')
            ->add('text')
            ->add('rating')
            ->add('dateStart')
            ->add('dateEnd')
            ->add('icon')
            ->add('categorie', EntityType::class, [
                'class' => 'App\Entity\Categorie',
                'query_builder' => function (CategorieRepository $repository) use ($user) {
                    return $repository->personalCatFormType($user);
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Content::class,
        ]);
        $resolver->setRequired(['user']);
    }
}
