<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2017 Franz Holzinger (franz@ttproducts.de)
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
 * control functions for an address item object
 *
 * @author	Franz Holzinger <franz@ttproducts.de>
 * @maintainer	Franz Holzinger <franz@ttproducts.de>
 * @package TYPO3
 * @subpackage tt_products
 *
 *
 */

use TYPO3\CMS\Core\Utility\MathUtility;

class tx_ttproducts_control_address {

	static protected $addressExtKeyTable = array(
		'tt_address' => TT_ADDRESS_EXT,
		'tx_partner_main' => PARTNER_EXT,
		'tx_party_addresses' => PARTY_EXT,
		'tx_party_parties' => PARTY_EXT,
		'fe_users' => '0'
	);


	static public function getAddressExtKeyTable () {
		return self::$addressExtKeyTable;
	}


	static public function getAddressTablename (&$extKey) {
        $emClass = '\\TYPO3\\CMS\\Core\\Utility\\ExtensionManagementUtility';
		$extKey = '';
		$addressTable = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['addressTable'];

		if (!$addressTable) {
			$addressExtKeyTable = self::getAddressExtKeyTable();

			foreach ($addressExtKeyTable as $addressTable => $extKey) {

                $testIntResult = MathUtility::canBeInterpretedAsInteger($extKey);
				if (
					$testIntResult
				) {
					$extKey = '';
				}

				if (
					$extKey == '' ||
					call_user_func($emClass . '::isLoaded', $extKey)
				) {
					break;
				}
			}
		}

		return $addressTable;
	}
}

