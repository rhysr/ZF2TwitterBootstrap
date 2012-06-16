<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class Alert extends AbstractHelper
{
    public function openTag($attributes = array())
    {
        if (isset($attributes['class'])) {
            $attributes['class'] = trim($attributes['class'] . ' alert');
        } else {
            $attributes['class'] = 'alert';
        }

        $attributeString = $this->createAttributesString($attributes);
        return sprintf('<div %s>', $attributeString);
    }


    public function closeTag()
    {
        return '</div>';
    }


    public function dismissButton()
    {
        return '<button class="close" data-dismiss="alert">×</button>';
    }


    public function alertTitle($title)
    {
        return '<strong>' . $title . '</strong>';
    }


    public function render($alertTitle, $alertMessage)
    {
        $output  = $this->openTag()
                 . $this->dismissButton()
                 . $this->alertTitle($alertTitle)
                 . $alertMessage
                 . $this->closeTag();
        return $output;
    }
}
