<?php

########################################################################
# Extension Manager/Repository config file for ext "tt_products".
#
# Auto generated 21-03-2011 13:28
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Shop System',
	'description' => '"Der TYPO3-Webshop" at opensourcepress.de - Shop with listing in multiple languages, with order tracking, photo gallery, DAM, product variants, credit card payment, configurable costs, credit cards and bank accounts, bill, creditpoint, voucher system and gift certificates. Latest updates at ttproducts.de.',
	'category' => 'plugin',
	'shy' => 0,
	'dependencies' => 'cms,div2007,table,tsparser',
	'conflicts' => 'mkl_products,su_products,zk_products,ast_rteproducts,onet_ttproducts_rte,shopsort,c3bi_cookie_at_login',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => 0,
	'uploadfolder' => 0,
	'createDirs' => 'uploads/tx_ttproducts/datasheet,uploads/tx_ttproducts/rte,fileadmin/data/bill,fileadmin/data/delivery,fileadmin/img',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author' => 'Franz Holzinger',
	'author_email' => 'franz@ttproducts.de',
	'author_company' => 'jambage.com',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'version' => '2.7.1',
	'_md5_values_when_last_written' => 'a:217:{s:9:"ChangeLog";s:4:"448e";s:31:"class.tx_ttproducts_wizicon.php";s:4:"6a94";s:16:"contributors.txt";s:4:"0123";s:21:"ext_conf_template.txt";s:4:"f15f";s:12:"ext_icon.gif";s:4:"eb61";s:17:"ext_localconf.php";s:4:"ae86";s:14:"ext_tables.php";s:4:"d90e";s:14:"ext_tables.sql";s:4:"e75e";s:19:"flexform_ds_pi1.xml";s:4:"dae5";s:13:"locallang.xml";s:4:"ea36";s:24:"locallang_csh_ttprod.php";s:4:"c998";s:25:"locallang_csh_ttproda.php";s:4:"026a";s:26:"locallang_csh_ttprodac.php";s:4:"c02a";s:25:"locallang_csh_ttprodc.php";s:4:"cfa4";s:26:"locallang_csh_ttprodca.php";s:4:"268a";s:25:"locallang_csh_ttprode.php";s:4:"013d";s:25:"locallang_csh_ttprodo.php";s:4:"c2ab";s:25:"locallang_csh_ttprodt.php";s:4:"e7bf";s:16:"locallang_db.xml";s:4:"71a4";s:7:"tca.php";s:4:"6a8d";s:49:"control/class.tx_ttproducts_activity_finalize.php";s:4:"eb65";s:39:"control/class.tx_ttproducts_control.php";s:4:"5098";s:42:"control/class.tx_ttproducts_javascript.php";s:4:"654b";s:36:"control/class.tx_ttproducts_main.php";s:4:"0af2";s:21:"doc/manual-german.sxw";s:4:"c2cf";s:14:"doc/manual.sxw";s:4:"2322";s:32:"eid/class.tx_ttproducts_ajax.php";s:4:"41d1";s:30:"eid/class.tx_ttproducts_db.php";s:4:"5ab0";s:31:"eid/class.tx_ttproducts_eid.php";s:4:"0449";s:33:"hooks/class.tx_ttproducts_cms.php";s:4:"2a2c";s:38:"hooks/class.tx_ttproducts_hooks_fe.php";s:4:"300b";s:40:"lib/class.tx_ttproducts_billdelivery.php";s:4:"33fc";s:34:"lib/class.tx_ttproducts_config.php";s:4:"df03";s:44:"lib/class.tx_ttproducts_creditpoints_div.php";s:4:"3c09";s:31:"lib/class.tx_ttproducts_css.php";s:4:"cab6";s:31:"lib/class.tx_ttproducts_csv.php";s:4:"31bf";s:41:"lib/class.tx_ttproducts_discountprice.php";s:4:"bcc6";s:37:"lib/class.tx_ttproducts_email_div.php";s:4:"c698";s:36:"lib/class.tx_ttproducts_form_div.php";s:4:"b4a8";s:37:"lib/class.tx_ttproducts_gifts_div.php";s:4:"d500";s:36:"lib/class.tx_ttproducts_language.php";s:4:"c242";s:38:"lib/class.tx_ttproducts_paymentlib.php";s:4:"8967";s:43:"lib/class.tx_ttproducts_paymentshipping.php";s:4:"f4fc";s:37:"lib/class.tx_ttproducts_pricecalc.php";s:4:"bd02";s:42:"lib/class.tx_ttproducts_pricecalc_base.php";s:4:"1f19";s:43:"lib/class.tx_ttproducts_pricetablescalc.php";s:4:"ea8d";s:31:"lib/class.tx_ttproducts_sql.php";s:4:"41d3";s:34:"lib/class.tx_ttproducts_tables.php";s:4:"8d9e";s:36:"lib/class.tx_ttproducts_tracking.php";s:4:"3177";s:48:"marker/class.tx_ttproducts_javascript_marker.php";s:4:"82fa";s:37:"marker/class.tx_ttproducts_marker.php";s:4:"25c4";s:44:"marker/class.tx_ttproducts_subpartmarker.php";s:4:"0e2e";s:37:"model/class.tx_ttproducts_account.php";s:4:"2e21";s:37:"model/class.tx_ttproducts_address.php";s:4:"b7c1";s:37:"model/class.tx_ttproducts_article.php";s:4:"1141";s:42:"model/class.tx_ttproducts_article_base.php";s:4:"c306";s:39:"model/class.tx_ttproducts_attribute.php";s:4:"0c52";s:37:"model/class.tx_ttproducts_bank_de.php";s:4:"ba0d";s:36:"model/class.tx_ttproducts_basket.php";s:4:"cb6c";s:34:"model/class.tx_ttproducts_card.php";s:4:"6bf4";s:38:"model/class.tx_ttproducts_category.php";s:4:"826c";s:43:"model/class.tx_ttproducts_category_base.php";s:4:"d4ff";s:37:"model/class.tx_ttproducts_content.php";s:4:"b608";s:37:"model/class.tx_ttproducts_country.php";s:4:"267c";s:33:"model/class.tx_ttproducts_dam.php";s:4:"9c3d";s:41:"model/class.tx_ttproducts_damcategory.php";s:4:"b51c";s:35:"model/class.tx_ttproducts_email.php";s:4:"ac1e";s:45:"model/class.tx_ttproducts_graduated_price.php";s:4:"cace";s:44:"model/class.tx_ttproducts_model_activity.php";s:4:"c1ce";s:35:"model/class.tx_ttproducts_order.php";s:4:"e6f9";s:42:"model/class.tx_ttproducts_orderaddress.php";s:4:"c0c4";s:34:"model/class.tx_ttproducts_page.php";s:4:"174c";s:38:"model/class.tx_ttproducts_pid_list.php";s:4:"4e04";s:37:"model/class.tx_ttproducts_product.php";s:4:"ac67";s:40:"model/class.tx_ttproducts_table_base.php";s:4:"8484";s:34:"model/class.tx_ttproducts_text.php";s:4:"0465";s:37:"model/class.tx_ttproducts_variant.php";s:4:"c0ed";s:43:"model/class.tx_ttproducts_variant_dummy.php";s:4:"6de7";s:37:"model/class.tx_ttproducts_voucher.php";s:4:"6d9a";s:39:"model/int.tx_ttproducts_variant_int.php";s:4:"95fe";s:46:"model/field/class.tx_ttproducts_field_base.php";s:4:"c7f8";s:54:"model/field/class.tx_ttproducts_field_creditpoints.php";s:4:"f120";s:51:"model/field/class.tx_ttproducts_field_datafield.php";s:4:"c8ec";s:57:"model/field/class.tx_ttproducts_field_graduated_price.php";s:4:"f4e6";s:47:"model/field/class.tx_ttproducts_field_image.php";s:4:"f4ef";s:49:"model/field/class.tx_ttproducts_field_instock.php";s:4:"d609";s:47:"model/field/class.tx_ttproducts_field_media.php";s:4:"7317";s:46:"model/field/class.tx_ttproducts_field_note.php";s:4:"5294";s:47:"model/field/class.tx_ttproducts_field_price.php";s:4:"942d";s:46:"model/field/class.tx_ttproducts_field_text.php";s:4:"7ac9";s:49:"model/field/interface.tx_ttproducts_field_int.php";s:4:"f701";s:31:"pi1/class.tx_ttproducts_pi1.php";s:4:"5977";s:36:"pi1/class.tx_ttproducts_pi1_base.php";s:4:"07b9";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"2e1f";s:20:"pi1/payment_DIBS.php";s:4:"4fcc";s:32:"pi1/products_comp_calcScript.inc";s:4:"a85e";s:23:"res/icons/be/ce_wiz.gif";s:4:"a6c1";s:28:"res/icons/be/productlist.gif";s:4:"a6c1";s:24:"res/icons/fe/AddItem.gif";s:4:"287d";s:34:"res/icons/fe/Cart-Icon-AddItem.gif";s:4:"e76c";s:40:"res/icons/fe/Cart-Icon-AddRemoveItem.gif";s:4:"9b18";s:37:"res/icons/fe/Cart-Icon-RemoveItem.gif";s:4:"b9cc";s:26:"res/icons/fe/Cart-Icon.gif";s:4:"988a";s:27:"res/icons/fe/RemoveItem.gif";s:4:"e28f";s:24:"res/icons/fe/addmemo.png";s:4:"c76f";s:21:"res/icons/fe/amex.gif";s:4:"22e1";s:32:"res/icons/fe/availableDemand.gif";s:4:"bf3a";s:35:"res/icons/fe/availableImmediate.gif";s:4:"7f1d";s:31:"res/icons/fe/availableShort.gif";s:4:"1737";s:23:"res/icons/fe/basket.gif";s:4:"ca3d";s:24:"res/icons/fe/delmemo.png";s:4:"b1da";s:25:"res/icons/fe/discover.gif";s:4:"91c4";s:27:"res/icons/fe/mastercard.gif";s:4:"2fe1";s:28:"res/icons/fe/minibasket1.gif";s:4:"a960";s:35:"res/icons/fe/ttproducts_help_en.png";s:4:"5326";s:21:"res/icons/fe/visa.gif";s:4:"28c6";s:41:"res/icons/table/sys_products_accounts.gif";s:4:"cab5";s:38:"res/icons/table/sys_products_cards.gif";s:4:"f9d0";s:39:"res/icons/table/sys_products_orders.gif";s:4:"b279";s:31:"res/icons/table/tt_products.gif";s:4:"1ebd";s:40:"res/icons/table/tt_products_articles.gif";s:4:"e779";s:49:"res/icons/table/tt_products_articles_language.gif";s:4:"20e5";s:35:"res/icons/table/tt_products_cat.gif";s:4:"b6f5";s:44:"res/icons/table/tt_products_cat_language.gif";s:4:"4aee";s:38:"res/icons/table/tt_products_emails.gif";s:4:"8cea";s:40:"res/icons/table/tt_products_language.gif";s:4:"9570";s:37:"res/icons/table/tt_products_texts.gif";s:4:"4a8e";s:46:"res/icons/table/tt_products_texts_language.gif";s:4:"522f";s:20:"static/editorcfg.txt";s:4:"4dd7";s:31:"static/css_styled/constants.txt";s:4:"4176";s:27:"static/css_styled/setup.txt";s:4:"b411";s:30:"static/old_style/constants.txt";s:4:"de1d";s:26:"static/old_style/setup.txt";s:4:"5ad1";s:26:"static/share/constants.txt";s:4:"943a";s:16:"template/agb.txt";s:4:"d76f";s:38:"template/example_template_bill_de.tmpl";s:4:"7b21";s:35:"template/payment_DIBS_template.tmpl";s:4:"990a";s:38:"template/payment_DIBS_template_uk.tmpl";s:4:"2fdc";s:24:"template/paymentlib.tmpl";s:4:"c894";s:29:"template/products_css_de.html";s:4:"13c2";s:29:"template/products_css_en.html";s:4:"6298";s:38:"template/products_css_variants_de.html";s:4:"6740";s:25:"template/products_de.html";s:4:"20d5";s:27:"template/products_help.tmpl";s:4:"7486";s:31:"template/products_template.tmpl";s:4:"6916";s:34:"template/products_template_dk.tmpl";s:4:"6b1f";s:34:"template/products_template_fi.tmpl";s:4:"7c85";s:34:"template/products_template_fr.tmpl";s:4:"f9d4";s:40:"template/products_template_htmlmail.tmpl";s:4:"aa8a";s:34:"template/products_template_it.html";s:4:"96fa";s:34:"template/products_template_se.tmpl";s:4:"82d8";s:24:"template/tt_products.css";s:4:"d0ae";s:32:"template/tt_products_example.css";s:4:"ca34";s:37:"template/tt_products_example_css.html";s:4:"489e";s:39:"template/meerwijn/detail_cadeaubon.tmpl";s:4:"c263";s:40:"template/meerwijn/detail_geschenken.tmpl";s:4:"b695";s:40:"template/meerwijn/detail_kurkenshop.tmpl";s:4:"0fad";s:38:"template/meerwijn/detail_shopabox.tmpl";s:4:"21a3";s:36:"template/meerwijn/detail_wijnen.tmpl";s:4:"63be";s:37:"template/meerwijn/product_detail.tmpl";s:4:"9e4a";s:45:"template/meerwijn/product_proefpakketten.tmpl";s:4:"9afd";s:32:"template/meerwijn/producten.tmpl";s:4:"103a";s:33:"template/meerwijn/shop-a-box.tmpl";s:4:"f580";s:40:"template/meerwijn/totaal_geschenken.tmpl";s:4:"15ca";s:40:"template/meerwijn/totaal_kurkenshop.tmpl";s:4:"1306";s:38:"template/meerwijn/totaal_shopabox.tmpl";s:4:"f87b";s:36:"template/meerwijn/totaal_wijnen.tmpl";s:4:"5ee1";s:31:"template/meerwijn/tracking.tmpl";s:4:"aadb";s:34:"template/meerwijn/winkelwagen.tmpl";s:4:"ff1b";s:35:"template/meerwijn/js/FormManager.js";s:4:"3ccc";s:41:"view/class.tx_ttproducts_account_view.php";s:4:"a574";s:41:"view/class.tx_ttproducts_address_view.php";s:4:"8deb";s:46:"view/class.tx_ttproducts_article_base_view.php";s:4:"7342";s:41:"view/class.tx_ttproducts_article_view.php";s:4:"6253";s:40:"view/class.tx_ttproducts_basket_view.php";s:4:"a30e";s:44:"view/class.tx_ttproducts_basketitem_view.php";s:4:"e7b4";s:38:"view/class.tx_ttproducts_card_view.php";s:4:"1ef4";s:37:"view/class.tx_ttproducts_cat_view.php";s:4:"0e94";s:47:"view/class.tx_ttproducts_category_base_view.php";s:4:"2e3f";s:42:"view/class.tx_ttproducts_category_view.php";s:4:"e47b";s:41:"view/class.tx_ttproducts_catlist_view.php";s:4:"33db";s:46:"view/class.tx_ttproducts_catlist_view_base.php";s:4:"392e";s:41:"view/class.tx_ttproducts_country_view.php";s:4:"a472";s:42:"view/class.tx_ttproducts_currency_view.php";s:4:"77f1";s:37:"view/class.tx_ttproducts_dam_view.php";s:4:"5821";s:45:"view/class.tx_ttproducts_damcategory_view.php";s:4:"7cf6";s:49:"view/class.tx_ttproducts_graduated_price_view.php";s:4:"111f";s:38:"view/class.tx_ttproducts_info_view.php";s:4:"9d3c";s:38:"view/class.tx_ttproducts_list_view.php";s:4:"1967";s:38:"view/class.tx_ttproducts_memo_view.php";s:4:"798f";s:41:"view/class.tx_ttproducts_menucat_view.php";s:4:"de82";s:39:"view/class.tx_ttproducts_order_view.php";s:4:"ca56";s:46:"view/class.tx_ttproducts_orderaddress_view.php";s:4:"ddfb";s:38:"view/class.tx_ttproducts_page_view.php";s:4:"6dc0";s:41:"view/class.tx_ttproducts_product_view.php";s:4:"aa61";s:43:"view/class.tx_ttproducts_selectcat_view.php";s:4:"9ac9";s:40:"view/class.tx_ttproducts_single_view.php";s:4:"2a4a";s:44:"view/class.tx_ttproducts_table_base_view.php";s:4:"35a0";s:38:"view/class.tx_ttproducts_text_view.php";s:4:"abf2";s:37:"view/class.tx_ttproducts_url_view.php";s:4:"ea87";s:47:"view/class.tx_ttproducts_variant_dummy_view.php";s:4:"2f47";s:41:"view/class.tx_ttproducts_variant_view.php";s:4:"12a7";s:41:"view/class.tx_ttproducts_voucher_view.php";s:4:"546c";s:49:"view/interface.tx_ttproducts_variant_view_int.php";s:4:"1b0e";s:50:"view/field/class.tx_ttproducts_field_base_view.php";s:4:"e497";s:55:"view/field/class.tx_ttproducts_field_datafield_view.php";s:4:"c9f3";s:61:"view/field/class.tx_ttproducts_field_graduated_price_view.php";s:4:"1a3b";s:51:"view/field/class.tx_ttproducts_field_image_view.php";s:4:"c08b";s:53:"view/field/class.tx_ttproducts_field_instock_view.php";s:4:"d754";s:51:"view/field/class.tx_ttproducts_field_media_view.php";s:4:"828a";s:50:"view/field/class.tx_ttproducts_field_note_view.php";s:4:"440e";s:51:"view/field/class.tx_ttproducts_field_price_view.php";s:4:"e6ba";s:50:"view/field/class.tx_ttproducts_field_text_view.php";s:4:"0767";s:53:"view/field/interface.tx_ttproducts_field_view_int.php";s:4:"2db2";s:38:"widgets/class.tx_ttproducts_latest.php";s:4:"c5d8";s:18:"widgets/labels.xml";s:4:"35d9";}',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'div2007' => '0.3.1-',
			'php' => '5.1.2-0.0.0',
			'table' => '0.1.35-',
			'tsparser' => '',
			'typo3' => '3.8-4.4.99',
		),
		'conflicts' => array(
			'mkl_products' => '',
			'su_products' => '',
			'zk_products' => '',
			'ast_rteproducts' => '',
			'onet_ttproducts_rte' => '',
			'shopsort' => '',
			'c3bi_cookie_at_login' => '',
		),
		'suggests' => array(
			'partner' => '',
			'pmkhtmlcrop' => '',
			'sr_feuser_register' => '',
			'static_info_tables' => '2.0.6',
			'taxajax' => '0.2.7-',
		),
	),
	'suggests' => array(
	),
);

?>