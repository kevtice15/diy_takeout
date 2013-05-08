=== Plugin Name ===
Contributors: apinnt
Donate link: http://www.alanpinnt.com/
Tags: wepay, wepay plugin
Requires at least: 2.0.2
Tested up to: 3.4
Stable tag: 1.5

Allows you to use a Wepay account to accept payments easily online thru your wordpress installation. Easy install, drag and drop. Activate the plugin and set your API credentials. To get API access see www.wepay.com/developers. 
See http://www.alanpinnt.com/2012/04/16/setting-up-wepay-wordpress-plugin-tutorial/ for a tutorial on how to setup

== Description ==

You can easily create wepay buttons with simple short codes.

What you can do with this version
  -  See you account balance
  -  Create buttons for your users to make payments on using shortcodes. (Totally customizable, make the button any type.)
  -  Settings Menu to control API information

== Installation ==

e.g.

1. Upload the entire wordpress-wepay plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the Wepay Settings Page in the Admin and set your API credentials provided by Wepay. 
	-staging.wepay.com for testing your install
    -www.wepay.com for live production usage 
    
Keep in mind the staging account id, client id, client secret, and access token are different from the production account id, client id, client secret, and access token. Make sure you use the right ones, or it won't work.

4. Create your short code by going into the Wepay Manager and using the variables available. Paste the short code you created in the page or post you would like the button to appear on.

Comments, questions, see http://www.alanpinnt.com/wordpress-wepay-plugin/


== Changelog ==
= 1.5 =
-Update to wepay.php file
-Update is a security update for users using BuddyPress
Locks out other users except Admins from seeing the WePay 
Manager and settings pages.

= 1.4 =
-Updated WePay SDK

= 1.3 =
-Added the WePay Donations Widget.

= 1.2 =
-Fixed issue with shortcode not being enabled. Where you get the error unexpected $end on line 233 wepay.php is fixed.

= 1.1 =
-Minor fixes

= 1.0 =
-released

== Upgrade Notice ==
