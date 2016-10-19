<?php

/**
 * =============================================================================
 * @file        Project/MemberTest.php
 * @author      Lukasz Cepowski <lukasz@cepowski.com>
 * @package     Vermis
 * @version     $Id: MemberTest.php 1353 2012-12-26 20:46:41Z cepa $
 * 
 * @copyright   Vermis :: The Issue Tracking System
 *              Copyright (C) 2010-2012 HellWorx Software
 *              All rights reserved.
 *              www.hellworx.com
 * =============================================================================
 */

/**
 * @class   Project_MemberTest
 */
class Project_MemberTest extends Test_PHPUnit_DbTestCase 
{
    
    public function setUp()
    {
        parent::setUp();
        Application::getInstance()->setupTranslator();
    }

    public function testGetRoleLabel()
    {
        $this->assertEquals('Leader', 
            Project_Member::getRoleLabel(Project_Member::ROLE_LEADER));
        $this->assertEquals('unknown', Project_Member::getRoleLabel('unknown'));
    }
    
}
