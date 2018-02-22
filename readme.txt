=== Easy AdSense Ads - Ad Inserter & AdSense Ad Manager ===
Author URL: http://SatishGandham.Com/
Plugin URL: https://swiftthemes.com/eaa/
Contributors: Gandham
Donate link: https://paypal.me/swiftthemes
Tags: AdSense, Ad manager, Ad Injection, Ad Inserter, Advertising, Post Ads, Best AdSense,Home Page Ads, Scripts Manager, Advertising, amp, ad injection,ads, ad, ad inserter, ad injection, ads manager, ad widget, adrotate, advertise, advertisements, advertising, adverts, advert, amazon, banner, banners, buysellads, chitika, clickbank, dfp, doubleclick
Requires at least: 3.6+
Tested up to: 4.9.2
Requires PHP: 5.3
Stable tag: .46
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


Easily inject AdSense ADS into your homepage & posts with a LivePreview - 10+ AdSpots, Free Forever, No upsells, AMP Support, Best AdSense Ad Manager

== Description ==

Easy AdSense Ads is a very simple and best ad manager for WordPress that is **not limited to AdSense**. You can easily **inject ads into your home page, posts, pages, archives and custom post types**. You have **9 ad locations** to choose from.
EAA also comes with features like **ads widget**, **ad rotation**. This is the best WordPress plugin for inserting AdSense ads and other ads.

**Note**: Only Ad Management plugin with video tutorial

[EAA Video Tutorial](https://www.youtube.com/watch?v=ERtXWO1Ly74)

### Easy AdSense Ads is the only ad manager plugin with a video tutorial covering all features of the plugin.

https://www.youtube.com/watch?v=ERtXWO1Ly74

[EAA Video Tutorial Link](https://www.youtube.com/watch?v=ERtXWO1Ly74)

**Easy AdSense Ads Inserter & Manager For WordPress** is an **AMP ready** complete ad management and scripts management solution for your blog.
Unlike other plugins out there, this integrates right into the WordPress **customizer** to give you instant preview of the ads you injected.

**Note:**
The ad locations are not limited to AdSense ads

- You can use them to insert ads from any network like BuySell Ads, Amazon Affiliate Ads, Chitika, Bidvertiser, Infolinks, AdSense, Adsterra Network, Revcontent, Clicksor,AdSense, OIO Publisher etc .
- You can inject multiple AdSense/ads in the same location.
- You can also use these ad locations to insert html code, optin forms. The location at the end of the post is ideal for inserting optin forms of MailChip, Sendy, AWeber, GetResponse etc..

The header and footer scripts are not limited to just injecting javascript.

* You can use them to load fonts.
* Verify the website ownership with the meta tag.


### Easy AdSense Google Ad Manager's awesome features include &hellip;

### Separate desktop/tablet AdSense ads injection and mobile AdSense ads injection.
You can insert different AdSense ad units for mobile, (tablets and desktops).
With this feature, you can quickly insert the high performing 336x300px or 728x90 adsense units for desktops and tablets and insert 300px wide mobile AdSense Ads for mobiles.
Though Google AdSense provides responsive ad units, their fill rate is not very good.

### AdSense / Ads Injection on homepage and archives
You can easily insert AdSense ads into the WordPress loop on home page and archives. Since AdSense has a limit on number ad units you can display on a page, you can easily set how many times to repeat.
Key features here include

* Insert AdSense ads after a desired post number.
* Choose repeat frequency for the adsense ads injection.
* Choose how many times AdSense ads should be displayed.

### Insert Ads on single page ( Posts and Pages )
We have nine well thought out locations

* Below title Google AdSense ad injection( Highly converting, but google search doesn't like ads above fold)
* After first paragraph Google Ads Injection / adsense. (Highly converting, no issues with SEO)
* After any 3 paragraphs of your choice AdSense / ad injection.
* After first image AdSense / ad.
* After second image AdSense / ad.
* Between post AdSense / ad.
* After post AdSense / ad.

### Easily disable AdSense / ads on a per page/post basis.

There will be cases where you do not want to inject AdSense / insert ads on some particular posts or pages. Reasons may include

* Content my violate AdSense/advertiser policies.
* Client doesn't like AdSense / ads in their sponsored content.
* Page/Post that brings more revenue through affiliate marketing than display ads like AdSense.
* You don't want ads on about and contact pages.

Whatever your reason may be, there is an option to disable AdSense / ads on a post or page right on the edit screen.
You can choose to disable only in content AdSense / ads or all AdSense / ads on the page.

### Ads Widget
Place ads in any wdigetized sections in your theme with the built in **Easy AdSense Ads & Scripts** widget.
This is similar to the text widget but with some cool extras

* Insert separate adsense / ads for desktop & tablets and mobiles.
* This widget respects the above feature, and hides itself when you choose to not show adsense / ads on the page.
* Remove default padding's and borders if you need more room for adsense / ads.


### Ad Rotation
Wan't to rotate the inserted ads? We have the ad rotation feature built in. Just wrap them in the shortcode `[eaa_ads][/eaa_ads]` and separate individual adsense/ads code with `<!-- next ad insertion -->`.
You can use the shortcode anywhere, even in your post content.

**Example**:

``
        [ads]
        First AdSense ad to insert<!-- next ad insertion -->
        Second AdSense ad <!-- next ad insertion -->
        third Quick AdSense ad <!-- next ad insertion -->
        fourth Quick AdSense ad<!-- next ad insertion -->
        fifth AdSense ad<!-- next ad insertion -->
        sixth AdSense ad<!-- next ad insertion -->
        seventh AdSense ad<!-- next ad insertion -->
        eighth AdSense ad<!-- next ad insertion -->
        ninth Quick AdSense ad<!-- next ad insertion -->
        tenth AdSense ad<!-- next ad insertion -->
        eleventh Quick AdSense ad<!-- next ad insertion -->
        twentieth AdSense ad<!-- next ad insertion -->
        thirtieth AdSense ad<!-- next ad insertion -->
        so on, you get the idea. AdSense ad<!-- next ad insertion -->
        [/ads]
``

### Option to insert header and footer scripts.
Easily ad your (Google) analytics script, website verification scripts, fonts and any other script you might want to insert in to your website header or footer.
This is limited to inserting scripts, meta tags and any other tags that usually go in header. Inserting regular content here is strictly not advisable.



### Live preview
All this can be done through the awesome WordPress customiser, so you get an instant preview of how your inserted adsense / ads  or content looks.


### Custom taxonomies and terms support
Supports custom taxonomies and let's you enable/disable ads on custom taxonomies and terms.

### Easily enable or disable ads on a per category basis
There will be times where inserting ads on certain categories might violate Google AdSense or your ad network TOS. For such cases you can easily disable ads\' for their archives and posts
in those categories and tags.

### Advanced options and Floating ads
Easily float the ads or apply advanced css rules like margin, padding, border etc., to the ads

### Easily integrate EAA Ad Inserter with your theme

#### For regular users

1. Goto EAA settings page and in **Add Your Own Ad Locations** option, add you ad locations. Locations defined there will show up at customizer -> EAA -> My Custom Locations.
2. To use the add, insert the following code in your theme files

  ``
  <?php
      // Use the appropriate ad location name prefixed with my_
      echo eaa_get_ad( 'my_above_header' );
  ?>
  ``

#### For theme developers

Easy AdSense Ads exposes functions to easily inject the ads to custom locations into your themes.

**Step 1**

Add the below code at the end of your themes `functions.php` file

    ``
    add_filter( 'eaa_ad_locations', 'themename_add_eaa_ad_locations' );

    function themename_add_eaa_ad_locations( $ad_locations ) {
        /**
         * Each line below ads a new add location in customizer at
         * Easy AdSense Ads & Scripts -> Theme locations
         * You can add as many locations as you please
         */
        $ad_locations['ps_above_header'] = array( 'label' => esc_html__( 'Above header', 'page-speed' ) );
        $ad_locations['ps_header']       = array( 'label' => esc_html__( 'In header', 'page-speed' ) );
        $ad_locations['ps_below_header'] = array( 'label' => esc_html__( 'Below header', 'page-speed' ) );
        $ad_locations['ps_before_main']  = array( 'label' => esc_html__( 'Before main div', 'page-speed' ) );
        $ad_locations['ps_after_main']   = array( 'label' => esc_html__( 'After main div', 'page-speed' ) );
        $ad_locations['ps_above_footer'] = array( 'label' => esc_html__( 'Above footer', 'page-speed' ) );
        return $ad_locations;
    }

    ``

**Step 2**
Now to inject these ads into the theme, place the below code in the theme file where you want to inject the ad.

    ``
    <?php
        echo eaa_get_ad( 'ps_above_header' ); // Use the appropriate ad name
    ?>
    ``
If you are using the ads in some places where shortcodes are enabled then you can use `[eaa_show_ad ad="ps_above_header"]`

== Installation ==

**Video Tutorial**
https://www.youtube.com/watch?v=ERtXWO1Ly74

1. Upload the plugin files to the `/wp-content/plugins/eaa` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the appearance->customize->Easy AdSense Ads & Scripts panel to add your ads and scripts.
1. You also get a new ads widget from the plugin called **Easy AdSense Ads & Scripts**


== Frequently Asked Questions ==

= Is it only for themes released by SwiftThemes.Com =
No, You can use it with any theme and it works out of the box.

= Can I add multiple adsense/ads in one location =
You can add as many adsense/ads as you please in any location. You can even mix scripts and html.

= Can I use it on WordPress MU =
Letting anyone execute javaScript on your domain is a security risk. If you trust your users and know what you are doing, then yes.

= Is it safe for normal WordPress users =
Yes, if you promise me that you won't add random javascript from unknown sources.


= Does EAA support AMP =
Yes. You can enable AMP support on the settings page.
Once enabled, you will see AMP ad slot in each location.

We plan to introduce automatic conversion of AdSense ads to AMP version in the upcoming versions. Stay tuned!!
1. [Guide to create an AMP AdSense ad unit](https://support.google.com/adsense/answer/7183212?hl=en "Guide to create an AMP AdSense ad unit").
1. [List of ad networks supporting AMP and a general how to guide](https://www.ampproject.org/docs/reference/components/ads/amp-ad#supported-ad-networks)
1. You can see a live demo at [TheGeekDaily.Com - Unblock YouTube](https://thegeekdaily.com/12-ways-to-unblock-youtube-at-schools-office-and-university/)

= Does this plugin take a percentage of my ad earnings? =
No! Absolutely not. Some ad plugins replace your publisher ID with their own for a certain percentage of adverts.
Easy AdSense Ads #EAA does NOT do this. All your earnings are your own. Easy AdSense Ads #EAA makes no modifications to your ad code.
What you paste into the ad boxes is what is injected into your pages.

= Do I need a caching plugin with Easy AdSense Ads Manager =
No. But in general it is a good idea to use a caching plugin. We recommend W3TC. For reason why, read the next question.

= Which caching plugin to use =
If you are using different ads for mobile and desktops along with caching, chances are a page cached for mobile may be displayed to
desktop users and vice versa.

One way to handle this problem is to have separate caches for mobile and desktop. At this time the only plugin that lets to maintain separate caches is
 W3TC.

 So, we highly recommend you use w3tc if you are different adsense ads for mobiles and desktops. If not, it doesn't matter and you are free to choose whatever caching plugin you use.

= How to have separate caches for Mobile and Desktop =
If you are using w3tc plugin for caching,
1. Go to plugin options page and enable `Automatically create user agent groups for W3TC` option.
2. Now goto w3tc -> User agent groups and click on save changes.

After step 2, your user agent groups should looks something like screenshot 5.

**Note**:

If you are using a separate theme, you shouldn't use this option.

== Screenshots ==

1. Panel added by the Easy AdSense Ads & Scripts Manager to the customizer ( Appearance -> Customize ).
2. Home page AdSense / ad locations explained.
3. Single post/page locations explained.
4. Widget added by **Easy AdSense Ads & Scripts**
5. This is how your user agent groups should look like when you enable w3tc integration. Refer to FAQ **How to have separate caches for Mobile and Desktop**


== Changelog ==

= 0.46 =

* Fix an issue with widget being displayed on taxonimies where its disabled.
* Add the script for stick ads.


= 0.45 =

* Fix few php notices on options pages.
* Add theme recommendation.

= 0.44 =

* Made all strings translatable.

= 0.43 =

* Add close icon to sticky ads on mobile.

= 0.42 =

* Move javascript to separate file.
* Increase the priority of eaa scripts.

= 0.41 =

* Add sticky ads.
* Update support forum links to our new forum.
* After image ad now works with both, anchored and non anchored images.
* Refine the image ad logic to avoid php notices.

= 0.40 =

* Fix a bug with settings validation.
* Add option to disable wpautop filter.

= 0.39 =

* Add support for php 5.3.
https://wordpress.org/support/topic/version-0-38-breaks-my-site-w-500-error/#post-9674368

= 0.38 =

* Add help text in eaa control.
* Expand the first ad unit by default in all sections.
* If there is no anchored image, ad will be shown after first non anchored image.
* Add plugin compatibility option.
* Add admin menu icon.

= 0.37 =

* Embed video tutorial on the help page.

= 0.36 =

* Move disable ads on home page to the customizer.
* Fix a bug in short code to show ad.
* Disable EAA on RSS feed


= 0.34 =

* Fix few notices showing up.

= 0.33 =

* Add option insert custom location ads with a short code.
* Custom taxonomy support.

= 0.32 =

* Add few helper tags to prevent WordPress from messing javascript code or adsense code added to post manually.
<!-- noformat on -->JavaScript code here<!-- noformat on -->
This tag prevents your ad code from being truncated by wp_autop and saves you from violating google publisher policies.

= 0.30 =

* Fix is_amp_endpoint check, so that the plugin design break when WordPress AMP plugin is not installed.

= 0.29 =

* Fix a failing in_array check.

= 0.28 =

* Let users choose post types on which to use adsense/ads within content.
* Let users choose on which post types to disable other adsense ad units and ads.
* Option to enable AMP Ads support and a new AMP ad slot for google publishers.
* Collapsible adsense/ad location for distraction free adsesne/ad editing.

= 0.26 =

* Fix issue with customizer settings not saving.
* Separated the settings and ads into separate options.

= 0.25 =

* Role back to 0.23

= 0.24 =

* Fix an array declaration to be compatible with PHP 5.3.
* W3tc Integration.
* Pages and custom posts type support.

= 0.23 =

* Accidental version bump.

= 0.22 =

* Move after second image AdSense / ad to advanced section.
* Add 2 more after nth paragraph ad units.
* Handle ZERO value for after nth paragraph.

= 0.21 =

* Remove debugging statements.

= 0.20 =

* Couple of UX enhancements to advanced AdSense / ads options.

= 0.19 =

* Add ad after nth paragraph
* Add ad after second image
* Add option to add margin and CSS styles to AdSense / ads wrapper


= 0.18 =

* Expose a method and filter to define AdSense / ad locations from themes and other plugins.

= 0.17 =

* Fix issue with the contact form on EAA Help page.

= 0.16 =

* Add contact form to plugin help page.
* Fix an issue with home page AdSense / ads being displayed on custom queries.


= 0.15 =

* Fix a bug with the plugin info page. Using absolute path now.
* Improve styling of the alignment setting.

= 0.14 =

* Add support for AdSense / ad after captioned images for Google Publishers.

= 0.13 =

* Remove sidebar from plugin admin page

= 0.12 =

* Add plugin help page
* Add AdSense / ad alignment options
* Add help text in the customizer

= 0.10 =

* First release, yayy!! Best plugin for Google Publishers #release


== Upgrade Notice ==

= 0.38 =

If there are no anchored images in the post, then the ad will be shown after first image.

= 0.27 =

You have to goto plugin settings page and select the post types on which you wan\'t to enable EAA.