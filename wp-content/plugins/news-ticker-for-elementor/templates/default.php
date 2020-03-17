<?php
	if( $settings['ticker_label'] ){
		$ticker_label = $settings['ticker_label'];
	}

?>
	<div class="wb-breaking-news-ticker-wrapper">
		<div
			class="wb-breaking-news-ticker breaking-news-ticker"
			id="<?php echo esc_attr($element_id); ?>"
		>
				<div class="wbnt-el-label bn-label"><?php echo esc_html($ticker_label); ?></div>
			<div class="wbnt-el-container bn-news">

				<ul class="wbnt-news-ticker-list">
					<?php

					//Post Types Ticker
					if( $settings['post_type_ticker'] ){
						foreach ( $settings['post_type_ticker'] as $post_ticker ) {
							$target='';
							$post_type = $post_ticker['ticker_post_type_selection'];
							$limit = intval($post_ticker['ticker_post_limit']);

							if( !isset($limit) || empty($limit) ){
								$limit = -1;
							}

							if( !isset($post_type) || empty($post_type) ){
								$post_type = 'post';
							}

							if( $post_ticker['ticker_post_link_target'] === 'yes' ){
								$target = 'target="blank"';
							}

							$args = array();
							$args['post_type'] = $post_type;
							$args['posts_per_page'] = $limit;

							$ticker_post_query = new WP_Query( $args );
							if( $ticker_post_query->have_posts() ){
								while( $ticker_post_query->have_posts() ){
									$ticker_post_query->the_post();
					?>
									<li class="wbnt-news-ticker-list-item">
										<a href="<?php echo esc_url(get_permalink()); ?>" <?php echo $target; ?> >
											<?php the_title(); ?>
										</a>
									</li>
					<?php
								}
								wp_reset_postdata();
							}
					?>
					
					<?php
						}	
					}

					//Custom Ticker
						if ( $settings['ticker_custom_content_list'] ) {
							foreach ( $settings['ticker_custom_content_list'] as $custom_ticker) {
								$target = $custom_ticker['ticker_custom_content_link']['is_external'] ? ' target="_blank"' : '';
								$nofollow = $custom_ticker['ticker_custom_content_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
								<li class="wbnt-news-ticker-list-item">
									<a href="<?php echo esc_url($custom_ticker['ticker_custom_content_link']['url']); ?>" <?php echo $target.$nofollow; ?> >
										<?php echo esc_html($custom_ticker['ticker_custom_content']); ?>
									</a>
								</li>
					<?php
							}
						}

					?>
				</ul>
			</div>
			<div class="wbel-nt-controls bn-controls">
				<button><span class="bn-arrow bn-prev"></span></button>
				<button><span class="bn-action"></span></button>
				<button><span class="bn-arrow bn-next"></span></button>
			</div>
		</div>
	</div>