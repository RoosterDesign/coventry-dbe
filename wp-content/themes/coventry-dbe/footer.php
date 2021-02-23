<? /*
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'coventry-dbe' ) ); ?>">
				<?php
				printf( esc_html__( 'Proudly powered by %s', 'coventry-dbe' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'coventry-dbe' ), 'coventry-dbe', '<a href="http://www.solutions-squared.com">Solutions Squared</a>' );
				?>
		</div>
	</footer>
</div>

*/ ?>

</div>

<footer class="siteFooter">
	<div class="container">

		<div class="siteFooter__col">
			<a href="/" class="siteFooter__logo">
				<img src="https://via.placeholder.com/170x65" />
			</a>
			<address class="siteFooter__address">
				Cathedral and Diocesan Offices <br/> 1 Hill Top, Coventry, CV1 5AB
			</address>
		</div>

		<div class="siteFooter__col">
			<h3 class="siteFooter__quote">Enabling flourishing through Christ, educating for life in all its fullness.</h3>
			<nav class="footerNav">
				<?php wp_nav_menu( array( 'menu' => 'footer-menu', 'container' => 'ul', )); ?>				
			</nav>
			<p>Our Data Protection Officer is Peter Rigby</p>
		</div>
	
		<nav class="footerNav siteFooter__col">
			<?php wp_nav_menu( array( 'menu' => 'main-menu', 'container' => 'ul', )); ?>		
		</nav>

	</div>
</footer>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->

<?php wp_footer(); ?>



</body>
</html>