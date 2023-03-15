<?php
// Handles db query for people info


// retrieve and parse person info in post and post_meta into array
function muii_getPersonInfo($id){
    $post = get_post($id);
    $term = wp_get_post_terms( $id, 'person_type', array( 'fields' => 'names' ) )[0];
    if ($term == 'Student'){
        $person = array(
            'name' => $post->post_title,
            'bio' => $post->post_content,
            'type' => $term,
            'email' => get_post_meta($id, 'student_email', true),
            'advisor' => get_post_meta($id, 'student_advisor', true),
            'concentration' => get_post_meta($id, 'student_concentration', true),
            'focus' => get_post_meta($id, 'student_focus', true),
            'education' => get_post_meta($id, 'student_education', true),
        );
    } else {
        $person = array(
            'name' => $post->post_title,
            'bio' => $post->post_content,
            'type' => $term,
            'rank' => get_post_meta($id, 'person_rank', true),
            'title' => get_post_meta($id, 'person_title', true),
            'email' => get_post_meta($id, 'person_email', true),
            'address' => get_post_meta($id, 'person_address', true),
            'phone' => get_post_meta($id, 'person_phone', true),
            'url' => get_post_meta($id, 'person_url', true),
            'department' => get_post_meta($id, 'person_department', true),
            'concentration' => get_post_meta($id, 'person_concentration', true),
            'education' => get_post_meta($id, 'person_education', true),
            'suffix' => get_post_meta($id, 'person_suffix', true),
            'display_order' => get_post_meta($id, 'person_display_order', true)
        );
    }
    return $person;
}

// retrieve person's post id by various criteria
function muii_getPeopleID($category, $number = -1) {
    $person = array();
    $id = array();
    $args = array(
        'post_type' => 'person',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'person_type',
                'field' => 'name',
                'terms' => $category,
                )
            ),
        'numberposts' => $number
    );
    $posts = get_posts($args); 
    if ($category == 'Administration' || $category == 'Curriculum Committee' || $category == 'Graduate Program Committee') {        // adding manual sorting order for admins
        foreach ($posts as $post) {
            $person[] = array(
                'id' => $post->ID, 
                'display_order' => get_post_meta($post->ID, 'person_display_order', true));
        }
    } else {
        foreach ($posts as $post) {
            $temp = explode(' ', $post->post_title);
            $person[] = array(
                'id' => $post->ID, 
                'sname' => array_pop($temp));
                
            //$test = array_pop(explode(' ', $post->post_title));
            //$person[$test] = $post->ID;
            //print_r($test);
            //echo $test . "<br>";
        }
    }
    // added manual order sorting for admins
    if ($category == 'Administration' || $category == 'Curriculum Committee' || $category == 'Graduate Program Committee') {
        $person = array_sorting($person, 'display_order', SORT_ASC);
        foreach ($person as $item) {
            $id[] = $item['id'];
        }
    } else {
        // added sorting with surname
        $person = array_sorting($person, 'sname', SORT_ASC);
        foreach ($person as $item) {
            $id[] = $item['id'];
        }
    }
    
    return $id;
}
/* old function that uses metakey to locate people
function muii_getPeopleID($criteria = 'type', $value, $number = -1) {
    $person = array();
    $id = array();
    $args = array(
        'post_type' => 'person',
        'post_status' => 'publish',
        'meta_key' => 'person_' . $criteria,
        'meta_value' => $value,
        'numberposts' => $number
    );
    $posts = get_posts($args);
    foreach ($posts as $post) {
        $person[] = array(
            'id' => $post->ID, 
            'sname' => array_pop(explode(' ', $post->post_title)));
            
        //$test = array_pop(explode(' ', $post->post_title));
        //$person[$test] = $post->ID;
        //print_r($test);
        //echo $test . "<br>";
    }
    // added sorting with surname
    $person = array_sorting($person, 'sname', SORT_ASC);
    foreach ($person as $item) {
        $id[] = $item['id'];
    }
    return $id;
}
*/



function muii_showpeople($person_type){
    $args = array(
      'numberposts' => -1,
      'post_type'   => 'person'
    );

    $people = get_posts( $args );
    
    foreach ( $people as $person ) {
        if ( get_post_meta($person->ID, 'person_type', true) == $person_type){
            echo apply_filters( 'the_title', $person->post_title ) . "<br>";
            /*
            $metavalue = get_post_meta($person->ID, 'person_email', true);
            if (! empty($metavalue)) {
                echo $metavalue;
            }
            else {
                echo "No MEAT";
            }*/
        }
    }
}
     

function muii_getEventInfo($id){
    $post = get_post($id);
    $event = array(
        'presenter' => get_post_meta($id, 'event_presenter', true),
        'date' => get_post_meta($id, 'event_date', true),
        'stime' => get_post_meta($id, 'event_stime', true),
        'ftime' => get_post_meta($id, 'event_ftime', true),
        'location' => get_post_meta($id, 'event_location', true),
    );
    return $event;
}


function muii_getGrantInfo($id){
    $post = get_post($id);
    $grant = array(
        'faculty' => get_post_meta($id, 'grant_faculty', true),
        'role' => get_post_meta($id, 'grant_role', true),
        'agency' => get_post_meta($id, 'grant_agency', true),
        'amount' => get_post_meta($id, 'grant_amount', true),
        'sdate' => get_post_meta($id, 'grant_start_date', true),
        'edate' => get_post_meta($id, 'grant_end_date', true)
    );
    return $grant;
} 


// array sorting according to a specific key
function array_sorting($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}