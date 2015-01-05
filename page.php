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

			

			<div class="post-info" style="padding-left:0px;">

				<h1 style="font-size:40px;">
					<?php the_title(); ?>				</h1>
			</div>

		</div>
		<!-- END .post-hd -->

		<div class="h-dotted-line"></div>

		<!-- .post-bd -->
		<div class="post-bd">
			<?php the_content(); ?>
		</div>
		<!-- END .post-bd -->

		
		

	</div>

	
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