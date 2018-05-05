	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

	<style type="text/css">
		.nativo-post-thumb {
		    width: 150px;
		    height: 150px;
		    margin: 10px 0;
		    object-fit: cover;
		}

		.owl-next {
	        position: absolute;
	        top: 40%;
	        right: 0;
	    }
	    .owl-prev {
	        position: absolute;
	        top: 40%;
	        left: 0;
	    }

	</style>

	<div class="nativo-container" align="center">
<?php

					$loop = array(
						'posts_per_page' => $per_page,
						'post_type' => 'post',
						'tax_query' => array(
							'relation' => 'OR',
							array(
								'taxonomy' => 'category',
								'field'    => 'slug',
								'terms'    => $pl_cat,
							) 
						),
					);

					$myposts = get_posts( $loop );

			    if ( $myposts ) {
			        foreach ( $myposts as $post ) :
			          setup_postdata( $post ); ?>


			        <a href="<?= get_the_permalink($post->ID) ?>">
			          <div class="nativo-single-post">

			          	<div class="nativo-post-thumb">
			          	<?php 

			          		if( !empty( get_the_post_thumbnail($post->ID, 'thumbnail' ) ) ){

			          			echo get_the_post_thumbnail($post->ID, 'thumbnail' );

			          		}else{

			          			echo '<img src="'.plugins_url( '../images/placeholder.png', __FILE__ ).'">';

			          		}

 						?>
			          	</div>
			          	
			          	<?php
						if ( has_excerpt( $post->ID ) ) {
						    echo get_the_excerpt( $post->ID );
						} else {
						    // This post has no excerpt.
						}
						?>
			          	
			          	<h2><?php echo get_the_title($post->ID); ?></h2>

			          </div>
					</a>
			<?php   
						endforeach; 
			        wp_reset_postdata();

				}else{

					if( function_exists('pll_e') ){
	                    pll_e('No se encontraron Posts');
	                }else{
						echo '<h1>No se encontraron Posts</h1>';
	                }

				};

			?>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
	<script>

	jQuery('.nativo-container').owlCarousel({
	    center: true,
	    items:3, 
	    pagination:false,
	    navigation:true,
	    navigationText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
	});

	</script>