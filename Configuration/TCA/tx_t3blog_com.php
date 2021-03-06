<?php

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com',
        'label' => 'title',
        'label_alt' => 'email, fk_post',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate DESC',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ),
        'typeicon_classes' => [
            'default' => 'extensions-t3extblog-comment',
        ],
        'dividers2tabs' => true,
        'searchFields' => 'title,author,email,website,text',
    ),
    'interface' => array(
        'showRecordFieldList' => 'hidden,starttime,endtime,fe_group,title,author,email,website,date,text,approved,spam,fk_post',
    ),
    'columns' => array(
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
        'title' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.title',
            'config' => array(
                'type' => 'input',
                'size' => 30,
            ),
        ),
        'author' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.author',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'required',
            ),
        ),
        'email' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.email',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,email',
                'softref' => 'email',
            ),
        ),
        'website' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.website',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'softref' => 'typolink,url',
            ),
        ),
        'date' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.date',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => '0',
                'default' => '0',
            ),
        ),
        'text' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.text',
            'config' => array(
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'enableRichtext' => '1',
                'richtextConfiguration' => 'default',
                'softref' => 'typolink_tag,email[subst],url',
            ),
        ),
        'approved' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.approved',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'spam' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.spam',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'fk_post' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.fk_post',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_t3blog_post',
                'foreign_table_where' => ' AND tx_t3blog_post.deleted = 0 AND tx_t3blog_post.pid=###CURRENT_PID###',
                'minitems' => 1,
                'maxitems' => 1,
                'size' => 1,
                'wizards' => array(
                    'add' => array(
                        'type' => 'suggest',
                    ),
                ),
            ),
        ),
        'mails_sent' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.mails_sent',
            'config' => array(
                'type' => 'check',
            ),
        ),
    ),
    'types' => array(
        '0' => array('showitem' => '
            --div--;LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_com.tabs.general,
                fk_post,title,author,email,website,date,text,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.visibility;visibility,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access',
        ),
    ),
    'palettes' => array(
        'visibility' => array(
            'showitem' => 'approved, spam, hidden',
        ),
        'access' => array(
            'showitem' => '
				starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.starttime_formlabel,
				endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.endtime_formlabel,
				--linebreak--, fe_group;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.fe_group_formlabel',
        ),
    ),
);
