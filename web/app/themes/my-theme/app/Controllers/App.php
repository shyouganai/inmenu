<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public static function getTerms()
    {
        return get_terms([
            "taxonomy" => ["kitchen"],
            "hide_empty" => true,
        ]);
    }

    public static function getPlaces()
    {
        $post_query = [
            "post_type" => "place",
        ];
        if (isset($_GET["category"])) {
            $post_query["tax_query"] = [
                "taxonomy" => "category",
                "field" => "term_id",
                "terms" => $_GET["category"]
            ];
        }
        return get_posts($post_query);
    }

    public static function getFormatedKitchens($post_id)
    {
        $kitchens = wp_get_post_terms($post_id, ["kitchen"]);
        $result = [];
        foreach($kitchens as $k) {
            $result[] = $k->name;
        }
        return implode(" • ", $result);
    }

    public function latestProducts()
    {
        global $wpdb;

    }

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }
}
