<?php

get_header('meta');
get_header();
?>


<?php if(have_posts()): ?><?php while(have_posts()):the_post();  ?>
<!-- .content-bd -->
				
                <div class="content-bd">
<div class="ued-single">

    
	<div class="post type-post status-publish format-standard hentry category-lanlan">

		
		<!-- .post-hd -->
		<div class="post-hd">

			<a class="post-author" rel="bookmark">
				<img alt='' src='<?php bloginfo('template_url'); ?>/images/avatar.png' class='avatar avatar-50 photo' height='50' width='50' />			</a>

			<div class="post-info">

				<h1 class="post-title">
					<?php the_title(); ?>				</h1>

				<p class="post-extra">

					<label>
						作者：<a href="<?php the_author_posts_link ?>" target="_self" rel="bookmark"><?php the_author();?></a>
					</label>

					<em class="v-line">|</em>

					<label>
						时间：<em><?php the_time('Y-n-j  H:i:s') ?></em>
					</label>
 <label>
<?php edit_post_link( __( '编辑', 'TBUed' ), '<em class="v-line">', '</em>' ); ?></label>
				</p>

			</div>

		</div>
		<!-- END .post-hd -->

		<div class="h-dotted-line"></div>

		<!-- .post-bd -->
		<div class="post-bd">
			<?php the_content(); ?>
		</div>
		<!-- END .post-bd -->

		
		<!-- .post-op -->
		<div class="post-op">

            <a id="J_CommentPost" class="comment sprites" href="#comments">评论<?php comments_popup_link('0','1','%'); ?></a> 

			<em class="v-italic-line">/</em>

			<a id="J_SharePost" class="share sprites" href="http://service.weibo.com/share/share.php?appkey=4040028665&title=<?php the_title(); ?> @张小璋的昵称被占用了 &url=<?php the_permalink() ?>" target="_blank">分享</a>

			
		</div>
		<!-- END .post-op -->

	</div>

    <!-- .page-nav -->
	<div class="page-nav">

		<div class="pre-page page sprites">
<?php next_post_link('%link'); ?>
			
		</div>

		<div class="next-page page sprites">
<?php previous_post_link('%link'); ?>
			
		</div>

	</div>
	<!-- END .page-nav -->
<?php comments_template('',true); ?>
	
</div>



	




	

	
	<!-- 文章分类 ID -->
	<input type="hidden" id="J_CatID" value="297">
	<!-- END 文章分类 ID -->

	
</div>

				</div>
				<!-- END .content-bd -->

			</div>
			<!-- END .col-right -->

			<!-- .back-to-top -->
			<div id="J_BackTop" class="back-top">
				<a class="sprites bg-anim" href="javascript:void(0)"></a>
			</div>
			<!-- END .back-to-top -->

		</div><?php endwhile; ?>
		<!-- END #content -->
 <?php endif; ?>
		<?php get_footer(); ?>	
            <!-- 整理完成 -->