<?php
/**
 * Created by PhpStorm.
 * User: jules
 * Date: 27/02/19
 * Time: 15:24
 */

namespace Lle\HelpBundle\Twig;

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
            new TwigFunction('lle_help', [$this, 'displayTooltip'])
        ];
    }

    public function displayTooltip(string $code)
    {
        $message = $this->helpRepository->findOneBy(["code" => $code]) ?? "default message";

        return $message;
    }
}