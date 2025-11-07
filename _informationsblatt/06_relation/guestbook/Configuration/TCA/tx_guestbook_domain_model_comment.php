<?php

return [
    'ctrl' => [
        'title' => 'Comments',
        'label' => 'headline',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'languageField' => 'sys_language_uid',
        'translationSource' => 'l10n_source',
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:guestbook/Resources/Public/Icons/icon.svg',
    ],
    'columns' => [
        'headline' => [
            'label' => 'Headline',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'size' => 20,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'comment' => [
            'label' => 'Comment',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'size' => 20,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'guest' => [
            'label' => 'Guest',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'maxitems' => 1,
                'items' => [
                    [
                        'label' => 'Nothing selected',
                        'value' => '',
                    ],
                ],
                'foreign_table' => 'tx_guestbook_domain_model_guest',
            ]
        ],
        'rating' => [
            'label' => 'Rating',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'maxitems' => 1,
                'items' => [
                    [
                        'label' => 'Nothing selected',
                        'value' => '',
                    ],
                    [
                        'label' => '1 Star',
                        'value' => 1,
                    ],
                    [
                        'label' => '2 Stars',
                        'value' => 2,
                    ],
                    [
                        'label' => '3 Stars',
                        'value' => 3,
                    ],
                    [
                        'label' => '4 Stars',
                        'value' => 4,
                    ],
                    [
                        'label' => '5 Stars',
                        'value' => 5,
                    ],
                ]
            ]
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'foreign_table' => 'tx_guestbook_domain_model_guest',
                'foreign_table_where' =>
                    'AND {#tx_guestbook_domain_model_guest}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_guestbook_domain_model_guest}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],
        't3ver_label' => [
            'displayCond' => 'FIELD:t3ver_label:REQ:true',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'none',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
    ],
    'types' => [
        0 => ['showitem' => 'sys_language_uid, l10n_parent, hidden, headline, comment, rating, guest'],
    ],
];