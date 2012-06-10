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
        if (isset($attributes['class'])) {
            $attributes['class'] = trim($attributes['class'] . ' ' . $this->cssClass);
        } else {
            $attributes['class'] = $this->cssClass;
        }

        return parent::createAttributesString($attributes);
    }
}
