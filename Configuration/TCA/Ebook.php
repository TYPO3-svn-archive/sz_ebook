<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_szebook_domain_model_ebook'] = array(
	'ctrl' => $TCA['tx_szebook_domain_model_ebook']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, image, pdf, header',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, header, image, pdf,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_szebook_domain_model_ebook',
				'foreign_table_where' => 'AND tx_szebook_domain_model_ebook.pid=###CURRENT_PID### AND tx_szebook_domain_model_ebook.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sz_ebook/Resources/Private/Language/locallang_db.xml:tx_szebook_domain_model_ebook.image',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_szebook',
				'allowed' => 'jpg,jpeg,png',
				'disallowed' => 'php',
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1,
				'show_thumbs' => 0,
			),
		),
		'pdf' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sz_ebook/Resources/Private/Language/locallang_db.xml:tx_szebook_domain_model_ebook.pdf',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_szebook',
				'allowed' => 'PDF',
				'disallowed' => 'php',
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1,
			),
		),
		'header' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sz_ebook/Resources/Private/Language/locallang_db.xml:tx_szebook_domain_model_ebook.header',
			'config' => array(
				'type' => 'input',
			),
		),
		'turnjs' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:sz_ebook/Resources/Private/Language/locallang_db.xml:tx_szebook_domain_model_ebook.header',
			'config' => array(
				'type' => 'input',
			),
		)
	),
);

?>