<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div id="singlePost" class="grid-container">

        <div class="grid-x">

            <div class="cell small-12">

                <h1><?php the_title(); ?></h1>

                <ul class="meta menu">
                    <li><?php the_date(); ?></li>
                    <li><?php the_category( ', ' ); ?></li>
                </ul>

                <div class="summary">
                    <?php the_excerpt(); ?>
                </div>

                <?php the_content(); ?>

            </div>

        </div>

    </div>
    <?php endwhile; else : ?>
	<p><?php esc_html_e( 'Ooops. Não há nenhum post por aqui.' ); ?></p>
    <?php endif; ?>

<?php get_footer(); ?>