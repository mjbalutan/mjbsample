<?php
	//License Script
	if(isset($_POST['mjbLicenseSubmit'])){
		
		$email = sanitize_email($_POST['mjbLicenseEmail']);
		$key = sanitize_text_field($_POST['mjbLicenseKey']);
		
		$data = wp_remote_get( 'http://localhost/woocommerce/?wc-api=software-api&request=activation&email='.$email.'&license_key='.$key.'&product_id=mjbsample');

		
		if(get_option('mjbsample_licenseKey') == "" && get_option('mjbsample_licenseKeyEmail') == ""){
			add_option( 'mjbsample_licenseKey', $key, '', 'yes');
			add_option( 'mjbsample_licenseKeyEmail', $email, '', 'yes');
		}else{
			update_option( 'mjbsample_licenseKey', $key);
			update_option( 'mjbsample_licenseKeyEmail', $email);
		}
	}
	$data = wp_remote_get( 'http://localhost/woocommerce/?wc-api=software-api&request=check&email='.get_option('mjbsample_licenseKeyEmail').'&license_key='.get_option('mjbsample_licenseKey').'&product_id=mjbsample');
	
?>
<h1>License</h1>
<form action="" method="post">
<p><em>Send a License Activation email</em></p>
<label>Email</label>
<input type="email" name="mjbLicenseEmail" value="<?php if(get_option('mjbsample_licenseKeyEmail')!= ""){ echo get_option('mjbsample_licenseKeyEmail'); }?>" />
<p><em>Enter License Key</em></p>
<label>License Key</label>
<input type="text" name="mjbLicenseKey" value="<?php if(get_option('mjbsample_licenseKey')!= ""){ echo get_option('mjbsample_licenseKey'); }?>" />
<input type="submit" class="btn" name="mjbLicenseSubmit" value="Submit"/>
</form>
<?php
	print_r(json_decode($data['body']));
?>