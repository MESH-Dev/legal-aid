<?php

//Add all custom functions, hooks, filters, ajax etc here

include('functions/start.php');
include('functions/cpt.php');
include('functions/clean.php');

include_once('simplehtmldom_1_9_1/simple_html_dom.php');
//include('simplehtmldom_1_9_1/example/example_extract_html.php');

//Custon wp-admin logo
function my_custom_login_logo() {
  echo '<style type="text/css">
		        h1 a {
		          background-size: 227px 85px !important;
		          margin-bottom: 20px !important;
		          background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
		    </style>';
}

add_theme_support( 'responsive-embeds' );

/********************************************************/
// Breadcrumbs
/********************************************************/
function the_breadcrumb($post) {
	if (!is_home()) {
		//global $post;
		//$pid = $post->ID;
		// $post = get_post($post);
		// var_dump($post->post_parent);
		// var_dump('Post Id: '.$pid);
		//$links = get_post_ancestors($pid);
		//var_dump($links);
		//echo $links;
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo " <span> > </span> ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}

/********************************************************/
// Adding Dashicons in WordPress Front-end
/********************************************************/
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
  wp_enqueue_style( 'dashicons' );
}

$id = intval($_GET['tag_ID']);
var_dump($id);
//echo($args);

add_filter('acf/fields/taxonomy/query', 'my_acf_fields_taxonomy_query', 10, 3);
function my_acf_fields_taxonomy_query( $args, $field, $post_id ) {

    //$id = $term_id;
    //$tag_id = get_query_var('taxonomy');
    //var_dump($tag_id);
    //var_dump($id);
    // Show 40 terms per AJAX call.
    // $taxonomy = $_POST['tag_id'];
    // echo($taxonomy);
    // $id = intval($_GET['id']);
    // $tax = get_query_var('tag_id');
    // var_dump($tax);


    $args['number'] = 40;

    // Order by most used.
    $args['orderby'] = 'count';
    $args['order'] = 'DESC';

    return $args;
}

// if(function_exists('acf_register_block_type')){
// 	add_action('acf/init', 'register_acf_block_types');
// }

// function register_acf_block_types(){
// 	acf_register_block_type(
// 		array(
// 			'name' => 'four-column-callout-field',
// 			'title' => __('Four Column Callout Field'),
// 			'descritption' => __('4 column row of fields to add callouts'),
// 			'icon' => 'tagcloud',
// 			'keywords' => array('callout', 'column'),
// 		)
// 	);	
// }

// function searchfilter($query) {
 
//     if ($query->is_search && !is_admin() ) {
//         $query->set('post_type',array('resource'));
//     }
 
// return $query;
// }
 
// add_filter('pre_get_posts','searchfilter');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

//add_action( 'legal_subtopic_add_form_fields', 'add_term_fields' );
 
// function add_term_fields( $taxonomy ) {
 
//   echo '<div class="form-field">
//   <label for="misha-text">Text Field</label>
//   <input type="text" name="misha-text" id="misha-text" />
//   <p>Field description may go here.</p>
//   </div>';
 
// }

// add_action( 'legal_subtopic_edit_form_fields', 'edit_term_fields', 10, 2 );
 
// function edit_term_fields( $term, $taxonomy ) {
 
//   $value = get_term_meta( $term->term_id, 'misha-text', true );
 
//   echo '<tr class="form-field">
//   <th>
//     <label for="misha-text">Subtopic Order</label>
//   </th>
//   <td>
//     <input name="misha-text" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
//     <p class="description">Add an order for this subtopic</p>
//   </td>
//   </tr>';
 
// }

// add_action( 'created_legal_subtopic', 'save_term_fields' );
// add_action( 'edited_legal_subtopic', 'save_term_fields' );
 
// function save_term_fields( $term_id ) {
 
//   update_term_meta(
//     $term_id,
//     'misha-text',
//     sanitize_text_field( $_POST[ 'misha-text' ] )
//   );
 
// }

//remove if website dies;

// Updates the map with new or updated listings on listing post-type update
function update_blog_posts( $post_id ) {

    $post_type = get_post_type($post_id);
    
 
    if($post_type!="post" ){ return; }
    else{
    $p_id = get_the_ID();
    remove_action( 'save_post', 'update_blog_posts' );
    
    //The file location for the json file we're creating
    $directory = get_template_directory().'/helpers/blog-posts.json';
    //The contents of the file, so we can check to see if it's empty or not.
    $program_file = file_get_contents($directory);
 
        $arr = array();
        $ids = array();
        
        $args = array(
          'post_type' => 'post',
          'posts_per_page'=> -1,
          'orderby' => 'title',
          'order' => 'desc',
          'post_status' => 'publish'
        );

        $blog_query = new WP_Query($args );
 
         while ($blog_query->have_posts()) { 

          global $post;
          $blog_query->the_post();
           
          //Save the post ID to a variable
          $p_id = get_the_ID();

          //Get post info to save to our json file
          $title = get_the_title();
          $description = get_the_content();

          //$contact_email = get_field('contact_email',$p_id);

      
          $the_id = (string)$p_id;
          $slug = $post->post_name;
 
          $separator_space = ' ';
          $separator_comma = ', ';
 
          // 
          //$actives = get_the_terms($p_id , 'active');
          //$is_active = '';
          //$is_active_slug ='';
          $cats = get_the_terms($p_id, 'category');
          $terms = get_the_terms($p_id, 'terms');

          // if($actives){
          //   foreach ($actives as $active){
          //     $is_active .= $active->name . $separator_comma;
          //     $is_active_slug .= $active->slug . $separator_space;
          //   }
          //   $is_active = rtrim($is_active,', ');
          //   $is_active_slug = rtrim($is_active_slug," ");
          // }

          //  
          //$partners = get_the_terms($p_id , 'partners');
          $part = '';
          $part_slug ='';

          // if($partners){
          //   foreach ($partners as $partner){
          //     $part .= $partner->name . $separator_comma;
          //     $part_slug .= $partner->slug . $separator_space;
          //   }
          //   $part = rtrim($part,', ');
          //   $part_slug = rtrim($part_slug," ");
          // }

          // 
          // $determinants = get_the_terms($p_id , 'sdh');
          $social_det = '';
          $social_det_slug = '';

          // if($determinants){
          //   foreach ($determinants as $determinant){
          //     $social_det .= $determinant->name . $separator_comma;
          //     $social_det_slug .= $determinant->slug . $separator_space;
          //   }
          //   $social_det = rtrim($social_det,', ');
          //   $social_det_slug = rtrim($social_det_slug," ");

          // }

          // 
          //$t_pops = get_the_terms($p_id , 'target_pop');
          $target_pop = '';
          $target_pop_slug = '';

          // if($t_pops){
          //   foreach ($t_pops as $t_pop){
          //     $target_pop .= $t_pop->name . $separator_comma;
          //     $target_pop_slug .= $t_pop->slug . $separator_space;
          //   }
          //   $target_pop = rtrim($target_pop,', ');
          //   $target_pop_slug = rtrim($target_pop_slug," ");
          // }

          // 
          //$p_settings = get_the_terms($p_id , 'program_setting');
          $settings = '';
          $settings_slug = '';

          // if($p_settings!=''){
          //   foreach ($p_settings as $p_setting){
          //     $settings .= $p_setting->name . $separator_comma;
          //     $settings_slug .= $p_setting->slug . $separator_space;
          //   }
          //   $settings = rtrim($settings,', ');
          //   $settings_slug = rtrim($settings_slug," ");
          // }

          //$primary_sdh =  get_field('primary_sdh',$p_id);
          // $primary_sdh_name = $primary_sdh->name;;
          // $primary_sdh_slug = $primary_sdh->slug;;
 
 			$legacy_url = get_field('blog_ref_url');

 			$html = file_get_html($legacy_url);

 			// Clean our data
 			//__ Remove scripts
 			foreach($html->find('script') as $e)
 				$e->outertext = '';
 			//__ Remove the publishdate div
 			foreach($html->find('div.publishdate') as $e)
 				$date = $e->plaintext;
 			foreach($html->find('div.publishdate') as $e)
 				$e->outertext = '';
 			//__ Remove the shareblock div
 			foreach($html->find('div.shareblock') as $e)
 				$e->outertext = '';

 			//__ Remove any H1 tags
 			foreach($html->find('h1') as $e)
 				$e->outertext = '';
 			//__Remove any hr tags
 			foreach($html->find('hr') as $e)
 				$e->outertext = '';
 			//__ Remove any empty p tags, or p tags with only a non-breaking
 			//__ space character
 			foreach($html->find('p') as $e)
 				if($e->innertext == '' || $e->innertext == '&nbsp;') {
        				$e->outertext = '';
    				}
			// foreach($html->find('p') as $e)
			// 	$attr = $e->getAllAttributes();
 		// 		$e->removeAttribute($attr);
    		//__ Remove any inlline styles from p tags
    		// foreach($html->find('p') as $e) 
    		// 	foreach ($e->getAllAttributes() as $attr => $val) 
      //   			$p->removeAttribute($attr);
    	   
			
			//__ Remove any empty div tags
    		foreach($html->find('div') as $e)
 				if($e->innertext == '' || $e->innertext == '&nbsp;') {
        				$e->outertext = '';
    				}

    		foreach($html->find('span') as $e)
 				if($e->innertext == ' ' || $e->innertext == '&nbsp;') {
        				$e->outertext = '';
    				}

    		//__ Remove any inline styles from p tags
    		foreach($html->find('p') as $p) {
    			foreach ($p->getAllAttributes() as $attr => $val) {
        			$p->removeAttribute($attr);
			    }    
			}

      foreach($html->find('div') as $d) 
          // foreach ($d->getAllAttribute(style) as $dattr => $val) {
          //     $d->removeAttribute($attr);
          // }    
        $d->removeAttribute('style');
      

      if(strpos($legacy_url, 'News') !== false){
			  $img = $html->find('.article img', 0)->src;
      }elseif(strpos($legacy_url, 'Blog') !== false){
        $img = $html->find('.blogimage img', 0)->src;
      }
			$img_url = 'https://lawv.net'.$img;
      if($img != ''){
 			$the_img = '<img src="'.$img_url.'"/>';
      }else{
        $the_img="";
      }

      print_r($img_url);

 			foreach($html->find('.blogimage') as $e)
 				$e->outertext = '';
      foreach($html->find('.article img') as $e)
        $e->outertext = '';

      $is_url = strpos($legacy_url, 'Blog');
 			$text = addslashes($html->find('.listcontent',0));
 			//$date = date('Y-m-d H:i:s', $date);
      $time = strtotime($date);
      $date = date('Y-m-d H:i:s', $time);

 			//$script = $html->find('script');
 			//$script->outertext = '';
      //if($img != ''){
 			//upload_image($img_url, $p_id);
 			//}
 			// foreach($html->find('div.blogimage') as $e)
 			// 	$e->outertext = '';
 			$body = $text.$the_img;

 			//update_post_meta($p_id, 'post_content',  $legacy_url);
 			$array = ( [
                        "ID"         => $p_id,
                        "post_content" => $body,
                        'post_status' => 'publish',
                        "post_date" => $date,
                        //'post_date_gmt' => get_gmt_from_date( $date )
                        //"post_thumbnail" => $img,
                ] );   

               wp_update_post( $array );

 			//echo $text;
 			//$body = '';
 			//$body = json_encode($text);

          //$hosp_id = get_field('hospital',$p_id);
 
          //Add all of the listing 'parts' to an array
          $a = [
              //"id" => $the_id,
              //"name" => $title,
              //"slug"=> $slug,
              //"description" => $text,
              //"legacy" => $legacy_url,
              //'date' => $date,
              //'time' => $time,
              'image' => $img_url,
              //'is_blog' => $is_url
              // "active" => $is_active,
              // "active_slug" => $is_active_slug,
              // "partners" => $part,
              // "partners_slug" => $part_slug,
              // "sdh" => $social_det,
              // "sdh_slug" => $social_det_slug,
              // "primary_sdh" => $primary_sdh_name,
              // "primary_sdh_slug" => $primary_sdh_slug,
              // "target_pop" => $target_pop,
              // "target_pop_slug" => $target_pop_slug,
              // "program_setting" => $settings,
              // "program_setting_slug" => $settings_slug,
              // "contact_email" => $contact_email,
              // "hosp_id" => $hosp_id
 
          ];
 
            $arr[$the_id] = $a;

        }

        //Reset the query in-between loops
        wp_reset_query();

        // JSON-encode the response
        $json = json_encode($arr, JSON_PRETTY_PRINT);
 
         
        //Write to our file
        $myfile = fopen(''.$directory.'', "w") or die("Unable to open file!");
        fwrite($myfile, $json);
        fclose($myfile);  
 
        
    }
}

//add_action('save_post', 'update_blog_posts', 10, 3);

//-------------------------------

function upload_image($url, $post_id) {

include_once( ABSPATH . 'wp-admin/includes/admin.php' );
    $image = "";
    if($url != "") {
     
        $file = array();
        $file['name'] = $url;
        $file['tmp_name'] = download_url($url);
 
        if (is_wp_error($file['tmp_name'])) {
            @unlink($file['tmp_name']);
            var_dump( $file['tmp_name']->get_error_messages( ) );
        } else {
            $attachmentId = media_handle_sideload($file, $post_id);
             
            if ( is_wp_error($attachmentId) ) {
                @unlink($file['tmp_name']);
                var_dump( $attachmentId->get_error_messages( ) );
            } else {                
                $image = wp_get_attachment_url( $attachmentId );
            }
        }
    }
    return $image;
}
?>
