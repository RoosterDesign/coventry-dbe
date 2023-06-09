</div>

<footer class="siteFooter">
	<div class="container">

		<div class="siteFooter__col">
			<a href="/" class="siteFooter__logo" title="Diocesan Board of Education">
				<img src="<?php echo get_option('site_logo_white'); ?>" alt="Diocesan Board of Education" />
			</a>
			<address class="siteFooter__address">
				<?php echo get_option('address_label'); ?><br/>  <?php echo get_option('address'); ?>
			</address>
			<p><?php echo get_option('address_post_msg'); ?></p>
		</div>
	
		<nav class="footerNav siteFooter__col">
			<?php wp_nav_menu( array( 'menu' => 'main-menu', 'container' => 'ul', 'depth' => 1 )); ?>		
		</nav>

		<div class="siteFooter__col">
			<!-- <h3 class="siteFooter__quote">Worshipping God.<br /> Making new disciples.<br /> Transforming communities.</h3> -->

			<h3 class="siteFooter__quote"><?php echo get_option('footer_strapline') ;?></h3>

			<nav class="footerNav">
				<?php wp_nav_menu( array( 'menu' => 'footer-menu', 'container' => 'ul', )); ?>				
			</nav>
			
		</div>

	</div>
</footer>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->

<?php wp_footer(); ?>



</body>
</html>