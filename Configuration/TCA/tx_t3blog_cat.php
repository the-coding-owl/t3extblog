<?php

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_cat',
        'label' => 'catname',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'prependAtCopy' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
        'hideAtCopy' => true,
        'treeParentField' => 'parent_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ),
        'typeicon_classes' => [
            'default' => 'extensions-t3extblog-category',
        ],
        'dividers2tabs' => true,
        'searchFields' => 'catname,description',
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid,l18n_parent,l18n_diffsource,hidden,starttime,endtime,fe_group,parent_id,catname,description',
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => array(
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0]
                ),
                'default' => 0,
            ),
        ),
        'l18n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_t3blog_cat',
                'foreign_table_where' => 'AND tx_t3blog_cat.pid=###CURRENT_PID### AND tx_t3blog_cat.sys_language_uid IN (-1,0)',
            ),
        ),
        'l18n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
                'default' => '0',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => array(
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ),
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ),
        ),
        'fe_group' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 7,
                'maxitems' => 20,
                'items' => [
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        -1
                    ],
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        -2
                    ],
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        '--div--'
                    ]
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title',
                'enableMultiSelectFilterTextfield' => true,
            ),
        ),
        'parent_id' => array(
            'exclude' => 1,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_cat.parent_id',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'tx_t3blog_cat',
                'foreign_table_where' => ' AND (tx_t3blog_cat.sys_language_uid = 0 OR tx_t3blog_cat.l18n_parent = 0) AND tx_t3blog_cat.pid = ###CURRENT_PID### AND tx_t3blog_cat.uid != ###THIS_UID### ORDER BY tx_t3blog_cat.sorting',
                'subType' => 'db',
                'treeConfig' => array(
                    'parentField' => 'parent_id',
                    'appearance' => array(
                        'expandAll' => true,
                        'showHeader' => false,
                        'maxLevels' => 99,
                    ),
                ),
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 1,
            ),
        ),
        'catname' => array(
            'exclude' => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_cat.catname',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'required',
            ),
        ),

        'description' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_cat.description',
            'config' => array(
                'type' => 'input',
                'size' => 40,
                'softref' => 'typolink_tag,email[subst],url',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ),
        ),
    ),
    'types' => array(
        '0' => array('showitem' => '
			--div--;LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_cat.tabs.general,
			    l18n_parent,l18n_diffsource,catname,description,parent_id,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ),
    ),
    'palettes' => array(
        'visibility' => array(
            'showitem' => 'hidden',
        ),
        'access' => array(
            'showitem' => '
				starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.starttime_formlabel,
				endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.endtime_formlabel,
				--linebreak--, fe_group;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.fe_group_formlabel',
        ),
    ),
);
