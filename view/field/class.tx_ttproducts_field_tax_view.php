<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Franz Holzinger (franz@ttproducts.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Part of the tt_products (Shop System) extension.
 *
 * functions for the title field
 *
 * @author	Franz Holzinger <franz@ttproducts.de>
 * @maintainer	Franz Holzinger <franz@ttproducts.de>
 * @package TYPO3
 * @subpackage tt_products
 *
 *
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;


class tx_ttproducts_field_tax_view extends tx_ttproducts_field_base_view {

	public function getItemSubpartArrays (
		&$templateCode,
		$markerKey,
		$functablename,
		$row,
		$fieldname,
		$tableConf,
		&$subpartArray,
		&$wrappedSubpartArray,
		&$tagArray,
		$theCode = '',
		$basketExtra = [],
		$basketRecs = [],
		$id = '1'
	) {
		$tablesObj = GeneralUtility::makeInstance('tx_ttproducts_tables');
		$staticTaxViewObj = $tablesObj->get('static_taxes', true);

		if (is_object($staticTaxViewObj)) {
			$staticTaxFuncTableName = $staticTaxViewObj->getModelObj()->getFuncTablename();
			$staticTaxViewObj->getItemSubpartArrays(
				$templateCode,
				$staticTaxFuncTableName,
				$row,
				$subpartArray,
				$wrappedSubpartArray,
				$tagArray,
				$theCode,
				$basketExtra,
				$basketRecs,
				$id
			);
		}
	}

	public function getRowMarkerArray (
		$functablename,
		$fieldname,
		$row,
		$markerKey,
		&$markerArray,
		$fieldMarkerArray,
		$tagArray,
		$theCode,
		$id,
		$basketExtra,
		$basketRecs,
		&$bSkip,
		$bHtml = true,
		$charset = '',
		$prefix = '',
		$suffix = '',
		$imageNum = 0,
		$imageRenderObj = '',
		$linkWrap = false,
		$bEnableTaxZero = false
	) {
	}
}


