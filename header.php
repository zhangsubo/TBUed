<body class="home blog custom-background">

		<!-- home url -->
		<input id="J_Home" value="<?php bloginfo('url'); ?>/" type="hidden">

		<!-- #content -->
		<div id="content" class="clearfix">

			<!-- .col-left -->
			<div class="col-left">

				<!-- #nav -->
<div id="J_Nav" class="nav" style="top: 0px;">

	<a class="ued-logo" href="<?php bloginfo('url'); ?>/" target="_self">
		<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo(); ?>">
	</a>

	<div class="nav-menu">
		<div style="top: 0px; display: block; transition: none 0s ease 0s ;" id="J_NavLabel" class="nav-label"><span></span></div>
		<ul id="menu-primary" class="menu">
        <?php 
		  		wp_nav_menu(
							  array(	
							  			'theme_location'   => 'homepage',
										'sort_column'      => 'menu_order',
										'menu_class'       => 'out',
										'link_before'      => '<span class="line">',
										'link_after'       => '</span>',
									) 
					 		); 
		?>
</ul>	</div>
<?php get_search_form(); ?>
	
	
</div>
<!-- END #nav -->
			</div>
			<!-- END .col-left -->

			<!-- .col-right -->
			<div class="col-right">
						<!-- #login -->
			 <?php if(is_user_logged_in()){
		  echo '<div id="J_Login" class="login">	<a href="<?php echo wp_logout_url(home_url()); ?>" class="login-entry J_LoginEntry"> 登出</a></div>';
		
        
        }else{
		?>	 
    <div id="J_Login" class="login" style="width: 48px;"><a href="<?php echo site_url('/wp-login.php'); ?>" class="login-entry J_LoginEntry">登录</a> </div>
    
	<?php }; ?>
				<!-- END #login -->
                
    <!-- 整理完成 -->
