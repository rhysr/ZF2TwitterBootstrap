<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

use PHPUnit_Framework_TestCase,
    ZF2TwitterBootstrap\Form\View\Helper\FormElementErrorsInline,
    Zend\Form\Element;


class FormElementErrorsInlineTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->helper = new FormElementErrorsInline();
        parent::setUp();
    }

    public function getMessageList()
    {
        return array(
            'First error message',
            'Second error message',
        );
    }

    public function testLackOfMessagesResultsInEmptyMarkup()
    {
        $element = new Element('foo');
        $markup  = $this->helper->render($element);
        $this->assertEquals('', $markup);
    }

    public function testRendersErrorMessagesUsingSpans()
    {
        $messages = $this->getMessageList();
        $element  = new Element('foo');
        $element->setMessages($messages);

        $markup = $this->helper->render($element);
        $this->assertRegexp('#<span class="help-inline">First error message</span>\s*<span class="help-inline">Second error message</span>#s', $markup);
    }
}
