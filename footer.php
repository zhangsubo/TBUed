<!-- #footer -->
		<div id="footer">

			<div class="footer-bd">

				<div class="col-up clearfix">

					<!-- .friend-links -->
					
					<div class="section friend-links">
						<h3 class="section-title">友情链接</h3>
						<ul class="closed link-list" id="J_LinksWrapper">
							<?php 
			  		wp_nav_menu(
								  array(	
								  			'theme_location'   => 'friends',
											'sort_column'      => 'menu_order',
										) 
						 		); 
			?>
					</ul></div>
					
					<!-- END .friend-links -->
					
					<!-- .hot-tags -->
					<div class="section hot-tags">
						<h3 class="section-title">热门标签</h3>
						<div class="tag-list">
							<?php wp_tag_cloud('smallest=12&largest=12&unit=px&number=22&order=DESC'); ?>						</div>
						<div class="footer-search">
							<!-- 搜索框 -->

<form method="get" id="search" action="<?php bloginfo('url'); ?>">
	<input maxlength="30" name="s" id="J_Input" class="input sprites" placeholder="" type="text">
</form>
<!-- END 搜索框 -->						</div>
					</div>
					<!-- END .hot-tags -->

				</div>

				<!-- footer-logo, copyright, ued-links -->
				<div class="col-down clearfix">

					<a class="ued-logo" href="<?php bloginfo('url'); ?>" target="_self">
						<img src="<?php bloginfo('template_url'); ?>/images/logo-foot.png" alt="<?php bloginfo('name'); ?>">
					</a>

					<em class="copyright">
						Copyright © 2014 <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. All rights reserved.Theme by <a href="http://zhangsubo.cn" target="_blank">张小璋</a>
					</em>

					<span class="ued-links">
						<a href="<?php bloginfo('rss2_url'); ?>" target="_blank" class="rss sprites"></a>
						<a href="https://twitter.com/ad706354584" target="_blank" class="twitter sprites"></a>
						<a href="http://weibo.com/zhangsubo" target="_blank" class="weibo sprites"></a>
					</span>
					

				</div>
              <div class="col-down clearfix">
<em class="copyright">
					<span><a href="http://www.qinbaoshuijing.org/">亲宝水晶官网</a><a href="http://www.sangfulan.org/"> 桑扶兰内衣官网</a><a href="http://www.yikulang.net/">依酷狼牛仔裤</a><a href="http://yixiangliying.cnartka.com/">衣香丽影官方旗舰店</a><a href="http://www.xboyang.com/">博洋家纺官方旗舰店</a></span>
					</em>

				</div>  
				<!-- END footer-logo, copyright, ued-links -->

			</div>
          </div>
		</div>
		<!-- END #footer -->

		
	
<?php wp_footer(); ?>
</body>
</html>