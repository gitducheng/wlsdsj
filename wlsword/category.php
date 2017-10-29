
<?php get_header(); ?>

<div class="content clearfix">
	<div class="w-width top-pic"><img src="<?php bloginfo('template_url'); ?>/images/1.png" alt=""></div>
	<?php get_sidebar(); ?>
	<div class="c-content clearfix">
		<div class="c-header"><?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?></div>
		<div class="c-line"></div>
		<?php
 			global $post;
			if( have_posts() ){
				while( have_posts() ){
					the_post();
					?>
		<div class="c-l">
			<div class="post-title">
				<div class="p-t"></div>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<p><?php the_time('Y-m-d'); ?></p>
			</div>
			<div class="p-line2"></div>
		</div>
		<?php
				}
			}else{
				echo'没有文章可以显示';
			}
			// 重置请求数据.
		wp_reset_postdata();
		?>
		<?php if( $wp_query->max_num_pages > 1 ) : ?>
		<div class="pagenavi">
			<?php pagenavi(); ?>
		</div>
		<?php endif; ?>
		<!-- Page End -->
	</div>
</div>

<?php get_footer(); ?>