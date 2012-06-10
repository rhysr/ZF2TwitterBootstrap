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
}
