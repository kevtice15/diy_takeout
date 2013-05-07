<?php
/*
Plugin Name: WePay Wordpress Plugin
Plugin URI: http://www.alanpinnt.com/wordpress-wepay-plugin/
Description: This plugin allows you to take payments for almost anything via Wepay. Make sure you sign up for your client id, client secret, and access token at <a href="www.wepay.com/developer">www.wepay.com/developer</a>
Version: 1.5
Author: Alan pinnt
Author URI: http://www.alanpinnt.com/
License: GPL3
    Copyright 2012 Alan Pinnt www.alanpinnt.com
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 3, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('WEPAY_PLUGIN_NAME', 'Wepay Wordpress Plugin');
define('WEPAY_PLUGIN_URI', 'http://www.alanpinnt.com/wordpress-wepay-plugin/');
define('WEPAY_VERSION', '1.5');
define('WEPAY_AUTHOR', 'Alan Pinnt');
define('WEPAY_AUTHOR_URI', 'http://www.alanpinnt.com/');

define( 'WPWEPAY_URL', plugin_dir_url(__FILE__) );
define( 'WPWEPAY_PATH', plugin_dir_path(__FILE__) );
define( 'WPWEPAY_BASENAME', plugin_basename( __FILE__ ) );

function register_wepaysettings() {
	//register our settings
	register_setting( 'wepay-settings-group', 'wepay_mode' );
	register_setting( 'wepay-settings-group', 'wepay_accountID' );
	register_setting( 'wepay-settings-group', 'wepay_clientID' );
	register_setting( 'wepay-settings-group', 'wepay_clientsecret' );
	register_setting( 'wepay-settings-group', 'wepay_accesstoken' );
	register_setting( 'wepay-settings-group', 'wepay_thankqpage' );
}

add_action( 'admin_init', 'register_wepaysettings' );

function wepay_notice_remove() {remove_action( 'admin_notices', 'wepay_admin_notices' );}

function wepay_admin_notices() {echo "<div id='notice' class='updated fade'><p>Wepay Plugin: You have not set your client ID, client secret and access token yet. Please do so now, <a href='admin.php?page=wepay-settings'>click here</a>.</p></div>\n";}

function restrict_admin(){
	if (current_user_can( 'manage_options' )) {
        global $menu;
    $menu[9999] = array( __('Wepay.com'), 'manage_options', 'http://www.wepay.com/', '', 'open-if-no-js menu-top', '', 'div' );
	$menu[99991] = array( __('Wepay Tutorials'), 'manage_options', 'http://www.alanpinnt.com/category/wepay-wordpress-plugin/', '', 'open-if-no-js menu-top', '', 'div' );
    if (!get_option('wepay_clientID')) { add_action( 'admin_notices', 'wepay_admin_notices' );}
    }
}
add_action( 'admin_init', 'restrict_admin', 1 );

function wepay_menu() {
    add_menu_page("Wepay", "Wepay Manager", "manage_options", "wepay-manager", "wepay_account_page");
    add_submenu_page("wepay-manager", "Wepay Settings", "Wepay Settings", "manage_options", "wepay-settings", "wepay_options_page");
}
add_action( 'admin_menu', 'wepay_menu' );
       

function wepay_account_page() {

if (get_option('wepay_clientID')) {
	
require WPWEPAY_PATH.'wepaysdk.php';

$client_id =  get_option('wepay_clientID');
$client_secret =  get_option('wepay_clientsecret');
$access_token =  get_option('wepay_accesstoken');
$account_id =  get_option('wepay_accountID');
 
if (get_option('wepay_mode') == 's') {$whattouse = useStaging;} elseif (get_option('wepay_mode') == 'p') {$whattouse = useProduction;}
 
Wepay::$whattouse($client_id, $client_secret);
$wepay = new WePay($access_token);
 
try {$accountbal = $wepay->request('/account/balance', array('account_id' => $account_id, ));} catch (WePayException $e) {$error = $e->getMessage();}
$accountbalprint = '<h3>Your Available Balance: $'.$accountbal->available_balance.' - <a href="http://www.wepay.com" target="_blank">Login to your account</a></h3>';
} else {$accountbalprint = '';}
print '<h1>Wepay Manager</h1>';
print $accountbalprint;

print '<div class="wrap"><h2>How to use the Wepay Plugin</h2>
<p>This version of the Wepay Plugin works off of short codes. In the next version there will be a button builder. Make sure you have set your API Credentials before trying to use these shortcodes since they will not work. <a href="http://www.alanpinnt.com/?p=233" target="_blank">Click here to see a setup tutorial.</a>
<br /><br />
Short codes are really simple to use, just a little bit of writing and then past into the page or post you want it to be on.
<br />
<h3>Here is a sample short code:</h3>
<code>[wepay text="Buy Now" amount="1.00" sdesc="testing" css="buttoncss" feepayer="Payee"]</code>
<br /><br />
-With the short code we call on "wepay" as the short code itself. <br />
"Text" is the value or what you want the button to say.<br />
"amount" is amount you want to charge.<br />
"sdesc" a short description of what you want to sell or the payee is donating for.<br />
"css" is the css property you want to call on, otherwise if you do not it will just look like a link.<br />
"feepayer" specifies who is going to pay for the fees for this transaction, you (Payee) or the purchaser (Payer). You must use "Payee" or "Payer", anything else and it will not work.
<br />
<h3>By default the short code defaults these values if you do not specify them:</h3>
"text" = "Buy Now"<br />
"type" = "GOODS"<br />
"amount" = "1.00"<br />
"feepayer" = "Payee"<br />
"sdesc" = "Short Description"<br />
"email_mess" = "Thank you for your payment."<br />
"tax" = "0" (0 = false and 1 = True, taxes have to be setup in your account on wepay.com)<br />
"css" = "button"<br />
<br />
<h3>Explaination for each value</h3>
"text" is the value or what you want the button to say.<br />
"type" is the type of transaction about to occur. The values you can choose from: GOODS SERVICE DONATION PERSONAL <br />
"amount" the amount you want to charge.<br />
"feepayer" specifies who is going to pay for the fees for this transaction, you (Payee) or the purchaser (Payer). You must use "Payee" or "Payer", anything else and it will not work.<br />
"sdesc" a short description of what you want to sell or the payee is donating for.<br />
"email_mess" is the email message you want to send to the payer. It is sent with the Wepay Transaction email.<br />
"tax" - 0 = false and 1 = True, taxes have to be setup in your account on wepay.com. By default it\'s set to 0 or in other words false.<br />
"css" is the css property you want to call on, otherwise if you do not it will just look like a link.<br />
<h3>Questions</h3>
Contact me from my blog <a href="http://www.alanpinnt.com/contact-me/" target="_blank">www.alanpinnt.com</a>
</p>
</div>';	
}


function wepay_options_page() {
?>
<div class="wrap">
<h1>Wepay Settings</h1>
If you do not have a client ID, client secret, or access token, <a href="http://www.alanpinnt.com/?p=233" target="_blank">please see this tutorial.</a>
<form method="post" action="options.php">
    <?php settings_fields( 'wepay-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Production Mode Enabled</th>
        <?php if (get_option('wepay_mode') == 'p') {$currentmodep = 'selected';} else {$currentmodep='';} if (get_option('wepay_mode') == 's') {$currentmodes = 'selected';} else {$currentmodes='';}  ?>
        <td><select name="wepay_mode"><option value="p" <?php print $currentmodep;?> >Production</option><option value="s" <?php print $currentmodes; ?> >Staging</option></select></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Acocunt ID</th>
        <td><input type="text" name="wepay_accountID" value="<?php echo get_option('wepay_accountID'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Client ID</th>
        <td><input type="text" name="wepay_clientID" size="40" value="<?php echo get_option('wepay_clientID'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Client Secret</th>
        <td><input type="text" name="wepay_clientsecret" size="40" value="<?php echo get_option('wepay_clientsecret'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Access Token</th>
        <td><input type="text" name="wepay_accesstoken" size="80" value="<?php echo get_option('wepay_accesstoken'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Thank you Page</th>
        <td><input type="text" name="wepay_thankqpage" size="40" value="<?php echo get_option('wepay_thankqpage'); ?>" /><br />
        Required - Needs to be the full address of your website including the "http://" (I.e. http://www.mysite.com/some-page) This is the page your users will see after payment is made.</td>
        </tr>
        
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php
} 

///Shortcode
function wepay_shortcode($thebutton){
	
	extract( shortcode_atts( array('text' => 'Buy Now', 'type' => 'GOODS', 'refid' => '', 'amount' => '1.00', 'feepayer' => 'Payee', 'sdesc' => 'Short Description', 'email_mess' => 'Thank you for your payment.', 'tax' => '0', 'css' => 'button'), $thebutton ) );

	$b_text = "{$text}";
	$b_type = "{$type}";
	$b_refid = "{$refid}";
	$b_amount = "{$amount}";
	$b_feepayer = "{$feepayer}";
	$b_sdesc = "{$sdesc}";
	$b_emailpayer = "{$email_mess}";
	$b_tax = "{$tax}";
	$b_css = "{$css}";
	
if (empty($b_refid)) {$b_refid = '1';} 
 
require WPWEPAY_PATH.'wepaysdk.php';

$client_id =  get_option('wepay_clientID');
$client_secret =  get_option('wepay_clientsecret');
$access_token =  get_option('wepay_accesstoken');
$account_id =  get_option('wepay_accountID');
 
if (get_option('wepay_mode') == 's') {$whattouse = useStaging;} elseif (get_option('wepay_mode') == 'p') {$whattouse = useProduction;}
 
Wepay::$whattouse($client_id, $client_secret);
$wepay = new WePay($access_token);
 
try {
$checkout = $wepay->request('/checkout/create', array(
'account_id' => $account_id,
'amount' => $b_amount,
'short_description' => $b_sdesc,
'type' => $b_type, 
'reference_id' => $b_refid,
'fee_payer' => $b_feepayer,
'payer_email_message' => $b_emailpayer,
'charge_tax' => $b_tax,
'redirect_uri' => get_option('wepay_thankqpage'),)
);
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
$error = $e->getMessage();}
////build the button in here
return '<a href="'.$checkout->checkout_uri.'" class="'.$b_css.'">'.$b_text.'</a>';
}
add_shortcode( 'wepay', 'wepay_shortcode' );


class WepayWidget extends WP_Widget
{
  function WepayWidget()
  {
    $widget_ops = array('classname' => 'WepayWidget', 'description' => 'Dispays a Donation Meter' );
    $this->WP_Widget('WepayWidget', 'WePay Donation Meter', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'wepay_widget_title' => '' ) );
    $instance = wp_parse_args( (array) $instance, array( 'wepay_widget_link' => '' ) );
    $instance = wp_parse_args( (array) $instance, array( 'wepay_widget_account' => '' ) );
    $instance = wp_parse_args( (array) $instance, array( 'wepay_widget_amount' => '' ) );
    $wepay_widget_title = $instance['wepay_widget_title'];
    $wepay_widget_link = $instance['wepay_widget_link'];
    $wepay_widget_account = $instance['wepay_widget_account'];
    $wepay_widget_amount = $instance['wepay_widget_amount'];
?>
  <p><label for="<?php echo $this->get_field_id('wepay_widget_title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('wepay_widget_title'); ?>" name="<?php echo $this->get_field_name('wepay_widget_title'); ?>" type="text" value="<?php echo attribute_escape($wepay_widget_title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('wepay_widget_link'); ?>">Link: <input class="widefat" id="<?php echo $this->get_field_id('wepay_widget_link'); ?>" name="<?php echo $this->get_field_name('wepay_widget_link'); ?>" type="text" value="<?php echo attribute_escape($wepay_widget_link); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('wepay_widget_account'); ?>">Account ID: <input class="widefat" id="<?php echo $this->get_field_id('wepay_widget_account'); ?>" name="<?php echo $this->get_field_name('wepay_widget_account'); ?>" type="text" value="<?php echo attribute_escape($wepay_widget_account); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('wepay_widget_amount'); ?>">Goal Amount: <input class="widefat" id="<?php echo $this->get_field_id('wepay_widget_amount'); ?>" name="<?php echo $this->get_field_name('wepay_widget_amount'); ?>" type="text" value="<?php echo attribute_escape($wepay_widget_amount); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['wepay_widget_title'] = $new_instance['wepay_widget_title'];
    $instance['wepay_widget_link'] = $new_instance['wepay_widget_link'];
    $instance['wepay_widget_account'] = $new_instance['wepay_widget_account'];
    $instance['wepay_widget_amount'] = $new_instance['wepay_widget_amount'];    
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);

require WPWEPAY_PATH.'wepaysdk.php';

$client_id =  get_option('wepay_clientID');
$client_secret =  get_option('wepay_clientsecret');
$access_token =  get_option('wepay_accesstoken');

if (get_option('wepay_mode') == 's') {$whattouse = useStaging;} elseif (get_option('wepay_mode') == 'p') {$whattouse = useProduction;}
 
Wepay::$whattouse($client_id, $client_secret);
$wepay = new WePay($access_token);
 
try {
$account = $wepay->request('/account/balance', array(
'account_id' => $instance['wepay_widget_account'],)
);
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
$error = $e->getMessage();}
////build the button in here
$current_account_balance = $account->available_balance;

echo $before_widget;
    $title = empty($instance['wepay_widget_title']) ? ' ' : apply_filters('widget_title', $instance['wepay_widget_title']);
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
$amount_needed = preg_replace('/[\$,]/', '', $instance['wepay_widget_amount']);;
$amount_donated = $current_account_balance;
$linktodonate = $instance['wepay_widget_link'];

    if ($amount_needed < $amount_donated) {
        $amount_donated_percent = 100;
        $amount_donated_graph = 200;
        $amount_needed_graph = 100;
        $margin_error = 0;  
    } else {
        /////EQ
        $amount_donated_percent = round(($amount_donated/$amount_needed) * 100);
        $amount_donated_graph = round(($amount_donated/$amount_needed) * 100) * 2;
        $amount_needed_graph = 100;
        $margin_error = 200 - $amount_donated_graph;
    }


print '<center>Donated: $'.money_format('%i',$current_account_balance).'<br />Needed: '.$instance['wepay_widget_amount'].'<br />';
print '<div style="width:50px;height:200px;background:#fff;border: solid #000 thin;"><div style="width:50px;height:'.$amount_donated_graph.'px;background:#DF2B0B;text-align:center;margin-top:'.$margin_error.'px;color:#fff;text-decoration:bold;">'.$amount_donated_percent.'%</div></div>';
print '<br /><a href="'.$linktodonate.'"><img src="'.WPWEPAY_URL.'images/donate_with_wepay.png" alt="Donate Now!"></a></center>';
 
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("WepayWidget");') );
?>
