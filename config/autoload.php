<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Sessionform
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'FormSessionCalculator' => 'system/modules/sessionform/FormSessionCalculator.php',
	'FormHiddenOption'      => 'system/modules/sessionform/FormHiddenOption.php',
	'FormSessionOption'     => 'system/modules/sessionform/FormSessionOption.php',
	'FormSessionText'       => 'system/modules/sessionform/FormSessionText.php',
	'ModuleResetFormData'   => 'system/modules/sessionform/ModuleResetFormData.php',
	'SessionForm'           => 'system/modules/sessionform/SessionForm.php',
));
