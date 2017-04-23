# Easy AdSense Ads & Scripts Manager


A very simple, **AMP ready** complete and easy to use ads and scripts manager with well thought out ad placements that will help you increase your ad revenue multiple folds.


**Easy AdSense Ads & Scripts Manager** is a complete ad management and scripts solution for your blog. 
Unlike other plugins out there, this integrates right into the WordPress **customizer** to give you instant preview of your changes.

**Note:**
The ad locations are not limited to AdSense
* You can use them for ads from any network.
* You can use multiple ads in the same location.
* You can also use them to add html code, optin forms. The location at the end of the post is ideal for optin forms of MailChip, Sendy, AWeber, GetResponse etc.. 

The header and footer scripts are not limited to just javascript.
* You can use them to load fonts.
* Verify the website ownership with the meta tag.


It's awesome features include

### Separate content/ads for mobile, tablet and desktops.
You can have different ad units for mobile, (tablets and desktops). 
With this feature, you can use the high performing 336x300px or 728x90 ad units for desktops and tablets and use 300px wide ads for mobiles.
Though AdSense provides responsive ad units, their fill rate is not very good.

### Ads on homepage and archives
You can easily insert ads into the WordPress loop on home page and archives. Since AdSense has a limit on number ad units you can display on a page, you can easily set how many times to repeat.
Key features here include
* Start after a desired post number.
* Choose repeat frequency.
* Choose how many times it should be displayed.

### Ads on single page ( Posts and Pages )
We have five well thought out locations
* Below title ( Highly converting, but google search doesn't like ads above fold)
* After first paragraph. (Highly converting, no issues with SEO)
* After any 3 paragraphs of your choice.
* After first image.
* After second image.
* Between post.
* After post.

### Easily disable ads on a per page/post basis.
There will be cases where you do not want to display ads on some particular posts or pages. Reasons may include
* Content my violate advertiser policies.
* Client doesn't like ads in their sponsored content.
* Page/Post that brings more revenue through affiliate marketing than display ads.
* You don't want ads on about and contact pages.

Whatever your reason may be, there is an option to disable ads on a post or page right on the edit screen.
You can choose to disable only in content content ads or all ads on the page.

### Easily style and align your ads.
You can easily choose the alignment, set margins and add CSS styles to your ad wrapper.

### Ads Widget
Place ads in any wdigetized sections in your theme with the built in **Easy AdSense Ads & Scripts** widget.
This is similar to text widget but with some cool extras
* Add separate ads/content for desktop & tablets and mobiles.
* This widget respects the above feature, and hides itself when you choose to not show ads on the page.
* Remove default paddings and borders if you need more room for the ads.

### Rotate ads
Wan't to rotate ads? Just wrap them in the shortcode `[eaa_ads][/eaa_ads]` and separate individual ads with `<!-- next_ad -->`.
You can use the shortcode anywhere, even in your post content.
**Example**:

        ```
        [ads]
        First ad <!-- next_ad -->
        Second ad <!-- next_ad -->
        third ad <!-- next_ad -->
        fourth ad
        [/ads]
        ```
        
### Option to add header and footer scripts.
Easily ad your analytics script, website verification scripts, fonts and any other script you might want to add to your website header or footer.
This is limited to scripts, meta tags and any other tags that usually go in header. Adding regular content here is strictly not advisable.


### Live preview
All this can be done through the awesome WordPress customiser, so you get an instant preview of how your ad or content looks.

### Easily integrate with your theme
EAA exposes functions to easily add the ads to custom locations in your themes.

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
        echo eaa_show_ad( 'ps_above_header' ); // Use the appropriate ad name
    ?>
    ```

##Installation

1. Upload the plugin files to the `/wp-content/plugins/eaa` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the appearance->customize->Easy AdSense Ads & Scripts panel to add your ads and scripts.
1. You also get a new widget from the plugin called **Easy AdSense Ads & Scripts**


## Frequently Asked Questions 

**Is it only for themes released by SwiftThemes.Com?**
No, You can use it with any theme and it works out of the box.

**Can I add multiple ads in one location?**
You can add as many ads as you please in any location. You can even mix scripts and html.

**Can I use it on WordPress MU**
Letting anyone execute javaScript on your domain is a security risk. If you trust your users and know what you are doing, then yes.

**Is it safe for normal WordPress users**
Yes, if you promise me that you won't add random javascript from unknown sources.

**Does EAA support AMP**
Yes & No.
We don't actually need to support AMP becuase you can use AMP supported ad code for mobile devices.
1. [Guide to create an AMP AdSense ad unit](https://support.google.com/adsense/answer/7183212?hl=en "Guide to create an AMP AdSense ad unit").
1. [List of ad networks supporting AMP and a general how to guide](https://www.ampproject.org/docs/reference/components/ads/amp-ad#supported-ad-networks)

**Does this plugin ‘take’ a percentage of my ad earnings?**
No! Absolutely not. Some ad plugins replace your publisher ID with their own for a certain percentage of adverts. 
Easy AdSense Ads #EAA does NOT do this. All your earnings are your own. Easy AdSense Ads #EAA makes no modifications to your ad code. 
What you paste into the ad boxes is what is injected into your pages.

**Do I need a caching plugin with Easy AdSense Ads Manager**
No. But in general it is a good idea to use a caching plugin. We recommend W3TC. For reason why, read the next question.

**Which caching plugin to use**
If you are using different ads for mobile and desktops along with caching, chances are a page cached for mobile may be displayed to 
desktop users and vice versa.

One way to handle this problem is to have separate caches for mobile and desktop. At this time the only plugin that lets to maintain separate caches is
 W3TC. 
 
 So, we highly recommend you use w3tc if you are different adsense ads for mobiles and desktops. If not, it doesn't matter and you are free to choose whatever caching plugin you use.

**How to have separate caches for Mobile and Desktop**
If you are using w3tc plugin for caching, 
1. Go to plugin options page and enable `Automatically create user agent groups for W3TC` option.
2. Now goto w3tc -> User agent groups and click on save changes. 

After step 2, your user agent groups should looks something like screenshot 5.

**Note**: 

If you are using a separate theme, you shouldn't use this option.


## Changelog 

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

* Move after second image ad to advanced section.
* Add 2 more after nth paragraph ad units.
* Handle ZERO value for after nth paragraph.

**0.21**

* Remove debugging statements.

**0.20**

* Couple of UX enhancemnts to advanced options.

**0.19**
* Add ad after nth paragraph
* Add ad after second image
* Add option to add margin and CSS styles to add wrapper

**0.18**
* Expose a method and filter to define ad locations from themes and other plugins. 

**0.17**
* Fix issue with the contact form on EAA Help page.

**0.16**
* Add contact form to plugin help page.
* Fix an issue with home page ad being displayed on custom queries.

**0.15**
*Fix a bug with the plugin info page. Using absolute path now. 
*Improve styling of the alignment setting.

**0.14**
*Add support for ad after captioned images.

**0.13**
* Remove sidebar from plugin admin page

**0.12**
* Add plugin help page
* Add ad alignment options
* Add help text in the customizer

**0.10** 
* First release, yayy!!

