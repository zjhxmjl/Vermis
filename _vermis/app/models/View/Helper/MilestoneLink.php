<?php

/**
 * =============================================================================
 * @file        MilestoneLink.php
 * @author      Lukasz Cepowski <lukasz@cepowski.com>
 * @package     Vermis
 * @version     $Id: MilestoneLink.php 1353 2012-12-26 20:46:41Z cepa $
 * 
 * @copyright   Vermis :: The Issue Tracking System
 *              Copyright (C) 2010-2016 Cask Code, KOWeb
 *              All rights reserved.
 *              https://github.com/koweb/Vermis
 * =============================================================================
 */

/**
 * @class View_Helper_MilestoneLink
 * @brief Helper for link rendering.
 */
class View_Helper_MilestoneLink
{

    protected $_view = null;

    public function setView(Zend_View_Interface $view)
    {
        $this->_view = $view;
    }

    public function milestoneLink($projectSlug, $milestoneSlug, $title, $router = 'project/milestones/show')
    {
        if (!isset($milestoneSlug))
            return 'None';
        $config = FreeCode_Config::getInstance();
        $url = $config->baseHost.$this->_view->url(
            array(
                'project_slug' => $projectSlug,
                'milestone_slug' => $milestoneSlug
            ), 
            $router
        );
        $title = $this->_view->escape($title);
        return '<a href="'.$url.'" title="'.$title.'">'.$title.'</a>';
    }

}
