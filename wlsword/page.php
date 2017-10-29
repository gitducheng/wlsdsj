

<?php get_header(); ?>

<div class="content">
	<div class="sidebar">
		<div class="s-header">
			<img src="<?php bloginfo('template_directory'); ?>/images/news.png">
			<p>
			<?php the_title(); ?>
			</p>
		</div>
		<div class="s-content" id="s-content">
		<ul>
			
   		</ul>
	</div>
	</div>
	<div class="p-content">
		<?php
 			global $post;
			if( have_posts() ){
				while( have_posts() ){
					the_post();
					?>
		<div class="p-header"><?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?></div>
		<div class="p-line"></div>
		<h3><?php the_title(); ?></h3>
		<div class="p-c"><?php the_content(); ?></div>
		<?php
				}
			}else{
				echo'没有文章可以显示';
			}
			// 重置请求数据.
		wp_reset_postdata();
		?>
	</div>
		<!-- Page End -->
	</div>
</div>

<?php get_footer(); ?>