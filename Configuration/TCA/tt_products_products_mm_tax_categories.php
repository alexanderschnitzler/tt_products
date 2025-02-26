<?php
defined('TYPO3') || die('Access denied.');

$languageSubpath = '/Resources/Private/Language/';
$languageLglPath = 'LLL:EXT:core' . $languageSubpath . 'locallang_general.xlf:LGL.';

$result = [
    'ctrl' => [
        'title' => 'unused product tax category relations',
        'label' => 'uid_local',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'prependAtCopy' => $languageLglPath . 'prependAtCopy',
        'hideTable' => true,
    ],
    'columns' => [
        'uid_local' => [
            'label' => 'inactive',
            'config' => [
                'type' => 'passthrough',
                'default' => null,
            ]
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => ''
        ]
    ]
];

return $result;

