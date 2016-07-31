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
					$rating = get_field('kochklubwertung');
					for ($i = 1; $i <= 5; $i++) {
						echo '<span class="glyphicon glyphicon-star'.($i <= $rating ? '' : '-empty').'"></span>';
					} ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
		<div class="col-md-8">	
			<?php the_content(); ?>
			<p>
				<?php the_field('duration');  ?>
			</p>
			<?php if( have_rows('ingredients') ): ?>
    			<ul>
   					<?php while( have_rows('ingredients') ): the_row(); ?>
					<li> <?php the_sub_field('amount'); ?> <?php the_sub_field('unit'); ?> <?php the_sub_field('ingredient') ?> </li>
        
    				<?php endwhile; ?>
    			</ul>
			<?php endif; ?>	
		</div>
	</div>		
</div>

<?php get_footer(); ?>
