<div class="company-show w-width">
		<p class="tabs-title">企业展示</p>
		<div class="companys">
			<?php  
                        $cat=get_category_by_slug('qyzs'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'cat'     => $id,
                            'posts_per_page'      => 4
                        );
                    ?> 
			<?php query_posts($args); while(have_posts()): the_post(); ?>
				<div class="company">
					<a href="<?php the_permalink();?>">
						<img src="<?php echo catch_that_image() ?>" alt="">
						<?php the_title();?>
					</a>
				</div>
			<?php endwhile; wp_reset_query(); ?>
			
		</div>
	</div>