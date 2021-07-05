<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>

<section class="my-5 py-5">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-11 mx-auto">
            
                <h1 class="text-center font-weight-bold"><?php the_title();?></h1>
                
                <div class="mt-5 mb-5">
                    <?php the_content(); ?>

                </div>

            </div> <!-- .col-md-11 -->
        <div> <!-- .row -->
    </div> <!-- .container -->


</section>


<?php endwhile; ?>
<?php else: get_template_part('includes/loops/content', 'none'); ?>
<?php endif; ?>
<?php get_footer(); ?>