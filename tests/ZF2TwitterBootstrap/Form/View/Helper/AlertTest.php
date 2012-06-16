<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

use PHPUnit_Framework_TestCase,
    ZF2TwitterBootstrap\Form\View\Helper\Alert;


class AlertTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->helper = new Alert();
        parent::setUp();
    }

    public function testCreateOpenTag()
    {
        $markup = $this->helper->openTag();
        $this->assertEquals('<div class="alert">', $markup);
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


    public function testCanAddCssClasses()
    {
        $attributes = array(
            'class' => 'foo bar'
        );
        $markup = $this->helper->openTag($attributes);

        $this->assertEquals(1, preg_match('/class="(.*)"/', $markup, $matches));
        $classes = explode(' ', $matches[1]);
        $this->assertContains('foo', $classes);
        $this->assertContains('bar', $classes);
        $this->assertContains('alert', $classes);
    }


    public function testCanWriteButton()
    {
        $markup = $this->helper->dismissButton();
        $this->assertEquals('<button class="close" data-dismiss="alert">×</button>', $markup);
    }


    public function testCanWriteAlertTitle()
    {
        $markup = $this->helper->alertTitle('TITLE');
        $this->assertEquals('<strong>TITLE</strong>', $markup);
    }


    public function testCanRenderFullAlert()
    {
        $alertTitle   = 'Pay attention';
        $alertMessage = 'Some oh so important informational message';
        $markup = $this->helper->render($alertTitle, $alertMessage);

        $this->assertRegExp('#^<div class="alert">.*</div>$#', $markup);
        $this->assertRegExp('#<button.*>.+</button>#', $markup);
        $this->assertContains('<strong>' . $alertTitle . '</strong>', $markup);
        $this->assertContains($alertMessage, $markup);
    }


    public function testInvokeHasFluentInterface()
    {
        $this->assertSame($this->helper, $this->helper->__invoke());
    }
}
