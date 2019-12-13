<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\TWB4;

use Ease\Html\DivTag;

/**
 * Description of Carousel
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class Carousel extends DivTag
{
    public $slides         = [];
    public $captions       = [];
    public $showCaptions   = false;
    public $showIndicators = false;
    public $showControls   = false;

    /**
     * 
     * @var int 
     */
    public $activeSlide = 0;

    /**
     * Carousel
     * 
     * @param boolean $controls   show controls ?
     * @param boolean $indicators show indicators ?
     * @param boolean $captions   show captions ?
     * 
     * @param array $properties
     */
    public function __construct($controls = true, $indicators = true,
                                $captions = true, $properties = [])
    {
        $this->showCaptions      = $captions;
        $this->showIndicators    = $indicators;
        $this->showControls      = $controls;
        $properties['class']     = 'carousel slide';
        $properties['data-ride'] = 'carousel';
        parent::__construct(null, $properties);
        if (empty($this->getTagID())) {
            $this->setTagID();
        }
    }

    public function addSlide(\Ease\Embedable $content, $caption = '',
                             $active = false)
    {
        $content->setTagClass('d-block w-100');
        $this->slides[] = $content;
        if ($this->showCaptions == true) {
            $this->captions[] = $caption;
        }
        if ($active === true) {
            $this->activeSlide = count($this->slides) - 1;
        }
    }

    /**
     * Add Controls to Caruousel
     */
    public function addControls()
    {
        $this->addItem(new \Ease\Html\ATag('#'.$this->getTagID(),
                [new \Ease\Html\SpanTag(null,
                    ['class' => 'carousel-control-prev-icon', 'aria-hidden' => 'true']),
                new \Ease\Html\SpanTag(_('Previous'), ['class' => 'sr-only'])],
                ['role' => 'button', 'data-slide' => 'prev', 'class' => 'carousel-control-prev']));
        $this->addItem(new \Ease\Html\ATag('#'.$this->getTagID(),
                [new \Ease\Html\SpanTag(null,
                    ['class' => 'carousel-control-next-icon', 'aria-hidden' => 'true']),
                new \Ease\Html\SpanTag(_('Next'), ['class' => 'sr-only'])],
                ['role' => 'button', 'data-slide' => 'next', 'class' => 'carousel-control-next']));
    }

    public function addIndicators()
    {
        $indicators = new \Ease\Html\OlTag(null,
            ['class' => 'carousel-indicators']);
        foreach ($this->slides as $slideId => $slide) {
            $slpr = ['data-target' => '#'.$this->getTagID(), 'data-slide-to' => $slideId,
                'class' => ($slideId == $this->activeSlide) ? 'active' : ''];
            $indicators->addItem(new \Ease\Html\LiTag(null, $slpr));
        }
        $this->addItem($indicators);
    }

    public function finalize()
    {
        if ($this->showIndicators === true) {
            $this->addIndicators();
        }

        $carouselInner = $this->addItem(new DivTag(null,
                ['class' => 'carousel-inner']));

        foreach ($this->slides as $slideId => $slide) {
            $props        = ['class' => ($slideId == $this->activeSlide) ? 'carousel-item active'
                    : 'carousel-item'];
            $carouselItem = new DivTag($slide, $props);
            if ($this->showCaptions == true) {
                $carouselItem->addItem(new DivTag($this->captions[$slideId],
                        ['class' => 'carousel-caption d-none d-md-block']));
            }
            $carouselInner->addItem($carouselItem);
        }

        if ($this->showControls === true) {
            $this->addControls();
        }
        parent::finalize();
    }
}
