<div class="tabs w-width clearfix">
    <div class="tabs-left">
    	<p class="tabs-title">新闻资讯</p>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-color" role="tablist">
            <li role="presentation" class="active zxdt"><a href="#zxdt" aria-controls="zxdt" role="tab" data-toggle="tab">中心动态</a></li>
            <li role="presentation"><a href="#hydt" aria-controls="hydt" role="tab" data-toggle="tab">行业动态</a></li>
            <li role="presentation"><a href="#mtgz" aria-controls="mtgz" role="tab" data-toggle="tab">媒体关注</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="zxdt">
            	<ul class="news-title">
                <?php  
                        $cat=get_category_by_slug('zxdt'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'cat'     => $id,
                            'posts_per_page'      => 7
                        );
                    ?>
                <?php query_posts($args); while(have_posts()): the_post(); ?>
                    <li>
                    <span class="glyphicon glyphicon-triangle-right"></span>
                    <a href="<?php the_permalink();?>"><?php the_title();?><span class="news-time"><?php the_time('Y年n月j日'); ?></span></a>
                    </li>
                <?php endwhile; wp_reset_query(); ?>
            	</ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="hydt">
                <ul class="news-title">
                <?php  
                        $cat=get_category_by_slug('hydt'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'cat'     => $id,
                            'posts_per_page'      => 7
                        );
                    ?>
                <?php query_posts($args); while(have_posts()): the_post(); ?>
                    <li>
                    <span class="glyphicon glyphicon-triangle-right"></span>
                    <a href="<?php the_permalink();?>"><?php the_title();?><span class="news-time"><?php the_time('Y年n月j日'); ?></span></a>
                    </li>
                <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="mtgz">
                <ul class="news-title">
                <?php  
                        $cat=get_category_by_slug('mtgz'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'cat'     => $id,
                            'posts_per_page'      => 7
                        );
                    ?>
                <?php query_posts($args); while(have_posts()): the_post(); ?>
                    <li>
                    <span class="glyphicon glyphicon-triangle-right"></span>
                    <a href="<?php the_permalink();?>"><?php the_title();?><span class="news-time"><?php the_time('Y年n月j日'); ?></span></a>
                    </li>
                <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="tabs-right">
    	<p class="tabs-title">图片新闻</p>
        <div id="myCarousel" class="carousel slide">  
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <?php  
                        $cat=get_category_by_slug('tpxw'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'cat'     => $id,
                            'posts_per_page'      => '3'
                        );
                    ?>
            <?php query_posts($args); while(have_posts()): the_post(); ?>
            <div class="pic-wrap item">
            <a href="<?php the_permalink();?>"> 
            <img class="img-responsive pic-news" src="<?php echo catch_that_image() ?>" alt="">
            <span class="pic-title"><?php the_title();?></span>
            </a>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left pic-ico" href="#myCarousel" 
            data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right pic-ico" href="#myCarousel" 
            data-slide="next">&rsaquo;</a>
        </div>
    </div>
	</div>