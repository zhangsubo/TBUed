<?php

get_header('meta');
get_header();
?>
<!-- .content-bd -->
<div class="content-bd">
  <?php if(have_posts()) : ?>   
<?php get_sidebar(); ?>	
<!-- .post-list -->


<ul class="post-list clearfix">
<?php while(have_posts()) : the_post(); ?>   
   <li class="post-<?php the_ID(); ?> post type-post status-publish format-standard has-post-thumbnail hentry category-bowen" data-id="<?php the_ID(); ?>">

                
        <div class="post-snapshoot">

                
            <i class="slide-bg"></i>

            <a class="post-thumb" href="<?php the_permalink(); ?>" target="_self" rel="bookmark">
                <img id="ks-lazyload" src="<?php bloginfo('template_url'); ?>/images/spaceball.gif" data-ks-lazyload="<?php echo catch_that_image() ?>" class="attachment-thumb-pc wp-post-image" alt="<?php get_the_title(); ?>" height="150" width="280">            </a>

                
        </div>

        <a class="post-title" href="<?php the_permalink(); ?>" target="_self" title="<?php get_the_title(); ?>" rel="bookmark">
           <?php the_title(); ?></a>

        <div class="post-extra">

            <span class="post-date">
                <?php the_time('Y-n-j') ?>           </span>

            <span class="post-op">

                

                <a href="<?php the_permalink(); ?>#comments" class="comment sprites" title="《<?php get_the_title(); ?>》上的评论"><?php comments_popup_link('0','1','%'); ?></a>
            </span>

        </div>

    </li>


   
<?php endwhile; ?>

</ul>





<div class="page-nav">

    <div class="pre-page page sprites">
            <?php previous_posts_link('&lt;'); ?>
            </div>

    <div class="next-page page sprites">
      
			<?php next_posts_link('&gt;'); ?> 
                </div>

</div>

<!-- END .post-list -->
<?php endif; ?>
				</div>
				<!-- END .content-bd -->

			</div>
			<!-- END .col-right -->

			<!-- .back-to-top -->
			<div style="display: none;" id="J_BackTop" class="back-top">
				<a class="sprites bg-anim" href="javascript:void(0)"></a>
			</div>
			<!-- END .back-to-top -->

		</div>
		<!-- END #content -->

<?php get_footer(); ?>	    <!-- 整理完成 -->