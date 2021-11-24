<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div id="singleWork" class="grid-container">

        <div class="grid-x">

            <div class="cell small-12">

                <h1><?php the_title(); ?></h1>

                <ul class="menu meta align-middle">
                    <li class="date"><?php the_date('Y'); ?></li>
                    <li class="category"><?php echo get_the_term_list( $post->ID, 'services', '', '', '' ) ?></li>
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