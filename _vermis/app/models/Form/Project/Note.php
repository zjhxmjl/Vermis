<?php

/**
 * =============================================================================
 * @file        Form/Project/Note.php
 * @author      Lukasz Cepowski <lukasz@cepowski.com>
 * @package     Vermis
 * @version     $Id: Note.php 1353 2012-12-26 20:46:41Z cepa $
 * 
 * @copyright   Vermis :: The Issue Tracking System
 *              Copyright (C) 2010-2016 Cask Code, KOWeb
 *              All rights reserved.
 *              https://github.com/koweb/Vermis
 * =============================================================================
 */

/**
 * @class   Form_Project_Note
 * @brief   Note form.
 */
class Form_Project_Note extends FreeCode_Form
{
    
    public function __construct($options = null)
    {
        parent::__construct($options);

        $title = new Zend_Form_Element_Text('title');
        $title
            ->setLabel('title')
            ->setRequired(true)
            ->addFilter(new Zend_Filter_StripTags())
            ->addValidator(new Zend_Validate_StringLength(0, 64, 'UTF-8'));
            
        $content = new Zend_Form_Element_Textarea('content');
        $content
            ->setLabel('content');
            
        $submit = new Zend_Form_Element_Submit('submit');
        $submit
            ->setLabel('submit');

        $this->addElements(array(
            $title,
            $content,
            $submit
        ));

    }

}
