<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;


use PHPUnit_Framework_TestCase,
    Zend\Form\Element,
    Zend\Form\View\HelperLoader,
    Zend\View\Renderer\PhpRenderer;

class FormElementTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->helper   = new FormElement();
        $this->renderer = new PhpRenderer;
        $broker         = $this->renderer->getBroker();
        $loader         = $broker->getClassLoader();
        $loader->registerPlugins(new HelperLoader());
        $this->helper->setView($this->renderer);

        parent::setUp();
    }

    public function testElementWithErrorMessagesHasErrorCssClass()
    {
        $element = new Element('test');
        $element->setAttributes(array(
            'type' => 'text'
        ));
        $element->setMessages(array('errorMsg' => 'Fail'));
        $markup  = $this->helper->render($element);
        $this->assertContains(sprintf('%s="%s"', 'class', 'error'), $markup);
    }

    public function testCssClassDoesntOverrideExistingClassAttribute()
    {
        $element = new Element('test');
        $element->setAttributes(array(
            'type'  => 'text',
            'class' => 'foo bar'
        ));
        $element->setMessages(array('errorMsg' => 'Fail'));
        $markup  = $this->helper->render($element);

        $this->assertEquals(1, preg_match('/class="(.*)"/', $markup, $matches));
        $classes = explode(' ', $matches[1]);
        $this->assertContains('foo', $classes);
        $this->assertContains('bar', $classes);
        $this->assertContains('error', $classes);
    }
}
