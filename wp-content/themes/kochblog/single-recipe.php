<?php get_header();
the_post(); ?>

<div class="container post-single">
	<h2><?php the_title(); ?></h2>

	<center>
		<?php if (has_post_thumbnail()) {
			the_post_thumbnail("large");
		} ?>
	</center>
	<div class="row">
		<div class="col-md-4">
			<div class="rating">
				<strong>Kochklub-Wertung: </strong>
				<?php
					$rating = get_field('cc-rating');
					for ($i = 1; $i <= 5; $i++) {
						echo '<span class="glyphicon glyphicon-star'.($i <= $rating ? '' : '-empty').'"></span>';
					} ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
		<div class="col-md-8">	
			<?php the_content(); ?>

			<?php
				$i = 1;
				foreach (CFS()->get('steps') as $field) {
					echo '<h4>'.$i.'</h4>';

					if ($field['image'])
						echo wp_get_attachment_image($field['image']);

					echo $field['instructions'];
					$i++;
				}
			?>
		</div>
	</div>		
</div>

<?php get_footer(); ?>
