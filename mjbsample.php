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