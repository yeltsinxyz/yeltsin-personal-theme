<section id="home_Hero" class="grid-container">

    <div class="grid-x align-middle">

        <div class="cell large-6 small-12 large-order-1 small-order-2">

            <h1><?php the_field('hero_title', 'option'); ?></h1>

            <p><?php the_field('hero_description', 'option'); ?></p>

            <a href="<?php the_field('hero_button', 'option'); ?>" class="button_Hero"><?php the_field('hero_button_title', 'option'); ?></a>

        </div>

        <div class="cell large-6 small-12 large-order-2 small-order-1 text-center large-text-right">

            <img src="<?php the_field('hero_profile', 'option'); ?>" alt="">

        </div>

    </div>

</section>