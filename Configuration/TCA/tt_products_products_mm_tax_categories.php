<?php
defined('TYPO3') || die('Access denied.');

$result = [
    'ctrl' => [
        'title' => 'unused product tax category relations',
        'label' => 'uid_local',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'prependAtCopy' => DIV2007_LANGUAGE_LGL . 'prependAtCopy',
        'hideTable' => true,
    ],
    'columns' => [
        'uid_local' => [
            'label' => 'inactive',
            'config' => [
                'type' => 'passthrough',
                'default' => '',
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

