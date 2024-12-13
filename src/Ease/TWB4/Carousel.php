<?php

declare(strict_types=1);

/**
 * This file is part of the EaseTWBootstrap4 package
 *
 * https://github.com/VitexSoftware/php-ease-twbootstrap4
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ease\TWB4;

use Ease\Html\DivTag;

/**
 * Description of Carousel.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Carousel extends DivTag
{
    public array $slides = [];
    public array $captions = [];
    public bool $showCaptions = false;
    public bool $showIndicators = false;
    public bool $showControls = false;
    public int $activeSlide = 0;

    /**
     * Carousel.
     *
     * @param bool                  $controls   show controls ?
     * @param bool                  $indicators show indicators ?
     * @param bool                  $captions   show captions ?
     * @param array<string, string> $properties
     */
    public function __construct(
        $controls = true,
        $indicators = true,
        $captions = true,
        array $properties = []
    ) {
        $this->showCaptions = $captions;
        $this->showIndicators = $indicators;
        $this->showControls = $controls;
        $properties['class'] = 'carousel slide';
        $properties['data-ride'] = 'carousel';
        parent::__construct(null, $properties);

        if (empty($this->getTagID())) {
            $this->setTagID();
        }
    }

    public function addSlide(
        \Ease\Embedable $content,
        $caption = '',
        bool $active = false
    ): void {
        $content->setTagClass('d-block w-100');
        $this->slides[] = $content;

        if ($this->showCaptions === true) {
            $this->captions[] = $caption;
        }

        if ($active === true) {
            $this->activeSlide = \count($this->slides) - 1;
        }
    }

    /**
     * Add Controls to Caruousel.
     */
    public function addControls(): void
    {
        $this->addItem(new \Ease\Html\ATag(
            '#'.$this->getTagID(),
            [new \Ease\Html\SpanTag(
                null,
                ['class' => 'carousel-control-prev-icon', 'aria-hidden' => 'true'],
            ),
                new \Ease\Html\SpanTag(_('Previous'), ['class' => 'sr-only'])],
            ['role' => 'button', 'data-slide' => 'prev', 'class' => 'carousel-control-prev'],
        ));
        $this->addItem(new \Ease\Html\ATag(
            '#'.$this->getTagID(),
            [new \Ease\Html\SpanTag(
                null,
                ['class' => 'carousel-control-next-icon', 'aria-hidden' => 'true'],
            ),
                new \Ease\Html\SpanTag(_('Next'), ['class' => 'sr-only'])],
            ['role' => 'button', 'data-slide' => 'next', 'class' => 'carousel-control-next'],
        ));
    }

    public function addIndicators(): void
    {
        $indicators = new \Ease\Html\OlTag(
            null,
            ['class' => 'carousel-indicators'],
        );

        foreach ($this->slides as $slideId => $slide) {
            $slpr = ['data-target' => '#'.$this->getTagID(), 'data-slide-to' => $slideId,
                'class' => ($slideId === $this->activeSlide) ? 'active' : ''];
            $indicators->addItem(new \Ease\Html\LiTag(null, $slpr));
        }

        $this->addItem($indicators);
    }

    public function finalize(): void
    {
        if ($this->showIndicators === true) {
            $this->addIndicators();
        }

        $carouselInner = $this->addItem(new DivTag(
            null,
            ['class' => 'carousel-inner'],
        ));

        foreach ($this->slides as $slideId => $slide) {
            $props = ['class' => ($slideId === $this->activeSlide) ? 'carousel-item active'
                    : 'carousel-item'];
            $carouselItem = new DivTag($slide, $props);

            if ($this->showCaptions === true) {
                $carouselItem->addItem(new DivTag(
                    $this->captions[$slideId],
                    ['class' => 'carousel-caption d-none d-md-block'],
                ));
            }

            $carouselInner->addItem($carouselItem);
        }

        if ($this->showControls === true) {
            $this->addControls();
        }

        parent::finalize();
    }
}
