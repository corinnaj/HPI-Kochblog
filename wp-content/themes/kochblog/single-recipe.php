<?php get_header();
the_post(); ?>
<?php
require_once 'vendor/autoload.php';
use Intervention\Image\ImageManager;
use marijnvdwerf\palette\Palette;
?>
<div class="container post-single">
	<div class="row">
		<div class="col-md-8">
			<center>
				<div class="title-image">
					<?php $image = get_field('image');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
						<?php
						$manager = new ImageManager(array('driver' => 'gd'));
						$newimage = $manager->make(get_attached_file($image['id']));
						$palette = Palette::generate($newimage);
						$color = $palette->getLightVibrantSwatch()->getColor();?>
						<div id="colorRect" style="background-color:<?php echo $color ?>">
							<h2><?php the_title(); ?></h2>
							<hr>
							<p><?php the_field('description'); ?></p>
						</div>
					<?php endif; ?>
				</div>
			</center>
			<div class="row" style="padding-top: 20px">
				<div class="col-md-4" id="ingredients">
					<?php if( have_rows('ingredients_with_heading') ): ?>
					<h3> INGREDIENTS </h3>
					<ul>
						<?php while( have_rows('ingredients_with_heading') ): the_row(); ?>
						<li class="ingredient-header"> <?php the_sub_field('heading'); ?> </li>
							<?php while( have_rows('ingredients') ): the_row(); ?>
							<li> <?php the_sub_field('amount'); ?> <?php the_sub_field('unit'); ?> <?php the_sub_field('name') ?> </li>
							<?php endwhile; ?>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>	
				</div>
				<div class="col-md-8">	
					<?php if( have_rows('method') ): ?>
					<h3> METHOD </h3>
					<ul id="steps">
						<?php while( have_rows('method') ): the_row(); ?>
						<li> <?php the_sub_field('steps'); ?> </li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>	
				</div>
			</div>		
		</div>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
