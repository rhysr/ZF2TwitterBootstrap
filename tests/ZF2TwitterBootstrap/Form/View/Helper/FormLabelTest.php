<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

use PHPUnit_Framework_TestCase,
    ZF2TwitterBootstrap\Form\View\Helper\FormLabel;


class FormLabelTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->helper = new FormLabel();
        parent::setUp();
    }


    public function testEmptyOpenTagHasControlLabelClass()
    {
        $markup = $this->helper->openTag();
        $this->assertContains(sprintf('%s="%s"', 'class', 'control-label'), $markup);
    }


    public function testControlLabelClassAddedWhenAttributeArrayPassed()
    {
        $attributes = array(
            'for' => 'test',
        );
        $markup = $this->helper->openTag($attributes);

        foreach ($attributes as $key => $value) {
            $this->assertContains(sprintf('%s="%s"', $key, $value), $markup);
        }
        $this->assertContains(sprintf('%s="%s"', 'class', 'control-label'), $markup);
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
        $this->assertContains('control-label', $classes);
   }


    public function testInvokeHasFluentInterface()
    {
        $this->assertSame($this->helper, $this->helper->__invoke());
    }
}
