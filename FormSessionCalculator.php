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
 

class FormSessionCalculator extends Widget
{

	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_widget';

	
	public function generate()
	{
		if (!$this->varValue)
		{
			$fields = preg_split('/{([^}]+)}/', $this->calculation, -1, PREG_SPLIT_DELIM_CAPTURE);
			
			$strFormula = '';
			
			for($_rit=0; $_rit<count($fields); $_rit=$_rit+2)
			{
				$strFormula .= $fields[$_rit];
				$strField = $fields[$_rit+1];
	
				// Skip empty tags
				if (!strlen($strField))
				{
					continue;
				}
				
				$strFormula .= $_SESSION['FORM_DATA'][$strField];
			}
						
			$this->varValue = eval('return ('.$strFormula.');');
		}
		
		return sprintf('<input type="hidden" name="%s" value="%s" />%s %s %s',
						$this->strName,
						specialchars($this->varValue),
						($this->currencyPosition == 'left' ? $this->currency : ''),
						$this->varValue,
						($this->currencyPosition == 'right' ? $this->currency : ''));
	}
}

