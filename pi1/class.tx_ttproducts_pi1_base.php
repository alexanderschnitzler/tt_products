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
 * Creates a list of products for the shopping basket in TYPO3.
 * Also controls basket, searching and payment.
 *
 * @author	Franz Holzinger <franz@ttproducts.de>
 * @maintainer	Franz Holzinger <franz@ttproducts.de>
 * @package TYPO3
 * @subpackage tt_products
 * @see file tt_products/static/old_style/constants.txt
 * @see TSref
 *
 *
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

use JambageCom\TtProducts\Api\PluginApi;


class tx_ttproducts_pi1_base extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin implements \TYPO3\CMS\Core\SingletonInterface {
    public $prefixId = TT_PRODUCTS_EXT;
    public $scriptRelPath = 'pi1/class.tx_ttproducts_pi1_base.php';	// Path to this script relative to the extension dir.
    public $extKey = TT_PRODUCTS_EXT;	// The extension key.
    public $bRunAjax = false;			// overrride this

    public function setContentObjectRenderer(ContentObjectRenderer $cObj): void
    {
        $this->cObj = $cObj;
    }

    /**
     * Main method. Call this from TypoScript by a USER or USER_INT cObject.
     */
    public function main ($content, $conf) {
        $parameterApi = GeneralUtility::makeInstance(\JambageCom\TtProducts\Api\ParameterApi::class);
        $parameterApi->setPrefixId($this->prefixId);
        PluginApi::init($conf);
        tx_ttproducts_model_control::setPrefixId($this->prefixId);

        $this->conf = $conf;
        $config = [];
        $mainObj = GeneralUtility::makeInstance('tx_ttproducts_main');	// fetch and store it as persistent object
        $errorCode = [];
        $mainObj->setContentObjectRenderer($this->cObj);
        $bDoProcessing =
            $mainObj->init(
                $conf,
                $config,
                $this->cObj,
                get_class($this),
                $errorCode
            );

        if ($bDoProcessing || !empty($errorCode)) {
            $content =
                $mainObj->run(
                    $this->cObj,
                    get_class($this),
                    $errorCode,
                    $content
                );
        } else {
            $mainObj->destruct();
        }

        return $content;
    }


    public function set ($bRunAjax) {
        $this->bRunAjax = $bRunAjax;
    }
}



