<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "tt_products".
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Shop System',
	'description' => 'New versions at ttproducts.de. Documented in E-Book "Der TYPO3-Webshop" - Shop with listing in multiple languages, with order tracking, product variants, credit card payment and bank accounts, bill, creditpoint, voucher system and gift certificates. Latest updates at ttproducts.de.',
	'category' => 'plugin',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => 'uploads/tx_ttproducts/datasheet,uploads/tx_ttproducts/rte,fileadmin/data/bill,fileadmin/data/delivery,fileadmin/img',
	'clearCacheOnLoad' => 1,
	'author' => 'Franz Holzinger',
	'author_email' => 'franz@ttproducts.de',
	'author_company' => 'jambage.com',
	'version' => '2.9.10',
	'constraints' => array(
		'depends' => array(
			'div2007' => '1.10.30-0.0.0',
			'php' => '5.5.0-7.3.99',
			'table' => '0.7.0-0.0.0',
			'tsparser' => '0.2.5-0.0.0',
			'typo3' => '6.2.0-9.5.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'func_wizards' => '',
			'addons_em' => '0.2.1-0.0.0',
            'typo3db_legacy' => '1.0.0-1.1.99',
            'patchcache' => '0.1.0-1.0.0',
		)
	)
);

