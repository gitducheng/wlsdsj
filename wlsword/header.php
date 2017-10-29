<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php if ( is_home() ) {
        bloginfo('name');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>

<body>
    <div class="gray border-none clearfix">
        <div class="nav-wrap">
        	<img src="<?php bloginfo('template_url'); ?>/images/LOGO.png" alt="">
            <div class="w-nav">
            	<ul class="nav-right">

                 <li>
                    <?php  
                        $cat=get_category_by_slug('shouye'); 
                        $cat_links=get_category_link($cat->term_id); 
                    ?> 
                    <a href="<?php echo get_option('home'); ?>/" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
                </li>

                <li>
                    <?php  
                        $cat=get_category_by_slug('xwzx'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'child_of'     => $id,
                            'orderby'      => id,
                            'show_count'   => 0,
                            'title_li'     => ''
                        );
                    ?> 
                    <a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
                    <ul class="children"> 
                        <?php wp_list_categories($args); ?>
                    </ul>
                </li>

                <li>
                    <?php  
                        $cat=get_category_by_slug('dsjzx'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'child_of'     => $id,
                            'orderby'      => id,
                            'show_count'   => 0,
                            'title_li'     => ''
                        );
                    ?> 
                    <a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
                    <ul class="children"> 
                        <?php wp_list_categories($args); ?>
                    </ul>
                </li>

                <li>
                    <?php  
                        $cat=get_category_by_slug('kycg'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'child_of'     => $id,
                            'orderby'      => id,
                            'show_count'   => 0,
                            'title_li'     => ''
                        );
                    ?> 
                    <a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
                    <ul class="children"> 
                        <?php wp_list_categories($args); ?>
                    </ul>
                </li>

                <li>
                    <?php  
                        $cat=get_category_by_slug('sfjc'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'child_of'     => $id,
                            'orderby'      => id,
                            'show_count'   => 0,
                            'title_li'     => ''
                        );
                    ?> 
                    <a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
                    <ul class="children"> 
                        <?php wp_list_categories($args); ?>
                    </ul>
                </li>

                <li>
                    <?php  
                        $cat=get_category_by_slug('hnfw'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'child_of'     => $id,
                            'orderby'      => id,
                            'show_count'   => 0,
                            'title_li'     => ''
                        );
                    ?> 
                    <a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
                    <ul class="children"> 
                        <?php wp_list_categories($args); ?>
                    </ul>
                </li>

                <li>
                    <?php  
                        $cat=get_category_by_slug('gywm'); 
                        $cat_links=get_category_link($cat->term_id); 
                    ?> 
                    <a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a>
                </li>

            	</ul>
            </div>
        </div>
    </div>
