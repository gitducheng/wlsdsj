<div class="sidebar">
	<div class="s-header">
		<img src="<?php bloginfo('template_directory'); ?>/images/news.png">
		<p>
		<?php
		$category = get_the_category();
		$parent = get_cat_name($category[0]->category_parent);
		if (!empty($parent)) {
		echo $parent;
		} else {
		echo $category[0]->cat_name;
		}
		?>
		</p>
	</div>
	<div class="s-content" id="s-content">
		<ul>
			<?php
				wp_list_categories("child_of="  .get_category_root_id(the_category_ID(false)). "&depth=0&hide_empty=0&title_li=" );
			?>
   		</ul>
	</div>
</div>