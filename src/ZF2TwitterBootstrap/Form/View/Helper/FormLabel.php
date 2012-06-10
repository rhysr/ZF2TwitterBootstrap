<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;


class FormLabel extends \Zend\Form\View\Helper\FormLabel
{
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
