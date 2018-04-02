<?php
/*
   Plugin Name: MJB Sample Plugin
   Version: 0.1
   Author: MJ Balutan
   License: GPLv3
  */
  
  require dirname(__FILE__).'/update/plugin-update-checker.php';
  
  $MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker($_SERVER['DOCUMENT_ROOT'].'updates/?action=get_metadata&slug=mjbsample',
	__FILE__, 'mjbsample');

$MyUpdateChecker->addQueryArgFilter('mjb_filter_update_checks');
function mjb_filter_update_checks($queryArgs) {

    $queryArgs[ 'license_key' ]  = get_option( 'mjbsample_licenseKey' );
    $queryArgs[ 'email' ] = get_option( 'mjbsample_licenseKeyEmail' );
    $queryArgs[ 'slug' ] = 'mjbsample';

    return $queryArgs;

}
	function addSettingsPage(){
		add_menu_page('Sample Plugin', 'Sample Plugin', 'manage_options', 'mjb-sample', NULL );
		add_submenu_page( 'mjb-sample', 'Automatic Updates', 'Automatic Updates', 'manage_options', 'mjb-sample-autoupdate', 'autoUpdatesSample');
	}
	function autoUpdatesSample(){
		include dirname(__FILE__).'/mjbautoUpdates.php';
	}
	add_action('admin_menu', 'addSettingsPage');