
<?php get_header(); ?>

<div class="content clearfix">
	<?php get_sidebar(); ?>
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
		<div class="p-i"><?php the_author(); ?><p><?php the_time('Y-m-d'); ?></p></div>
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
</div>


<?php get_footer(); ?>