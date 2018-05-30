<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 21/11/17
 * Time: 5:14 PM
 */

add_filter( 'plugin_action_links_easy-adsense-ads-scripts-manager/eaa.php', 'eaa_action_links' );

function eaa_action_links ( $links ) {
	$mylinks = array(
		'<a href="https://forums.swiftthemes.com/c/plugins/eaa/"><span class=" dashicons-editor-help" style="font-family: dashicons;font-size: 18px;line-height: 20px;margin-right: 2px;display: inline;position: relative;top:4px"></span>'.__('Support Forum','eaa').'</a>',
		'<a href="' . admin_url( 'admin.php?page=eaa-settings' ) . '"><span class=" dashicons-admin-settings"  style="font-family: dashicons;font-size: 18px;line-height: 20px;margin-right: 2px;display: inline;position: relative;top:4px"></span>'.__('Settings','eaa').'</a>',
		'<a href="' . admin_url( 'customize.php' ) . '"><span class=" dashicons-layout"  style="font-family: dashicons;font-size: 18px;line-height: 20px;margin-right: 2px;display: inline;position: relative;top:4px"></span>'.__('Place Ads','eaa').'</a>',
	);
	return array_merge( $links, $mylinks );
}



function eaa_marketing(){
	?>
<div id="marketing">
	<h2>EAA <?php _e( 'Video Tutorial', 'eaa' ) ?></h2>
	<iframe width="300" height="169"  style="margin-bottom: 10px" src="https://www.youtube.com/embed/ERtXWO1Ly74?rel=0&amp;showinfo=0"
	        frameborder="0" allowfullscreen></iframe>

    <a href="https://swiftthemes.com/step-step-instructions-setup-adsense-ads-using-easy-adsense-ads-plugin/" target="_blank" title="Step by Step Instructions to Setup AdSense Ads Using Easy AdSense Ads Plugin"><img src="<?php echo EAA_URI?>/assets/img/adsense-setup.png" alt="A Complete Guide to AdSense Setup"></a>
	<div class="rss-widget">

		<h4 style="margin:0 -10px 10px;padding:6px 10px;border-bottom: solid 1px rgba(255,255,255,.2);font-size: 16px">
			<?php _e( 'Got a question like these?', 'eaa' ) ?></h4>

		<?php
		wp_widget_rss_output( array(
			'url'          => 'https://forums.swiftthemes.com/c/plugins/eaa.rss',
			'items'        => 4,
			'show_summary' => 0,
			'show_author'  => 0,
			'show_date'    => 1
		) );


		?>
		<p style="text-align: center"><a href="https://forums.swiftthemes.com/c/plugins/eaa" target="_blank"
		                                 class="green-btn"><span
					class="dashicons dashicons-groups"></span> <?php _e('Ask on the forum');?></a>
	</div>

	<div class="promote">
		<h4 style="margin:0 -10px 10px;padding:6px 10px;border-bottom: solid 1px rgba(0,0,0,.1)">Need more ad
			locations?</h4>
		<p> Our free WordPress theme PageSpeed has EAA integration adding 5 more ad
			locations.</p>
		<h5 style="margin: 10px 0">Page Speed is&hellip;</h5>
		<ul class="tick">
			<li><?php _e( 'Super fast & lite weight', 'eaa' ) ?></li>
			<li><?php _e( 'Easily customizable', 'eaa' ) ?></li>
			<li><?php _e( 'Search engine optimized', 'eaa' ) ?></li>
			<li><?php _e( 'Responsive', 'eaa' ) ?></li>
			<li><?php _e( 'Secure', 'eaa' ) ?></li>
			<li><?php _e( 'Page builder ready', 'eaa' ) ?></li>

		</ul>
		<p style="text-align: center"><a href="<?php echo admin_url( 'theme-install.php?search=page-speed' ) ?>"
		                                 class="green-btn"><span
					class="dashicons dashicons-admin-appearance"></span> Get Page Speed</a>
		</p>
		<div class="clear"></div>
	</div>
	<!---->
	<!--        <h2>--><?php //_e( 'Contact/Support', 'eaa' ) ?><!--</h2>-->
	<!--        <h3 style="font-weight: 300;color:#888">--><?php //_e( 'Get help, share feedback or just say hello !!', 'eaa' ) ?><!--</h3>-->
	<!--		--><?php
	//		echo '<input type="hidden" name="eaa-help-nonce" id="eaa-help-nonce" value="' . wp_create_nonce( 'eaa-help-nonce' ) . '" />';
	//		?>
	<!--        <form id="contact-satish" class="pure-form">-->
	<!--            <p id="feedback" style="display: none"></p>-->
	<!--			--><?php //$user = wp_get_current_user() ?>
	<!--            <label for="name">--><?php //_e( 'Name', 'eaa' ) ?><!--</label>-->
	<!--            <input type="text" id="name" name="name" value="--><?php //echo $user->display_name ?><!--"-->
	<!--                   placeholder="--><?php //echo esc_attr( __( 'Your Name', 'eaa' ) ) ?><!--"-->
	<!--                   class="pure-input-1">-->
	<!--            <br>-->
	<!--            <label for="email">--><?php //_e( 'Email', 'eaa' ) ?><!--</label>-->
	<!--            <input type="email" name="email" value="--><?php //echo $user->user_email ?><!--"-->
	<!--                   placeholder="--><?php //echo esc_attr( __( 'Your Email', 'eaa' ) ) ?><!--"-->
	<!--                   class="pure-input-1">-->
	<!--            <label for="message">--><?php //_e( 'Message', 'eaa' ) ?><!--</label>-->
	<!---->
	<!--            <textarea name="message" id="message" required minlength="20" rows="6" class="pure-input-1"></textarea>-->
	<!--            <br>-->
	<!--            <br>-->
	<!--            <div class="alignleft">-->
	<!--                <label>-->
	<!--                    <input type="checkbox" name="cc" value="true" checked>--><?php //_e( 'Send me a copy', 'eaa' ) ?>
	<!--                </label>-->
	<!--            </div>-->
	<!--            <input type="submit" id="contact-satish-submit" class="alignright button button-primary"-->
	<!--                   value="--><?php //echo esc_attr( __( 'Send', 'eaa' ) ) ?><!--"/>-->
	<!--        </form>-->
	<div class="clear"></div>
	<br />
	<br />
</div>
<?php
}