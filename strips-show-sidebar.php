		<!-- sidebar, display if it exists -->	
		<?php if (is_active_sidebar('blog-sidebar')) : ?>
			<div class="col-sm-2 sidebar">
				<?php dynamic_sidebar('blog-sidebar'); ?>
			</div> <!-- closes sidebar column -->
		<?php endif ?>