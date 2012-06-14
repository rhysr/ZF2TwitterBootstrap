<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

use Zend\Form\ElementInterface;

class FormElement extends \Zend\Form\View\Helper\FormElement
{
    private $cssClass = 'error';

    public function render(ElementInterface $element)
    {
        if ($this->hasErrors($element)) {
            $this->addErrorClass($element);
        }
        return parent::render($element);
    }


    private function hasErrors(ElementInterface $element)
    {
        return 0 < count($element->getMessages());
    }


    private function addErrorClass(ElementInterface $element)
    {
        $classAttrib = $element->getAttribute('class');
        if (null === $classAttrib) {
            $classAttrib = $this->cssClass;
        } else {
            $classAttrib = trim($classAttrib . ' ' . $this->cssClass);
        }
        $element->setAttribute('class', $classAttrib);
    }
}
