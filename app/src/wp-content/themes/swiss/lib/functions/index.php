<?php namespace Evermade\Swiss;

/**
 * a simple function to help dry out views of checking array indexes and object properties
 * @param  [type] $key   [description]
 * @param  array  $array [description]
 * @return [type]        [description]
 */
function getFrom($key=null, $array=array(), $default=null)
{

    // if we have an object
    if (is_object($array) && isset($array->{$key})) {
        return $array->{$key};
    }

    // else we have an array
    if (is_array($array) && isset($array[$key])) {
        return $array[$key];
    }

    return $default;
}

/**
 * a little function to return html from a template, whilst you pass in data as a reference, for example partials
 * @param  [type] $name  [template name]
 * @param  [type] &$data [data pass in by reference to template]
 * @return [type]        [html]
 */
function template($name = null, $data=null, $dir='templates')
{
    if (!file_exists((get_template_directory().'/'.$dir.'/'.$name))) {
        return null;
    }

    ob_start();
    include(get_template_directory().'/'.$dir.'/'.$name);
    $html = ob_get_contents();
    ob_end_clean();

    return $html;
}

function getImageSizes($size = '')
{
    global $_wp_additional_image_sizes;

    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();

    // Create the full array with sizes and crop info
    foreach ($get_intermediate_image_sizes as $_size) {
        if (in_array($_size, array( 'thumbnail', 'medium', 'large' ))) {
            $sizes[ $_size ]['width'] = get_option($_size . '_size_w');
            $sizes[ $_size ]['height'] = get_option($_size . '_size_h');
            $sizes[ $_size ]['crop'] = (bool) get_option($_size . '_crop');
        } elseif (isset($_wp_additional_image_sizes[ $_size ])) {
            $sizes[ $_size ] = array(
                                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
                        );
        }
    }

    // Get only 1 size if found
    if ($size) {
        if (isset($sizes[ $size ])) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }

    return $sizes;
}

function defaultImg($size='thumbnail', $text='img')
{
    $sizes = \Evermade\Swiss\getImageSizes();

    if (isset($sizes[$size])) {
        return sprintf(get_template_directory_uri().'/assets/img/oodi-default-image-ala.jpg', $sizes[$size]['width'], $sizes[$size]['height'], $text);
    }

    return sprintf(get_template_directory_uri().'/assets/img/oodi-default-image-ala.jpg', 800, 600, $text);
}

function featuredImageUrl($size='medium-large', $post=null)
{

    //if we have no post then lets bring in the global post
    if (empty($post)) {
        global $post;
    }

    //if we still dont have a post, lets bail out
    if (empty($post)) {
        return null;
    }

    $img = \wp_get_attachment_image_src(get_post_thumbnail_id($post), $size)[0];

    if (empty($img)) {
        $img = \Evermade\Swiss\defaultImg($size, 'img');
    }

    return $img;
}

function isDev()
{
    return (getenv('APP_ENV') == 'production')? false : true;
}

function debug($msg=null, $style='php')
{
    if (\Evermade\Swiss\isDev()) {
        if ($style == 'php') {
            echo "<pre>";
            print_r($msg);
            echo "</pre>";
        }

        if ($style == 'js') {
            echo "<script>console.log(".json_encode($msg).");</script>";
        }

        return true;
    }
    return false;
}

/**
 * a generic sprintf for handling both arrays and single strings for quick if templating
 * @param  string $str   [description]
 * @param  [type] $input [description]
 * @return [type]        [description]
 */
function sprint($str='', $input)
{

    //if an array
    if (is_array($input) && !empty($input)) {
        $broken = false;
        $data = array();

        foreach ($input as $field) {
            if (!empty($field)) {
                $data[] = $field;
            } else {
                $broken = true;
                break;
            }
        }

        if (!empty($data) && !$broken) {
            return vsprintf($str, $data);
        }
    } elseif (!empty($input)) {
        //else just a single sprint
        return sprintf($str, $input);
    }

    return null;
}

/**
 * [excerpt description]
 * @param  [type]  $str   [description]
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
function excerpt($str, $limit = 255)
{
    $strlen = strlen($str);
    return ($strlen>=$limit) ? substr($str, 0, $limit)."&hellip;" : $str;
}

/**
 * Same as `excerpt/2` but cuts sentences in word boundaries (white space) rather
 * than on the exact character limit. Can be more useful for natural text.
 * @param  [type]  $str   [description]
 * @param  integer $limit [description]
 * @return [type]         [description]
 */
function excerptWordBoundary($str, $limit = 255)
{
    $line=$str;
    if (preg_match('/^.{1,'.$limit.'}\b/s', $str, $match)) {
        $line = $match[0];
        return $line.'&hellip;';
    }
    return $str;
}

function sharePage($template_file='')
{
    $html = null;
    $template = ($template_file !== '') ? $template_file : get_template_directory().'/templates/_share-page.php';

    if (is_readable($template)) {
        $services = array(
            'facebook'=> array(
                'url'=>'',
                'icon' => 'fab fa-facebook-f'
            ),
            'twitter'=> array(
                'url'=>'',
                'icon' => 'fab fa-twitter'
            ),/*
            'linkedin'=> array(
                'url'=>'',
                'icon' => 'fab fa-linkedin-in'
            ),
            'google'=> array(
                'url'=>'',
                'icon' => 'fab fa-google'
            ),
            'email'=> array(
                'url'=>'',
                'icon' => 'fa fa-envelope'
            )*/
        );

        foreach ($services as $key => $value) {
            $services[$key]['url'] = \Evermade\Swiss\shareLink($key);
        }

        ob_start();
        include($template);
        $html = ob_get_contents();
        ob_clean();
    }

    return $html;
}

/**
 * Create a share-link to different social media platforms.
 * @param  string $type  [description]
 * @param  string $url   [description]
 * @param  string $title [description]
 * @return string        [description]
 */
function shareLink($type='facebook', $url=null, $title='')
{
    $data = array();
    $urls = array(
        'facebook'  => 'http://www.facebook.com/sharer/sharer.php?u=%s',
        'twitter'   => 'http://twitter.com/share?url=%s&text=%s',
        'google'    => 'https://plus.google.com/share?url=%s',
        'linkedin'  => 'https://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s&summary=%s&source=%s',
        'email'     => 'mailto:?subject=%s&body=%s'
        );

    if (array_key_exists($type, $urls)) {
        $data['url'] = (empty($url))? \Evermade\Swiss\currentPageUrl() : $url;

        if ($type=='twitter') {
            $data['title'] = (empty($title))? get_the_title() : $title;
        }

        if ($type=='email') {
            $data['body'] = (empty($title))? get_the_title() : $title;

            array_unshift($data, $data['body']);
        }

        if ($type=='linkedin') {
            $data['title'] = (empty($title))? get_the_title() : $title;
            $data['summary'] = get_the_excerpt();
            $data['source'] = get_bloginfo('name');
        }

        return vsprintf($urls[$type], $data);
    }

    return null;
}

/**
 * Returns the fully qualified URL for a request.
 * @return string The request URL, including the protocol and query parameters.
 */
function currentPageUrl()
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    $pageURL .= $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

    return $pageURL;
}


/**
 * This function outputs languages activated with the WPML plugin with the currently
 * active language as the first one. We also wrap the non-active language(s) as link(s)
 * to the corresponding language(s).
 *
 * Sorry for the ugly output, copy&pasted this from an old project :).
 */
function wpmlLanguageSwitcher()
{
    // Only run if WPML is installed and active
    if (function_exists('icl_get_languages')) {
        // Get languages from WPML
        $languages = icl_get_languages('skip_missing=0&order=asc&orderby=name');

        // Create a temporary array and hold its first position
        $temp[0] = '';
        foreach ($languages as $l) {
            if ($l['active'] == '1') { // If language is active..
                $temp[0] = $l;
            } // ..place active as first
            else {
                array_push($temp, $l);
            } // other languages follow (in order specified in icl_get_languages() above)
        }

        // set original to temp, then remove temp
        $languages = $temp;
        unset($temp);

        $output = '';

        // Loop through languages and output them, as well as the links
        if (!empty($languages)) :
            $output .= '<div class="c-language-switcher">';

            foreach ($languages as $l) :
                if (!empty($l['url']) && !$l['active']) {
                    $output .= '<a class="c-language-switcher__item" href="'.$l['url'].'" lang="'.$l['language_code'].'" aria-label="'.__('Change language to: ', 'swiss').$l['native_name'].'">';
                }
                if (!empty($l['language_code']) && !$l['active']) {
                    $output .= ucfirst(icl_disp_language($l['native_name']));
                }
                if (!isset($l['active'])) {
                    $output .= '</a>';
                }
                if (!empty($l['active']) && $l['active']) {
                    $output .= '</span>';
                }
            endforeach;

            $output .= '</div>';
        endif;

        return $output;
    }
}


/**
 * Compare two dates. Return their difference in days if $referenceDate has not
 * yet passed current date. Returns null if $referenceDate is in the past.
 *
 * @param  DateTime $referenceDate   DateTime to compare current DateTime to.
 * @return int|null                  Number of days resulting from the diff, or null.
 */
function dateCounter($referenceDate)
{
    $referenceDateTime = new \DateTime($referenceDate);
    $nowDateTime = new \DateTime(date('Y-m-d'));
    $interval = $nowDateTime->diff($referenceDateTime);
    $days = (int)$interval->format('%R%a days');

    if ($days > 0) {
        return $days;
    }

    return null;
}
