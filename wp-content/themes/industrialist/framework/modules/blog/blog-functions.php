<?php
if (!function_exists('industrialist_mikado_get_blog')) {
    /**
     * Function which return holder for all blog lists
     *
     * @return holder.php template
     */
    function industrialist_mikado_get_blog($type) {

        $sidebar = industrialist_mikado_sidebar_layout();

        $params = array(
            "blog_type" => $type,
            "sidebar" => $sidebar
        );
        industrialist_mikado_get_module_template_part('templates/lists/holder', 'blog', '', $params);
    }

}

if (!function_exists('industrialist_mikado_get_blog_type')) {

    /**
     * Function which create query for blog lists
     *
     * @return blog list template
     */

    function industrialist_mikado_get_blog_type($type) {

        $blog_query = industrialist_mikado_get_blog_query();

        $paged = industrialist_mikado_paged();

        if (industrialist_mikado_options()->getOptionValue('blog_page_range') != "") {
            $blog_page_range = esc_attr(industrialist_mikado_options()->getOptionValue('blog_page_range'));
        } else {
            $blog_page_range = $blog_query->max_num_pages;
        }

        $blog_classes = industrialist_mikado_get_blog_holder_classes($type);
        $blog_data_params = industrialist_mikado_set_blog_holder_data_params($type);
        $blog_params = industrialist_mikado_get_post_global_options($type);

        $params = array(
            'blog_query' => $blog_query,
            'paged' => $paged,
            'blog_page_range' => $blog_page_range,
            'blog_type' => $type,
            'blog_classes' => $blog_classes,
            'blog_data_params' => $blog_data_params,
            'blog_params' => $blog_params,
        );

        industrialist_mikado_get_module_template_part('templates/lists/' . $type, 'blog', '', $params);
    }

}

if (!function_exists('industrialist_mikado_get_blog_holder_classes')) {
    /**
     * Function set blog holder class
     *
     * return string
     */

    function industrialist_mikado_get_blog_holder_classes($type) {


        $show_load_more = industrialist_mikado_enable_load_more();

        $blog_classes = array(
            'mkd-blog-holder'
        );

        if ($show_load_more) {
            $blog_classes[] = 'mkd-blog-load-more';
        }

        $date_position_class = industrialist_mikado_get_meta_field_intersect('blog_list_standard_date_position') == 'yes' ? 'mkd-date-outside' : '';

        switch ($type) {

            case 'standard':
                $blog_classes[] = 'mkd-blog-type-standard';
                $blog_classes[] = $date_position_class;
                break;

            case 'standard-whole-post':
                $blog_classes[] = 'mkd-blog-type-standard';
                $blog_classes[] = $date_position_class;
                break;

            case 'masonry':
                $blog_classes[] = 'mkd-blog-type-masonry';
                break;

            case 'masonry-full-width':
                $blog_classes[] = 'mkd-blog-type-masonry mkd-masonry-full-width';
                break;

            default:
                $blog_classes[] = 'mkd-blog-type-standard';
                break;
        }

        if ($type == 'masonry' || $type == 'masonry-full-width') {

            $masonry_columns = industrialist_mikado_get_meta_field_intersect('blog_list_masonry_column');

            switch ($masonry_columns) {
                case 'five':
                    $blog_classes[] = 'mkd-post-columns-5';
                    break;
                case 'four':
                    $blog_classes[] = 'mkd-post-columns-4';
                    break;
                case 'three':
                    $blog_classes[] = 'mkd-post-columns-3';
                    break;
                case 'two':
                    $blog_classes[] = 'mkd-post-columns-2';
                    break;
            }

        }

        return implode(' ', $blog_classes);
    }

}

if (!function_exists('industrialist_mikado_get_blog_query')) {
    /**
     * Function which create query for blog lists
     *
     * @return wp query object
     */
    function industrialist_mikado_get_blog_query() {
        global $wp_query;

        $id = industrialist_mikado_get_page_id();
        $category = esc_attr(get_post_meta($id, "mkd_blog_category_meta", true));
        if (esc_attr(get_post_meta($id, "mkd_show_posts_per_page_meta", true)) != "") {
            $post_number = esc_attr(get_post_meta($id, "mkd_show_posts_per_page_meta", true));
        } else {
            $post_number = esc_attr(get_option('posts_per_page'));
        }

        $paged = industrialist_mikado_paged();
        $query_array = array(
            'post_type' => 'post',
            'paged' => $paged,
            'cat' => $category,
            'posts_per_page' => $post_number
        );
        if (is_archive()) {
            $blog_query = $wp_query;
        } else {
            $blog_query = new WP_Query($query_array);
        }
        return $blog_query;

    }
}


if (!function_exists('industrialist_mikado_get_post_format_html')) {

    /**
     * Function which return html for post formats
     * @param string $type
     * @param array $params is list of global parameters
     * @param string $ajax
     * @return post format template
     */

    function industrialist_mikado_get_post_format_html($type = "", $params = array(), $ajax = '') {

        $post_format = get_post_format();

        $supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');

        if (in_array($post_format, $supported_post_formats)) {
            $post_format = $post_format;
        } else {
            $post_format = 'standard';
        }

        industrialist_mikado_get_post_specific_post_format($params, $post_format);

        $background_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
        $params['background_image_style'] = 'background-image: url(' . esc_url($background_image[0]) . ')';

        $slug = '';
        if ($type !== "") {
            $slug = $type;
        }

        if ($ajax == '') {
            industrialist_mikado_get_module_template_part('templates/lists/post-formats/' . $post_format, 'blog', $slug, $params);
        }
        if ($ajax == 'yes') {
            return industrialist_mikado_get_blog_module_template_part('templates/lists/post-formats/' . $post_format, $slug, $params);
        }


    }

}

if (!function_exists('industrialist_mikado_get_post_global_options')) {
    /**
     * Function which return array of global options for specific blog template type
     *
     * @param string $type is type of blog template
     * @return string
     */

    function industrialist_mikado_get_post_global_options($type = "") {

        $params = array();

        //use same post format templates as masonry gallery in grid template
        if ($type === 'masonry-full-width') {
            $type = 'masonry';
        }
        if ($type === 'standard-whole-post') {
            $type = 'standard';
        }

        $prefix = 'blog_list_' . str_replace('-', '_', $type);

        $params['excerpt_length'] = industrialist_mikado_blog_lists_number_of_chars($type);

        $display_category = 'yes';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_category') !== '') {
            $display_category = industrialist_mikado_options()->getOptionValue($prefix . '_category');
        }
        $params['display_category'] = $display_category;

        $display_date = 'yes';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_date') !== '') {
            $display_date = industrialist_mikado_options()->getOptionValue($prefix . '_date');
        }
        $params['display_date'] = $display_date;

        $display_author = 'no';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_author') !== '') {
            $display_author = industrialist_mikado_options()->getOptionValue($prefix . '_author');
        }
        $params['display_author'] = $display_author;

        $display_comments = 'yes';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_comment') !== '') {
            $display_comments = industrialist_mikado_options()->getOptionValue($prefix . '_comment');
        }
        $params['display_comments'] = $display_comments;

        $display_like = 'no';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_like') !== '') {
            $display_like = industrialist_mikado_options()->getOptionValue($prefix . '_like');
        }
        $params['display_like'] = $display_like;

        $display_share = 'no';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_share') !== '') {
            $display_share = industrialist_mikado_options()->getOptionValue($prefix . '_share');
        }
        $params['display_share'] = $display_share;

        $display_read_more = 'yes';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_read_more') !== '') {
            $display_read_more = industrialist_mikado_options()->getOptionValue($prefix . '_read_more');
        }
        $params['display_read_more'] = $display_read_more;

        $display_separator = 'yes';
        if (industrialist_mikado_options()->getOptionValue($prefix . '_separator') !== '') {
            $display_separator = industrialist_mikado_options()->getOptionValue($prefix . '_separator');
        }
        $params['display_separator'] = $display_separator;

        $params['blog_type'] = $type;

        industrialist_mikado_get_post_specific_type_options($params, $type); // get default values for specific blog template

        return $params;

    }

}

if (!function_exists('industrialist_mikado_get_post_specific_post_format')) {
    /**
     * Function which return array of specific options for specific post format or empty array
     *
     * @param array $params is array of parameters
     * @param string $post_format is post format
     * @return string
     */

    function industrialist_mikado_get_post_specific_post_format(&$params, $post_format = "") {

        switch ($post_format) {
            case 'standard':
                break;
            case 'audio':
                break;
            case 'video':
                break;
            case 'link':
                $params['link_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $params['background_image_class'] = $params['link_image'] == "" ? 'mkd-article-without-image' : '';
                break;
            case 'quote':
                $params['quote_text'] = '';
                $params['quote_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $params['background_image_class'] = $params['quote_image'] == "" ? 'mkd-article-without-image' : '';

                $quote_text = get_post_meta(get_the_ID(), 'mkd_post_quote_text_meta', true);
                if ($quote_text && $quote_text !== '') {
                    $params['quote_text'] = $quote_text;
                }
                break;
            case 'gallery':
                break;
            default:
        }

        // no return


    }

}
if (!function_exists('industrialist_mikado_get_post_specific_type_options')) {
    /**
     * Function which return array of specific options for specific blog template type or empty array
     *
     * @param string $type is blog template
     * @return string
     */

    function industrialist_mikado_get_post_specific_type_options(&$params, $type = "") {

        if ($type === 'standard' || $type === 'standard-full-width') {
            $params['date_outside'] = industrialist_mikado_get_meta_field_intersect('blog_list_standard_date_position');
        }

        if ($type === 'masonry' || $type === 'masonry-full-width') {
            $params['date_outside'] = '';
        }

        return $params;
    }

}


if (!function_exists('industrialist_mikado_get_default_blog_list')) {
    /**
     * Function which return default blog list for archive post types
     *
     * @return post format template
     */

    function industrialist_mikado_get_default_blog_list() {

        $blog_list = industrialist_mikado_options()->getOptionValue('blog_list_type');
        return $blog_list;

    }

}


if (!function_exists('industrialist_mikado_pagination')) {

    /**
     * Function which return pagination
     *
     * @return blog list pagination html
     */

    function industrialist_mikado_pagination($pages = '', $range = 4, $paged = 1) {

        $showitems = $range + 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }

        $show_load_more = industrialist_mikado_enable_load_more();

        $search_template = 'no';
        if (is_search()) {
            $search_template = 'yes';
        }


        if ($pages != 1) {
            if ($show_load_more == 'yes' && $search_template !== 'yes') {

                echo industrialist_mikado_get_load_more_button_html();

            } else {

                echo '
        <div class="mkd-pagination">';
                echo '
            <ul>';
                if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
                    echo '
                <li class="mkd-pagination-first-page">
                    <a itemprop="url" href="' . esc_url(get_pagenum_link(1)) . '"><span class="arrow_carrot-left"></span></a>
                </li>
                ';
                }
                echo "
                <li class='mkd-pagination-prev";
                if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
                    echo " mkd-pagination prev-first";
                }
                echo "'>
                    <a itemprop='url' href='" . esc_url(get_pagenum_link($paged - 1)) . "'><span class='arrow_carrot-left'></span></a>
                </li>
                ";

                for ($i = 1; $i <= $pages; $i++) {
                    if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                        echo ($paged == $i) ? "
                <li class='active'><span>" . $i . "</span></li>
                " : "
                <li><a itemprop='url' href='" . get_pagenum_link($i) . "' class='inactive'>" . $i . "</a></li>
                ";
                    }
                }

                echo '
                <li class="mkd-pagination-next';
                if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
                    echo ' mkd-pagination-next-last';
                }
                echo '"><a itemprop="url" href="';
                if ($pages > $paged) {
                    echo esc_url(get_pagenum_link($paged + 1));
                } else {
                    echo esc_url(get_pagenum_link($paged));
                }
                echo '"><span class="arrow_carrot-right"></span></a></li>
                ';
                if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
                    echo '
                <li class="mkd-pagination-last-page">
                    <a itemprop="url" href="' . esc_url(get_pagenum_link($pages)) . '"><span class="arrow_carrot-right"></span></a>
                </li>
                ';
                }
                echo '
            </ul>
            ';
                echo "
        </div>";
            }
        }
    }
}

if (!function_exists('industrialist_mikado_date_position')) {
    /*
    * function that determines whether to show post info data and where
    * @params $display_date yes/no, from global settings for blog standard list
    * @params $position yes/no, from local settings on page standard blog list template
    * @return bool
    */
    function industrialist_mikado_date_position($display_date, $date_outside = '', $position = '', $blog_type = '') {
        // if display date is set
        if ($display_date) {

            // if blog type is standard
            if ($blog_type == 'standard') {
                if ($date_outside == 'yes' && $position == 'outside') {
                    return 'yes';
                }
                if ($date_outside == 'yes' && $position == 'inside') {
                    return 'no';
                }
                if ($date_outside == 'no' && $position == 'outside') {
                    return 'no';
                }
                if ($date_outside == 'no' && $position == 'inside') {
                    return 'yes';
                }
            }
            // if blog type is masonry
            if ($blog_type == 'masonry') {
                if ($position == 'outside') {
                    return 'no';
                }
                if ($position == 'inside') {
                    return 'yes';
                }
            }
        }
    }
}

if (!function_exists('industrialist_mikado_post_info')) {
    /**
     * Function that loads parts of blog post info section
     * Possible options are:
     * 1. date
     * 2. category
     * 3. author
     * 4. comments
     * 5. like
     * 6. share
     *
     * @param $config array of sections to load
     */
    function industrialist_mikado_post_info($config) {
        $default_config = array(
            'date' => '',
            'category' => '',
            'author' => '',
            'like' => '',
            'comments' => '',
            'share' => ''
        );

        extract(shortcode_atts($default_config, $config));

        if ($date == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-info-date', 'blog');
        }
        if ($category == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-info-category', 'blog');
        }
        if ($author == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-info-author', 'blog');
        }
        if ($like == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-info-like', 'blog');
        }
        if ($comments == 'yes' && comments_open()) {
            industrialist_mikado_get_module_template_part('templates/parts/post-info-comments', 'blog');
        }
        if ($share == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-info-share', 'blog');
        }

    }
}

if (!function_exists('industrialist_mikado_post_date')) {
    /**
     * Function that loads part of blog post date when positioned outside
     * @param $config array of sections to load
     */
    function industrialist_mikado_post_date($config) {
        if ($config['date'] == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-info-date-outside', 'blog');
        }
    }
}


if (!function_exists('industrialist_mikado_get_blog_single_separator')) {

    /**
     * @param $config array of params
     */
    function industrialist_mikado_get_blog_single_separator($config) {
        $default_config = array(
            'separator' => '',
        );

        extract(shortcode_atts($default_config, $config));

        if ($separator == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-separator', 'blog');
        }
    }
}

if (!function_exists('industrialist_mikado_get_blog_list_separator')) {

    /**
     * @param $config array of params
     */
    function industrialist_mikado_get_blog_list_separator($config) {
        $default_config = array(
            'separator' => '',
        );

        extract(shortcode_atts($default_config, $config));

        if ($separator == 'yes') {
            industrialist_mikado_get_module_template_part('templates/parts/post-separator', 'blog');
        }
    }
}

if (!function_exists('industrialist_mikado_excerpt')) {
    /**
     * Function that cuts post excerpt to the number of word based on previosly set global
     * variable $word_count, which is defined in mkd_set_blog_word_count function.
     *
     * It current post has read more tag set it will return content of the post, else it will return post excerpt
     *
     */
    function industrialist_mikado_excerpt($excerpt_length = '') {
        global $post;

        if (post_password_required()) {
            echo get_the_password_form();
        } //does current post has read more tag set?
        elseif (industrialist_mikado_post_has_read_more()) {
            global $more;

            //override global $more variable so this can be used in blog templates
            $more = 0;
            the_content(true);
        } //is word count set to something different that 0?
        elseif ($excerpt_length != '0') {
            //if word count is set and different than empty take that value, else that general option from theme options
            $word_count = '45';
            if (isset($excerpt_length) && $excerpt_length != "") {
                $word_count = $excerpt_length;

            } elseif (industrialist_mikado_options()->getOptionValue('number_of_chars') != '') {
                $word_count = esc_attr(industrialist_mikado_options()->getOptionValue('number_of_chars'));
            }
            //if post excerpt field is filled take that as post excerpt, else that content of the post
            $post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

            //remove leading dots if those exists
            $clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

            //if clean excerpt has text left
            if ($clean_excerpt !== '') {
                //explode current excerpt to words
                $excerpt_word_array = explode(' ', $clean_excerpt);

                //cut down that array based on the number of the words option
                $excerpt_word_array = array_slice($excerpt_word_array, 0, $word_count);

                //add exerpt postfix
                $excert_postfix = apply_filters('industrialist_mikado_excerpt_postfix', '...');

                //and finally implode words together
                $excerpt = implode(' ', $excerpt_word_array) . $excert_postfix;

                //is excerpt different than empty string?
                if ($excerpt !== '') {
                    echo '<p itemprop="description" class="mkd-post-excerpt">' . wp_kses_post($excerpt) . '</p>';
                }
            }
        }
    }
}

if (!function_exists('industrialist_mikado_get_blog_single')) {

    /**
     * Function which return holder for single posts
     *
     * @return single holder.php template
     */

    function industrialist_mikado_get_blog_single() {
        $sidebar = industrialist_mikado_sidebar_layout();

        $params = array(
            "sidebar" => $sidebar
        );

        industrialist_mikado_get_module_template_part('templates/single/holder', 'blog', '', $params);
    }
}

if (!function_exists('industrialist_mikado_get_single_html')) {

    /**
     * Function return all parts on single.php page
     *
     *
     * @return single.php html
     */

    function industrialist_mikado_get_single_html() {

        $post_format = get_post_format();
        $supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
        if (in_array($post_format, $supported_post_formats)) {
            $post_format = $post_format;
        } else {
            $post_format = 'standard';
        }

        //Related posts
        $related_posts_params = array();
        $show_related = (industrialist_mikado_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
        if ($show_related) {
            $hasSidebar = industrialist_mikado_sidebar_layout();
            $post_id = get_the_ID();

            $related_posts_image_size = (industrialist_mikado_options()->getOptionValue('blog_single_related_image_size'));

            $related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? 4 : 3;
            $related_posts_options = array(
                'posts_per_page' => $related_post_number
            );
            $related_posts_params = array(
                'related_posts' => industrialist_mikado_get_related_post_type($post_id, $related_posts_options),
                'related_posts_columns' => 'mkd-related-posts-columns-' . $related_post_number,
                'related_posts_image_size' => $related_posts_image_size !== '' ? intval($related_posts_image_size) : ''
            );
        }

        //

        $params = array();
        switch ($post_format) {
            case 'standard':
                break;
            case 'audio':
                break;
            case 'video':
                break;
            case 'link':
                $params['link_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                break;
            case 'quote':
                $params['quote_text'] = '';
                $params['quote_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');

                $quote_text = get_post_meta(get_the_ID(), 'mkd_post_quote_text_meta', true);
                if ($quote_text && $quote_text !== '') {
                    $params['quote_text'] = $quote_text;
                }
                break;
            case 'gallery':
                break;
            default:
        }

        industrialist_mikado_get_single_global_options($params, $post_format);

        industrialist_mikado_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params);
        industrialist_mikado_get_module_template_part('templates/single/parts/author-info', 'blog');
        industrialist_mikado_get_module_template_part('templates/single/parts/single-navigation', 'blog');

        if ($show_related) {
            industrialist_mikado_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
        }
        if (industrialist_mikado_show_comments()) {
            comments_template('', true);
        }
    }

}

if (!function_exists('industrialist_mikado_get_single_global_options')) {

    /**
     * Function which return parts on single.php which are just below content
     *
     * @param $params array of params for single post
     * @param $post_format string is format of single post
     */

    function industrialist_mikado_get_single_global_options(&$params, $post_format) {

        $display_category = 'yes';
        if (industrialist_mikado_options()->getOptionValue('blog_single_category') !== '') {
            $display_category = industrialist_mikado_options()->getOptionValue('blog_single_category');
        }

        $display_date = 'yes';
        if (industrialist_mikado_options()->getOptionValue('blog_single_date') !== '') {
            $display_date = industrialist_mikado_options()->getOptionValue('blog_single_date');
        }

        $display_author = 'yes';
        if (industrialist_mikado_options()->getOptionValue('blog_single_author') !== '') {
            $display_author = industrialist_mikado_options()->getOptionValue('blog_single_author');
        }

        $display_comments = industrialist_mikado_show_comments() ? 'yes' : 'no';

        $display_like = 'no';
        if (industrialist_mikado_options()->getOptionValue('blog_single_like') !== '') {
            $display_like = industrialist_mikado_options()->getOptionValue('blog_single_like');
        }

        $display_share = 'no';
        if (industrialist_mikado_options()->getOptionValue('blog_single_share') !== '') {
            $display_share = industrialist_mikado_options()->getOptionValue('blog_single_share');
        }

        $display_separator = 'yes';
        if (industrialist_mikado_options()->getOptionValue('blog_single_separator') !== '') {
            $display_separator = industrialist_mikado_options()->getOptionValue('blog_single_separator');
        }

        $params['display_category'] = $display_category;
        $params['display_date'] = $display_date;
        $params['display_author'] = $display_author;
        $params['display_comments'] = $display_comments;
        $params['display_like'] = $display_like;
        $params['display_share'] = $display_share;
        $params['display_separator'] = $display_separator;
        $params['post_type'] = $post_format;

    }
}

if (!function_exists('industrialist_mikado_additional_post_items')) {

    /**
     * Function which return parts on single.php which are just below content
     *
     * @return single.php html
     */

    function industrialist_mikado_additional_post_items() {

        if (has_tag() && industrialist_mikado_options()->getOptionValue('blog_single_tags') == 'yes') {
            industrialist_mikado_get_module_template_part('templates/single/parts/tags', 'blog');
        }

    }

    add_action('industrialist_mikado_before_blog_article_closed_tag', 'industrialist_mikado_additional_post_items');
}


if (!function_exists('industrialist_mikado_comment')) {

    /**
     * Function which modify default wordpress comments
     *
     * @return comments html
     */

    function industrialist_mikado_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment;

        global $post;

        $is_pingback_comment = $comment->comment_type == 'pingback';
        $is_author_comment = $post->post_author == $comment->user_id;

        $comment_class = 'mkd-comment clearfix';

        if ($is_author_comment) {
            $comment_class .= ' mkd-post-author-comment';
        }

        if ($is_pingback_comment) {
            $comment_class .= ' mkd-pingback-comment';
        }

        ?>

        <li>
        <div class="<?php echo esc_attr($comment_class); ?>">
            <?php if (!$is_pingback_comment) { ?>
                <div class="mkd-comment-image"> <?php echo industrialist_mikado_kses_img(get_avatar($comment, 77)); ?> </div>
            <?php } ?>
            <div class="mkd-comment-text">
                <h5 class="mkd-comment-name">
                    <?php
                    if ($is_pingback_comment) {
                        esc_html_e('Pingback:', 'industrialist');
                    }
                    echo wp_kses_post(get_comment_author_link());
                    if ($is_author_comment) { ?>
                        <i class="fa fa-user post-author-comment-icon"></i>
                    <?php } ?>
                </h5>
                <div class="mkd-comment-date"><?php comment_time(get_option('date_format')); ?> <?php esc_html_e('at', 'industrialist'); ?> <?php comment_time(get_option('time_format')); ?></div>
                <?php if (!$is_pingback_comment) { ?>
                    <div class="mkd-text-holder" id="comment-<?php comment_ID(); ?>">
                        <?php comment_text(); ?>
                    </div>
                    <div class="mkd-comment-info clearfix">
                        <?php
                        comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                        edit_comment_link();
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php //li tag will be closed by WordPress after looping through child elements
    }
}

if (!function_exists('industrialist_mikado_blog_archive_pages_classes')) {

    /**
     * Function which create classes for container in archive pages
     *
     * @return array
     */

    function industrialist_mikado_blog_archive_pages_classes($blog_type) {

        $classes = array();
        if (in_array($blog_type, industrialist_mikado_blog_full_width_types())) {
            $classes['holder'] = 'mkd-full-width';
            $classes['inner'] = 'mkd-full-width-inner';
        } elseif (in_array($blog_type, industrialist_mikado_blog_grid_types())) {
            $classes['holder'] = 'mkd-container';
            $classes['inner'] = 'mkd-container-inner clearfix';
        }

        return $classes;

    }

}

if (!function_exists('industrialist_mikado_blog_full_width_types')) {

    /**
     * Function which return all full width blog types
     *
     * @return array
     */

    function industrialist_mikado_blog_full_width_types() {

        $types = array('masonry-full-width');

        return $types;

    }

}

if (!function_exists('industrialist_mikado_blog_grid_types')) {

    /**
     * Function which return in grid blog types
     *
     * @return array
     */

    function industrialist_mikado_blog_grid_types() {

        $types = array('standard', 'masonry', 'standard-whole-post');

        return $types;

    }

}

if (!function_exists('industrialist_mikado_blog_types')) {

    /**
     * Function which return all blog types
     *
     * @return array
     */

    function industrialist_mikado_blog_types() {

        $types = array_merge(industrialist_mikado_blog_grid_types(), industrialist_mikado_blog_full_width_types());

        return $types;

    }

}

if (!function_exists('industrialist_mikado_blog_templates')) {

    /**
     * Function which return all blog templates names
     *
     * @return array
     */

    function industrialist_mikado_blog_templates() {

        $templates = array();
        $grid_templates = industrialist_mikado_blog_grid_types();
        $full_templates = industrialist_mikado_blog_full_width_types();
        foreach ($grid_templates as $grid_template) {
            array_push($templates, 'blog-' . $grid_template);
        }
        foreach ($full_templates as $full_template) {
            array_push($templates, 'blog-' . $full_template);
        }

        return $templates;

    }

}

if (!function_exists('industrialist_mikado_blog_lists_number_of_chars')) {

    /**
     * Function that return number of characters for different lists based on options
     *
     * @param $type is type of blog template
     * @return int
     */

    function industrialist_mikado_blog_lists_number_of_chars($type) {

        $number_of_chars = industrialist_mikado_options()->getOptionValue('blog_list_' . $type . '_number_of_chars');

        if ($number_of_chars) {
            return $number_of_chars;
        } else
            return '';


    }

}

if (!function_exists('industrialist_mikado_excerpt_length')) {
    /**
     * Function that changes excerpt length based on theme options
     * @param $length int original value
     * @return int changed value
     */
    function industrialist_mikado_excerpt_length($length) {

        if (industrialist_mikado_options()->getOptionValue('number_of_chars') !== '') {
            return esc_attr(industrialist_mikado_options()->getOptionValue('number_of_chars'));
        } else {
            return 45;
        }
    }

    add_filter('excerpt_length', 'industrialist_mikado_excerpt_length', 999);
}

if (!function_exists('industrialist_mikado_excerpt_more')) {
    /**
     * Function that adds three dotes on the end excerpt
     * @param $more
     * @return string
     */
    function industrialist_mikado_excerpt_more($more) {
        return '...';
    }

    add_filter('excerpt_more', 'industrialist_mikado_excerpt_more');
}

if (!function_exists('industrialist_mikado_post_has_read_more')) {
    /**
     * Function that checks if current post has read more tag set
     * @return int position of read more tag text. It will return false if read more tag isn't set
     */
    function industrialist_mikado_post_has_read_more() {
        global $post;

        return strpos($post->post_content, '<!--more-->');
    }
}

if (!function_exists('industrialist_mikado_post_has_title')) {
    /**
     * Function that checks if current post has title or not
     * @return bool
     */
    function industrialist_mikado_post_has_title() {
        return get_the_title() !== '';
    }
}

if (!function_exists('industrialist_mikado_modify_read_more_link')) {
    /**
     * Function that modifies read more link output.
     * Hooks to the_content_more_link
     * @return string modified output
     */
    function industrialist_mikado_modify_read_more_link() {
        $link = '<div class="mkd-more-link-container">';
        $link .= industrialist_mikado_get_button_html(array(
            'link' => get_permalink() . '#more-' . get_the_ID(),
            'type' => 'transparent',
            'size' => 'small',
            'text' => esc_html__('Continue reading', 'industrialist'),
            'font_weight' => '700'
        ));

        $link .= '</div>';

        return $link;
    }

    add_filter('the_content_more_link', 'industrialist_mikado_modify_read_more_link');
}


if (!function_exists('industrialist_mikado_has_blog_widget')) {
    /**
     * Function that checks if latest posts widget is added to widget area
     * @return bool
     */
    function industrialist_mikado_has_blog_widget() {
        $widgets_array = array(
            'mkd_latest_posts_widget'
        );

        foreach ($widgets_array as $widget) {
            $active_widget = is_active_widget(false, false, $widget);

            if ($active_widget) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('industrialist_mikado_has_blog_shortcode')) {
    /**
     * Function that checks if any of blog shortcodes exists on a page
     * @return bool
     */
    function industrialist_mikado_has_blog_shortcode() {
        $blog_shortcodes = array(
            'mkd_blog_list',
            'mkd_blog_slider',
            'mkd_blog_carousel'
        );

        $slider_field = get_post_meta(industrialist_mikado_get_page_id(), 'mkd_page_slider_meta', true); //TODO change

        foreach ($blog_shortcodes as $blog_shortcode) {
            $has_shortcode = industrialist_mikado_has_shortcode($blog_shortcode) || industrialist_mikado_has_shortcode($blog_shortcode, $slider_field);

            if ($has_shortcode) {
                return true;
            }
        }

        return false;
    }
}


if (!function_exists('industrialist_mikado_load_blog_assets')) {
    /**
     * Function that checks if blog assets should be loaded
     *
     * @see industrialist_mikado_is_ajax_enabled()
     * @see industrialist_mikado_is_ajax_enabled_is_blog_template()
     * @see is_home()
     * @see is_single()
     * @see mkd_has_blog_shortcode()
     * @see is_archive()
     * @see is_search()
     * @see mkd_has_blog_widget()
     * @return bool
     */
    function industrialist_mikado_load_blog_assets() {
        return industrialist_mikado_is_ajax_enabled() || industrialist_mikado_is_blog_template() || is_home() || is_single() || industrialist_mikado_has_blog_shortcode() || is_archive() || is_search() || industrialist_mikado_has_blog_widget();
    }
}

if (!function_exists('industrialist_mikado_is_blog_template')) {
    /**
     * Checks if current template page is blog template page.
     *
     * @param string current page. Optional parameter.
     *
     * @return bool
     *
     * @see industrialist_mikado_get_page_template_name()
     */
    function industrialist_mikado_is_blog_template($current_page = '') {

        if ($current_page == '') {
            $current_page = industrialist_mikado_get_page_template_name();
        }

        $blog_templates = industrialist_mikado_blog_templates();

        return in_array($current_page, $blog_templates);
    }
}

if (!function_exists('industrialist_mikado_read_more_button')) {
    /**
     * Function that outputs read more button html if necessary.
     * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
     * and if post isn't password protected
     *
     * @param string $option name of option to check
     * @param string $class additional class to add to button
     *
     */
    function industrialist_mikado_read_more_button($option = '', $class = '') {
        if ($option != '') {
            $show_read_more_button = industrialist_mikado_options()->getOptionValue($option) == 'yes';
        } else {
            $show_read_more_button = 'yes';
        }
        if ($show_read_more_button && !industrialist_mikado_post_has_read_more() && !post_password_required()) {
            echo '<div class="mkd-read-more-holder">';
            echo industrialist_mikado_get_button_html(array(
                'type' => 'minimal',
                'size' => 'small',
                'icon_pack' => 'font_elegant',
                'fe_icon' => 'arrow_carrot-right',
                'link' => get_the_permalink(),
                'text' => esc_html__('Read More', 'industrialist'),
                'font_weight' => 700,
                'custom_class' => $class,
                'hover_color' => '#fdc94b',
            ));
            echo '</div>';
        }
    }
}

if (!function_exists('industrialist_mikado_set_blog_holder_data_params')) {
    /**
     * Function which set data params on blog holder div
     */
    function industrialist_mikado_set_blog_holder_data_params($type) {

        $show_load_more = industrialist_mikado_enable_load_more();
        if ($show_load_more) {
            $current_query = industrialist_mikado_get_blog_query();

            $data_params = array();
            $data_return_string = '';

            $data_params['data-blog-type'] = $type;

            $paged = industrialist_mikado_paged();

            if (get_post_meta(get_the_ID(), "mkd_show_posts_per_page_meta", true) != "") {
                $posts_number = get_post_meta(get_the_ID(), "mkd_show_posts_per_page_meta", true);
            } else {
                $posts_number = get_option('posts_per_page');
            }

            //set data params
            $data_params['data-next-page'] = $paged + 1;
            $data_params['data-max-pages'] = $current_query->max_num_pages;

            if ($posts_number != '') {
                $data_params['data-post-number'] = $posts_number;
            }

            if ($category != '') {
                $data_params['data-category'] = $category;
            }

            if (is_archive()) {
                if (is_category()) {
                    $cat_id = get_queried_object_id();
                    $data_params['data-archive-category'] = $cat_id;
                }
                if (is_author()) {
                    $author_id = get_queried_object_id();
                    $data_params['data-archive-author'] = $author_id;
                }
                if (is_tag()) {
                    $current_tag_id = get_queried_object_id();
                    $data_params['data-archive-tag'] = $current_tag_id;
                }
                if (is_date()) {
                    $day = get_query_var('day');
                    $month = get_query_var('monthnum');
                    $year = get_query_var('year');

                    $data_params['data-archive-day'] = $day;
                    $data_params['data-archive-month'] = $month;
                    $data_params['data-archive-year'] = $year;
                }
            }
            if (is_search()) {
                $search_query = get_search_query();
                $data_params['data-archive-search-string'] = $search_query; // to do, not finished
            }

            foreach ($data_params as $key => $value) {
                if ($key !== '') {
                    $data_return_string .= $key . '= ' . esc_attr($value) . ' ';
                }
            }

            return $data_return_string;

        }
    }
}

if (!function_exists('industrialist_mikado_enable_load_more')) {
    /**
     * Function that check if load more is enabled
     *
     * return boolean
     */
    function industrialist_mikado_enable_load_more() {
        $enable_load_more = false;

        if (industrialist_mikado_options()->getOptionValue('pagination') == 'yes') {

            if (industrialist_mikado_options()->getOptionValue('pagination_type') == 'load_more_pagination') {

                $enable_load_more = true;

            }

        }

        return $enable_load_more;
    }
}
if (!function_exists('industrialist_mikado_is_masonry_template')) {
    /**
     * Check if is masonry template enabled
     * return boolean
     */
    function industrialist_mikado_is_masonry_template() {

        $page_id = industrialist_mikado_get_page_id();
        $page_template = get_page_template_slug($page_id);
        $page_options_template = industrialist_mikado_options()->getOptionValue('blog_list_type');

        if (!is_archive()) {
            if ($page_template == 'blog-masonry.php' || $page_template == 'blog-masonry-full-width.php') {
                return true;
            }
        } elseif (is_archive() || is_home()) {
            if ($page_options_template == 'masonry' || $page_options_template == 'masonry-full-width') {
                return true;
            }
        } else {
            return false;
        }
    }


}

if (!function_exists('industrialist_mikado_set_ajax_url')) {
    /**
     * load themes ajax functionality
     *
     */
    function industrialist_mikado_set_ajax_url() {
        echo '<script type="application/javascript">var MikadoAjaxUrl = "' . admin_url('admin-ajax.php') . '"</script>';
    }

    add_action('wp_enqueue_scripts', 'industrialist_mikado_set_ajax_url');

}

/**
 * Loads more function for blog posts.
 *
 */
if (!function_exists('industrialist_mikado_blog_load_more')) {

    function industrialist_mikado_blog_load_more() {

        $return_obj = array();
        $paged = $post_number = $category = $blog_type = '';
        $archive_category = $archive_author = $archive_tag = $archive_day = $archive_month = $archive_year = '';

        if (isset($_POST['nextPage'])) {
            $paged = $_POST['nextPage'];
        }
        if (isset($_POST['number'])) {
            $post_number = $_POST['number'];
        }
        if (isset($_POST['category'])) {
            $category = $_POST['category'];
        }
        if (isset($_POST['blogType'])) {
            $blog_type = $_POST['blogType'];
        }
        if (isset($_POST['archiveCategory'])) {
            $archive_category = $_POST['archiveCategory'];
        }
        if (isset($_POST['archiveAuthor'])) {
            $archive_author = $_POST['archiveAuthor'];
        }
        if (isset($_POST['archiveTag'])) {
            $archive_tag = $_POST['archiveTag'];
        }
        if (isset($_POST['archiveDay'])) {
            $archive_day = $_POST['archiveDay'];
        }
        if (isset($_POST['archiveMonth'])) {
            $archive_month = $_POST['archiveMonth'];
        }
        if (isset($_POST['archiveYear'])) {
            $archive_year = $_POST['archiveYear'];
        }


        $html = '';
        $query_array = array(
            'post_type' => 'post',
            'paged' => $paged,
            'posts_per_page' => $post_number
        );

        if ($category != '') {
            $query_array['cat'] = $category;
        }
        if ($archive_category != '') {
            $query_array['cat'] = $archive_category;
        }
        if ($archive_author != '') {
            $query_array['author'] = $archive_author;
        }
        if ($archive_tag != '') {
            $query_array['tag'] = $archive_tag;
        }
        if ($archive_day != '' && $archive_month != '' && $archive_year != '') {
            $query_array['day'] = $archive_day;
            $query_array['monthnum'] = $archive_month;
            $query_array['year'] = $archive_year;
        }
        $query_results = new \WP_Query($query_array);

        $blog_params = industrialist_mikado_get_post_global_options($blog_type);

        if ($query_results->have_posts()):
            while ($query_results->have_posts()) : $query_results->the_post();
                $html .= industrialist_mikado_get_post_format_html($blog_type, $blog_params, 'yes');
            endwhile;
        else:
            $html .= '<p>' . esc_html__('Sorry, no posts matched your criteria.', 'industrialist') . '</p>';
        endif;

        $return_obj = array(
            'html' => $html,
        );

        echo json_encode($return_obj);
        exit;
    }
}


add_action('wp_ajax_nopriv_industrialist_mikado_blog_load_more', 'industrialist_mikado_blog_load_more');
add_action('wp_ajax_industrialist_mikado_blog_load_more', 'industrialist_mikado_blog_load_more');

if (!function_exists('industrialist_mikado_get_max_number_of_pages')) {
    /**
     * Function that return max number of posts/pages for pagination
     * @return int
     *
     * @version 0.1
     */
    function industrialist_mikado_get_max_number_of_pages() {
        global $wp_query;

        $max_number_of_pages = 10; //default value

        if ($wp_query) {
            $max_number_of_pages = $wp_query->max_num_pages;
        }

        return $max_number_of_pages;
    }
}

if (!function_exists('industrialist_mikado_get_blog_page_range')) {
    /**
     * Function that return current page for blog list pagination
     * @return int
     *
     * @version 0.1
     */
    function industrialist_mikado_get_blog_page_range() {
        global $wp_query;

        if (industrialist_mikado_options()->getOptionValue('blog_page_range') != "") {
            $blog_page_range = esc_attr(industrialist_mikado_options()->getOptionValue('blog_page_range'));
        } else {
            $blog_page_range = $wp_query->max_num_pages;
        }

        return $blog_page_range;
    }
}

if (!function_exists('industrialist_mikado_comment_form_submit_button')) {

    function industrialist_mikado_comment_form_submit_button($submit_button) {

        if (industrialist_mikado_core_installed()) {
            $submit_button = industrialist_mikado_get_button_html(array(
                'html_type' => 'button',
                'type' => 'solid',
                'custom_class' => 'submit',
                'text' => esc_html__('Submit', 'industrialist'),
                'custom_attrs' => array(
                    'id' => 'submit_comment'
                )
            ));
        }
        else {
            $submit_button = '<input class="mkd-btn mkd-btn-medium mkd-btn-solid submit" name="submit" value="' . esc_html__('Submit', 'industrialist') . '" type="submit">';
        }


        return $submit_button;
    }

    add_filter('comment_form_submit_button', 'industrialist_mikado_comment_form_submit_button');

}
if (!function_exists('industrialist_mikado_get_load_more_button_html')) {

    function industrialist_mikado_get_load_more_button_html() {
        $button_params = array(
            'type' => 'solid',
            'text' => esc_html__('Load More', 'industrialist'),
            'link' => '#',
        );
        $button_html = '<div class= "mkd-load-more-ajax-pagination">';
        $button_html .= industrialist_mikado_get_button_html($button_params);
        $button_html .= '</div>';
        return $button_html;

    }

}