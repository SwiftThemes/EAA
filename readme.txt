=== Easy AdSense Ad Manager For WordPress #EAA ===
Contributors: Gandham
Donate link: https://swiftthemes.com/donate
Tags: AdSense, Ad Manager, Ad Injection, In-Post Ads, Analytics Scripts, Header Scripts, Footer Scripts, Home Page Ads, Scripts Manager, Advertising, amp, ad injection,ads, ad, ad inserter, ad injection, ads manager, ad widget, adrotate, advertise, advertisements, advertising, adverts, advert, amazon, banner, banners, buysellads, chitika, clickbank, dfp, doubleclick, google dfp, monetization, widget
Requires at least: 3.0
Tested up to: 4.7.4
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The QUICKEST and most INTUITIVE Ads Manager to inject Google AdSense and other ads into your website with live preview. Google AMP ready ad injection.

== Description ==

If you are looking for an ad injection plugin for WordPress for placing AdSense ads on your blog, you have come to the right place.
This is the best Google AdSense plugin for WordPress.

**Easy AdSense Ads Manager For WordPress** is an **AMP ready** complete ad management and scripts solution for your blog.
Unlike other plugins out there, this integrates right into the WordPress **customizer** to give you instant preview of the ads you injected.

**Note:**
The ad locations are not limited to AdSense ads

- You can use them to insert ads from any network like BuySell Ads, Chitika, Bidvertiser, Infolinks, AdSense, Adsterra Network, Revcontent, Clicksor,AdSense, OIO Publisher etc .
- You can inject multiple AdSense/ads in the same location.
- You can also use these ad locations to add html code, optin forms. The location at the end of the post is ideal for optin forms of MailChip, Sendy, AWeber, GetResponse etc..

The header and footer scripts are not limited to just injecting javascript.

* You can use them to load fonts.
* Verify the website ownership with the meta tag.


### EAA's awesome features include &hellip;

### Separate desktop/tablet AdSense ads and mobile AdSense ads.
You can have different AdSense ad units for mobile, (tablets and desktops).
With this feature, you can insert the high performing 336x300px or 728x90 ad units for desktops and tablets and use 300px wide mobile ads for mobiles.
Though Google AdSense provides responsive ad units, their fill rate is not very good.

### AdSense / Ads on homepage and archives
You can easily insert AdSense ads into the WordPress loop on home page and archives. Since AdSense has a limit on number ad units you can display on a page, you can easily set how many times to repeat.
Key features here include

* Start AdSense ads after a desired post number.
* Choose repeat frequency for the adsense ads.
* Choose how many times AdSense ads should be displayed.

### Ads on single page ( Posts and Pages )
We have nine well thought out locations

* Below title AdSense ad( Highly converting, but google search doesn't like ads above fold)
* After first paragraph AdSense / ad. (Highly converting, no issues with SEO)
* After any 3 paragraphs of your choice AdSense / ad.
* After first image AdSense / ad.
* After second image AdSense / ad.
* Between post AdSense / ad.
* After post AdSense / ad.

### Easily disable AdSense / ads on a per page/post basis.

There will be cases where you do not want to display AdSense / ads on some particular posts or pages. Reasons may include
* Content my violate AdSense/advertiser policies.
* Client doesn't like AdSense / ads in their sponsored content.
* Page/Post that brings more revenue through affiliate marketing than display ads like AdSense.
* You don't want ads on about and contact pages.

Whatever your reason may be, there is an option to disable AdSense / ads on a post or page right on the edit screen.
You can choose to disable only in content AdSense / ads or all AdSense / ads on the page.

### Ads Widget
Place ads in any wdigetized sections in your theme with the built in **Easy AdSense Ads & Scripts** widget.
This is similar to the text widget but with some cool extras

* Add separate adsense / ads for desktop & tablets and mobiles.
* This widget respects the above feature, and hides itself when you choose to not show adsense / ads on the page.
* Remove default padding's and borders if you need more room for adsense / ads.


### Ad Rotation
Wan't to rotate the inserted ads? We have the ad rotation feature built in. Just wrap them in the shortcode `[eaa_ads][/eaa_ads]` and separate individual adsense/ads code with `<!-- next_ad -->`.
You can use the shortcode anywhere, even in your post content.

**Example**:

```
        [ads]
        First AdSense ad <!-- next_ad -->
        Second AdSense ad <!-- next_ad -->
        third AdSense ad <!-- next_ad -->
        fourth AdSense ad<!-- next_ad -->
        fifth AdSense ad<!-- next_ad -->
        sixth AdSense ad<!-- next_ad -->
        seventh AdSense ad<!-- next_ad -->
        eighth AdSense ad<!-- next_ad -->
        nineth AdSense ad<!-- next_ad -->
        tenth AdSense ad<!-- next_ad -->
        eleventh AdSense ad<!-- next_ad -->
        twentieth AdSense ad<!-- next_ad -->
        thirtieth AdSense ad<!-- next_ad -->
        so on, you get the idea. AdSense ad<!-- next_ad -->
        [/ads]
```

### Option to add header and footer scripts.
Easily ad your (Google) analytics script, website verification scripts, fonts and any other script you might want to add to your website header or footer.
This is limited to scripts, meta tags and any other tags that usually go in header. Adding regular content here is strictly not advisable.



### Live preview
All this can be done through the awesome WordPress customiser, so you get an instant preview of how your adsense / ads  or content looks.

### Advanced options and Floating ads
Easily float the ads or apply advanced css rules like margin, padding, border etc., to the ads

### Easily integrate with your theme
Easy AdSense Ads exposes functions to easily inject the ads to custom locations into your themes.

**Step 1**

Add the below code at the end of your themes `functions.php` file

    ```
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

    ```

**Step 2**
Now to inject these ads into the theme, place the below code in the theme file where you want to inject the ad.

    ```
    <?php
        echo eaa_get_ad( 'ps_above_header' ); // Use the appropriate ad name
    ?>
    ```

== Installation ==

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
Yes & No.
We don't actually need to support AMP because you can use AMP supported adsense/ad code for mobile devices.

1. [Guide to create an AMP AdSense ad unit](https://support.google.com/AdSense/answer/7183212?hl=en "Guide to create an AMP AdSense ad unit").
1. [List of ad networks supporting AMP and a general how to guide](https://www.ampproject.org/docs/reference/components/ads/amp-ad#supported-ad-networks)


= Does this plugin ‘take’ a percentage of my ad earnings? =
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

**0.26**

* Fix issue with customizer settings not saving
* Separated the settings and ads into separate options.

**0.25**

* Role back to 0.23

**0.24**

* Fix an array declaration to be compatible with PHP 5.3.
* W3tc Integration.
* Pages and custom posts type support.

**0.23**

* Accidental version bump.

**0.22**

* Move after second image AdSense / ad to advanced section.
* Add 2 more after nth paragraph ad units.
* Handle ZERO value for after nth paragraph.

**0.21**

* Remove debugging statements.

**0.20**

* Couple of UX enhancements to advanced AdSense / ads options.

**0.19**

* Add ad after nth paragraph
* Add ad after second image
* Add option to add margin and CSS styles to AdSense / ads wrapper


**0.18**

* Expose a method and filter to define AdSense / ad locations from themes and other plugins.

**0.17**

* Fix issue with the contact form on EAA Help page.

**0.16**

* Add contact form to plugin help page.
* Fix an issue with home page AdSense / ads being displayed on custom queries.

**0.15**

* Fix a bug with the plugin info page. Using absolute path now.
* Improve styling of the alignment setting.

**0.14**

* Add support for AdSense / ad after captioned images.

**0.13**

* Remove sidebar from plugin admin page

**0.12**

* Add plugin help page
* Add AdSense / ad alignment options
* Add help text in the customizer

**0.10**

* First release, yayy!!

== Upgrade Notice ==

**0.27**

You have to goto plugin settings page and select the post types on which you wan\'t to enable EAA.
