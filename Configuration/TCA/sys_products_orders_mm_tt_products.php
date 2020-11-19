<?php
defined('TYPO3_MODE') || die('Access denied.');


// ******************************************************************
// order to products table, sys_products_orders_mm_tt_products
// ******************************************************************
$result = array (
    'ctrl' => array (
        'title' => 'LLL:EXT:' . TT_PRODUCTS_EXT . '/locallang_db.xml:sys_products_orders_mm_tt_products',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'delete' => 'deleted',
        'enablecolumns' => array (
            'disabled' => 'hidden'
        ),
        'prependAtCopy' => DIV2007_LANGUAGE_LGL . 'prependAtCopy',
        'crdate' => 'crdate',
        'iconfile' => PATH_TTPRODUCTS_ICON_TABLE_REL . 'tt_products_cat.gif',
        'hideTable' => true,
    ),
    'interface' => array (
        'showRecordFieldList' => 'uid_local,graduated_price_uid'
    ),
    'columns' => array (
        'hidden' => array (
            'exclude' => 1,
            'label' => DIV2007_LANGUAGE_LGL . 'hidden',
            'config' => array (
                'type' => 'check'
            ),
            'default' => 0
        ),
        'uid_local' => array (
            'label' => 'LLL:EXT:' . TT_PRODUCTS_EXT . '/locallang_db.xml:sys_products_orders_mm_tt_products.uid_local',
            'config' => array (
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_products_orders',
                'maxitems' => 1,
                'default' => 0
            )
        ),
        'uid_foreign' => array (
            'label' => 'LLL:EXT:' . TT_PRODUCTS_EXT . '/locallang_db.xml:sys_products_orders_mm_tt_products.uid_foreign',
            'config' => array (
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tt_products',
                'maxitems' => 1,
                'default' => 0
            )
        ),
        'sorting' => array (
            'config' => array (
                'type' => 'passthrough',
                'default' => 0
            )
        ),
        'sorting_foreign' => array (
            'config' => array (
                'type' => 'passthrough',
                'default' => 0
            )
        ),
    ),
    'types' => array(
        '0' => array('showitem' => 'hidden,--palette--;;1, uid_local, uid_foreign')
    )
);

return $result;
