<?php
/*  Template Name: Landing Page */
get_header();
?>
<main>
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="slider">
                        <div class="slider-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/banner.png" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/banner.png" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/img/banner.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="social">
                    <div class="container">

                        <div class="col-12">
                            <ul>
                                <li><a target="_blank" href="facebook"><i class="facebook"></i></a></li>
                                <li><a target="_blank" href="instagram"><i class="instagram"></i></a></li>
                                <li><a target="_blank" href="twitter"><i class="twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="novidades">
        <div class="container">
            <div class="row">
                <h1 class="title-main">Novidades</h1>
                <div class="col-12 posts">
                    <div class="row">
                        <?php
                        // categories
                        $args = array(
                            'category_name' => 'novidades',
                            'posts_per_page' => 3 // Limite para três posts
                        );
                        query_posts($args);

                        if (have_posts()):
                            while (have_posts()):
                                the_post();
                                if ($wp_query->current_post % 2 == 0):
                                    ?>
                                    <div class="col-sm-12 col-md-6 col-lg-4 post">
                                        <a href="<?php the_permalink();
                                        ?>">
                                            <img class="thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                alt="Imagem de destaque post">
                                            <div class="content">
                                                <span class="category">
                                                    <?php $cat = get_the_category();
                                                    echo $cat[0]->cat_name; ?>
                                                </span>
                                                <h3 class="title">
                                                    <?php the_title(); ?>
                                                </h3>
                                                <div class="post-author">
                                                    <span class="name">por
                                                        <?php the_author(); ?>
                                                    </span>
                                                    <span class="data">
                                                        <?php echo get_the_date(get_option('date_format')); ?>
                                                    </span>

                                                </div>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </a>
                                    </div>

                                <?php else: ?>
                                    <div class="col-sm-12 col-md-6 col-lg-4 post post-full"
                                        style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                        <a href="<?php the_permalink();
                                        ?>">
                                            <span class="category">
                                                <?php $cat = get_the_category();
                                                echo $cat[0]->cat_name; ?>
                                            </span>
                                            <h3 class="title">
                                                <?php the_title(); ?>
                                            </h3>

                                            <div class="post-author">
                                                <span class="name">por
                                                    <?php the_author(); ?>
                                                </span>
                                                <span class="data">
                                                    <?php echo get_the_date(get_option('date_format')); ?>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                endif;
                            endwhile;
                        endif;
                        wp_reset_query();
                        ?>

                        <div class="col-lg-12 banner">
                            <a href="<?php the_field('link_banner') ?>">
                                <img src="<?php the_field('banner_mid') ?>">
                            </a>
                        </div>

                        <?php
                        $args = array(
                            'category__not_in' => array(2),
                            'posts_per_page' => 6 // Limite para seis posts
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()):

                            $count = 0;
                            while ($query->have_posts()):
                                $query->the_post();
                                $count++;
                                if ($count == 1 | $count == 3):
                                    ?>
                                    <div class="col-sm-12 col-md-6 col-lg-4 post post-full"
                                        style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="category">
                                                <?php $cat = get_the_category();
                                                echo $cat[0]->cat_name; ?>
                                            </span>
                                            <h3 class="title">
                                                <?php the_title(); ?>
                                            </h3>

                                            <div class="post-author">
                                                <span class="name">por
                                                    <?php the_author(); ?>
                                                </span>
                                                <span class="data">
                                                    <?php echo get_the_date(get_option('date_format')); ?>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                <?php else: ?>
                                    <div class="col-sm-12 col-md-6 col-lg-4 post">
                                        <a href="<?php the_permalink();
                                        ?>">
                                            <img class="thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                alt="Imagem de destaque post">
                                            <div class="content">
                                                <span class="category">
                                                    <?php $cat = get_the_category();
                                                    echo $cat[0]->cat_name; ?>
                                                </span>
                                                <h3 class="title">
                                                    <?php the_title(); ?>
                                                </h3>
                                                <div class="post-author">
                                                    <span class="name">por
                                                        <?php the_author(); ?>
                                                    </span>
                                                    <span class="data">
                                                        <?php echo get_the_date(get_option('date_format')); ?>
                                                    </span>

                                                </div>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                endif;
                            endwhile;
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                    <div class="col-12 text-center my-2">
                        <button class="btn-posts"> Carregar mais posts <svg width="20" height="20" viewBox="0 0 20 20"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18Z"
                                    fill="#D4142C" />
                                <path
                                    d="M18 10H20C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0V2C12.1217 2 14.1566 2.84285 15.6569 4.34315C17.1571 5.84344 18 7.87827 18 10Z"
                                    fill="#D4142C" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="mais-lidos">
        <div class="container">
            <div class="row">
                <h2 class="title-main">Mais lidos</h1>
                    <div class="col-12 posts">
                        <div class="row">
                            <?php
                            // categories
                            $args = array(
                                'category_name' => 'mais-lidos',
                                'posts_per_page' => 3 // Limite para três posts
                            );
                            query_posts($args);

                            if (have_posts()):
                                while (have_posts()):
                                    the_post();

                                    ?>

                                    <div class="col-sm-12 col-md-6 col-lg-4 post post-full"
                                        style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                        <a href="<?php the_permalink(); ?>">
                                            <span class="category">
                                                <?php $cat = get_the_category();
                                                echo $cat[0]->cat_name; ?>
                                            </span>
                                            <h3 class="title">
                                                <?php the_title(); ?>
                                            </h3>

                                            <div class="post-author">
                                                <span class="name">por
                                                    <?php the_author(); ?>
                                                </span>
                                                <span class="data">
                                                    <?php echo get_the_date(get_option('date_format')); ?>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                    <?php

                                endwhile;
                            endif;
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <section id="newsletter">
        <div class="container">
            <h4 class="title-main">Newsletter</h4>
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <p class="desc-news">
                        Fique por dentro das nossas <br />novidades por e-mail.
                    </p>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <form>
                        <input class="input-news" type="email" name="newsletter" required
                            placeholder="Digite seu e-mail">
                        <button class="btn-form">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="conteudo">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <h4 class="title-conteudo">
                        <?php the_field("titulo_blog"); ?>
                    </h4>
                </div>
                <div class="col-12 col-lg-8">
                    <p class="description-conteudo">
                        <?php the_field("descricao_blog"); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>