<?php

namespace Lle\HelpBundle\Twig;

use Doctrine\ORM\EntityNotFoundException;
use Lle\HelpBundle\Repository\HelpRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HelpExtension extends AbstractExtension
{
    private $helpRepository;

    public function __construct(HelpRepository $helpRepo)
    {
        $this->helpRepository = $helpRepo;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('lle_help',
                [$this, 'addHelpIcon'],
                ['needs_environment' => true,
                    'is_safe' => ['html']]),

            new TwigFunction('lle_help_show',
                [$this, 'addShowHelpButton'],
                ['needs_environment' => true,
                    'is_safe' => ['html']])
        ];
    }

    public function addHelpIcon(\Twig_Environment $twig, string $code)
    {
        $message = $this->helpRepository->findOneBy(["code" => $code]);

        if(!$message) {
            throw new EntityNotFoundException("Entity Help with code ".$code." not found");
        }
        return $twig->render('@LleHelp/help_icon.html.twig', ["message" => $message]);
    }

    public function addShowHelpButton(\Twig_Environment $twig)
    {
        return $twig->render('@LleHelp/help_button.html.twig');
    }
}