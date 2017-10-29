<div class="w-width w-carousel">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php  
                        $cat=get_category_by_slug('lbt'); 
                        $cat_links=get_category_link($cat->term_id); 
                        $id=$cat->term_id;
                        $args = array(
                            'cat'     => $id,
                            'posts_per_page'     => '3'
                        );
                    ?> 
             <?php query_posts($args); while(have_posts()):the_post(); ?>
                <div class="item"><?php the_content();?></div>
            <?php endwhile; wp_reset_query(); ?>      
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	<span class="sr-only">Previous</span>
  		</a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    	<span class="sr-only">Next</span>
  		</a>
    </div>
	</div>
