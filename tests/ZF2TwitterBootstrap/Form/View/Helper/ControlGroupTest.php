<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

use PHPUnit_Framework_TestCase,
    Zend\Form\Element,
    ZF2TwitterBootstrap\Form\View\Helper\ControlGroup;


class ControlGroupTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->helper = new ControlGroup();
        parent::setUp();
    }

    public function testEmptyOpenTagContainsControlGroupCssClass()
    {
        $markup = $this->helper->openTag();
        $this->assertEquals('<div class="control-group">', $markup);
    }

    public function testCanCloseTag()
    {
        $markup = $this->helper->closeTag();
        $this->assertEquals('</div>', $markup);
    }


    public function testCanAddAttributesToOpenTag()
    {
        $attributes = array(
            'id'        => 'foo',
            'data-type' => 'bar'
        );

        $markup = $this->helper->openTag($attributes);
        $this->assertContains(sprintf('%s="%s"', 'id', 'foo'), $markup);
        $this->assertContains(sprintf('%s="%s"', 'data-type', 'bar'), $markup);
    }


    public function testControlLabelClassIsAddedToPassedCssClasses()
    {
        $attributes = array(
            'class' => 'foo bar'
        );
        $markup = $this->helper->openTag($attributes);

        $this->assertEquals(1, preg_match('/class="(.*)"/', $markup, $matches));
        $classes = explode(' ', $matches[1]);
        $this->assertContains('foo', $classes);
        $this->assertContains('bar', $classes);
        $this->assertContains('control-group', $classes);
   }

    public function testCanPassElementToOpenTag()
    {
        $element = new Element('test');
        $markup  = $this->helper->openTag($element);
        $this->assertEquals('<div class="control-group">', $markup);
    }


    public function testPassingElementWithErrorsAddsErrorClass()
    {
        $element = new Element('test');
        $element->setMessages(array(
            'FAIL'
        ));
        $markup  = $this->helper->openTag($element);
        $this->assertEquals(1, preg_match('/class="(.*)"/', $markup, $matches));
        $classes = explode(' ', $matches[1]);
        $this->assertContains('error', $classes);
        $this->assertContains('control-group', $classes);
    }


    public function testInvokeHasFluentInterface()
    {
        $this->assertSame($this->helper, $this->helper->__invoke());
    }
}
