<?php
defined('TYPO3_MODE') || die('Access denied.');

$table = 'tt_products_emails';

if (
    version_compare(TYPO3_version, '8.7.0', '<')
) {
    $fieldArray = array('tstamp', 'crdate', 'starttime', 'endtime');

    foreach ($fieldArray as $field) {
        unset($GLOBALS['TCA'][$table]['columns'][$field]['config']['renderType']);
        $GLOBALS['TCA'][$table]['columns'][$field]['config']['max'] = '20';
    }
}

$orderBySortingTablesArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['orderBySortingTables']);

if (
    !empty($orderBySortingTablesArray) &&
    in_array($table, $orderBySortingTablesArray)
) {
    $GLOBALS['TCA'][$table]['ctrl']['sortby'] = 'sorting';
}

if (
    defined('TYPO3_version') &&
    version_compare(TYPO3_version, '7.0.0', '<')
) {
    $GLOBALS['TCA'][$table]['columns']['fe_group'] = array (
        'exclude' => 1,
        'label' => DIV2007_LANGUAGE_LGL . 'fe_group',
        'config' => array (
            'type' => 'select',
            'items' => array (
                array('', 0),
                array(DIV2007_LANGUAGE_LGL . 'hide_at_login', -1),
                array(DIV2007_LANGUAGE_LGL . 'any_login', -2),
                array(DIV2007_LANGUAGE_LGL . 'usergroups', '--div--')
            ),
            'foreign_table' => 'fe_groups',
            'default' => 0
        )
    ),
}
