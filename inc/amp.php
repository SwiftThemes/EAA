<?php

/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/04/17
 * Time: 9:27 PM
 */
class amp {
	private $ad;

	private $pattern = '';

	public function __construct( $ad ) {
		$this->ad = $ad;
	}


	public function extract_adsense_ads() {
		preg_split( $this->pattern, $this->ad );
	}
}


$ad = '

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 12 Ways #1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:200px;height:90px"
     data-ad-client="ca-pub-2822882615208243"
     data-ad-slot="5649381931"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 12 Ways #1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:200px;height:90px"
     data-ad-client="ca-pub-2822882615208243"
     data-ad-slot="5649381931"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
';

$amp = new amp( $ad );