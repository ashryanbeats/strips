			<!-- this template displays post categories -->
			
			<!-- these variables set the correct year and month for the link of the date -->
			<?php $archive_year  = get_the_time('Y'); ?>
			<?php $archive_month = get_the_time('m'); ?>
			
			<!-- date, then categories -->
			<a href="<?php echo get_month_link( $archive_year, $archive_month ); ?>"><div class="catpill"><?php the_time('F jS, Y') ?></div></a><?php
				$categories = get_the_category();
				$separator = '';
				$output = '';
				if($categories){
					foreach($categories as $category) {
						$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '"><div class="catpill">'.$category->cat_name.'</div></a>'.$separator;
					}
				echo trim($output, $separator);
				}
			?>