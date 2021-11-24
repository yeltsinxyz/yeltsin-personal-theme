<div id="home_Works" class="grid-container">

    <div class="grid-x">

        <div class="cell small-12">

            <h2><?php the_field('recent_works_title', 'option'); ?></h2>

        </div>

        <div class="cell small-12">

            <?php

            // WP_Query arguments
            $args = array(
                'post_type'              => array( 'work' ),
                'nopaging'               => false,
                'posts_per_page'         => '6',
            );

            // The Query
            $works = new WP_Query( $args );

            // The Loop
            if ( $works->have_posts() ) {
                while ( $works->have_posts() ) {
                    $works->the_post();

            ?>
            <div class="workSingle grid-x align-top">

                <div class="cell small-12 large-3 text-center">
                    <?php the_post_thumbnail( 'workshome' ); ?>
                </div>

                <div class="workPost cell small-12 large-9">

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <ul class="menu meta align-middle">
                        <li class="date"><?php the_date('Y'); ?></li>
                        <li class="category"><?php echo get_the_term_list( $post->ID, 'services', '', '', '' ) ?></li>
                    </ul>

                    <?php the_excerpt(); ?>

                    <p><a href="<?php the_permalink(); ?>" class="readMore" title="Veja o projeto <?php the_title(); ?> completo">Veja o projeto completo</a></p>

                </div>

            </div>
            <?php }
            } else { ?>
            <div class="workSingle grid-x align-top">

                <div class="cell small-12">

                    <h3>Não há novos trabalhos</h3>

                    <p>Opa, nenhum trabalho novo foi encontrado.</p>

                </div>
            
            </div>
            <?php }
            wp_reset_postdata();
            ?>   

        </div>

    </div>

</div>