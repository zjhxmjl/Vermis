<?php

/**
 * =============================================================================
 * @file        bootstrap.php
 * @author      Lukasz Cepowski <lukasz@cepowski.com>
 * @package     Vermis
 * @version     $Id: bootstrap.php 1353 2012-12-26 20:46:41Z cepa $
 * 
 * @copyright   Vermis :: The Issue Tracking System
 *              Copyright (C) 2010-2016 Cask Code, KOWeb
 *              All rights reserved.
 *              https://github.com/koweb/Vermis
 * =============================================================================
 */

/*
 * Save boot time.
 * @note used by FreeCode_Application`
 */
list($x, $y) = explode(' ', microtime());
$bootTime = $x + $y;

/*
 * Setup PHP.
 */
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
date_default_timezone_set('Europe/Warsaw');

require_once 'version.php';

/*
 * Set application pathes.
 */
$rootDir = dirname(__FILE__);
$rootDir = rtrim($rootDir, '/');
$defines = array(
    'ROOT_DIR'          => $rootDir,
    'CAPTCHA_DIR'       => $rootDir.'/captcha',
    'CAPTCHA_URL'       => '_vermis/captcha',
    'CONFIG_DIR'        => $rootDir.'/config',
    'CONTROLLERS_DIR'   => $rootDir.'/app/controllers',
    'EMAILS_DIR'        => $rootDir.'/themes/default/emails',
    'FIXTURES_DIR'      => $rootDir.'/fixtures',
    'LANG_DIR'          => $rootDir.'/lang',
    'LOG_DIR'           => $rootDir.'/log',
    'MODELS_DIR'        => $rootDir.'/app/models',
    'ROUTES_DIR'        => $rootDir.'/routes',
    'SQL_FIXTURES_DIR'  => $rootDir.'/fixtures/sql',
    'TEST_DIR'          => $rootDir.'/test',
    'THEMES_DIR'        => $rootDir.'/themes',
    'UPLOAD_DIR'        => $rootDir.'/upload',
    'UPLOAD_TMP_DIR'    => $rootDir.'/upload/tmp',
    'UPLOAD_ISSUES_DIR' => $rootDir.'/upload/issues',
    'VIEWS_HELPERS_DIR' => $rootDir.'/app/models/View/Helper',
    'VIEWS_LAYOUTS_DIR' => $rootDir.'/themes/default/layouts',
    'VIEWS_SCRIPTS_DIR' => $rootDir.'/themes/default/scripts',
    'YML_FIXTURES_DIR'  => $rootDir.'/fixtures/yml',
);
foreach ($defines as $name => $value) {
    if (!defined($name))
        define($name, $value);
}

/*
 * Set include path.
 */
$pathes = array(
    '/',
    '/lib',
    '/lib/Doctrine',
    '/app/controllers',
    '/app/models'
);

$includePath = '';
foreach ($pathes as $path) {
    $includePath .= ROOT_DIR.$path.PATH_SEPARATOR;
}

set_include_path(
    '.'.PATH_SEPARATOR.
    $includePath.
    get_include_path()
);

/*
 * Load libraries.
 */
require_once 'Zend/Loader/Autoloader.php';
$loader = Zend_Loader_Autoloader::getInstance();
$loader->setFallbackAutoloader(true);
$loader->suppressNotFoundWarnings(false);
