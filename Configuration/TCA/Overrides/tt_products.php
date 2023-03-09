<?php
defined('TYPO3') || die('Access denied.');

call_user_func(function () {
    $table = 'tt_products';
    $configuration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\JambageCom\TtProducts\Domain\Model\Dto\EmConfiguration::class);
    $whereTaxCategory = '';
    $bSelectTaxMode = false;

    $taxArray = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['tax'];
    $taxFields = '';

    if (
        isset($taxArray) &&
        is_array($taxArray) &&
        isset($taxArray['fields'])
    ) {
        $taxFields = implode(',', \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $taxArray['fields']));
    }

    if (
        defined('STATIC_INFO_TABLES_TAXES_EXT') &&
        (
            \TYPO3\CMS\Core\Utility\GeneralUtility::inList($taxFields, 'tax_id') ||
            \TYPO3\CMS\Core\Utility\GeneralUtility::inList($taxFields, 'taxcat_id')
        ) &&
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded(STATIC_INFO_TABLES_TAXES_EXT)
    ) {
        $eInfo = \JambageCom\Div2007\Utility\ExtensionUtility::getExtensionInfo(STATIC_INFO_TABLES_TAXES_EXT);

        if (is_array($eInfo)) {
            $sittVersion = $eInfo['version'];
            if (version_compare($sittVersion, '0.3.0', '>=')) {
                $bSelectTaxMode = true;
            }
        }
    }

    if ($bSelectTaxMode) {
        $whereTaxCategory = \TYPO3\CMS\Backend\Utility\BackendUtility::BEenableFields('static_tax_categories');

        $temporaryColumns = [];
        $addFields = [];
        $newFields = '';
        $firstField = '';

        if (\TYPO3\CMS\Core\Utility\GeneralUtility::inList($taxFields, 'taxcat_id')) {
            $temporaryColumns['taxcat_id'] = [
                'exclude' => '0',
                'label' => 'LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_tax_categories',
                'config' => [
                    'size' => 30,
                    'minitems' => 0,
                    'maxitems' => 100,
                    'type' => 'select',
                    'renderType' => 'selectTree',
                    'foreign_table' => 'static_tax_categories',
                    'foreign_table_where' => $whereTaxCategory . ' ORDER BY static_tax_categories.uid',
                    'MM' => 'tt_products_products_mm_tax_categories',
                    'treeConfig' => [
                        'parentField' => 'parentid',
                        'appearance' => [
                            'expandAll' => 0,
                            'showHeader' => true,
                            'maxLevels' => 99,
                        ]
                    ],
                    'exclude' => 1,
                    'default' => 0
                ]
            ];
            $addFields[] = 'taxcat_id';
            $firstField = 'taxcat_id';
        }


        if (\TYPO3\CMS\Core\Utility\GeneralUtility::inList($taxFields, 'tax_id')) {
            $temporaryColumns['tax_id'] = [
                'exclude' => 0,
                'label' => 'LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_taxes.tx_rate_id',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_taxes.tx_rate_id.I.0', '0'],
                        ['LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_taxes.tx_rate_id.I.1', '1'],
                        ['LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_taxes.tx_rate_id.I.2', '2'],
                        ['LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_taxes.tx_rate_id.I.3', '3'],
                        ['LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_taxes.tx_rate_id.I.4', '4'],
                        ['LLL:EXT:' . STATIC_INFO_TABLES_TAXES_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:static_taxes.tx_rate_id.I.5', '5'],
                    ],
                    'default' => 0
                ]
            ];

            $addFields[] = 'tax_id';
            if ($firstField == '') {
                $firstField = 'taxcat_id';
            }
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            $table,
            $temporaryColumns
        );

        if (\TYPO3\CMS\Core\Utility\GeneralUtility::inList($taxFields, 'tax')) {
            // nothing
        } else {
            $GLOBALS['TCA'][$table]['types']['0'] = str_replace(', tax;', ', ' . $firstField . ';', $GLOBALS['TCA'][$table]['types']['0']);
            $key = array_search($firstField, $addFields);
            unset($addFields[$key]);
        }
        $newFields = implode(',', $addFields);

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            $table,
            $newFields,
            '',
            'replace:tax_dummy'
        );
    }

    switch ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['articleMode']) {
        case '1':
            $GLOBALS['TCA'][$table]['columns']['article_uid'] = [
                'exclude' => 1,
                'label' => 'LLL:EXT:' . TT_PRODUCTS_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:tt_products.article_uid',
                'config' => [
                    'type' => 'group',
                    'internal_type' => 'db',
                    'allowed' => 'tt_products_articles',
                    'MM' => 'tt_products_products_mm_articles',
                    'foreign_table' => 'tt_products_articles',
                    'foreign_table_where' => ' ORDER BY tt_products_articles.title',
                    'size' => 10,
                    'selectedListStyle' => 'width:450px',
                    'minitems' => 0,
                    'maxitems' => 1000,
                    'default' => 0
                ]
            ];
            break;
        case '2':
            // leave the settings of article_uid
            break;
        case '0':
        default:
            unset($GLOBALS['TCA'][$table]['columns']['article_uid']);
            $GLOBALS['TCA'][$table]['types']['0'] = str_replace(',article_uid,', ',', $GLOBALS['TCA'][$table]['types']['0']);
            break;
    }

    $orderBySortingTablesArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['orderBySortingTables']);

    if (version_compare(TYPO3_version, '11.5.0', '>=')) {
        $GLOBALS['TCA'][$table]['columns']['syscat'] = [
            'config' => [
                'type' => 'category'
            ]
        ];

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            $table,
            'categories'
        );
    } else {
        $sysCategoryOrderBy = 'sys_category.title ASC';

        if (
            !empty($orderBySortingTablesArray) &&
            in_array('sys_category', $orderBySortingTablesArray)
        ) {
            $sysCategoryOrderBy = 'sys_category.sorting ASC';
        }

        // Add an extra system categories selection field to the tt_products table
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
            TT_PRODUCTS_EXT,
            $table,
            'syscat',
            [
                // Set a custom label
                'label' =>
                    'LLL:EXT:' . TT_PRODUCTS_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:tt_products.syscat',
                // This field can be an exclude-field
                'exclude' => 1,
                // Override generic configuration, e.g. sort by title rather than by sorting
                'fieldConfiguration' => [
                    'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY ' . $sysCategoryOrderBy,
                ],
                // string (keyword), see TCA reference for details
                'l10n_mode' => 'exclude',
                // list of keywords, see TCA reference for details
                'l10n_display' => 'hideDiff',
            ]
        );
    }

    $palleteAddition = ',--palette--;LLL:EXT:' . TT_PRODUCTS_EXT . DIV2007_LANGUAGE_SUBPATH . 'locallang_db.xlf:sys_file_reference.shopAttributes;tt_productsPalette';
    // TODO.
    $palleteAddition = '';

    $GLOBALS['TCA'][$table]['ctrl']['thumbnail'] = 'image_uid';

        // nothing. This is the default behaviour

    if (!empty($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['addressTable'])) {
        $GLOBALS['TCA'][$table]['columns']['address'] = [
            'exclude' => 1,
            'label' => DIV2007_LANGUAGE_LGL . 'address',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['addressTable'],
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
                'default' => 0
            ]
        ];

        $newFields = 'address';

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            $table,
            $newFields,
            '',
            'before:price'
        );
    }

    $orderBySortingTablesArray = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['orderBySortingTables']);
    if (
        !empty($orderBySortingTablesArray) &&
        in_array($table, $orderBySortingTablesArray)
    ) {
        $GLOBALS['TCA'][$table]['ctrl']['sortby'] = 'sorting';
    }

    $GLOBALS['TCA'][$table]['columns']['slug']['config']['eval'] = $configuration->getSlugBehaviour();

    $excludeArray =  
        ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][TT_PRODUCTS_EXT]['exclude']);

    if (
        isset($excludeArray) &&
        is_array($excludeArray) &&
        isset($excludeArray[$table]) &&
        is_array($excludeArray[$table])
    ) {
        \JambageCom\Div2007\Utility\TcaUtility::removeField(
            $GLOBALS['TCA'][$table],
            $excludeArray[$table]
        );
    }

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords($table);

});
