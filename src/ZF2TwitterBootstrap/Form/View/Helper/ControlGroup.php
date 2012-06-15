<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

use Zend\Form\Element,
    Zend\Form\View\Helper\AbstractHelper;

class ControlGroup extends AbstractHelper
{
    public function openTag($attributesOrElement = null)
    {
        $attributes = array();
        if (is_array($attributesOrElement)) {
            $attributes = $attributesOrElement;
        }

        if (isset($attributes['class'])) {
            $attributes['class'] = trim($attributes['class'] . ' control-group');
        } else {
            $attributes['class'] = 'control-group';
        }

        if ($attributesOrElement instanceof Element) {
            if (0 < count($attributesOrElement->getMessages())) {
                $attributes['class'] .= ' error';
            }
        }

        $attributeString = $this->createAttributesString($attributes);
        return sprintf('<div %s>', $attributeString);
    }


    public function closeTag()
    {
        return '</div>';
    }


    /**
     * Temporary...might replace with render of full control group section
     *
     * @return ZF2TwitterBootstrap\Form\View\Helper\ControlGroup
     */
    public function __invoke()
    {
        return $this;
    }
}
