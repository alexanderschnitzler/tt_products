<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005-2007 Franz Holzinger (franz@ttproducts.de)
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
 * functions for the page
 *
 * @author	Franz Holzinger <franz@ttproducts.de>
 * @maintainer	Franz Holzinger <franz@ttproducts.de>
 * @package TYPO3
 * @subpackage tt_products
 *
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;


class tx_ttproducts_page extends tx_ttproducts_category_base {
	var $noteArray = array(); 	// array of pages with notes
	var $piVar = 'pid';
	var $pageAsCategory;		// > 0 if pages are used as categories
	protected $tableAlias = 'page';


	/**
	 * Getting all tt_products_cat categories into internal array
	 */
	public function init ($cObj, $tablename)	{
		parent::init($cObj, $tablename);

		$cnf = GeneralUtility::makeInstance('tx_ttproducts_config');
		$tablename = ($tablename ? $tablename : 'pages');
		$this->tableconf = $cnf->getTableConf('pages');
		$this->pageAsCategory = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['pageAsCategory'];

//		$this->table->setDefaultFieldArray(array('uid'=>'uid', 'pid'=>'pid', 't3ver_oid'=>'t3ver_oid', 't3ver_id' => 't3ver_id', 't3ver_label' => 't3ver_label', 'tstamp'=>'tstamp', 'hidden'=>'hidden', 'sorting'=> 'sorting',
// 			'deleted' => 'deleted', 'hidden'=>'hidden', 'starttime' => 'starttime', 'endtime' => 'endtime'));

		$requiredFields = 'uid,pid,title,subtitle,media,shortcut';
		if ($this->tableconf['requiredFields'])	{
			$tmp = $this->tableconf['requiredFields'];
			$requiredFields = ($tmp ? $tmp : $requiredFields);
		}
		$requiredListArray = GeneralUtility::trimExplode(',', $requiredFields);
		$this->getTableObj()->setRequiredFieldArray($requiredListArray);
		if (is_array($this->tableconf['language.']) &&
			$this->tableconf['language.']['type'] == 'field' &&
			is_array($this->tableconf['language.']['field.'])
			)	{
			$addRequiredFields = array();
			$addRequiredFields = $this->tableconf['language.']['field.'];
			$this->getTableObj()->addRequiredFieldArray ($addRequiredFields);
		}

		if (is_array($this->tableconf['generatePath.']) &&
			$this->tableconf['generatePath.']['type'] == 'tablefields' &&
			is_array($this->tableconf['generatePath.']['field.'])
			)	{
			$addRequiredFields = array();
			foreach ($this->tableconf['generatePath.']['field.'] as $field => $value)	{
				$addRequiredFields[] = $field;
			}
			$this->getTableObj()->addRequiredFieldArray ($addRequiredFields);
		}

		$this->getTableObj()->setTCAFieldArray($tablename, 'pages');

		if ($this->bUseLanguageTable($this->tableconf))	{
			$this->getTableObj()->setForeignUidArray($this->getTableObj()->langname, 'pid');
		}

		if ($this->tableconf['language.'] && $this->tableconf['language.']['type'] == 'csv')	{
			$this->getTableObj()->initLanguageFile($this->tableconf['language.']['file']);
		}
	} // init

	/* initalisation for code dependant configuration */
	public function initCodeConf ($theCode,$tableConf)	{
		parent::initCodeConf ($theCode,$tableConf);
		if ($this->bUseLanguageTable($tableConf))	{
			$this->getTableObj()->setForeignUidArray($this->getTableObj()->langname, 'pid');
		}
	}

	public function getRootCat ()	{
		$cnf = GeneralUtility::makeInstance('tx_ttproducts_config');
		$rc = $cnf->config['rootPageID'];
		return $rc;
	}

	public function getNotes ($uid) {
		$rowArray = $this->noteArray[$uid];
		$rcArray = array();
		if (!is_array($rowArray) && $uid) {
			$rowArray = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'tt_products_products_note_pages_mm', 'uid_local = '.intval($uid),'','sorting');
			$this->noteArray[$uid] = $rowArray;
		}
		foreach ($rowArray as $k => $row)	{
			$rcArray[] = $row['uid_foreign'];
		}
		return $rcArray;
	}

	public function getParent ($uid=0) {
		$rc = array();
		$row = $this->get ($uid);
		if ($row['pid'])	{
			$rc = $this->get ($row['pid']);
		}
		return $rc;
	}

	public function getRowCategory ($row) {
		$rc = $row['pid'];
		return $rc;
	}

	public function getRowPid($row) {
		$rc = $row['uid'];
		return $rc;
	}

	public function getParamDefault ($theCode, $pid)	{
		$pid = ($pid ? $pid : $this->conf['defaultPageID']);
		if ($pid)	{
			$pid = implode(',',GeneralUtility::intExplode(',', $pid));
		}
		return $pid;
	}

	public function getRelationArray ($dataArray, $excludeCats='',$rootUids='',$allowedCats='') {

		$relationArray = array();
		$pageArray = GeneralUtility::trimExplode (',', $pid_list);
		$excludeArray = GeneralUtility::trimExplode (',', $excludeCats);
		foreach ($excludeArray as $k => $cat)	{
			$excludeKey = array_search($cat, $pageArray);
			unset($pageArray[$excludeKey]);
		}
		$tablename = $this->getTableObj()->name;
		if ($this->config['LLkey'] && is_array($this->tableconf['language.']) && $this->tableconf['language.']['type'] == 'table')	{
			$tablename = $this->tableconf['language.']['table'];
		}

		foreach ($pageArray as $k => $uid)	{
			$row = $this->get ($uid);
			if ($row)	{
				if (in_array($row['shortcut'],$excludeArray))	{	// do not show shortcuts to the excluded page
					$excludeKey = array_search($row['uid'], $pageArray);
					unset($pageArray[$excludeKey]);
					continue;
				}
				$relationArray [$uid]['title'] = $row['title'];
				if ($tablename == $this->getTableObj()->name)	{ // default language and using language overlay table
					$relationArray [$uid]['pid'] = $row['uid'];
				} else {
					$relationArray [$uid]['pid'] = $row['pid'];
				}
				$pid = $row['pid'];
				$parentKey = array_search($pid, $pageArray);
				if ($parentKey === false || $parentKey == 0 && $pageArray[0] != $pid)	{
					$pid = 0;
				}
				$relationArray [$uid]['parent_category'] = $pid;
				$parentId = $pid;
				if ($parentId)	{
					$count = 0;
					if (!is_array($relationArray[$parentId]['child_category']))	{
						$relationArray[$parentId]['child_category'] = array();
					}
					$relationArray[$parentId]['child_category'][] = (int) $uid;
				}
			}
		}

		return $relationArray;
	}

	/**
	 * Returning the pid out from the row using the where clause
	 */
	public function getPID ($conf, $confExt, $row, $rootRow=array()) {
		$rc = 0;
		if ($confExt) {
			foreach ($confExt as $k1 => $param) {
				$type  = $param['type'];
				$where = $param['where'];
				$isValid = false;
				if ($where) {
					$wherelist = GeneralUtility::trimExplode ('AND', $where);
					$isValid = true;
					foreach ($wherelist as $k2 => $condition) {
						$args = GeneralUtility::trimExplode ('=', $condition);
						if ($row[$args[0]] != $args[1]) {
							$isValid = false;
						}
					}
				} else {
					$isValid = true;
				}

				if ($isValid == true) {
					switch ($type) {
						case 'sql':
							$rc = $param['pid'];
							break;
						case 'pid':
							$rc = intval($row['pid']);
							break;
					}
					break;  //ready with the foreach loop
				}
			}
		}
		if (!$rc) {
			if ($conf) {
				$rc = $conf;
			} else {
				$rc = ($rootRow['uid'] ? $rootRow['uid'] : $GLOBALS['TSFE']->id);
				$rc = intval($rc);
			}
		}

		return $rc;
	} // getPID
}



