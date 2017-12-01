<?php
add_action( 'wp_head', 'eaa_add_styles' );

if ( ! function_exists( 'eaa_add_styles' ) ) {
	function eaa_add_styles() {
		?>
        <style>
            .eaa-clean {
                padding: 0 !important;
                border: none !important;
            }

            .eaa-ad.alignleft {
                margin-right: 10px;
            }

            .eaa-ad.alignright {
                margin-left: 10px;
            }

            #eaa_sticky_ad_bottom  {
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 999;
            }
            #eaa_sticky_ad_top {
                top: 0;
                position: fixed;
                z-index: 999;

                width: 100%;
            }

            .eaa-ad {
                position: relative;
                margin: auto
            }

            #eaa_sticky_ad_top .eaa-close,
            #eaa_sticky_ad_bottom .eaa-close {
                content: 'X';
                width: 24px;
                height: 24px;
                text-align: center;
                position: absolute;
                top: 0;
                bottom: 0;
                right: -24px;
                color: #e2585b;
                margin: auto;
                background: rgba(240, 240, 240, .9);
                border-top-right-radius: 8px;
                border-bottom-right-radius: 8px;
                font:  20px/24px sans-serif;
                box-shadow: 4px 0 4px -3px #666;
            }

        </style>


        <script>
            (function ($) {
                $(document).ready(function () {
                    var bottom_padding = $('#eaa_sticky_ad_bottom .eaa-ad').outerHeight()
                    var top_padding = $('#eaa_sticky_ad_top  .eaa-ad').outerHeight()

                    if (top_padding) {
                        $('body').css({'margin-top': top_padding + 'px'})
                    }
                    if (bottom_padding) {
                        $('body').css({'margin-bottom': bottom_padding + 'px'})
                    }

                    $('#eaa_sticky_ad_top .eaa-ad,#eaa_sticky_ad_bottom .eaa-ad').append('<span class="eaa-close">X</span>');

                    $('#eaa_sticky_ad_bottom .eaa-close').on('click', function () {
                        $('#eaa_sticky_ad_bottom').hide()
                        $('body').css('margin-bottom', '');
                    })

                    $('#eaa_sticky_ad_top .eaa-close').on('click', function () {
                        $('#eaa_sticky_ad_top').hide()
                        $('body').css('margin-top', '');
                    })
                })
            })(jQuery)


        </script>
		<?php
	}
}