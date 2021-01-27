<?php


namespace App\Services;


use Cocur\Slugify\Slugify;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class SlugFilter
 * @package App\Services
 */
class SlugFilter extends AbstractExtension
{
    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return array(
            'slug' => new TwigFilter('slug', array($this, 'slug')),
        );
    }

    /**
     * @param string $value
     * @return string
     */
    public function slug(string $value): string
    {
        $slugify = new Slugify();

        return $slugify->slugify($value);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'slugFilter';
    }
}