<?php

namespace Lle\HelpBundle\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Lle\HelpBundle\Entity\Help;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HelpExtension extends AbstractExtension
{
    private $helpRepository;
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->helpRepository = $em->getRepository(Help::class);
        $this->em = $em;
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
            $message = new Help();
            $message->setCode($code);
            $message->setActif(false);
            $message->setMessage(null);
            $this->em->persist($message);
            $this->em->flush();
        }
        if($message->getActif()) {
            return $twig->render('@LleHelp/help_icon.html.twig', ["message" => $message]);
        }else{
            return null;
        }
    }

    public function addShowHelpButton(\Twig_Environment $twig)
    {
        return $twig->render('@LleHelp/help_button.html.twig');
    }
}