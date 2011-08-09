<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009-2011
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @author     Kamil Kuzminski <kamil.kuzminski@gmail.com>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id$
 */


class SessionForm extends Frontend
{

	public function loadFormData(Widget $objWidget, $intForm)
	{
		if ($objWidget->loadSession && strlen($this->Input->post($objWidget->name)))
		{
			$objWidget->value = $this->Input->post($objWidget->name);
		}
		
		return $objWidget;
	}
	
	
	public function storeFiles(&$arrPost, $arrForm, $arrFiles)
	{
		if (is_array($arrFiles) && count($arrFiles))
		{
			foreach ($arrFiles as $fieldName => $file)
			{
				// Store only the file, which has been saved in Contao folder
				if ($file['uploaded'] && strpos($file['tmp_name'], $GLOBALS['TL_CONFIG']['uploadPath']) !== false)
				{
					$arrPost[$fieldName] = $this->Environment->base . str_replace(TL_ROOT . '/', '', $file['tmp_name']);
				}
			}
		}
	}
}

