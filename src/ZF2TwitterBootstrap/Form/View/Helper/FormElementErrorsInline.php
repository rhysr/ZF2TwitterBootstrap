<?php

namespace ZF2TwitterBootstrap\Form\View\Helper;

class FormElementErrorsInline extends \Zend\Form\View\Helper\FormElementErrors
{
    protected $messageCloseString     = '</span>';
    protected $messageOpenFormat      = '<span class="help-inline">';
    protected $messageSeparatorString = '</span><span class="help-inline">';
}
