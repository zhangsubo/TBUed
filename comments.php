<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die (__('Please do not load this page directly. Thanks!'));
	}
?>
<?php if ( post_password_required() )
	return;
?>
<div id="comments">
<?php if ( have_comments() ) : ?>
    <div class="comments-hd">

    	<span class="hd-title">
    		全部评论: <span class="highlight"><?php comments_popup_link('0条','1条','%条'); ?></span>条    	</span>

    </div>

    <div class="h-dotted-line"></div>

	
    <ul class="comment-list">

        <!-- #comment-## -->
<li class="comment even thread-even depth-1" >

	<div class="comment-content">
	  <?php wp_list_comments("avatar_size=0"); ?>
  </div>

	<div class="h-dotted-line"></div>

</li>
<?php cancel_comment_reply_link() ?>
<!-- 未登录评论表单 -->
<div id="respond" class="comment-respond">

	<?php comment_form(); ?>

</div>
<!-- END 未登录评论表单 --><?php endif; // have_comments() ?>