<?php 
	function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
//获取文章中第一张图片的路径并输出
$first_img = $matches [1] [0];
//如果文章无图片，获取自定义图片
if(empty($first_img)){ //Defines a default image
$first_img = "<?php bloginfo('template_url'); ?>/images/z1.png";
 
//请自行设置一张default.jpg图片
}
return $first_img;

}
	

    // remove_filter( 'the_content', 'wpautop' ); 

    //pzx
    function get_category_root_id($cat)
{
$this_category = get_category($cat);// 取得当前分类  
while($this_category->category_parent) // 若当前分类有上级分类时,循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类(往上爬)
}
return$this_category->term_id; // 返回根分类的id号
}


//分页工具
function pagenavi( $p = 2 ) {
if ( is_singular() ) return;
global $wp_query, $paged;
$max_page = $wp_query->max_num_pages;
if ( $max_page == 1 ) return;
if ( empty( $paged ) ) $paged = 1;
if ( $paged > 0 ) p_link( $paged - 1, '上一页', '上一页' );
if ( $paged > $p + 1 ) p_link( 1, '最前页' );
if ( $paged > $p + 2 ) echo '<span class="page-numbers">...</span>';
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : p_link( $i );
}
if ( $paged < $max_page - $p - 1 ) echo '<span class="page-numbers">...</span>';
if ( $paged < $max_page - $p ) p_link( $max_page, '最末页' );
if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '下一页' );
}
function p_link( $i, $title = '', $linktype = '' ) {
if ( $title == '' ) $title = "第 {$i} 页";
if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a> ";
}

/**
* WordPress 添加面包屑导航
* https://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
*/
function cmp_breadcrumbs() {
$delimiter = '>'; // 分隔符
$before = '<span class="current">'; // 在当前链接前插入
$after = '</span>'; // 在当前链接后插入
if ( !is_home() && !is_front_page() || is_paged() ) {
echo '<div itemscope itemtype="http://schema.org/WebPage" id="crumbs">'.__( '' , 'cmp' );
global $post;
$homeLink = home_url();
echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __( '首页' , 'cmp' ) . '</a> ' . $delimiter . ' ';
if ( is_category() ) { // 分类 存档
global $wp_query;
$cat_obj = $wp_query->get_queried_object();
$thisCat = $cat_obj->term_id;
$thisCat = get_category($thisCat);
$parentCat = get_category($thisCat->parent);
if ($thisCat->parent != 0){
$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
}
echo $before . '' . single_cat_title('', false) . '' . $after;
} elseif ( is_day() ) { // 天 存档
echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
echo $before . get_the_time('d') . $after;
} elseif ( is_month() ) { // 月 存档
echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
echo $before . get_the_time('F') . $after;
} elseif ( is_year() ) { // 年 存档
echo $before . get_the_time('Y') . $after;
} elseif ( is_single() && !is_attachment() ) { // 文章
if ( get_post_type() != 'post' ) { // 自定义文章类型
$post_type = get_post_type_object(get_post_type());
$slug = $post_type->rewrite;
echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
echo $before . get_the_title() . $after;
} else { // 文章 post
$cat = get_the_category(); $cat = $cat[0];
$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
}//echo $before . get_the_title() . $after;
} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
$post_type = get_post_type_object(get_post_type());
echo $before . $post_type->labels->singular_name . $after;
} elseif ( is_attachment() ) { // 附件
$parent = get_post($post->post_parent);
$cat = get_the_category($parent->ID); $cat = $cat[0];
echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
echo $before . get_the_title() . $after;
} elseif ( is_page() && !$post->post_parent ) { // 页面
echo $before . get_the_title() . $after;
} elseif ( is_page() && $post->post_parent ) { // 父级页面
$parent_id  = $post->post_parent;
$breadcrumbs = array();
while ($parent_id) {
$page = get_page($parent_id);
$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
$parent_id  = $page->post_parent;
}
$breadcrumbs = array_reverse($breadcrumbs);
foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
echo $before . get_the_title() . $after;
} elseif ( is_search() ) { // 搜索结果
echo $before ;
printf( __( 'Search Results for: %s', 'cmp' ),  get_search_query() );
echo  $after;
} elseif ( is_tag() ) { //标签 存档
echo $before ;
printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
echo  $after;
} elseif ( is_author() ) { // 作者存档
global $author;
$userdata = get_userdata($author);
echo $before ;
printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
echo  $after;
} elseif ( is_404() ) { // 404 页面
echo $before;
_e( 'Not Found', 'cmp' );
echo  $after;
}
if ( get_query_var('paged') ) { // 分页
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
echo sprintf( __( '', 'cmp' ), get_query_var('paged') );
}
echo '</div>';
}
}
?>