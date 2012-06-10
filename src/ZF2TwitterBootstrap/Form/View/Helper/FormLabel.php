<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;


class FormLabel extends \Zend\Form\View\Helper\FormLabel
{
    private $cssClass = 'control-label';


    public function openTag($attributesOrElement = null)
    {
        if (null === $attributesOrElement) {
            return '<label class="' . $this->cssClass . '">';
        }

        return parent::openTag($attributesOrElement);
    }


    /**
     * Create a string of all attribute/value pairs
     *
     * Escapes all attribute values
     *
     * @param  array $attributes
     * @return string
     */
    public function createAttributesString(array $attributes)
    {
        $attributes['class'] = 'control-label';
        return parent::createAttributesString($attributes);
    }
}
