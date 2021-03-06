				</div> <!-- closes main content column, header.php -->
	
				<!-- sidebar -->
				<?php locate_template('strips-show-sidebar.php', true, false) ?>		
				
			</div> <!-- closes .row, header.php -->

			<!-- footer begins -->
			<div class="row"> <!-- the row itself is full-width, but the class below will set the limit of what's in #footer, including background color -->
				<div id="footer" class="col-sm-12">
					<!-- footer widget -->
					<?php if (is_active_sidebar('footer2')) : ?>
						<div class="col-sm-5 col-sm-offset-1" id="footer-widget-1">
					<?php else : ?>
						<div class="col-sm-10 col-sm-offset-1">
					<?php endif ?>	
						<?php dynamic_sidebar('footer1') ?>
						</div>
						
					<?php if (is_active_sidebar('footer2')) : ?>
						<div class="col-sm-5" id="footer-widget-2">
							<?php dynamic_sidebar('footer2') ?>
						</div>
					<?php endif ?>
					
						<div class="col-sm-10 col-sm-offset-1" id="copy">
							<small>
								<p><a href="https://github.com/ashryanbeats/strips">Strips theme for WordPress</a> made with ア! by <a href="http://ashryanbeats.com">Ash Ryan Beats</a>.</p>
								<p><?php echo '©2010 – '.date("Y"). ' <a href="http://ashryanbeats.com">Ash Ryan Beats</a>' ?>.</p>
							</small>
						</div>
				</div> <!-- closes footer column -->
			</div> <!-- closes footer row -->
		</div> <!-- closes container from header.php -->
		</div> <!-- closes #main-container from header.php -->
	<?php wp_footer() ?>

</body>
</html>