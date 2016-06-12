<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2009
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id$
 */


class FormSessionOption extends FormSelectMenu
{
	
	public function __get($strKey)
	{
		switch( $strKey )
		{
			case 'value':
				return implode(',', $this->getOptions());
			
			default:
				return parent::__get($strKey);
		}
	}
	
	
	public function generate()
	{
		$arrOptions = $this->getOptions();
		
		if (!is_array($_SESSION['FORM_DATA'][$this->strName]))
		{
			return sprintf('<input type="hidden" name="%s" value="%s" /><span class="session">%s</span>',
							$this->strName,
							specialchars($_SESSION['FORM_DATA'][$this->strName]),
							implode('<br />', $arrOptions));
		}
		
		$strBuffer = '';
		
		foreach( $_SESSION['FORM_DATA'][$this->strName] as $k => $v )
		{
			$strBuffer .= sprintf('<input type="hidden" name="%s[%s]" value="%s" />',
							$this->strName,
							$k,
							specialchars($v));
		}
		
		return $strBuffer . implode('<br />', $arrOptions);
	}
	
	
	protected function getOptions()
	{
		$arrOptions = array();
		foreach( $this->arrOptions as $option )
		{
			if (is_array($_SESSION['FORM_DATA'][$this->strName]) && in_array($option['value'], $_SESSION['FORM_DATA'][$this->strName]))
			{
				$arrOptions[] = $option['label'];
			}
			elseif (!is_array($_SESSION['FORM_DATA'][$this->strName]) && $_SESSION['FORM_DATA'][$this->strName] == $option['value'])
			{
				$arrOptions[] = $option['label'];
			}
		}
		
		return $arrOptions;
	}
}

