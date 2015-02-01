				</div> <!-- closes main content column, header.php -->
	
				<!-- sidebar -->
				<?php locate_template('strips-show-sidebar.php', true, false) ?>		
	
			</div> <!-- closes .row, header.php -->

			<!-- footer begins -->
			<div class="row"> <!-- the row itself is full-width, but the class below will set the limit of what's in #footer, including background color -->
				<div id="footer" class="col-sm-12 col-md-10">
					<!-- footer widget -->
					<?php if (is_active_sidebar('footer2')) : ?>
						<div class="col-sm-6">
					<?php else : ?>
						<div class="col-md-12">
					<?php endif ?>	
						<?php dynamic_sidebar('footer1') ?>
						</div>
						
					<?php if (is_active_sidebar('footer2')) : ?>
						<div class="col-sm-6">
							<?php dynamic_sidebar('footer2') ?>
						</div>
					<?php endif ?>	
				</div> <!-- closes footer column -->
			</div> <!-- closes footer row -->
		</div> <!-- closes container from header.php -->
	<?php wp_footer() ?>

</body>
</html>