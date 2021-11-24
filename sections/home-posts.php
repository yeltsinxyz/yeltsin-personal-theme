<div id="home_Posts" class="grid-container-fluid">

    <div class="grid-container">

        <div class="grid-x grid-margin-x">

            <div id="home_Posts--meta" class="cell small-12">

                <div class="grid-x grid-margin-x align-middle">

                    <div class="cell small-12 large-6">
                        <h2><?php the_field('recent_posts', 'option'); ?></h2>
                    </div>

                    <div class="cell small-12 large-6 text-center large-text-right">
                        <p><a href="<?php the_field('recent_posts_more', 'option'); ?>" class="home_Posts--moreButton">Visualizar todos</a></p>
                    </div>

                </div>

            </div>

            <div id="home_Posts--articles" class="cell small-12">

                <div class="grid-x grid-margin-x align-stretch">

                    <?php
                    $args = array(
                        'post_type'              => array( 'post' ),
                        'post_status'            => array( 'publish' ),
                        'nopaging'               => false,
                        'posts_per_page'         => '2',
                    );

                    $recent_posts = new WP_Query( $args );

                    if ( $recent_posts->have_posts() ) {
                        while ( $recent_posts->have_posts() ) {
                            $recent_posts->the_post();
                    ?>
                    <div class="postCard cell small-12 large-6">

                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        <ul class="meta menu">
                            <li><?php the_date(); ?></li>
                            <li><?php the_category( ', ' ); ?></li>
                        </ul>

                        <?php the_excerpt(); ?>

                        <p><a href="<?php the_permalink(); ?>" class="readMore--button" title="Leia <?php the_title();?> completo.">Ler artigo completo</a></p>
                    
                    </div>
                    <?php }
                    } else { ?>
                    <div class="postCard cell small-12 large-12">

                        <h3>Ops! Nenhum post foi encontrado.</h3>

                        <p>No momento, não há nenhum post publicado. Mas espere, confira outros conteúdos do nosso site ou entre em contato.</p>

                    </div>
                    <?php }

                    wp_reset_postdata(); ?>

                </div>

            </div>

        </div>

    </div>

</div>