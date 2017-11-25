<style>
	#main {
		font-size: 16px;
		line-height: 28px;
		padding: 20px 20px 0 0;
		overflow: hidden;
	}

	#main ul {
		list-style: none
	}

	#main ul li {
		margin-left: 20px;
		position: relative;
	}

	#main ul.tick li:before {
		content: '\f147';
		font-family: dashicons;
		width: 16px;
		height: 16px;
		border-radius: 50%;
		background: #8e44ad;
		color: #FFF;
		text-align: center;
		line-height: 16px;
		float: left;
		position: absolute;
		left: -20px;
		top: 6px

	}

	#marketing {
		height: 800px;
		width: 300px;
		float: right;
		padding: 20px 0 20px 20px
	}

	.eaa-card {
		background: #fff;
		padding: 10px;
		width: 98%;
		margin-bottom: 20px;
	}

	.eaa-card h2 {
		margin: -10px -10px 10px;
		padding: 10px;
		border-bottom: solid 1px #DDD;
	}

	.note {
		padding: 10px;
		background: #3498db;
		color: #FFF;
		border-radius: 5px;
	}

	.support-button{
		background: rgb(77, 191, 98);color:#FFF;border-radius: 3px;padding: 2px 5px;text-decoration: none;
        text-transform: uppercase;
	}
	.support-button:hover{
		background: rgb(68, 168, 86);;
		color: #fff;
		text-shadow: 1px 1px 1px #000;
	}

    .support-button:before{
        content: "\f223";
        font-family: dashicons;
        font-size:18px;
        position: relative;
        top:3px;
        margin-right: 3px;

    }

    .review-button{
		background: rgb(255, 57, 46);color:#FFF;border-radius: 3px;padding: 2px 5px;text-decoration: none;
	}
	.review-button:hover{
		background: red;
		color: #fff;
		text-shadow: 1px 1px 1px #000;
	}
</style>
<div class="wrap">
	<h1>
		Easy AdSense Ads & Scripts Manager
	</h1>
	<hr>
	<div id="marketing">
        <h2>EAA Video Tutorial</h2>
        <iframe width="300" height="169" src="https://www.youtube.com/embed/ERtXWO1Ly74?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		<h2>Contact/Support</h2>
		<h3 style="font-weight: 300;color:#888">Get help, share feedback or just say hello !!</h3>
		<?php
		echo '<input type="hidden" name="eaa-help-nonce" id="eaa-help-nonce" value="' . wp_create_nonce( 'eaa-help-nonce' ) . '" />';
		?>
		<form id="contact-satish" class="pure-form">
			<p id="feedback" style="display: none"></p>
			<?php $user = wp_get_current_user() ?>
			<label for="name">Name</label>
			<input type="text" id="name" name="name" value="<?php echo $user->display_name ?>" placeholder="Your Name"
			       class="pure-input-1">
			<br>
			<label for="email">Email</label>
			<input type="email" name="email" value="<?php echo $user->user_email ?>" placeholder="Your email"
			       class="pure-input-1">
			<label for="message">Message</label>

			<textarea name="message" id="message" required minlength="20" rows="6" class="pure-input-1"></textarea>
			<br>
			<br>
			<div class="alignleft">
				<label>
					<input type="checkbox" name="cc" value="true" checked> Send me a copy
				</label>
			</div>
			<input type="submit" id="contact-satish-submit" class="alignright button button-primary" value="Send"/>
		</form>
		<div class="clear"></div>
		<hr>
	</div>

	<div id="main" style="border-right: solid 1px #DDD" ;>

		<div class="eaa-card">
			<h2>A BIG Thank You :-)</h2>
			First off, a big thank you for giving EAA small space on your website.<br>
			We hope you find this plugin useful and easy to use. If you have any questions, please ask on the

			<a href="https://forums.swiftthemes.com/c/plugins/eaa/" class="support-button" target="_blank"><strong>support
					forum</strong></a> or shoot an email to
			<a href="mailto:satish@swiftthemes.com?Subject=Question%20about%20EAA" target="_top"><strong>satish@SwiftThemes.com</strong></a>
			<br>
			If you like the plugin, please recommend it to your peers and <a
				href="https://wordpress.org/support/plugin/easy-adsense-ads-scripts-manager/reviews/" target="_blank" class="review-button"><strong>REVIEW IT</strong></a> on <strong>WordPress.Org</strong>
		</div>
		<div class="eaa-card">
			<h2>Our Promise</h2>
			<ul class="tick">
				<li>
					We will keep this ad manager completely free.
					No annoying upsells or cutting down on features to make you pay.
				</li>
				<li>
					We will not hijack your WordPress dashboard. We will limit our presence to our pages.
				</li>
				<li>
					No Annoying reminders to signup for a news letter.
				</li>
				<li>
					We will do our best to keep EAA foot print to the minimum and promise to write the most efficient
					code.
				</li>
				<li>We value your feedback highly however minor it may be. If there is something you don't like or can
					be done in a better way, let us know.
					We have built the product to the best of our abilities on a very strong foundation and
					It's you who will be shaping the product from now on.
				</li>
			</ul>
		</div>
		<div class="eaa-card">
			<h2>How to use EAA</h2>
			<p class="note"><strong>Note</strong>:
				EAA can be used with any ad network, and you can put any html or JS in all the ad slots.</p>
			<ol class="tick">
				<li>
					Goto <strong>Appearance -> customize -> Easy AdSense Ads & Scripts</strong>.
				</li>
				<li>
					You will see upto 6 sections. <strong>Home page, Single post/page, My Custom Locations*, Theme Locations*,
						Advanced Location and Header & Footer
						Scripts</strong>.
					The last one is for the header and footer scripts/tags and the rest are for ads.
				</li>
				<li>
					You can add ads to sidebar or any widgetized section of your theme with the smart "<strong>Easy
						AdSense Ads & Scripts</strong>" widget.
					This is smart for two reasons.
					<ol>
						<li>
							Unlike text widget, you can have separate ads for mobile, desktop+tablets and Accelerated Mobile Pages.
						</li>
						<li>
							You can disable this widget on a per page/post basis.
						</li>
					</ol>
				</li>
			</ol>

		</div>
	</div>

</div>