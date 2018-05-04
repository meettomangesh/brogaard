-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2018 at 06:14 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.1.16-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brogaard`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_commentmeta`
--

INSERT INTO `wp_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES
(1, 2, 'akismet_result', 'false'),
(2, 2, 'akismet_history', ''),
(3, 2, 'rating', '4'),
(4, 2, 'verified', '1'),
(5, 2, 'akismet_history', '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2018-04-30 06:38:28', '2018-04-30 06:38:28', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href="https://gravatar.com">Gravatar</a>.', 0, '1', '', '', 0, 0),
(2, 75, 'Mike Jolley', 'mike.jolley@automattic.com', '', '199.66.65.27', '2018-01-11 10:33:43', '2018-01-11 15:33:43', 'It\'s so great to hear some new music from Woo! I couldn\'t bring myself to give it five stars though because... I WANT THE WHOLE ALBUM!', 0, '1', '', '', 0, 0),
(3, 92, 'WooCommerce', '', '', '', '2018-05-02 07:11:34', '2018-05-02 07:11:34', 'Awaiting BACS payment Order status changed from Pending payment to On hold.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(4, 93, 'WooCommerce', '', '', '', '2018-05-02 11:33:01', '2018-05-02 11:33:01', 'Unpaid order cancelled - time limit reached. Order status changed from Pending payment to Cancelled.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(5, 94, 'WooCommerce', '', '', '', '2018-05-03 07:21:50', '2018-05-03 07:21:50', 'Payment pending (unilateral). Order status changed from Pending payment to On hold.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(6, 95, 'WooCommerce', '', '', '', '2018-05-03 10:06:15', '2018-05-03 10:06:15', 'Awaiting BACS payment Order status changed from Pending payment to On hold.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(7, 96, 'WooCommerce', '', '', '', '2018-05-03 10:10:21', '2018-05-03 10:10:21', 'Payment pending (unilateral). Order status changed from Pending payment to On hold.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(8, 97, 'WooCommerce', '', '', '', '2018-05-03 10:44:40', '2018-05-03 10:44:40', 'Payment pending (unilateral). Order status changed from Pending payment to On hold.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(9, 98, 'WooCommerce', '', '', '', '2018-05-03 12:28:15', '2018-05-03 12:28:15', 'Paypal Credit Card Payment Failed with message: \'You do not have permissions to make this API call\'', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(10, 98, 'WooCommerce', '', '', '', '2018-05-03 12:38:51', '2018-05-03 12:38:51', 'Paypal Credit Card Payment Failed with message: \'The merchant country is not supported.\'', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(11, 99, 'WooCommerce', '', '', '', '2018-05-03 13:00:54', '2018-05-03 13:00:54', 'Payment pending (unilateral). Order status changed from Pending payment to On hold.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(12, 100, 'WooCommerce', '', '', '', '2018-05-04 10:12:14', '2018-05-04 10:12:14', 'Payment pending (unilateral). Order status changed from Pending payment to On hold.', 0, 'post-trashed', 'WooCommerce', 'order_note', 0, 0),
(13, 101, 'WooCommerce', '', '', '', '2018-05-04 10:30:34', '2018-05-04 10:30:34', 'Order status changed from Pending payment to Processing.', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(14, 102, 'WooCommerce', '', '', '', '2018-05-04 10:34:33', '2018-05-04 10:34:33', 'Order status changed from Pending payment to Processing.', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(15, 103, 'WooCommerce', '', '', '', '2018-05-04 10:39:43', '2018-05-04 10:39:43', 'Order status changed from Pending payment to Processing.', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(16, 101, 'webmaster', 'meettomangesh@gmail.com', '', '', '2018-05-04 10:40:23', '2018-05-04 10:40:23', 'Order details manually sent to customer.', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(17, 103, 'WooCommerce', '', '', '', '2018-05-04 11:05:49', '2018-05-04 11:05:49', 'PayPal refund completed; transaction ID = 8TU47657D4611494N', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(18, 103, 'WooCommerce', '', '', '', '2018-05-04 11:05:50', '2018-05-04 11:05:50', 'Order status changed from Processing to Refunded.', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(19, 107, 'WooCommerce', '', '', '', '2018-05-04 12:22:10', '2018-05-04 12:22:10', 'Order status changed from Pending payment to Processing.', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(20, 106, 'webmaster', 'meettomangesh@gmail.com', '', '', '2018-05-04 12:22:34', '2018-05-04 12:22:34', 'Order details manually sent to customer.', 0, '1', 'WooCommerce', 'order_note', 0, 0),
(21, 101, 'webmaster', 'meettomangesh@gmail.com', '', '', '2018-05-04 12:31:02', '2018-05-04 12:31:02', 'Order status changed from Processing to Completed.', 0, '1', 'WooCommerce', 'order_note', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/brogaard', 'yes'),
(2, 'home', 'http://localhost/brogaard', 'yes'),
(3, 'blogname', 'brogaard', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'meettomangesh@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:155:{s:24:"^wc-auth/v([1]{1})/(.*)?";s:63:"index.php?wc-auth-version=$matches[1]&wc-auth-route=$matches[2]";s:22:"^wc-api/v([1-3]{1})/?$";s:51:"index.php?wc-api-version=$matches[1]&wc-api-route=/";s:24:"^wc-api/v([1-3]{1})(.*)?";s:61:"index.php?wc-api-version=$matches[1]&wc-api-route=$matches[2]";s:47:"(([^/]+/)*wishlist)(/(.*))?/page/([0-9]{1,})/?$";s:76:"index.php?pagename=$matches[1]&wishlist-action=$matches[4]&paged=$matches[5]";s:30:"(([^/]+/)*wishlist)(/(.*))?/?$";s:58:"index.php?pagename=$matches[1]&wishlist-action=$matches[4]";s:7:"shop/?$";s:27:"index.php?post_type=product";s:37:"shop/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?post_type=product&feed=$matches[1]";s:32:"shop/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?post_type=product&feed=$matches[1]";s:24:"shop/page/([0-9]{1,})/?$";s:45:"index.php?post_type=product&paged=$matches[1]";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:32:"category/(.+?)/wc-api(/(.*))?/?$";s:54:"index.php?category_name=$matches[1]&wc-api=$matches[3]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:29:"tag/([^/]+)/wc-api(/(.*))?/?$";s:44:"index.php?tag=$matches[1]&wc-api=$matches[3]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:55:"product-category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_cat=$matches[1]&feed=$matches[2]";s:50:"product-category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_cat=$matches[1]&feed=$matches[2]";s:31:"product-category/(.+?)/embed/?$";s:44:"index.php?product_cat=$matches[1]&embed=true";s:43:"product-category/(.+?)/page/?([0-9]{1,})/?$";s:51:"index.php?product_cat=$matches[1]&paged=$matches[2]";s:25:"product-category/(.+?)/?$";s:33:"index.php?product_cat=$matches[1]";s:52:"product-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_tag=$matches[1]&feed=$matches[2]";s:47:"product-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_tag=$matches[1]&feed=$matches[2]";s:28:"product-tag/([^/]+)/embed/?$";s:44:"index.php?product_tag=$matches[1]&embed=true";s:40:"product-tag/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?product_tag=$matches[1]&paged=$matches[2]";s:22:"product-tag/([^/]+)/?$";s:33:"index.php?product_tag=$matches[1]";s:35:"product/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"product/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"product/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"product/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"product/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"product/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"product/([^/]+)/embed/?$";s:40:"index.php?product=$matches[1]&embed=true";s:28:"product/([^/]+)/trackback/?$";s:34:"index.php?product=$matches[1]&tb=1";s:48:"product/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?product=$matches[1]&feed=$matches[2]";s:43:"product/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?product=$matches[1]&feed=$matches[2]";s:36:"product/([^/]+)/page/?([0-9]{1,})/?$";s:47:"index.php?product=$matches[1]&paged=$matches[2]";s:43:"product/([^/]+)/comment-page-([0-9]{1,})/?$";s:47:"index.php?product=$matches[1]&cpage=$matches[2]";s:33:"product/([^/]+)/wc-api(/(.*))?/?$";s:48:"index.php?product=$matches[1]&wc-api=$matches[3]";s:39:"product/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:50:"product/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:32:"product/([^/]+)(?:/([0-9]+))?/?$";s:46:"index.php?product=$matches[1]&page=$matches[2]";s:24:"product/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:34:"product/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:54:"product/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"product/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"product/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:30:"product/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:17:"wc-api(/(.*))?/?$";s:29:"index.php?&wc-api=$matches[2]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:26:"comments/wc-api(/(.*))?/?$";s:29:"index.php?&wc-api=$matches[2]";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:29:"search/(.+)/wc-api(/(.*))?/?$";s:42:"index.php?s=$matches[1]&wc-api=$matches[3]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:32:"author/([^/]+)/wc-api(/(.*))?/?$";s:52:"index.php?author_name=$matches[1]&wc-api=$matches[3]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:54:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/wc-api(/(.*))?/?$";s:82:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&wc-api=$matches[5]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:41:"([0-9]{4})/([0-9]{1,2})/wc-api(/(.*))?/?$";s:66:"index.php?year=$matches[1]&monthnum=$matches[2]&wc-api=$matches[4]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:28:"([0-9]{4})/wc-api(/(.*))?/?$";s:45:"index.php?year=$matches[1]&wc-api=$matches[3]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:25:"(.?.+?)/wc-api(/(.*))?/?$";s:49:"index.php?pagename=$matches[1]&wc-api=$matches[3]";s:28:"(.?.+?)/order-pay(/(.*))?/?$";s:52:"index.php?pagename=$matches[1]&order-pay=$matches[3]";s:33:"(.?.+?)/order-received(/(.*))?/?$";s:57:"index.php?pagename=$matches[1]&order-received=$matches[3]";s:25:"(.?.+?)/orders(/(.*))?/?$";s:49:"index.php?pagename=$matches[1]&orders=$matches[3]";s:29:"(.?.+?)/view-order(/(.*))?/?$";s:53:"index.php?pagename=$matches[1]&view-order=$matches[3]";s:28:"(.?.+?)/downloads(/(.*))?/?$";s:52:"index.php?pagename=$matches[1]&downloads=$matches[3]";s:31:"(.?.+?)/edit-account(/(.*))?/?$";s:55:"index.php?pagename=$matches[1]&edit-account=$matches[3]";s:31:"(.?.+?)/edit-address(/(.*))?/?$";s:55:"index.php?pagename=$matches[1]&edit-address=$matches[3]";s:34:"(.?.+?)/payment-methods(/(.*))?/?$";s:58:"index.php?pagename=$matches[1]&payment-methods=$matches[3]";s:32:"(.?.+?)/lost-password(/(.*))?/?$";s:56:"index.php?pagename=$matches[1]&lost-password=$matches[3]";s:34:"(.?.+?)/customer-logout(/(.*))?/?$";s:58:"index.php?pagename=$matches[1]&customer-logout=$matches[3]";s:37:"(.?.+?)/add-payment-method(/(.*))?/?$";s:61:"index.php?pagename=$matches[1]&add-payment-method=$matches[3]";s:40:"(.?.+?)/delete-payment-method(/(.*))?/?$";s:64:"index.php?pagename=$matches[1]&delete-payment-method=$matches[3]";s:45:"(.?.+?)/set-default-payment-method(/(.*))?/?$";s:69:"index.php?pagename=$matches[1]&set-default-payment-method=$matches[3]";s:31:".?.+?/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:".?.+?/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"([^/]+)/embed/?$";s:37:"index.php?name=$matches[1]&embed=true";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:25:"([^/]+)/wc-api(/(.*))?/?$";s:45:"index.php?name=$matches[1]&wc-api=$matches[3]";s:31:"[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:"[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:24:"([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:22:"[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:7:{i:0;s:36:"contact-form-7/wp-contact-form-7.php";i:1;s:19:"jetpack/jetpack.php";i:2;s:91:"woocommerce-gateway-paypal-express-checkout/woocommerce-gateway-paypal-express-checkout.php";i:3;s:57:"woocommerce-paypal-pro-payment-gateway/woo-paypal-pro.php";i:4;s:27:"woocommerce/woocommerce.php";i:5;s:41:"wordpress-importer/wordpress-importer.php";i:6;s:34:"yith-woocommerce-wishlist/init.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'ecommerce-market', 'yes'),
(41, 'stylesheet', 'ecommerce-market', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(79, 'widget_text', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:1:{s:45:"woocommerce-services/woocommerce-services.php";a:2:{i:0;s:17:"WC_Connect_Loader";i:1;s:16:"plugin_uninstall";}}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'initial_db_version', '38590', 'yes'),
(92, 'wp_user_roles', 'a:7:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:114:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:18:"manage_woocommerce";b:1;s:24:"view_woocommerce_reports";b:1;s:12:"edit_product";b:1;s:12:"read_product";b:1;s:14:"delete_product";b:1;s:13:"edit_products";b:1;s:20:"edit_others_products";b:1;s:16:"publish_products";b:1;s:21:"read_private_products";b:1;s:15:"delete_products";b:1;s:23:"delete_private_products";b:1;s:25:"delete_published_products";b:1;s:22:"delete_others_products";b:1;s:21:"edit_private_products";b:1;s:23:"edit_published_products";b:1;s:20:"manage_product_terms";b:1;s:18:"edit_product_terms";b:1;s:20:"delete_product_terms";b:1;s:20:"assign_product_terms";b:1;s:15:"edit_shop_order";b:1;s:15:"read_shop_order";b:1;s:17:"delete_shop_order";b:1;s:16:"edit_shop_orders";b:1;s:23:"edit_others_shop_orders";b:1;s:19:"publish_shop_orders";b:1;s:24:"read_private_shop_orders";b:1;s:18:"delete_shop_orders";b:1;s:26:"delete_private_shop_orders";b:1;s:28:"delete_published_shop_orders";b:1;s:25:"delete_others_shop_orders";b:1;s:24:"edit_private_shop_orders";b:1;s:26:"edit_published_shop_orders";b:1;s:23:"manage_shop_order_terms";b:1;s:21:"edit_shop_order_terms";b:1;s:23:"delete_shop_order_terms";b:1;s:23:"assign_shop_order_terms";b:1;s:16:"edit_shop_coupon";b:1;s:16:"read_shop_coupon";b:1;s:18:"delete_shop_coupon";b:1;s:17:"edit_shop_coupons";b:1;s:24:"edit_others_shop_coupons";b:1;s:20:"publish_shop_coupons";b:1;s:25:"read_private_shop_coupons";b:1;s:19:"delete_shop_coupons";b:1;s:27:"delete_private_shop_coupons";b:1;s:29:"delete_published_shop_coupons";b:1;s:26:"delete_others_shop_coupons";b:1;s:25:"edit_private_shop_coupons";b:1;s:27:"edit_published_shop_coupons";b:1;s:24:"manage_shop_coupon_terms";b:1;s:22:"edit_shop_coupon_terms";b:1;s:24:"delete_shop_coupon_terms";b:1;s:24:"assign_shop_coupon_terms";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:8:"customer";a:2:{s:4:"name";s:8:"Customer";s:12:"capabilities";a:1:{s:4:"read";b:1;}}s:12:"shop_manager";a:2:{s:4:"name";s:12:"Shop manager";s:12:"capabilities";a:92:{s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:4:"read";b:1;s:18:"read_private_pages";b:1;s:18:"read_private_posts";b:1;s:10:"edit_users";b:1;s:10:"edit_posts";b:1;s:10:"edit_pages";b:1;s:20:"edit_published_posts";b:1;s:20:"edit_published_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"edit_private_posts";b:1;s:17:"edit_others_posts";b:1;s:17:"edit_others_pages";b:1;s:13:"publish_posts";b:1;s:13:"publish_pages";b:1;s:12:"delete_posts";b:1;s:12:"delete_pages";b:1;s:20:"delete_private_pages";b:1;s:20:"delete_private_posts";b:1;s:22:"delete_published_pages";b:1;s:22:"delete_published_posts";b:1;s:19:"delete_others_posts";b:1;s:19:"delete_others_pages";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:17:"moderate_comments";b:1;s:12:"upload_files";b:1;s:6:"export";b:1;s:6:"import";b:1;s:10:"list_users";b:1;s:18:"manage_woocommerce";b:1;s:24:"view_woocommerce_reports";b:1;s:12:"edit_product";b:1;s:12:"read_product";b:1;s:14:"delete_product";b:1;s:13:"edit_products";b:1;s:20:"edit_others_products";b:1;s:16:"publish_products";b:1;s:21:"read_private_products";b:1;s:15:"delete_products";b:1;s:23:"delete_private_products";b:1;s:25:"delete_published_products";b:1;s:22:"delete_others_products";b:1;s:21:"edit_private_products";b:1;s:23:"edit_published_products";b:1;s:20:"manage_product_terms";b:1;s:18:"edit_product_terms";b:1;s:20:"delete_product_terms";b:1;s:20:"assign_product_terms";b:1;s:15:"edit_shop_order";b:1;s:15:"read_shop_order";b:1;s:17:"delete_shop_order";b:1;s:16:"edit_shop_orders";b:1;s:23:"edit_others_shop_orders";b:1;s:19:"publish_shop_orders";b:1;s:24:"read_private_shop_orders";b:1;s:18:"delete_shop_orders";b:1;s:26:"delete_private_shop_orders";b:1;s:28:"delete_published_shop_orders";b:1;s:25:"delete_others_shop_orders";b:1;s:24:"edit_private_shop_orders";b:1;s:26:"edit_published_shop_orders";b:1;s:23:"manage_shop_order_terms";b:1;s:21:"edit_shop_order_terms";b:1;s:23:"delete_shop_order_terms";b:1;s:23:"assign_shop_order_terms";b:1;s:16:"edit_shop_coupon";b:1;s:16:"read_shop_coupon";b:1;s:18:"delete_shop_coupon";b:1;s:17:"edit_shop_coupons";b:1;s:24:"edit_others_shop_coupons";b:1;s:20:"publish_shop_coupons";b:1;s:25:"read_private_shop_coupons";b:1;s:19:"delete_shop_coupons";b:1;s:27:"delete_private_shop_coupons";b:1;s:29:"delete_published_shop_coupons";b:1;s:26:"delete_others_shop_coupons";b:1;s:25:"edit_private_shop_coupons";b:1;s:27:"edit_published_shop_coupons";b:1;s:24:"manage_shop_coupon_terms";b:1;s:22:"edit_shop_coupon_terms";b:1;s:24:"delete_shop_coupon_terms";b:1;s:24:"assign_shop_coupon_terms";b:1;}}}', 'yes'),
(93, 'fresh_site', '0', 'yes'),
(94, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 'sidebars_widgets', 'a:8:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:25:"home-page-section-sidebar";a:0:{}s:8:"footer-1";a:0:{}s:8:"footer-2";a:0:{}s:8:"footer-3";a:0:{}s:8:"footer-4";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(100, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(101, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(102, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(103, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(105, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(106, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(107, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(108, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(109, 'cron', 'a:9:{i:1525439198;a:1:{s:32:"woocommerce_cancel_unpaid_orders";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:2:{s:8:"schedule";b:0;s:4:"args";a:0:{}}}}i:1525440854;a:1:{s:20:"jetpack_clean_nonces";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}}i:1525456209;a:1:{s:28:"woocommerce_cleanup_sessions";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1525459109;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1525478400;a:1:{s:27:"woocommerce_scheduled_sales";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1525499409;a:1:{s:30:"woocommerce_tracker_send_event";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1525503110;a:2:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1528156800;a:1:{s:25:"woocommerce_geoip_updater";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:7:"monthly";s:4:"args";a:0:{}s:8:"interval";i:2635200;}}}s:7:"version";i:2;}', 'yes'),
(110, 'theme_mods_twentyseventeen', 'a:2:{s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1525071186;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}}}}', 'yes'),
(114, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.9.5.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.9.5.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.9.5-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.9.5-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.9.5";s:7:"version";s:5:"4.9.5";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.7";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1525416422;s:15:"version_checked";s:5:"4.9.5";s:12:"translations";a:0:{}}', 'no'),
(120, '_site_transient_timeout_browser_7d3bbe90e9c9cc2510c72ffd49db1a06', '1525675911', 'no'),
(121, '_site_transient_browser_7d3bbe90e9c9cc2510c72ffd49db1a06', 'a:10:{s:4:"name";s:6:"Chrome";s:7:"version";s:13:"66.0.3359.117";s:8:"platform";s:5:"Linux";s:10:"update_url";s:29:"https://www.google.com/chrome";s:7:"img_src";s:43:"http://s.w.org/images/browsers/chrome.png?1";s:11:"img_src_ssl";s:44:"https://s.w.org/images/browsers/chrome.png?1";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;s:6:"mobile";b:0;}', 'no'),
(123, 'can_compress_scripts', '0', 'no'),
(129, 'current_theme', 'eCommerce Market', 'yes'),
(130, 'theme_mods_ecommerce-market', 'a:4:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}s:18:"custom_css_post_id";i:-1;s:13:"theme_options";a:4:{s:14:"footer_address";s:55:"Refshalevej 169A, 1. DK- 1432 Cph. K Copenhagen Denmark";s:13:"footer_number";s:11:"09730872969";s:12:"footer_email";s:23:"meettomangesh@gmail.com";s:14:"copyright_text";s:22:"copyright@brogaard.com";}}', 'yes'),
(131, 'theme_switched', '', 'yes'),
(132, 'widget_ecommerce_market_latest_blog', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(133, 'widget_ecommerce_market_testimonial', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(134, 'widget_ecommerce-market', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(135, 'widget_ecommerce_market_recent_posts', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(140, 'recently_activated', 'a:3:{s:47:"one-click-demo-import/one-click-demo-import.php";i:1525430540;s:34:"yith-woocommerce-wishlist/init.php";i:1525240155;s:45:"woocommerce-services/woocommerce-services.php";i:1525240141;}', 'yes'),
(149, 'woocommerce_store_address', 'Refshalevej 169A, 1.', 'yes'),
(150, 'woocommerce_store_address_2', 'DK- 1432 Cph. K', 'yes'),
(151, 'woocommerce_store_city', 'Copenhagen', 'yes'),
(152, 'woocommerce_default_country', 'DK', 'yes'),
(153, 'woocommerce_store_postcode', '1432', 'yes'),
(154, 'woocommerce_allowed_countries', 'all', 'yes'),
(155, 'woocommerce_all_except_countries', '', 'yes'),
(156, 'woocommerce_specific_allowed_countries', '', 'yes'),
(157, 'woocommerce_ship_to_countries', '', 'yes'),
(158, 'woocommerce_specific_ship_to_countries', '', 'yes'),
(159, 'woocommerce_default_customer_address', 'geolocation', 'yes'),
(160, 'woocommerce_calc_taxes', 'no', 'yes'),
(161, 'woocommerce_currency', 'DKK', 'yes'),
(162, 'woocommerce_currency_pos', 'left', 'yes'),
(163, 'woocommerce_price_thousand_sep', ',', 'yes'),
(164, 'woocommerce_price_decimal_sep', '.', 'yes'),
(165, 'woocommerce_price_num_decimals', '2', 'yes'),
(166, 'woocommerce_shop_page_id', '5', 'yes'),
(167, 'woocommerce_cart_redirect_after_add', 'no', 'yes'),
(168, 'woocommerce_enable_ajax_add_to_cart', 'yes', 'yes'),
(169, 'woocommerce_weight_unit', 'kg', 'yes'),
(170, 'woocommerce_dimension_unit', 'cm', 'yes'),
(171, 'woocommerce_enable_reviews', 'yes', 'yes'),
(172, 'woocommerce_review_rating_verification_label', 'yes', 'no'),
(173, 'woocommerce_review_rating_verification_required', 'no', 'no'),
(174, 'woocommerce_enable_review_rating', 'yes', 'yes'),
(175, 'woocommerce_review_rating_required', 'yes', 'no'),
(176, 'woocommerce_manage_stock', 'yes', 'yes'),
(177, 'woocommerce_hold_stock_minutes', '60', 'no'),
(178, 'woocommerce_notify_low_stock', 'yes', 'no'),
(179, 'woocommerce_notify_no_stock', 'yes', 'no'),
(180, 'woocommerce_stock_email_recipient', 'meettomangesh@gmail.com', 'no'),
(181, 'woocommerce_notify_low_stock_amount', '2', 'no'),
(182, 'woocommerce_notify_no_stock_amount', '0', 'yes'),
(183, 'woocommerce_hide_out_of_stock_items', 'no', 'yes'),
(184, 'woocommerce_stock_format', '', 'yes'),
(185, 'woocommerce_file_download_method', 'force', 'no'),
(186, 'woocommerce_downloads_require_login', 'no', 'no'),
(187, 'woocommerce_downloads_grant_access_after_payment', 'yes', 'no'),
(188, 'woocommerce_prices_include_tax', 'no', 'yes'),
(189, 'woocommerce_tax_based_on', 'shipping', 'yes'),
(190, 'woocommerce_shipping_tax_class', 'inherit', 'yes'),
(191, 'woocommerce_tax_round_at_subtotal', 'no', 'yes'),
(192, 'woocommerce_tax_classes', 'Reduced rate\nZero rate', 'yes'),
(193, 'woocommerce_tax_display_shop', 'excl', 'yes'),
(194, 'woocommerce_tax_display_cart', 'excl', 'no'),
(195, 'woocommerce_price_display_suffix', '', 'yes'),
(196, 'woocommerce_tax_total_display', 'itemized', 'no'),
(197, 'woocommerce_enable_shipping_calc', 'yes', 'no'),
(198, 'woocommerce_shipping_cost_requires_address', 'no', 'no'),
(199, 'woocommerce_ship_to_destination', 'billing', 'no'),
(200, 'woocommerce_shipping_debug_mode', 'no', 'no'),
(201, 'woocommerce_enable_coupons', 'no', 'yes'),
(202, 'woocommerce_calc_discounts_sequentially', 'no', 'no'),
(203, 'woocommerce_enable_guest_checkout', 'yes', 'no'),
(204, 'woocommerce_force_ssl_checkout', 'no', 'yes'),
(205, 'woocommerce_unforce_ssl_checkout', 'no', 'yes'),
(206, 'woocommerce_cart_page_id', '6', 'yes'),
(207, 'woocommerce_checkout_page_id', '7', 'yes'),
(208, 'woocommerce_terms_page_id', '', 'no'),
(209, 'woocommerce_checkout_pay_endpoint', 'order-pay', 'yes'),
(210, 'woocommerce_checkout_order_received_endpoint', 'order-received', 'yes'),
(211, 'woocommerce_myaccount_add_payment_method_endpoint', 'add-payment-method', 'yes'),
(212, 'woocommerce_myaccount_delete_payment_method_endpoint', 'delete-payment-method', 'yes'),
(213, 'woocommerce_myaccount_set_default_payment_method_endpoint', 'set-default-payment-method', 'yes'),
(214, 'woocommerce_myaccount_page_id', '8', 'yes'),
(215, 'woocommerce_enable_signup_and_login_from_checkout', 'yes', 'no'),
(216, 'woocommerce_enable_myaccount_registration', 'no', 'no'),
(217, 'woocommerce_enable_checkout_login_reminder', 'yes', 'no'),
(218, 'woocommerce_registration_generate_username', 'yes', 'no'),
(219, 'woocommerce_registration_generate_password', 'no', 'no'),
(220, 'woocommerce_myaccount_orders_endpoint', 'orders', 'yes'),
(221, 'woocommerce_myaccount_view_order_endpoint', 'view-order', 'yes'),
(222, 'woocommerce_myaccount_downloads_endpoint', 'downloads', 'yes'),
(223, 'woocommerce_myaccount_edit_account_endpoint', 'edit-account', 'yes'),
(224, 'woocommerce_myaccount_edit_address_endpoint', 'edit-address', 'yes'),
(225, 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods', 'yes'),
(226, 'woocommerce_myaccount_lost_password_endpoint', 'lost-password', 'yes'),
(227, 'woocommerce_logout_endpoint', 'customer-logout', 'yes'),
(228, 'woocommerce_email_from_name', 'brogaard', 'no'),
(229, 'woocommerce_email_from_address', 'meettomangesh@gmail.com', 'no'),
(230, 'woocommerce_email_header_image', '', 'no'),
(231, 'woocommerce_email_footer_text', '{site_title}', 'no'),
(232, 'woocommerce_email_base_color', '#96588a', 'no'),
(233, 'woocommerce_email_background_color', '#f7f7f7', 'no'),
(234, 'woocommerce_email_body_background_color', '#ffffff', 'no'),
(235, 'woocommerce_email_text_color', '#3c3c3c', 'no'),
(236, 'woocommerce_api_enabled', 'yes', 'yes'),
(237, 'woocommerce_permalinks', 'a:5:{s:12:"product_base";s:8:"/product";s:13:"category_base";s:16:"product-category";s:8:"tag_base";s:11:"product-tag";s:14:"attribute_base";s:0:"";s:22:"use_verbose_page_rules";b:0;}', 'yes'),
(238, 'current_theme_supports_woocommerce', 'yes', 'yes'),
(239, 'woocommerce_queue_flush_rewrite_rules', 'no', 'yes'),
(242, 'default_product_cat', '15', 'yes'),
(247, 'woocommerce_admin_notices', 'a:1:{i:0;s:14:"template_files";}', 'yes'),
(248, '_transient_woocommerce_webhook_ids', 'a:0:{}', 'yes'),
(249, 'widget_woocommerce_widget_cart', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(250, 'widget_woocommerce_layered_nav_filters', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(251, 'widget_woocommerce_layered_nav', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(252, 'widget_woocommerce_price_filter', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(253, 'widget_woocommerce_product_categories', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(254, 'widget_woocommerce_product_search', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(255, 'widget_woocommerce_product_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(256, 'widget_woocommerce_products', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(257, 'widget_woocommerce_recently_viewed_products', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(258, 'widget_woocommerce_top_rated_products', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(259, 'widget_woocommerce_recent_reviews', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(260, 'widget_woocommerce_rating_filter', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(261, 'widget_ecommerce_market_categories_collection', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(262, 'widget_ecommerce_marke_product_carousel', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(263, 'widget_ecommerce_market_featured_product', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(266, 'woocommerce_meta_box_errors', 'a:0:{}', 'yes'),
(268, 'woocommerce_product_type', 'both', 'yes'),
(269, 'woocommerce_allow_tracking', 'yes', 'yes'),
(270, 'woocommerce_tracker_last_send', '1525091612', 'yes'),
(273, 'woocommerce_klarna_payments_settings', 'a:1:{s:7:"enabled";s:2:"no";}', 'yes'),
(275, 'woocommerce_ppec_paypal_settings', 'a:33:{s:7:"enabled";s:3:"yes";s:16:"reroute_requests";s:3:"yes";s:5:"email";s:23:"meettomangesh@gmail.com";s:11:"environment";s:7:"sandbox";s:20:"sandbox_api_username";s:35:"testbrogaardbusiness_api1.gmail.com";s:20:"sandbox_api_password";s:16:"VZRBGWX4JQDH4EKT";s:21:"sandbox_api_signature";s:56:"AdnTXdKpmOs3nB8WH-nT6RoE6qV.AYdi8g6mSJtrkJBcM4D2S6V970U7";s:23:"sandbox_api_certificate";s:0:"";s:19:"sandbox_api_subject";s:0:"";s:5:"title";s:23:"PayPal Express Checkout";s:11:"description";s:85:"Pay via PayPal; you can pay with your credit card if you don\'t have a PayPal account.";s:12:"api_username";s:0:"";s:12:"api_password";s:0:"";s:13:"api_signature";s:0:"";s:15:"api_certificate";s:0:"";s:11:"api_subject";s:0:"";s:10:"brand_name";s:8:"brogaard";s:11:"button_size";s:5:"large";s:21:"cart_checkout_enabled";s:3:"yes";s:12:"mark_enabled";s:2:"no";s:14:"logo_image_url";s:0:"";s:16:"header_image_url";s:0:"";s:10:"page_style";s:0:"";s:12:"landing_page";s:5:"Login";s:14:"credit_enabled";s:2:"no";s:34:"checkout_on_single_product_enabled";s:2:"no";s:5:"debug";s:2:"no";s:14:"invoice_prefix";s:3:"WC-";s:15:"require_billing";s:2:"no";s:20:"require_phone_number";s:2:"no";s:13:"paymentaction";s:4:"sale";s:16:"instant_payments";s:2:"no";s:26:"subtotal_mismatch_behavior";s:3:"add";}', 'yes'),
(276, 'woocommerce_stripe_settings', 'a:3:{s:7:"enabled";s:2:"no";s:14:"create_account";b:0;s:5:"email";b:0;}', 'yes'),
(277, 'woocommerce_cheque_settings', 'a:4:{s:7:"enabled";s:3:"yes";s:5:"title";s:14:"Check payments";s:11:"description";s:98:"Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.";s:12:"instructions";s:0:"";}', 'yes'),
(278, 'woocommerce_bacs_settings', 'a:5:{s:7:"enabled";s:3:"yes";s:5:"title";s:20:"Direct bank transfer";s:11:"description";s:176:"Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.";s:12:"instructions";s:0:"";s:15:"account_details";s:0:"";}', 'yes'),
(279, 'woocommerce_cod_settings', 'a:1:{s:7:"enabled";s:2:"no";}', 'yes'),
(282, 'jetpack_activated', '1', 'yes'),
(285, 'jetpack_activation_source', 'a:2:{i:0;s:7:"unknown";i:1;N;}', 'yes'),
(286, 'jetpack_sync_settings_disable', '0', 'yes'),
(287, '_transient_timeout_jetpack_file_data_6.0', '1527597259', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(288, '_transient_jetpack_file_data_6.0', 'a:57:{s:32:"c22c48d7cfe9d38dff2864cfea64636a";a:15:{s:4:"name";s:20:"Spelling and Grammar";s:11:"description";s:39:"Check your spelling, style, and grammar";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"6";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:7:"Writing";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:115:"after the deadline, afterthedeadline, spell, spellchecker, spelling, grammar, proofreading, style, language, cliche";s:12:"plan_classes";s:0:"";}s:32:"fb5c4814ddc3946a3f22cc838fcb2af3";a:15:{s:4:"name";s:8:"Carousel";s:11:"description";s:75:"Display images and galleries in a gorgeous, full-screen browsing experience";s:14:"jumpstart_desc";s:79:"Brings your photos and images to life as full-size, easily navigable galleries.";s:4:"sort";s:2:"22";s:20:"recommendation_order";s:2:"12";s:10:"introduced";s:3:"1.5";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:17:"Photos and Videos";s:7:"feature";s:21:"Appearance, Jumpstart";s:25:"additional_search_queries";s:80:"gallery, carousel, diaporama, slideshow, images, lightbox, exif, metadata, image";s:12:"plan_classes";s:0:"";}s:32:"5813eda53235a9a81a69b1f6a4a15db6";a:15:{s:4:"name";s:13:"Comment Likes";s:11:"description";s:64:"Increase visitor engagement by adding a Like button to comments.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"39";s:20:"recommendation_order";s:2:"17";s:10:"introduced";s:3:"5.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:6:"Social";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:37:"like widget, like button, like, likes";s:12:"plan_classes";s:0:"";}s:32:"7ef4ca32a1c84fc10ef50c8293cae5df";a:15:{s:4:"name";s:8:"Comments";s:11:"description";s:80:"Let readers use WordPress.com, Twitter, Facebook, or Google+ accounts to comment";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"20";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.4";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:6:"Social";s:7:"feature";s:10:"Engagement";s:25:"additional_search_queries";s:53:"comments, comment, facebook, twitter, google+, social";s:12:"plan_classes";s:0:"";}s:32:"c5331bfc2648dfeeebe486736d79a72c";a:15:{s:4:"name";s:12:"Contact Form";s:11:"description";s:57:"Insert a customizable contact form anywhere on your site.";s:14:"jumpstart_desc";s:111:"Adds a button to your post and page editors, allowing you to build simple forms to help visitors stay in touch.";s:4:"sort";s:2:"15";s:20:"recommendation_order";s:2:"14";s:10:"introduced";s:3:"1.3";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:5:"Other";s:7:"feature";s:18:"Writing, Jumpstart";s:25:"additional_search_queries";s:44:"contact, form, grunion, feedback, submission";s:12:"plan_classes";s:0:"";}s:32:"707c77d2e8cb0c12d094e5423c8beda8";a:15:{s:4:"name";s:20:"Custom content types";s:11:"description";s:74:"Display different types of content on your site with custom content types.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"34";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"3.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:7:"Writing";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:72:"cpt, custom post types, portfolio, portfolios, testimonial, testimonials";s:12:"plan_classes";s:0:"";}s:32:"cd499b1678cfe3aabfc8ca0d3eb7e8b9";a:15:{s:4:"name";s:10:"Custom CSS";s:11:"description";s:53:"Tweak your site’s CSS without modifying your theme.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"2";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.7";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:10:"Appearance";s:7:"feature";s:10:"Appearance";s:25:"additional_search_queries";s:108:"css, customize, custom, style, editor, less, sass, preprocessor, font, mobile, appearance, theme, stylesheet";s:12:"plan_classes";s:0:"";}s:32:"7d266d6546645f42cf52a66387699c50";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"5d436678d5e010ac6b0f157aa1021554";a:15:{s:4:"name";s:21:"Enhanced Distribution";s:11:"description";s:27:"Increase reach and traffic.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"5";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.2";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:6:"Public";s:11:"module_tags";s:7:"Writing";s:7:"feature";s:10:"Engagement";s:25:"additional_search_queries";s:54:"google, seo, firehose, search, broadcast, broadcasting";s:12:"plan_classes";s:0:"";}s:32:"092b94702bb483a5472578283c2103d6";a:15:{s:4:"name";s:16:"Google Analytics";s:11:"description";s:56:"Set up Google Analytics without touching a line of code.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"37";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"4.5";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:0:"";s:7:"feature";s:10:"Engagement";s:25:"additional_search_queries";s:37:"webmaster, google, analytics, console";s:12:"plan_classes";s:8:"business";}s:32:"6bd77e09440df2b63044cf8cb7963773";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"ee1a10e2ef5733ab19eb1eb552d5ecb3";a:15:{s:4:"name";s:19:"Gravatar Hovercards";s:11:"description";s:58:"Enable pop-up business cards over commenters’ Gravatars.";s:14:"jumpstart_desc";s:131:"Let commenters link their profiles to their Gravatar accounts, making it easy for your visitors to learn more about your community.";s:4:"sort";s:2:"11";s:20:"recommendation_order";s:2:"13";s:10:"introduced";s:3:"1.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:18:"Social, Appearance";s:7:"feature";s:21:"Appearance, Jumpstart";s:25:"additional_search_queries";s:20:"gravatar, hovercards";s:12:"plan_classes";s:0:"";}s:32:"284c08538b0bdc266315b2cf80b9c044";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"0ce5c3ac630dea9f41215e48bb0f52f3";a:15:{s:4:"name";s:15:"Infinite Scroll";s:11:"description";s:53:"Automatically load new content when a visitor scrolls";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"26";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"2.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:10:"Appearance";s:7:"feature";s:10:"Appearance";s:25:"additional_search_queries";s:33:"scroll, infinite, infinite scroll";s:12:"plan_classes";s:0:"";}s:32:"87da2858d4f9cadb6a44fdcf32e8d2b5";a:15:{s:4:"name";s:8:"JSON API";s:11:"description";s:51:"Allow applications to securely access your content.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"19";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.9";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:6:"Public";s:11:"module_tags";s:19:"Writing, Developers";s:7:"feature";s:7:"General";s:25:"additional_search_queries";s:50:"api, rest, develop, developers, json, klout, oauth";s:12:"plan_classes";s:0:"";}s:32:"004962cb7cb9ec2b64769ac4df509217";a:15:{s:4:"name";s:14:"Beautiful Math";s:11:"description";s:57:"Use LaTeX markup for complex equations and other geekery.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"12";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:7:"Writing";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:47:"latex, math, equation, equations, formula, code";s:12:"plan_classes";s:0:"";}s:32:"7f408184bee8850d439c01322867e72c";a:15:{s:4:"name";s:11:"Lazy Images";s:11:"description";s:16:"Lazy load images";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"24";s:20:"recommendation_order";s:2:"14";s:10:"introduced";s:5:"5.6.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:23:"Appearance, Recommended";s:7:"feature";s:10:"Appearance";s:25:"additional_search_queries";s:33:"mobile, theme, performance, image";s:12:"plan_classes";s:0:"";}s:32:"2ad914b747f382ae918ed3b37077d4a1";a:15:{s:4:"name";s:5:"Likes";s:11:"description";s:63:"Give visitors an easy way to show they appreciate your content.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"23";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"2.2";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:6:"Social";s:7:"feature";s:10:"Engagement";s:25:"additional_search_queries";s:26:"like, likes, wordpress.com";s:12:"plan_classes";s:0:"";}s:32:"b347263e3470979442ebf0514e41e893";a:15:{s:4:"name";s:6:"Manage";s:11:"description";s:54:"Manage all of your sites from a centralized dashboard.";s:14:"jumpstart_desc";s:151:"Helps you remotely manage plugins, turn on automated updates, and more from <a href="https://wordpress.com/plugins/" target="_blank">wordpress.com</a>.";s:4:"sort";s:1:"1";s:20:"recommendation_order";s:1:"3";s:10:"introduced";s:3:"3.4";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:35:"Centralized Management, Recommended";s:7:"feature";s:7:"General";s:25:"additional_search_queries";s:26:"manage, management, remote";s:12:"plan_classes";s:0:"";}s:32:"589982245aa6f495b72ab7cf57a1a48e";a:15:{s:4:"name";s:8:"Markdown";s:11:"description";s:50:"Write posts or pages in plain-text Markdown syntax";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"31";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"2.8";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:7:"Writing";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:12:"md, markdown";s:12:"plan_classes";s:0:"";}s:32:"d3bec8e063d637bc285018241b783725";a:15:{s:4:"name";s:21:"WordPress.com Toolbar";s:11:"description";s:91:"Replaces the admin bar with a useful toolbar to quickly manage your site via WordPress.com.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"38";s:20:"recommendation_order";s:2:"16";s:10:"introduced";s:3:"4.8";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:7:"General";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:19:"adminbar, masterbar";s:12:"plan_classes";s:0:"";}s:32:"6ab1c3e749bcfba2dedbaebe6c9fc614";a:15:{s:4:"name";s:12:"Mobile Theme";s:11:"description";s:31:"Enable the Jetpack Mobile theme";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"21";s:20:"recommendation_order";s:2:"11";s:10:"introduced";s:3:"1.8";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:31:"Appearance, Mobile, Recommended";s:7:"feature";s:10:"Appearance";s:25:"additional_search_queries";s:24:"mobile, theme, minileven";s:12:"plan_classes";s:0:"";}s:32:"b7be7da643ec641511839ecc6afb6def";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"d54f83ff429a8a37ace796de98459411";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"0f8b373fa12c825162c0b0bc20b8bbdd";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"5d7b0750cb34a4a72a44fa67790de639";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"f07fde8db279ffb0116c727df72c6374";a:15:{s:4:"name";s:7:"Monitor";s:11:"description";s:61:"Receive immediate notifications if your site goes down, 24/7.";s:14:"jumpstart_desc";s:61:"Receive immediate notifications if your site goes down, 24/7.";s:4:"sort";s:2:"28";s:20:"recommendation_order";s:2:"10";s:10:"introduced";s:3:"2.6";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:11:"Recommended";s:7:"feature";s:19:"Security, Jumpstart";s:25:"additional_search_queries";s:37:"monitor, uptime, downtime, monitoring";s:12:"plan_classes";s:0:"";}s:32:"136a5445a49150db75472862f3d3aefb";a:15:{s:4:"name";s:13:"Notifications";s:11:"description";s:57:"Receive instant notifications of site comments and likes.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"13";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.9";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:5:"Other";s:7:"feature";s:7:"General";s:25:"additional_search_queries";s:62:"notification, notifications, toolbar, adminbar, push, comments";s:12:"plan_classes";s:0:"";}s:32:"395d8ae651afabb54d1e98440674b384";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"4484ac68583fbbaab0ef698cdc986950";a:15:{s:4:"name";s:6:"Photon";s:11:"description";s:29:"Serve images from our servers";s:14:"jumpstart_desc";s:141:"Mirrors and serves your images from our free and fast image CDN, improving your site’s performance with no additional load on your servers.";s:4:"sort";s:2:"25";s:20:"recommendation_order";s:1:"1";s:10:"introduced";s:3:"2.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:42:"Photos and Videos, Appearance, Recommended";s:7:"feature";s:34:"Recommended, Jumpstart, Appearance";s:25:"additional_search_queries";s:38:"photon, image, cdn, performance, speed";s:12:"plan_classes";s:0:"";}s:32:"6f30193afa5b1360e3fa2676501b5e3a";a:15:{s:4:"name";s:13:"Post by email";s:11:"description";s:33:"Publish posts by sending an email";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"14";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"2.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:7:"Writing";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:20:"post by email, email";s:12:"plan_classes";s:0:"";}s:32:"3e9f8bd3755d92e8e5d06966a957beb8";a:15:{s:4:"name";s:7:"Protect";s:11:"description";s:41:"Block suspicious-looking sign in activity";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"1";s:20:"recommendation_order";s:1:"4";s:10:"introduced";s:3:"3.4";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:11:"Recommended";s:7:"feature";s:8:"Security";s:25:"additional_search_queries";s:65:"security, secure, protection, botnet, brute force, protect, login";s:12:"plan_classes";s:0:"";}s:32:"0cacc8ab2145ad11cb54d181a98aa550";a:15:{s:4:"name";s:9:"Publicize";s:11:"description";s:27:"Automated social marketing.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"10";s:20:"recommendation_order";s:1:"7";s:10:"introduced";s:3:"2.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:19:"Social, Recommended";s:7:"feature";s:10:"Engagement";s:25:"additional_search_queries";s:107:"facebook, twitter, google+, googleplus, google, path, tumblr, linkedin, social, tweet, connections, sharing";s:12:"plan_classes";s:0:"";}s:32:"a528c2f803a92c5c2effa67cd33ab33a";a:15:{s:4:"name";s:20:"Progressive Web Apps";s:11:"description";s:85:"Speed up and improve the reliability of your site using the latest in web technology.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"38";s:20:"recommendation_order";s:2:"18";s:10:"introduced";s:5:"5.6.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:10:"Developers";s:7:"feature";s:7:"Traffic";s:25:"additional_search_queries";s:26:"manifest, pwa, progressive";s:12:"plan_classes";s:0:"";}s:32:"329b8efce059081d46936ece0c6736b3";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"5fdd42d482712fbdaf000b28ea7adce9";a:15:{s:4:"name";s:13:"Related posts";s:11:"description";s:64:"Increase page views by showing related content to your visitors.";s:14:"jumpstart_desc";s:113:"Keep visitors engaged on your blog by highlighting relevant and new content at the bottom of each published post.";s:4:"sort";s:2:"29";s:20:"recommendation_order";s:1:"9";s:10:"introduced";s:3:"2.9";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:11:"Recommended";s:7:"feature";s:21:"Engagement, Jumpstart";s:25:"additional_search_queries";s:22:"related, related posts";s:12:"plan_classes";s:0:"";}s:32:"2c5096ef610018e98a8bcccfbea4471e";a:15:{s:4:"name";s:6:"Search";s:11:"description";s:41:"Enhanced search, powered by Elasticsearch";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"34";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"5.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:5:"false";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:0:"";s:7:"feature";s:6:"Search";s:25:"additional_search_queries";s:6:"search";s:12:"plan_classes";s:8:"business";}s:32:"0d81dd7df3ad2f245e84fd4fb66bf829";a:15:{s:4:"name";s:9:"SEO Tools";s:11:"description";s:50:"Better results on search engines and social media.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"35";s:20:"recommendation_order";s:2:"15";s:10:"introduced";s:3:"4.4";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:18:"Social, Appearance";s:7:"feature";s:7:"Traffic";s:25:"additional_search_queries";s:81:"search engine optimization, social preview, meta description, custom title format";s:12:"plan_classes";s:17:"business, premium";}s:32:"32aaa676b3b6c9f3ef22430e1e0bca24";a:15:{s:4:"name";s:7:"Sharing";s:11:"description";s:37:"Allow visitors to share your content.";s:14:"jumpstart_desc";s:116:"Twitter, Facebook and Google+ buttons at the bottom of each post, making it easy for visitors to share your content.";s:4:"sort";s:1:"7";s:20:"recommendation_order";s:1:"6";s:10:"introduced";s:3:"1.1";s:7:"changed";s:3:"1.2";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:19:"Social, Recommended";s:7:"feature";s:21:"Engagement, Jumpstart";s:25:"additional_search_queries";s:141:"share, sharing, sharedaddy, buttons, icons, email, facebook, twitter, google+, linkedin, pinterest, pocket, press this, print, reddit, tumblr";s:12:"plan_classes";s:0:"";}s:32:"948472b453cda59b38bb7c37af889af0";a:15:{s:4:"name";s:16:"Shortcode Embeds";s:11:"description";s:50:"Embed media from popular sites without any coding.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"3";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.1";s:7:"changed";s:3:"1.2";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:46:"Photos and Videos, Social, Writing, Appearance";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:236:"shortcodes, shortcode, embeds, media, bandcamp, dailymotion, facebook, flickr, google calendars, google maps, google+, polldaddy, recipe, recipes, scribd, slideshare, slideshow, slideshows, soundcloud, ted, twitter, vimeo, vine, youtube";s:12:"plan_classes";s:0:"";}s:32:"7d00a6ca0a79fbe893275aaf6ed6ae42";a:15:{s:4:"name";s:16:"WP.me Shortlinks";s:11:"description";s:54:"Create short and simple links for all posts and pages.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"8";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:6:"Social";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:17:"shortlinks, wp.me";s:12:"plan_classes";s:0:"";}s:32:"372e711395f23c466e04d4fd07f73099";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"2ea687cec293289a2a3e5f0459e79768";a:15:{s:4:"name";s:8:"Sitemaps";s:11:"description";s:50:"Make it easy for search engines to find your site.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"13";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"3.9";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:6:"Public";s:11:"module_tags";s:20:"Recommended, Traffic";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:39:"sitemap, traffic, search, site map, seo";s:12:"plan_classes";s:0:"";}s:32:"2fe9dc2c7389d4f0825a0b23bc8b19d1";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"e7cf8a7e0f151ccf7cbdc6d8f118f316";a:15:{s:4:"name";s:14:"Single Sign On";s:11:"description";s:62:"Allow users to log into this site using WordPress.com accounts";s:14:"jumpstart_desc";s:98:"Lets you log in to all your Jetpack-enabled sites with one click using your WordPress.com account.";s:4:"sort";s:2:"30";s:20:"recommendation_order";s:1:"5";s:10:"introduced";s:3:"2.6";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:10:"Developers";s:7:"feature";s:19:"Security, Jumpstart";s:25:"additional_search_queries";s:34:"sso, single sign on, login, log in";s:12:"plan_classes";s:0:"";}s:32:"34fb073ed896af853ed48bd5739240cb";a:15:{s:4:"name";s:10:"Site Stats";s:11:"description";s:44:"Collect valuable traffic stats and insights.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"1";s:20:"recommendation_order";s:1:"2";s:10:"introduced";s:3:"1.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:23:"Site Stats, Recommended";s:7:"feature";s:10:"Engagement";s:25:"additional_search_queries";s:54:"statistics, tracking, analytics, views, traffic, stats";s:12:"plan_classes";s:0:"";}s:32:"8de0dfff24a17cf0fa0011dfc691a3f3";a:15:{s:4:"name";s:13:"Subscriptions";s:11:"description";s:87:"Allow users to subscribe to your posts and comments and receive notifications via email";s:14:"jumpstart_desc";s:126:"Give visitors two easy subscription options — while commenting, or via a separate email subscription widget you can display.";s:4:"sort";s:1:"9";s:20:"recommendation_order";s:1:"8";s:10:"introduced";s:3:"1.2";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:6:"Social";s:7:"feature";s:21:"Engagement, Jumpstart";s:25:"additional_search_queries";s:74:"subscriptions, subscription, email, follow, followers, subscribers, signup";s:12:"plan_classes";s:0:"";}s:32:"4744f348db095538d3edcacb0ed99c89";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"d89db0d934b39f86065ff58e73594070";a:15:{s:4:"name";s:15:"Tiled Galleries";s:11:"description";s:61:"Display image galleries in a variety of elegant arrangements.";s:14:"jumpstart_desc";s:61:"Display image galleries in a variety of elegant arrangements.";s:4:"sort";s:2:"24";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"2.1";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:17:"Photos and Videos";s:7:"feature";s:21:"Appearance, Jumpstart";s:25:"additional_search_queries";s:43:"gallery, tiles, tiled, grid, mosaic, images";s:12:"plan_classes";s:0:"";}s:32:"01987a7ba5e19786f2992501add8181a";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}s:32:"20459cc462babfc5a82adf6b34f6e8b1";a:15:{s:4:"name";s:12:"Data Backups";s:11:"description";s:54:"Off-site backups, security scans, and automatic fixes.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"32";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:5:"0:1.2";s:7:"changed";s:0:"";s:10:"deactivate";s:5:"false";s:4:"free";s:5:"false";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:0:"";s:7:"feature";s:16:"Security, Health";s:25:"additional_search_queries";s:28:"vaultpress, backup, security";s:12:"plan_classes";s:0:"";}s:32:"836245eb0a8f0c5272542305a88940c1";a:15:{s:4:"name";s:17:"Site verification";s:11:"description";s:58:"Establish your site\'s authenticity with external services.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"33";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"3.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:0:"";s:7:"feature";s:10:"Engagement";s:25:"additional_search_queries";s:56:"webmaster, seo, google, bing, pinterest, search, console";s:12:"plan_classes";s:0:"";}s:32:"e94397a5c47c1be995eff613e65a674f";a:15:{s:4:"name";s:10:"VideoPress";s:11:"description";s:27:"Fast, ad-free video hosting";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"27";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"2.5";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:5:"false";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:17:"Photos and Videos";s:7:"feature";s:7:"Writing";s:25:"additional_search_queries";s:25:"video, videos, videopress";s:12:"plan_classes";s:17:"business, premium";}s:32:"032cd76e08467c732ccb026efda0c9cd";a:15:{s:4:"name";s:17:"Widget Visibility";s:11:"description";s:42:"Control where widgets appear on your site.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:2:"17";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"2.4";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:10:"Appearance";s:7:"feature";s:10:"Appearance";s:25:"additional_search_queries";s:54:"widget visibility, logic, conditional, widgets, widget";s:12:"plan_classes";s:0:"";}s:32:"9b3e84beedf2e96f1ac5dd6498d2b1aa";a:15:{s:4:"name";s:21:"Extra Sidebar Widgets";s:11:"description";s:54:"Add images, Twitter streams, and more to your sidebar.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"4";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:3:"1.2";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:2:"No";s:13:"auto_activate";s:3:"Yes";s:11:"module_tags";s:18:"Social, Appearance";s:7:"feature";s:10:"Appearance";s:25:"additional_search_queries";s:65:"widget, widgets, facebook, gallery, twitter, gravatar, image, rss";s:12:"plan_classes";s:0:"";}s:32:"7724fd9600745cf93e37cc09282e1a37";a:15:{s:4:"name";s:3:"Ads";s:11:"description";s:60:"Earn income by allowing Jetpack to display high quality ads.";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:1:"1";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:5:"4.5.0";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:3:"Yes";s:13:"auto_activate";s:2:"No";s:11:"module_tags";s:19:"Traffic, Appearance";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:26:"advertising, ad codes, ads";s:12:"plan_classes";s:17:"premium, business";}s:32:"5b8f8e5b5a1887e3c0393cb78d5143a3";a:15:{s:4:"name";s:0:"";s:11:"description";s:0:"";s:14:"jumpstart_desc";s:0:"";s:4:"sort";s:0:"";s:20:"recommendation_order";s:0:"";s:10:"introduced";s:0:"";s:7:"changed";s:0:"";s:10:"deactivate";s:0:"";s:4:"free";s:0:"";s:19:"requires_connection";s:0:"";s:13:"auto_activate";s:0:"";s:11:"module_tags";s:0:"";s:7:"feature";s:0:"";s:25:"additional_search_queries";s:0:"";s:12:"plan_classes";s:0:"";}}', 'no'),
(289, 'jetpack_available_modules', 'a:1:{s:3:"6.0";a:43:{s:18:"after-the-deadline";s:3:"1.1";s:8:"carousel";s:3:"1.5";s:13:"comment-likes";s:3:"5.1";s:8:"comments";s:3:"1.4";s:12:"contact-form";s:3:"1.3";s:20:"custom-content-types";s:3:"3.1";s:10:"custom-css";s:3:"1.7";s:21:"enhanced-distribution";s:3:"1.2";s:16:"google-analytics";s:3:"4.5";s:19:"gravatar-hovercards";s:3:"1.1";s:15:"infinite-scroll";s:3:"2.0";s:8:"json-api";s:3:"1.9";s:5:"latex";s:3:"1.1";s:11:"lazy-images";s:5:"5.6.0";s:5:"likes";s:3:"2.2";s:6:"manage";s:3:"3.4";s:8:"markdown";s:3:"2.8";s:9:"masterbar";s:3:"4.8";s:9:"minileven";s:3:"1.8";s:7:"monitor";s:3:"2.6";s:5:"notes";s:3:"1.9";s:6:"photon";s:3:"2.0";s:13:"post-by-email";s:3:"2.0";s:7:"protect";s:3:"3.4";s:9:"publicize";s:3:"2.0";s:3:"pwa";s:5:"5.6.0";s:13:"related-posts";s:3:"2.9";s:6:"search";s:3:"5.0";s:9:"seo-tools";s:3:"4.4";s:10:"sharedaddy";s:3:"1.1";s:10:"shortcodes";s:3:"1.1";s:10:"shortlinks";s:3:"1.1";s:8:"sitemaps";s:3:"3.9";s:3:"sso";s:3:"2.6";s:5:"stats";s:3:"1.1";s:13:"subscriptions";s:3:"1.2";s:13:"tiled-gallery";s:3:"2.1";s:10:"vaultpress";s:5:"0:1.2";s:18:"verification-tools";s:3:"3.0";s:10:"videopress";s:3:"2.5";s:17:"widget-visibility";s:3:"2.4";s:7:"widgets";s:3:"1.2";s:7:"wordads";s:5:"4.5.0";}}', 'yes'),
(290, 'jetpack_options', 'a:4:{s:7:"version";s:14:"6.0:1525091656";s:11:"old_version";s:14:"6.0:1525091656";s:28:"fallback_no_verify_ssl_certs";i:0;s:9:"time_diff";i:62;}', 'yes'),
(292, 'jetpack_testimonial', '0', 'yes'),
(300, 'wc_ppec_version', '1.5.3', 'yes'),
(301, 'do_activate', '0', 'yes'),
(306, '_transient_shipping-transient-version', '1525091669', 'yes'),
(307, 'woocommerce_flat_rate_1_settings', 'a:3:{s:5:"title";s:9:"Flat rate";s:10:"tax_status";s:7:"taxable";s:4:"cost";s:1:"0";}', 'yes'),
(308, 'woocommerce_flat_rate_2_settings', 'a:3:{s:5:"title";s:9:"Flat rate";s:10:"tax_status";s:7:"taxable";s:4:"cost";s:1:"0";}', 'yes'),
(315, '_transient_timeout_wc_low_stock_count', '1527683713', 'no'),
(316, '_transient_wc_low_stock_count', '0', 'no'),
(317, '_transient_timeout_wc_outofstock_count', '1527683713', 'no'),
(318, '_transient_wc_outofstock_count', '0', 'no'),
(319, '_transient_timeout_external_ip_address_::1', '1525696575', 'no'),
(320, '_transient_external_ip_address_::1', '125.99.66.234', 'no'),
(327, 'wpcf7', 'a:2:{s:7:"version";s:5:"5.0.1";s:13:"bulk_validate";a:4:{s:9:"timestamp";i:1525092915;s:7:"version";s:5:"5.0.1";s:11:"count_valid";i:1;s:13:"count_invalid";i:0;}}', 'yes'),
(328, 'yit_recently_activated', 'a:0:{}', 'yes'),
(329, 'yith_wcwl_frontend_css_colors', 's:1159:"a:10:{s:15:"add_to_wishlist";a:3:{s:10:"background";s:7:"#333333";s:5:"color";s:7:"#FFFFFF";s:12:"border_color";s:7:"#333333";}s:21:"add_to_wishlist_hover";a:3:{s:10:"background";s:7:"#4F4F4F";s:5:"color";s:7:"#FFFFFF";s:12:"border_color";s:7:"#4F4F4F";}s:11:"add_to_cart";a:3:{s:10:"background";s:7:"#333333";s:5:"color";s:7:"#FFFFFF";s:12:"border_color";s:7:"#333333";}s:17:"add_to_cart_hover";a:3:{s:10:"background";s:7:"#4F4F4F";s:5:"color";s:7:"#FFFFFF";s:12:"border_color";s:7:"#4F4F4F";}s:14:"button_style_1";a:3:{s:10:"background";s:7:"#333333";s:5:"color";s:7:"#FFFFFF";s:12:"border_color";s:7:"#333333";}s:20:"button_style_1_hover";a:3:{s:10:"background";s:7:"#4F4F4F";s:5:"color";s:7:"#FFFFFF";s:12:"border_color";s:7:"#4F4F4F";}s:14:"button_style_2";a:3:{s:10:"background";s:7:"#FFFFFF";s:5:"color";s:7:"#858484";s:12:"border_color";s:7:"#c6c6c6";}s:20:"button_style_2_hover";a:3:{s:10:"background";s:7:"#4F4F4F";s:5:"color";s:7:"#FFFFFF";s:12:"border_color";s:7:"#4F4F4F";}s:14:"wishlist_table";a:3:{s:10:"background";s:7:"#FFFFFF";s:5:"color";s:7:"#6d6c6c";s:12:"border_color";s:7:"#FFFFFF";}s:7:"headers";a:1:{s:10:"background";s:7:"#F4F4F4";}}";', 'yes'),
(330, 'yith_wcwl_wishlist_title', 'My wishlist on brogaard', 'yes'),
(331, 'yith-wcwl-page-id', '10', 'yes'),
(332, 'yith_wcwl_wishlist_page_id', '10', 'yes'),
(333, 'yith_wcwl_version', '2.2.1', 'yes'),
(334, 'yith_wcwl_db_version', '2.0.0', 'yes'),
(335, 'yith_wcwl_general_videobox', 'a:7:{s:11:"plugin_name";s:25:"YITH WooCommerce Wishlist";s:18:"title_first_column";s:30:"Discover the Advanced Features";s:24:"description_first_column";s:89:"Upgrade to the PREMIUM VERSION of YITH WOOCOMMERCE WISHLIST to benefit from all features!";s:5:"video";a:3:{s:8:"video_id";s:9:"118797844";s:15:"video_image_url";s:101:"http://localhost/brogaard/wp-content/plugins/yith-woocommerce-wishlist//assets/images/video-thumb.jpg";s:17:"video_description";s:0:"";}s:19:"title_second_column";s:28:"Get Support and Pro Features";s:25:"description_second_column";s:205:"By purchasing the premium version of the plugin, you will take advantage of the advanced features of the product and you will get one year of free updates and support through our platform available 24h/24.";s:6:"button";a:2:{s:4:"href";s:78:"http://yithemes.com/themes/plugins/yith-woocommerce-wishlist/?refer_id=1030585";s:5:"title";s:28:"Get Support and Pro Features";}}', 'yes'),
(336, 'yith_wcwl_enabled', 'yes', 'yes'),
(337, 'yith_wcwl_redirect_cart', 'no', 'yes'),
(338, 'yith_wcwl_remove_after_add_to_cart', 'yes', 'yes'),
(339, 'yith_wcwl_add_to_wishlist_text', 'Add to Wishlist', 'yes'),
(340, 'yith_wcwl_browse_wishlist_text', 'Browse Wishlist', 'yes'),
(341, 'yith_wcwl_already_in_wishlist_text', 'The product is already in the wishlist!', 'yes'),
(342, 'yith_wcwl_product_added_text', 'Product added!', 'yes'),
(343, 'yith_wcwl_add_to_cart_text', 'Add to Cart', 'yes'),
(344, 'yith_wcwl_price_show', 'yes', 'yes'),
(345, 'yith_wcwl_add_to_cart_show', 'yes', 'yes'),
(346, 'yith_wcwl_stock_show', 'yes', 'yes'),
(347, 'yith_wcwl_show_dateadded', 'no', 'yes'),
(348, 'yith_wcwl_repeat_remove_button', 'no', 'yes'),
(349, 'yith_wcwl_share_fb', 'yes', 'yes'),
(350, 'yith_wcwl_share_twitter', 'yes', 'yes'),
(351, 'yith_wcwl_share_pinterest', 'yes', 'yes'),
(352, 'yith_wcwl_share_googleplus', 'yes', 'yes'),
(353, 'yith_wcwl_share_email', 'yes', 'yes'),
(354, 'yith_wcwl_socials_title', 'My wishlist on brogaard', 'yes'),
(355, 'yith_wcwl_socials_text', '', 'yes'),
(356, 'yith_wcwl_socials_image_url', '', 'yes'),
(357, 'yith_wfbt_enable_integration', 'yes', 'yes'),
(358, 'yith_wcwl_use_button', 'no', 'yes'),
(359, 'yith_wcwl_custom_css', '', 'yes'),
(360, 'yith_wcwl_frontend_css', 'yes', 'yes'),
(361, 'yith_wcwl_rounded_corners', 'yes', 'yes'),
(362, 'yith_wcwl_add_to_wishlist_icon', 'none', 'yes'),
(363, 'yith_wcwl_add_to_cart_icon', 'fa-shopping-cart', 'yes'),
(364, 'yit_plugin_fw_panel_wc_default_options_set', 'a:1:{s:15:"yith_wcwl_panel";b:1;}', 'yes'),
(369, 'woocommerce_tracker_ua', 'a:2:{i:0;s:105:"mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36";i:1;s:115:"mozilla/5.0 (windows nt 10.0; win64; x64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.139 safari/537.36";}', 'yes'),
(387, '_transient_product_query-transient-version', '1525096515', 'yes'),
(388, 'category_children', 'a:0:{}', 'yes'),
(389, 'product_cat_children', 'a:0:{}', 'yes'),
(390, 'pa_color_children', 'a:0:{}', 'yes'),
(391, 'pa_size_children', 'a:0:{}', 'yes'),
(392, '_transient_wc_attribute_taxonomies', 'a:2:{i:0;O:8:"stdClass":6:{s:12:"attribute_id";s:1:"1";s:14:"attribute_name";s:5:"color";s:15:"attribute_label";s:5:"color";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}i:1;O:8:"stdClass":6:{s:12:"attribute_id";s:1:"2";s:14:"attribute_name";s:4:"size";s:15:"attribute_label";s:4:"size";s:14:"attribute_type";s:6:"select";s:17:"attribute_orderby";s:10:"menu_order";s:16:"attribute_public";s:1:"0";}}', 'yes'),
(395, '_transient_timeout_wc_product_children_45', '1527688530', 'no'),
(396, '_transient_wc_product_children_45', 'a:2:{s:3:"all";a:0:{}s:7:"visible";a:0:{}}', 'no'),
(397, '_transient_product-transient-version', '1525096530', 'yes'),
(398, '_transient_timeout_wc_var_prices_45', '1527688667', 'no'),
(399, '_transient_wc_var_prices_45', '{"version":"1525096530","0a8a7ecec0d6f4bc7b39329e765f5fb8":{"price":[],"regular_price":[],"sale_price":[]},"fb358191c7ece73f81aef82a4e7b53aa":{"price":[],"regular_price":[],"sale_price":[]}}', 'no'),
(400, '_transient_timeout_wc_product_children_44', '1527688531', 'no'),
(401, '_transient_wc_product_children_44', 'a:2:{s:3:"all";a:0:{}s:7:"visible";a:0:{}}', 'no'),
(402, '_transient_timeout_wc_var_prices_44', '1527688667', 'no'),
(403, '_transient_wc_var_prices_44', '{"version":"1525096530","0a8a7ecec0d6f4bc7b39329e765f5fb8":{"price":[],"regular_price":[],"sale_price":[]},"fb358191c7ece73f81aef82a4e7b53aa":{"price":[],"regular_price":[],"sale_price":[]}}', 'no'),
(404, '_transient_timeout_wc_term_counts', '1527688565', 'no'),
(405, '_transient_wc_term_counts', 'a:6:{i:25;s:1:"5";i:28;s:1:"1";i:29;s:1:"1";i:23;s:1:"3";i:27;s:1:"2";i:22;s:1:"5";}', 'no'),
(412, '_transient_timeout_wc_shipping_method_count_1_1525091669', '1527688677', 'no'),
(413, '_transient_wc_shipping_method_count_1_1525091669', '2', 'no'),
(418, 'woocommerce_paypalpro_settings', 'a:7:{s:7:"enabled";s:2:"no";s:5:"debug";s:3:"yes";s:5:"title";s:19:"Credit Card Payment";s:16:"securitycodehint";s:2:"no";s:17:"paypalapiusername";s:28:"meettomangesh_api1.gmail.com";s:17:"paypalapipassword";s:16:"24XXR8WYDNHBPW6P";s:18:"paypalapisigniture";s:56:"A31n9swv6m1znSIcj6WOd4LQH5ZRAvifHEhs4.U.IhGomvbJMhkHKa.b";}', 'yes'),
(431, '_site_transient_timeout_browser_bd6a9fe252598f30ffd1edb8511fd2b1', '1525796108', 'no'),
(432, '_site_transient_browser_bd6a9fe252598f30ffd1edb8511fd2b1', 'a:10:{s:4:"name";s:6:"Chrome";s:7:"version";s:13:"66.0.3359.139";s:8:"platform";s:7:"Windows";s:10:"update_url";s:29:"https://www.google.com/chrome";s:7:"img_src";s:43:"http://s.w.org/images/browsers/chrome.png?1";s:11:"img_src_ssl";s:44:"https://s.w.org/images/browsers/chrome.png?1";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;s:6:"mobile";b:0;}', 'no'),
(451, 'woocommerce_maybe_regenerate_images_hash', '991b1ca641921cf0f5baf7a2fe85861b', 'yes'),
(468, '_transient_timeout_plugin_slugs', '1525523942', 'no'),
(469, '_transient_plugin_slugs', 'a:8:{i:0;s:36:"contact-form-7/wp-contact-form-7.php";i:1;s:19:"jetpack/jetpack.php";i:2;s:27:"woocommerce/woocommerce.php";i:3;s:91:"woocommerce-gateway-paypal-express-checkout/woocommerce-gateway-paypal-express-checkout.php";i:4;s:57:"woocommerce-paypal-pro-payment-gateway/woo-paypal-pro.php";i:5;s:45:"woocommerce-services/woocommerce-services.php";i:6;s:41:"wordpress-importer/wordpress-importer.php";i:7;s:34:"yith-woocommerce-wishlist/init.php";}', 'no'),
(483, '_transient_timeout_wc_shipping_method_count_0_1525091669', '1527831408', 'no'),
(484, '_transient_wc_shipping_method_count_0_1525091669', '2', 'no'),
(485, 'woocommerce_bacs_accounts', 'a:1:{i:0;a:6:{s:12:"account_name";s:0:"";s:14:"account_number";s:0:"";s:9:"bank_name";s:0:"";s:9:"sort_code";s:0:"";s:4:"iban";s:0:"";s:3:"bic";s:0:"";}}', 'yes'),
(492, 'woocommerce_version', '3.3.5', 'yes'),
(493, 'woocommerce_db_version', '3.3.5', 'yes'),
(509, '_transient_orders-transient-version', '1525437062', 'yes'),
(527, 'woocommerce_paypal_settings', 'a:23:{s:7:"enabled";s:3:"yes";s:5:"title";s:6:"PayPal";s:11:"description";s:85:"Pay via PayPal; you can pay with your credit card if you don\'t have a PayPal account.";s:5:"email";s:23:"meettomangesh@gmail.com";s:8:"advanced";s:0:"";s:8:"testmode";s:3:"yes";s:5:"debug";s:2:"no";s:16:"ipn_notification";s:3:"yes";s:14:"receiver_email";s:23:"meettomangesh@gmail.com";s:14:"identity_token";s:0:"";s:14:"invoice_prefix";s:3:"WC-";s:13:"send_shipping";s:2:"no";s:16:"address_override";s:2:"no";s:13:"paymentaction";s:4:"sale";s:10:"page_style";s:0:"";s:9:"image_url";s:0:"";s:11:"api_details";s:0:"";s:12:"api_username";s:0:"";s:12:"api_password";s:0:"";s:13:"api_signature";s:0:"";s:20:"sandbox_api_username";s:35:"testbrogaardbusiness_api1.gmail.com";s:20:"sandbox_api_password";s:35:"testbrogaardbusiness_api1.gmail.com";s:21:"sandbox_api_signature";s:56:"AdnTXdKpmOs3nB8WH-nT6RoE6qV.AYdi8g6mSJtrkJBcM4D2S6V970U7";}', 'yes'),
(533, 'woocommerce_ppec_payer_id_sandbox_b6d9330312381e97de6e1b13ee966098', 'QZ5WBCS2HLXV6', 'yes'),
(534, 'woo_pp_admin_error', 'a:1:{i:0;a:1:{s:7:"success";s:59:"Success!  Your PayPal account has been set up successfully.";}}', 'yes'),
(585, 'woocommerce_gateway_order', 'a:5:{s:4:"bacs";i:0;s:6:"cheque";i:1;s:3:"cod";i:2;s:6:"paypal";i:3;s:9:"paypalpro";i:4;}', 'yes'),
(610, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1525416423;s:7:"checked";a:4:{s:16:"ecommerce-market";s:5:"1.0.6";s:13:"twentyfifteen";s:3:"1.9";s:15:"twentyseventeen";s:3:"1.5";s:13:"twentysixteen";s:3:"1.4";}s:8:"response";a:1:{s:16:"ecommerce-market";a:4:{s:5:"theme";s:16:"ecommerce-market";s:11:"new_version";s:5:"1.0.8";s:3:"url";s:46:"https://wordpress.org/themes/ecommerce-market/";s:7:"package";s:64:"https://downloads.wordpress.org/theme/ecommerce-market.1.0.8.zip";}}s:12:"translations";a:0:{}}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(611, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1525437540;s:8:"response";a:1:{s:19:"jetpack/jetpack.php";O:8:"stdClass":12:{s:2:"id";s:21:"w.org/plugins/jetpack";s:4:"slug";s:7:"jetpack";s:6:"plugin";s:19:"jetpack/jetpack.php";s:11:"new_version";s:3:"6.1";s:3:"url";s:38:"https://wordpress.org/plugins/jetpack/";s:7:"package";s:54:"https://downloads.wordpress.org/plugin/jetpack.6.1.zip";s:5:"icons";a:3:{s:2:"2x";s:60:"https://ps.w.org/jetpack/assets/icon-256x256.png?rev=1791404";s:2:"1x";s:52:"https://ps.w.org/jetpack/assets/icon.svg?rev=1791404";s:3:"svg";s:52:"https://ps.w.org/jetpack/assets/icon.svg?rev=1791404";}s:7:"banners";a:2:{s:2:"2x";s:63:"https://ps.w.org/jetpack/assets/banner-1544x500.png?rev=1791404";s:2:"1x";s:62:"https://ps.w.org/jetpack/assets/banner-772x250.png?rev=1791404";}s:11:"banners_rtl";a:0:{}s:6:"tested";s:5:"4.9.5";s:12:"requires_php";N;s:13:"compatibility";O:8:"stdClass":0:{}}}s:12:"translations";a:0:{}s:9:"no_update";a:7:{s:36:"contact-form-7/wp-contact-form-7.php";O:8:"stdClass":9:{s:2:"id";s:28:"w.org/plugins/contact-form-7";s:4:"slug";s:14:"contact-form-7";s:6:"plugin";s:36:"contact-form-7/wp-contact-form-7.php";s:11:"new_version";s:5:"5.0.1";s:3:"url";s:45:"https://wordpress.org/plugins/contact-form-7/";s:7:"package";s:63:"https://downloads.wordpress.org/plugin/contact-form-7.5.0.1.zip";s:5:"icons";a:2:{s:2:"2x";s:66:"https://ps.w.org/contact-form-7/assets/icon-256x256.png?rev=984007";s:2:"1x";s:66:"https://ps.w.org/contact-form-7/assets/icon-128x128.png?rev=984007";}s:7:"banners";a:2:{s:2:"2x";s:69:"https://ps.w.org/contact-form-7/assets/banner-1544x500.png?rev=860901";s:2:"1x";s:68:"https://ps.w.org/contact-form-7/assets/banner-772x250.png?rev=880427";}s:11:"banners_rtl";a:0:{}}s:27:"woocommerce/woocommerce.php";O:8:"stdClass":9:{s:2:"id";s:25:"w.org/plugins/woocommerce";s:4:"slug";s:11:"woocommerce";s:6:"plugin";s:27:"woocommerce/woocommerce.php";s:11:"new_version";s:5:"3.3.5";s:3:"url";s:42:"https://wordpress.org/plugins/woocommerce/";s:7:"package";s:60:"https://downloads.wordpress.org/plugin/woocommerce.3.3.5.zip";s:5:"icons";a:2:{s:2:"2x";s:64:"https://ps.w.org/woocommerce/assets/icon-256x256.png?rev=1440831";s:2:"1x";s:64:"https://ps.w.org/woocommerce/assets/icon-128x128.png?rev=1440831";}s:7:"banners";a:2:{s:2:"2x";s:67:"https://ps.w.org/woocommerce/assets/banner-1544x500.png?rev=1629184";s:2:"1x";s:66:"https://ps.w.org/woocommerce/assets/banner-772x250.png?rev=1629184";}s:11:"banners_rtl";a:0:{}}s:91:"woocommerce-gateway-paypal-express-checkout/woocommerce-gateway-paypal-express-checkout.php";O:8:"stdClass":9:{s:2:"id";s:57:"w.org/plugins/woocommerce-gateway-paypal-express-checkout";s:4:"slug";s:43:"woocommerce-gateway-paypal-express-checkout";s:6:"plugin";s:91:"woocommerce-gateway-paypal-express-checkout/woocommerce-gateway-paypal-express-checkout.php";s:11:"new_version";s:5:"1.5.3";s:3:"url";s:74:"https://wordpress.org/plugins/woocommerce-gateway-paypal-express-checkout/";s:7:"package";s:92:"https://downloads.wordpress.org/plugin/woocommerce-gateway-paypal-express-checkout.1.5.3.zip";s:5:"icons";a:2:{s:2:"2x";s:96:"https://ps.w.org/woocommerce-gateway-paypal-express-checkout/assets/icon-256x256.png?rev=1410389";s:2:"1x";s:96:"https://ps.w.org/woocommerce-gateway-paypal-express-checkout/assets/icon-128x128.png?rev=1410389";}s:7:"banners";a:2:{s:2:"2x";s:99:"https://ps.w.org/woocommerce-gateway-paypal-express-checkout/assets/banner-1544x500.png?rev=1410389";s:2:"1x";s:98:"https://ps.w.org/woocommerce-gateway-paypal-express-checkout/assets/banner-772x250.png?rev=1410389";}s:11:"banners_rtl";a:0:{}}s:57:"woocommerce-paypal-pro-payment-gateway/woo-paypal-pro.php";O:8:"stdClass":9:{s:2:"id";s:52:"w.org/plugins/woocommerce-paypal-pro-payment-gateway";s:4:"slug";s:38:"woocommerce-paypal-pro-payment-gateway";s:6:"plugin";s:57:"woocommerce-paypal-pro-payment-gateway/woo-paypal-pro.php";s:11:"new_version";s:3:"2.3";s:3:"url";s:69:"https://wordpress.org/plugins/woocommerce-paypal-pro-payment-gateway/";s:7:"package";s:81:"https://downloads.wordpress.org/plugin/woocommerce-paypal-pro-payment-gateway.zip";s:5:"icons";a:1:{s:2:"1x";s:91:"https://ps.w.org/woocommerce-paypal-pro-payment-gateway/assets/icon-128x128.png?rev=1130363";}s:7:"banners";a:1:{s:2:"1x";s:93:"https://ps.w.org/woocommerce-paypal-pro-payment-gateway/assets/banner-772x250.png?rev=1130363";}s:11:"banners_rtl";a:0:{}}s:45:"woocommerce-services/woocommerce-services.php";O:8:"stdClass":9:{s:2:"id";s:34:"w.org/plugins/woocommerce-services";s:4:"slug";s:20:"woocommerce-services";s:6:"plugin";s:45:"woocommerce-services/woocommerce-services.php";s:11:"new_version";s:6:"1.12.3";s:3:"url";s:51:"https://wordpress.org/plugins/woocommerce-services/";s:7:"package";s:70:"https://downloads.wordpress.org/plugin/woocommerce-services.1.12.3.zip";s:5:"icons";a:2:{s:2:"2x";s:73:"https://ps.w.org/woocommerce-services/assets/icon-256x256.png?rev=1586175";s:2:"1x";s:73:"https://ps.w.org/woocommerce-services/assets/icon-128x128.png?rev=1586175";}s:7:"banners";a:2:{s:2:"2x";s:76:"https://ps.w.org/woocommerce-services/assets/banner-1544x500.png?rev=1598183";s:2:"1x";s:75:"https://ps.w.org/woocommerce-services/assets/banner-772x250.png?rev=1598183";}s:11:"banners_rtl";a:0:{}}s:41:"wordpress-importer/wordpress-importer.php";O:8:"stdClass":9:{s:2:"id";s:32:"w.org/plugins/wordpress-importer";s:4:"slug";s:18:"wordpress-importer";s:6:"plugin";s:41:"wordpress-importer/wordpress-importer.php";s:11:"new_version";s:5:"0.6.4";s:3:"url";s:49:"https://wordpress.org/plugins/wordpress-importer/";s:7:"package";s:67:"https://downloads.wordpress.org/plugin/wordpress-importer.0.6.4.zip";s:5:"icons";a:1:{s:7:"default";s:69:"https://s.w.org/plugins/geopattern-icon/wordpress-importer_5696b3.svg";}s:7:"banners";a:1:{s:2:"1x";s:72:"https://ps.w.org/wordpress-importer/assets/banner-772x250.png?rev=547654";}s:11:"banners_rtl";a:0:{}}s:34:"yith-woocommerce-wishlist/init.php";O:8:"stdClass":9:{s:2:"id";s:39:"w.org/plugins/yith-woocommerce-wishlist";s:4:"slug";s:25:"yith-woocommerce-wishlist";s:6:"plugin";s:34:"yith-woocommerce-wishlist/init.php";s:11:"new_version";s:5:"2.2.1";s:3:"url";s:56:"https://wordpress.org/plugins/yith-woocommerce-wishlist/";s:7:"package";s:74:"https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.2.2.1.zip";s:5:"icons";a:1:{s:2:"1x";s:78:"https://ps.w.org/yith-woocommerce-wishlist/assets/icon-128x128.jpg?rev=1461336";}s:7:"banners";a:2:{s:2:"2x";s:81:"https://ps.w.org/yith-woocommerce-wishlist/assets/banner-1544x500.jpg?rev=1461336";s:2:"1x";s:80:"https://ps.w.org/yith-woocommerce-wishlist/assets/banner-772x250.jpg?rev=1461336";}s:11:"banners_rtl";a:0:{}}}}', 'no'),
(615, '_transient_timeout_jetpack_https_test', '1525514551', 'no'),
(616, '_transient_jetpack_https_test', '1', 'no'),
(617, '_transient_timeout_jetpack_https_test_message', '1525514551', 'no'),
(618, '_transient_jetpack_https_test_message', '', 'no'),
(619, '_transient_timeout_dash_v2_88ae138922fe95674369b1cb3d215a2b', '1525471353', 'no'),
(620, '_transient_dash_v2_88ae138922fe95674369b1cb3d215a2b', '<div class="rss-widget"><ul><li>An error has occurred, which probably means the feed is down. Try again later.</li></ul></div><div class="rss-widget"><ul><li>An error has occurred, which probably means the feed is down. Try again later.</li></ul></div>', 'no'),
(621, '_site_transient_timeout_community-events-4501c091b0366d76ea3218b6cfdd8097', '1525471354', 'no'),
(622, '_site_transient_community-events-4501c091b0366d76ea3218b6cfdd8097', 'a:2:{s:8:"location";a:1:{s:2:"ip";s:2:"::";}s:6:"events";a:1:{i:0;a:7:{s:4:"type";s:6:"meetup";s:5:"title";s:38:"WordPress 15th Anniversary Celebration";s:3:"url";s:56:"https://www.meetup.com/WordPressMumbai/events/249605456/";s:6:"meetup";s:23:"Mumbai WordPress Meetup";s:10:"meetup_url";s:39:"https://www.meetup.com/WordPressMumbai/";s:4:"date";s:19:"2018-05-27 18:00:00";s:8:"location";a:4:{s:8:"location";s:17:"Mumbai, MH, India";s:7:"country";s:2:"IN";s:8:"latitude";d:18.959999084473;s:9:"longitude";d:72.819999694824;}}}}', 'no'),
(629, 'woocommerce_ppec_payer_id_sandbox_1c18ffb31041d2d063b780ede2fa2add', 'NNMEVEJEBHP32', 'yes'),
(639, '_transient_timeout__woocommerce_helper_updates', '1525473732', 'no'),
(640, '_transient__woocommerce_helper_updates', 'a:4:{s:4:"hash";s:32:"d751713988987e9331980363e24189ce";s:7:"updated";i:1525430532;s:8:"products";a:0:{}s:6:"errors";a:1:{i:0;s:10:"http-error";}}', 'no'),
(641, '_transient_timeout_wc_related_47', '1525517030', 'no'),
(642, '_transient_wc_related_47', 'a:1:{s:50:"limit=4&exclude_ids%5B0%5D=0&exclude_ids%5B1%5D=47";a:4:{i:0;s:2:"44";i:1;s:2:"68";i:2;s:2:"70";i:3;s:2:"83";}}', 'no'),
(649, '_transient_timeout_yith_wcwl_user_default_count_1', '1526037022', 'no'),
(650, '_transient_yith_wcwl_user_default_count_1', '0', 'no'),
(652, '_transient_timeout_jetpack_idc_allowed', '1525439198', 'no'),
(653, '_transient_jetpack_idc_allowed', '1', 'no'),
(657, '_transient_wc_count_comments', 'O:8:"stdClass":7:{s:14:"total_comments";i:2;s:3:"all";i:2;s:8:"approved";s:1:"2";s:9:"moderated";i:0;s:4:"spam";i:0;s:5:"trash";i:0;s:12:"post-trashed";i:0;}', 'yes'),
(659, '_transient_timeout__woocommerce_helper_subscriptions', '1525438440', 'no'),
(660, '_transient__woocommerce_helper_subscriptions', 'a:0:{}', 'no'),
(661, '_site_transient_timeout_theme_roots', '1525439340', 'no'),
(662, '_site_transient_theme_roots', 'a:4:{s:16:"ecommerce-market";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:15:"twentyseventeen";s:7:"/themes";s:13:"twentysixteen";s:7:"/themes";}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(4, 9, '_form', '<label> Your Name (required)\n    [text* your-name] </label>\n\n<label> Your Email (required)\n    [email* your-email] </label>\n\n<label> Subject\n    [text your-subject] </label>\n\n<label> Your Message\n    [textarea your-message] </label>\n\n[submit "Send"]'),
(5, 9, '_mail', 'a:8:{s:7:"subject";s:25:"brogaard "[your-subject]"";s:6:"sender";s:37:"[your-name] <meettomangesh@gmail.com>";s:4:"body";s:172:"From: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on brogaard (http://localhost/brogaard)";s:9:"recipient";s:23:"meettomangesh@gmail.com";s:18:"additional_headers";s:22:"Reply-To: [your-email]";s:11:"attachments";s:0:"";s:8:"use_html";i:0;s:13:"exclude_blank";i:0;}'),
(6, 9, '_mail_2', 'a:9:{s:6:"active";b:0;s:7:"subject";s:25:"brogaard "[your-subject]"";s:6:"sender";s:34:"brogaard <meettomangesh@gmail.com>";s:4:"body";s:114:"Message Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on brogaard (http://localhost/brogaard)";s:9:"recipient";s:12:"[your-email]";s:18:"additional_headers";s:33:"Reply-To: meettomangesh@gmail.com";s:11:"attachments";s:0:"";s:8:"use_html";i:0;s:13:"exclude_blank";i:0;}'),
(7, 9, '_messages', 'a:8:{s:12:"mail_sent_ok";s:45:"Thank you for your message. It has been sent.";s:12:"mail_sent_ng";s:71:"There was an error trying to send your message. Please try again later.";s:16:"validation_error";s:61:"One or more fields have an error. Please check and try again.";s:4:"spam";s:71:"There was an error trying to send your message. Please try again later.";s:12:"accept_terms";s:69:"You must accept the terms and conditions before sending your message.";s:16:"invalid_required";s:22:"The field is required.";s:16:"invalid_too_long";s:22:"The field is too long.";s:17:"invalid_too_short";s:23:"The field is too short.";}'),
(8, 9, '_additional_settings', NULL),
(9, 9, '_locale', 'en_US'),
(10, 11, '_wp_attached_file', '2018/04/log_file_2018-04-30__13-04-06.txt'),
(11, 12, '_wp_attached_file', '2018/04/log_file_2018-04-30__13-22-26.txt'),
(12, 13, '_wp_attached_file', '2018/04/log_file_2018-04-30__13-51-15.txt'),
(15, 44, '_wpcom_is_markdown', '1'),
(16, 44, '_sku', 'woo-vneck-tee'),
(17, 44, '_regular_price', ''),
(18, 44, '_sale_price', ''),
(19, 44, '_sale_price_dates_from', ''),
(20, 44, '_sale_price_dates_to', ''),
(21, 44, 'total_sales', '2'),
(22, 44, '_tax_status', 'taxable'),
(23, 44, '_tax_class', ''),
(24, 44, '_manage_stock', 'no'),
(25, 44, '_backorders', 'no'),
(26, 44, '_sold_individually', 'no'),
(27, 44, '_weight', '.5'),
(28, 44, '_length', '24'),
(29, 44, '_width', '1'),
(30, 44, '_height', '2'),
(31, 44, '_upsell_ids', 'a:0:{}'),
(32, 44, '_crosssell_ids', 'a:0:{}'),
(33, 44, '_purchase_note', ''),
(34, 44, '_default_attributes', 'a:0:{}'),
(35, 44, '_virtual', 'no'),
(36, 44, '_downloadable', 'no'),
(37, 44, '_product_image_gallery', '50,51'),
(38, 44, '_download_limit', '0'),
(39, 44, '_download_expiry', '0'),
(40, 44, '_stock', ''),
(41, 44, '_stock_status', 'instock'),
(42, 44, '_wc_average_rating', '0'),
(43, 44, '_wc_rating_count', 'a:0:{}'),
(44, 44, '_wc_review_count', '0'),
(45, 44, '_downloadable_files', 'a:0:{}'),
(46, 44, '_product_attributes', 'a:2:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:1;s:11:"is_taxonomy";i:1;}s:7:"pa_size";a:6:{s:4:"name";s:7:"pa_size";s:5:"value";s:0:"";s:8:"position";i:1;s:10:"is_visible";i:1;s:12:"is_variation";i:1;s:11:"is_taxonomy";i:1;}}'),
(47, 44, '_product_version', '3.3.0'),
(48, 44, '_wp_old_slug', 'import-placeholder-for-woo-vneck-tee'),
(49, 44, '_thumbnail_id', '49'),
(50, 44, '_edit_last', '1'),
(51, 44, '_price', '15'),
(52, 44, '_price', '20'),
(53, 45, '_wpcom_is_markdown', '1'),
(54, 45, '_sku', 'woo-hoodie'),
(55, 45, '_regular_price', ''),
(56, 45, '_sale_price', ''),
(57, 45, '_sale_price_dates_from', ''),
(58, 45, '_sale_price_dates_to', ''),
(59, 45, 'total_sales', '1'),
(60, 45, '_tax_status', 'taxable'),
(61, 45, '_tax_class', ''),
(62, 45, '_manage_stock', 'no'),
(63, 45, '_backorders', 'no'),
(64, 45, '_sold_individually', 'no'),
(65, 45, '_weight', '1.5'),
(66, 45, '_length', '10'),
(67, 45, '_width', '8'),
(68, 45, '_height', '3'),
(69, 45, '_upsell_ids', 'a:0:{}'),
(70, 45, '_crosssell_ids', 'a:0:{}'),
(71, 45, '_purchase_note', ''),
(72, 45, '_default_attributes', 'a:0:{}'),
(73, 45, '_virtual', 'no'),
(74, 45, '_downloadable', 'no'),
(75, 45, '_product_image_gallery', '53,54,55'),
(76, 45, '_download_limit', '0'),
(77, 45, '_download_expiry', '0'),
(78, 45, '_stock', ''),
(79, 45, '_stock_status', 'instock'),
(80, 45, '_wc_average_rating', '0'),
(81, 45, '_wc_rating_count', 'a:0:{}'),
(82, 45, '_wc_review_count', '0'),
(83, 45, '_downloadable_files', 'a:0:{}'),
(84, 45, '_product_attributes', 'a:2:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:1;s:11:"is_taxonomy";i:1;}s:4:"logo";a:6:{s:4:"name";s:4:"Logo";s:5:"value";s:8:"Yes | No";s:8:"position";i:1;s:10:"is_visible";i:1;s:12:"is_variation";i:1;s:11:"is_taxonomy";i:0;}}'),
(85, 45, '_product_version', '3.3.0'),
(86, 45, '_wp_old_slug', 'import-placeholder-for-woo-hoodie'),
(87, 45, '_thumbnail_id', '52'),
(88, 45, '_price', '42'),
(89, 45, '_price', '45'),
(90, 45, '_edit_last', '1'),
(91, 46, '_wpcom_is_markdown', '1'),
(92, 46, '_sku', 'woo-hoodie-with-logo'),
(93, 46, '_regular_price', '45'),
(94, 46, '_sale_price', ''),
(95, 46, '_sale_price_dates_from', ''),
(96, 46, '_sale_price_dates_to', ''),
(97, 46, 'total_sales', '6'),
(98, 46, '_tax_status', 'taxable'),
(99, 46, '_tax_class', ''),
(100, 46, '_manage_stock', 'no'),
(101, 46, '_backorders', 'no'),
(102, 46, '_sold_individually', 'no'),
(103, 46, '_weight', '2'),
(104, 46, '_length', '10'),
(105, 46, '_width', '6'),
(106, 46, '_height', '3'),
(107, 46, '_upsell_ids', 'a:0:{}'),
(108, 46, '_crosssell_ids', 'a:0:{}'),
(109, 46, '_purchase_note', ''),
(110, 46, '_default_attributes', 'a:0:{}'),
(111, 46, '_virtual', 'no'),
(112, 46, '_downloadable', 'no'),
(113, 46, '_product_image_gallery', ''),
(114, 46, '_download_limit', '0'),
(115, 46, '_download_expiry', '0'),
(116, 46, '_stock', ''),
(117, 46, '_stock_status', 'instock'),
(118, 46, '_wc_average_rating', '0'),
(119, 46, '_wc_rating_count', 'a:0:{}'),
(120, 46, '_wc_review_count', '0'),
(121, 46, '_downloadable_files', 'a:0:{}'),
(122, 46, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(123, 46, '_product_version', '3.3.0'),
(124, 46, '_price', '45'),
(125, 46, '_wp_old_slug', 'import-placeholder-for-woo-hoodie-with-logo'),
(126, 46, '_thumbnail_id', '55'),
(127, 46, '_edit_last', '1'),
(128, 47, '_wpcom_is_markdown', '1'),
(129, 47, '_sku', 'woo-tshirt'),
(130, 47, '_regular_price', '18'),
(131, 47, '_sale_price', ''),
(132, 47, '_sale_price_dates_from', ''),
(133, 47, '_sale_price_dates_to', ''),
(134, 47, 'total_sales', '1'),
(135, 47, '_tax_status', 'taxable'),
(136, 47, '_tax_class', ''),
(137, 47, '_manage_stock', 'no'),
(138, 47, '_backorders', 'no'),
(139, 47, '_sold_individually', 'no'),
(140, 47, '_weight', '.8'),
(141, 47, '_length', '8'),
(142, 47, '_width', '6'),
(143, 47, '_height', '1'),
(144, 47, '_upsell_ids', 'a:0:{}'),
(145, 47, '_crosssell_ids', 'a:0:{}'),
(146, 47, '_purchase_note', ''),
(147, 47, '_default_attributes', 'a:0:{}'),
(148, 47, '_virtual', 'no'),
(149, 47, '_downloadable', 'no'),
(150, 47, '_product_image_gallery', ''),
(151, 47, '_download_limit', '0'),
(152, 47, '_download_expiry', '0'),
(153, 47, '_stock', ''),
(154, 47, '_stock_status', 'instock'),
(155, 47, '_wc_average_rating', '0'),
(156, 47, '_wc_rating_count', 'a:0:{}'),
(157, 47, '_wc_review_count', '0'),
(158, 47, '_downloadable_files', 'a:0:{}'),
(159, 47, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(160, 47, '_product_version', '3.3.0'),
(161, 47, '_price', '18'),
(162, 47, '_wp_old_slug', 'import-placeholder-for-woo-tshirt'),
(163, 47, '_thumbnail_id', '71'),
(164, 47, '_edit_last', '1'),
(165, 48, '_wpcom_is_markdown', '1'),
(166, 48, '_sku', 'woo-beanie'),
(167, 48, '_regular_price', '20'),
(168, 48, '_sale_price', '18'),
(169, 48, '_sale_price_dates_from', ''),
(170, 48, '_sale_price_dates_to', ''),
(171, 48, 'total_sales', '5'),
(172, 48, '_tax_status', 'taxable'),
(173, 48, '_tax_class', ''),
(174, 48, '_manage_stock', 'no'),
(175, 48, '_backorders', 'no'),
(176, 48, '_sold_individually', 'no'),
(177, 48, '_weight', '.2'),
(178, 48, '_length', '4'),
(179, 48, '_width', '5'),
(180, 48, '_height', '.5'),
(181, 48, '_upsell_ids', 'a:0:{}'),
(182, 48, '_crosssell_ids', 'a:0:{}'),
(183, 48, '_purchase_note', ''),
(184, 48, '_default_attributes', 'a:0:{}'),
(185, 48, '_virtual', 'no'),
(186, 48, '_downloadable', 'no'),
(187, 48, '_product_image_gallery', ''),
(188, 48, '_download_limit', '0'),
(189, 48, '_download_expiry', '0'),
(190, 48, '_stock', ''),
(191, 48, '_stock_status', 'instock'),
(192, 48, '_wc_average_rating', '0'),
(193, 48, '_wc_rating_count', 'a:0:{}'),
(194, 48, '_wc_review_count', '0'),
(195, 48, '_downloadable_files', 'a:0:{}'),
(196, 48, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(197, 48, '_product_version', '3.3.0'),
(198, 48, '_price', '18'),
(199, 48, '_wp_old_slug', 'import-placeholder-for-woo-beanie'),
(200, 48, '_thumbnail_id', '56'),
(201, 48, '_edit_last', '1'),
(202, 58, '_wpcom_is_markdown', '1'),
(203, 58, '_sku', 'woo-belt'),
(204, 58, '_regular_price', '65'),
(205, 58, '_sale_price', '55'),
(206, 58, '_sale_price_dates_from', ''),
(207, 58, '_sale_price_dates_to', ''),
(208, 58, 'total_sales', '3'),
(209, 58, '_tax_status', 'taxable'),
(210, 58, '_tax_class', ''),
(211, 58, '_manage_stock', 'no'),
(212, 58, '_backorders', 'no'),
(213, 58, '_sold_individually', 'no'),
(214, 58, '_weight', '1.2'),
(215, 58, '_length', '12'),
(216, 58, '_width', '2'),
(217, 58, '_height', '1.5'),
(218, 58, '_upsell_ids', 'a:0:{}'),
(219, 58, '_crosssell_ids', 'a:0:{}'),
(220, 58, '_purchase_note', ''),
(221, 58, '_default_attributes', 'a:0:{}'),
(222, 58, '_virtual', 'no'),
(223, 58, '_downloadable', 'no'),
(224, 58, '_product_image_gallery', ''),
(225, 58, '_download_limit', '0'),
(226, 58, '_download_expiry', '0'),
(227, 58, '_thumbnail_id', '57'),
(228, 58, '_stock', ''),
(229, 58, '_stock_status', 'instock'),
(230, 58, '_wc_average_rating', '0'),
(231, 58, '_wc_rating_count', 'a:0:{}'),
(232, 58, '_wc_review_count', '0'),
(233, 58, '_downloadable_files', 'a:0:{}'),
(234, 58, '_product_attributes', 'a:0:{}'),
(235, 58, '_product_version', '3.3.0'),
(236, 58, '_price', '55'),
(237, 58, '_edit_last', '1'),
(238, 60, '_wpcom_is_markdown', '1'),
(239, 60, '_sku', 'woo-cap'),
(240, 60, '_regular_price', '18'),
(241, 60, '_sale_price', '16'),
(242, 60, '_sale_price_dates_from', ''),
(243, 60, '_sale_price_dates_to', ''),
(244, 60, 'total_sales', '4'),
(245, 60, '_tax_status', 'taxable'),
(246, 60, '_tax_class', ''),
(247, 60, '_manage_stock', 'no'),
(248, 60, '_backorders', 'no'),
(249, 60, '_sold_individually', 'no'),
(250, 60, '_weight', '0.6'),
(251, 60, '_length', '8'),
(252, 60, '_width', '6.5'),
(253, 60, '_height', '4'),
(254, 60, '_upsell_ids', 'a:0:{}'),
(255, 60, '_crosssell_ids', 'a:0:{}'),
(256, 60, '_purchase_note', ''),
(257, 60, '_default_attributes', 'a:0:{}'),
(258, 60, '_virtual', 'no'),
(259, 60, '_downloadable', 'no'),
(260, 60, '_product_image_gallery', ''),
(261, 60, '_download_limit', '0'),
(262, 60, '_download_expiry', '0'),
(263, 60, '_thumbnail_id', '59'),
(264, 60, '_stock', ''),
(265, 60, '_stock_status', 'instock'),
(266, 60, '_wc_average_rating', '0'),
(267, 60, '_wc_rating_count', 'a:0:{}'),
(268, 60, '_wc_review_count', '0'),
(269, 60, '_downloadable_files', 'a:0:{}'),
(270, 60, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(271, 60, '_product_version', '3.3.0'),
(272, 60, '_price', '16'),
(273, 60, '_edit_last', '1'),
(274, 62, '_wpcom_is_markdown', '1'),
(275, 62, '_sku', 'woo-sunglasses'),
(276, 62, '_regular_price', '90'),
(277, 62, '_sale_price', ''),
(278, 62, '_sale_price_dates_from', ''),
(279, 62, '_sale_price_dates_to', ''),
(280, 62, 'total_sales', '1'),
(281, 62, '_tax_status', 'taxable'),
(282, 62, '_tax_class', ''),
(283, 62, '_manage_stock', 'no'),
(284, 62, '_backorders', 'no'),
(285, 62, '_sold_individually', 'no'),
(286, 62, '_weight', '.2'),
(287, 62, '_length', '4'),
(288, 62, '_width', '1.4'),
(289, 62, '_height', '1'),
(290, 62, '_upsell_ids', 'a:0:{}'),
(291, 62, '_crosssell_ids', 'a:0:{}'),
(292, 62, '_purchase_note', ''),
(293, 62, '_default_attributes', 'a:0:{}'),
(294, 62, '_virtual', 'no'),
(295, 62, '_downloadable', 'no'),
(296, 62, '_product_image_gallery', ''),
(297, 62, '_download_limit', '0'),
(298, 62, '_download_expiry', '0'),
(299, 62, '_thumbnail_id', '61'),
(300, 62, '_stock', ''),
(301, 62, '_stock_status', 'instock'),
(302, 62, '_wc_average_rating', '0'),
(303, 62, '_wc_rating_count', 'a:0:{}'),
(304, 62, '_wc_review_count', '0'),
(305, 62, '_downloadable_files', 'a:0:{}'),
(306, 62, '_product_attributes', 'a:0:{}'),
(307, 62, '_product_version', '3.3.0'),
(308, 62, '_price', '90'),
(309, 62, '_edit_last', '1'),
(310, 64, '_wpcom_is_markdown', '1'),
(311, 64, '_sku', 'woo-hoodie-with-pocket'),
(312, 64, '_regular_price', '45'),
(313, 64, '_sale_price', '35'),
(314, 64, '_sale_price_dates_from', ''),
(315, 64, '_sale_price_dates_to', ''),
(316, 64, 'total_sales', '0'),
(317, 64, '_tax_status', 'taxable'),
(318, 64, '_tax_class', ''),
(319, 64, '_manage_stock', 'no'),
(320, 64, '_backorders', 'no'),
(321, 64, '_sold_individually', 'no'),
(322, 64, '_weight', '3'),
(323, 64, '_length', '10'),
(324, 64, '_width', '8'),
(325, 64, '_height', '2'),
(326, 64, '_upsell_ids', 'a:0:{}'),
(327, 64, '_crosssell_ids', 'a:0:{}'),
(328, 64, '_purchase_note', ''),
(329, 64, '_default_attributes', 'a:0:{}'),
(330, 64, '_virtual', 'no'),
(331, 64, '_downloadable', 'no'),
(332, 64, '_product_image_gallery', ''),
(333, 64, '_download_limit', '0'),
(334, 64, '_download_expiry', '0'),
(335, 64, '_thumbnail_id', '63'),
(336, 64, '_stock', ''),
(337, 64, '_stock_status', 'instock'),
(338, 64, '_wc_average_rating', '0'),
(339, 64, '_wc_rating_count', 'a:0:{}'),
(340, 64, '_wc_review_count', '0'),
(341, 64, '_downloadable_files', 'a:0:{}'),
(342, 64, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(343, 64, '_product_version', '3.3.0'),
(344, 64, '_price', '35'),
(345, 64, '_edit_last', '1'),
(346, 66, '_wpcom_is_markdown', '1'),
(347, 66, '_sku', 'woo-hoodie-with-zipper'),
(348, 66, '_regular_price', '45'),
(349, 66, '_sale_price', ''),
(350, 66, '_sale_price_dates_from', ''),
(351, 66, '_sale_price_dates_to', ''),
(352, 66, 'total_sales', '1'),
(353, 66, '_tax_status', 'taxable'),
(354, 66, '_tax_class', ''),
(355, 66, '_manage_stock', 'no'),
(356, 66, '_backorders', 'no'),
(357, 66, '_sold_individually', 'no'),
(358, 66, '_weight', '2'),
(359, 66, '_length', '8'),
(360, 66, '_width', '6'),
(361, 66, '_height', '2'),
(362, 66, '_upsell_ids', 'a:0:{}'),
(363, 66, '_crosssell_ids', 'a:0:{}'),
(364, 66, '_purchase_note', ''),
(365, 66, '_default_attributes', 'a:0:{}'),
(366, 66, '_virtual', 'no'),
(367, 66, '_downloadable', 'no'),
(368, 66, '_product_image_gallery', ''),
(369, 66, '_download_limit', '0'),
(370, 66, '_download_expiry', '0'),
(371, 66, '_thumbnail_id', '65'),
(372, 66, '_stock', ''),
(373, 66, '_stock_status', 'instock'),
(374, 66, '_wc_average_rating', '0'),
(375, 66, '_wc_rating_count', 'a:0:{}'),
(376, 66, '_wc_review_count', '0'),
(377, 66, '_downloadable_files', 'a:0:{}'),
(378, 66, '_product_attributes', 'a:0:{}'),
(379, 66, '_product_version', '3.3.0'),
(380, 66, '_price', '45'),
(381, 66, '_edit_last', '1'),
(382, 68, '_wpcom_is_markdown', '1'),
(383, 68, '_sku', 'woo-long-sleeve-tee'),
(384, 68, '_regular_price', '25'),
(385, 68, '_sale_price', ''),
(386, 68, '_sale_price_dates_from', ''),
(387, 68, '_sale_price_dates_to', ''),
(388, 68, 'total_sales', '2'),
(389, 68, '_tax_status', 'taxable'),
(390, 68, '_tax_class', ''),
(391, 68, '_manage_stock', 'no'),
(392, 68, '_backorders', 'no'),
(393, 68, '_sold_individually', 'no'),
(394, 68, '_weight', '1'),
(395, 68, '_length', '7'),
(396, 68, '_width', '5'),
(397, 68, '_height', '1'),
(398, 68, '_upsell_ids', 'a:0:{}'),
(399, 68, '_crosssell_ids', 'a:0:{}'),
(400, 68, '_purchase_note', ''),
(401, 68, '_default_attributes', 'a:0:{}'),
(402, 68, '_virtual', 'no'),
(403, 68, '_downloadable', 'no'),
(404, 68, '_product_image_gallery', ''),
(405, 68, '_download_limit', '0'),
(406, 68, '_download_expiry', '0'),
(407, 68, '_thumbnail_id', '67'),
(408, 68, '_stock', ''),
(409, 68, '_stock_status', 'instock'),
(410, 68, '_wc_average_rating', '0'),
(411, 68, '_wc_rating_count', 'a:0:{}'),
(412, 68, '_wc_review_count', '0'),
(413, 68, '_downloadable_files', 'a:0:{}'),
(414, 68, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(415, 68, '_product_version', '3.3.0'),
(416, 68, '_price', '25'),
(417, 68, '_edit_last', '1'),
(418, 70, '_wpcom_is_markdown', '1'),
(419, 70, '_sku', 'woo-polo'),
(420, 70, '_regular_price', '20'),
(421, 70, '_sale_price', ''),
(422, 70, '_sale_price_dates_from', ''),
(423, 70, '_sale_price_dates_to', ''),
(424, 70, 'total_sales', '0'),
(425, 70, '_tax_status', 'taxable'),
(426, 70, '_tax_class', ''),
(427, 70, '_manage_stock', 'no'),
(428, 70, '_backorders', 'no'),
(429, 70, '_sold_individually', 'no'),
(430, 70, '_weight', '.8'),
(431, 70, '_length', '6'),
(432, 70, '_width', '5'),
(433, 70, '_height', '1'),
(434, 70, '_upsell_ids', 'a:0:{}'),
(435, 70, '_crosssell_ids', 'a:0:{}'),
(436, 70, '_purchase_note', ''),
(437, 70, '_default_attributes', 'a:0:{}'),
(438, 70, '_virtual', 'no'),
(439, 70, '_downloadable', 'no'),
(440, 70, '_product_image_gallery', ''),
(441, 70, '_download_limit', '0'),
(442, 70, '_download_expiry', '0'),
(443, 70, '_thumbnail_id', '69'),
(444, 70, '_stock', ''),
(445, 70, '_stock_status', 'instock'),
(446, 70, '_wc_average_rating', '0'),
(447, 70, '_wc_rating_count', 'a:0:{}'),
(448, 70, '_wc_review_count', '0'),
(449, 70, '_downloadable_files', 'a:0:{}'),
(450, 70, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(451, 70, '_product_version', '3.3.0'),
(452, 70, '_price', '20'),
(453, 70, '_edit_last', '1'),
(454, 73, '_wpcom_is_markdown', '1'),
(455, 73, '_sku', 'woo-album'),
(456, 73, '_regular_price', '15'),
(457, 73, '_sale_price', ''),
(458, 73, '_sale_price_dates_from', ''),
(459, 73, '_sale_price_dates_to', ''),
(460, 73, 'total_sales', '0'),
(461, 73, '_tax_status', 'taxable'),
(462, 73, '_tax_class', ''),
(463, 73, '_manage_stock', 'no'),
(464, 73, '_backorders', 'no'),
(465, 73, '_sold_individually', 'no'),
(466, 73, '_weight', ''),
(467, 73, '_length', ''),
(468, 73, '_width', ''),
(469, 73, '_height', ''),
(470, 73, '_upsell_ids', 'a:0:{}'),
(471, 73, '_crosssell_ids', 'a:0:{}'),
(472, 73, '_purchase_note', ''),
(473, 73, '_default_attributes', 'a:0:{}'),
(474, 73, '_virtual', 'yes'),
(475, 73, '_downloadable', 'yes'),
(476, 73, '_product_image_gallery', ''),
(477, 73, '_download_limit', '1'),
(478, 73, '_download_expiry', '1'),
(479, 73, '_thumbnail_id', '72'),
(480, 73, '_stock', ''),
(481, 73, '_stock_status', 'instock'),
(482, 73, '_wc_average_rating', '0'),
(483, 73, '_wc_rating_count', 'a:0:{}'),
(484, 73, '_wc_review_count', '0'),
(485, 73, '_downloadable_files', 'a:2:{s:36:"44d39352-bab5-4882-89fc-507d860f1033";a:3:{s:2:"id";s:36:"44d39352-bab5-4882-89fc-507d860f1033";s:4:"name";s:8:"Single 1";s:4:"file";s:85:"https://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2017/08/single.jpg";}s:36:"2a7174e2-79ab-4521-b715-a54178e6f9cf";a:3:{s:2:"id";s:36:"2a7174e2-79ab-4521-b715-a54178e6f9cf";s:4:"name";s:8:"Single 2";s:4:"file";s:84:"https://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2017/08/album.jpg";}}'),
(486, 73, '_product_attributes', 'a:0:{}'),
(487, 73, '_product_version', '3.3.0'),
(488, 73, '_price', '15'),
(489, 75, '_wpcom_is_markdown', '1'),
(490, 75, '_sku', 'woo-single'),
(491, 75, '_regular_price', '3'),
(492, 75, '_sale_price', '2'),
(493, 75, '_sale_price_dates_from', ''),
(494, 75, '_sale_price_dates_to', ''),
(495, 75, 'total_sales', '4'),
(496, 75, '_tax_status', 'taxable'),
(497, 75, '_tax_class', ''),
(498, 75, '_manage_stock', 'no'),
(499, 75, '_backorders', 'no'),
(500, 75, '_sold_individually', 'no'),
(501, 75, '_weight', ''),
(502, 75, '_length', ''),
(503, 75, '_width', ''),
(504, 75, '_height', ''),
(505, 75, '_upsell_ids', 'a:0:{}'),
(506, 75, '_crosssell_ids', 'a:0:{}'),
(507, 75, '_purchase_note', ''),
(508, 75, '_default_attributes', 'a:0:{}'),
(509, 75, '_virtual', 'yes'),
(510, 75, '_downloadable', 'yes'),
(511, 75, '_product_image_gallery', ''),
(512, 75, '_download_limit', '1'),
(513, 75, '_download_expiry', '1'),
(514, 75, '_thumbnail_id', '74'),
(515, 75, '_stock', ''),
(516, 75, '_stock_status', 'instock'),
(517, 75, '_wc_average_rating', '4.00'),
(518, 75, '_wc_rating_count', 'a:1:{i:4;i:1;}'),
(519, 75, '_wc_review_count', '1'),
(520, 75, '_downloadable_files', 'a:1:{s:36:"20166d16-7418-4c74-87ea-9bd521985cd7";a:3:{s:2:"id";s:36:"20166d16-7418-4c74-87ea-9bd521985cd7";s:4:"name";s:6:"Single";s:4:"file";s:85:"https://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2017/08/single.jpg";}}'),
(521, 75, '_product_attributes', 'a:0:{}'),
(522, 75, '_product_version', '3.3.0'),
(523, 75, '_price', '2'),
(524, 83, '_wpcom_is_markdown', '1'),
(525, 83, '_sku', 'Woo-tshirt-logo'),
(526, 83, '_regular_price', '18'),
(527, 83, '_sale_price', ''),
(528, 83, '_sale_price_dates_from', ''),
(529, 83, '_sale_price_dates_to', ''),
(530, 83, 'total_sales', '1'),
(531, 83, '_tax_status', 'taxable'),
(532, 83, '_tax_class', ''),
(533, 83, '_manage_stock', 'no'),
(534, 83, '_backorders', 'no'),
(535, 83, '_sold_individually', 'no'),
(536, 83, '_weight', '.5'),
(537, 83, '_length', '10'),
(538, 83, '_width', '12'),
(539, 83, '_height', '.5'),
(540, 83, '_upsell_ids', 'a:0:{}'),
(541, 83, '_crosssell_ids', 'a:0:{}'),
(542, 83, '_purchase_note', ''),
(543, 83, '_default_attributes', 'a:0:{}'),
(544, 83, '_virtual', 'no'),
(545, 83, '_downloadable', 'no'),
(546, 83, '_product_image_gallery', ''),
(547, 83, '_download_limit', '0'),
(548, 83, '_download_expiry', '0'),
(549, 83, '_thumbnail_id', '82'),
(550, 83, '_stock', ''),
(551, 83, '_stock_status', 'instock'),
(552, 83, '_wc_average_rating', '0'),
(553, 83, '_wc_rating_count', 'a:0:{}'),
(554, 83, '_wc_review_count', '0'),
(555, 83, '_downloadable_files', 'a:0:{}'),
(556, 83, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(557, 83, '_product_version', '3.3.0'),
(558, 83, '_price', '18'),
(559, 83, '_edit_last', '1'),
(560, 85, '_wpcom_is_markdown', '1'),
(561, 85, '_sku', 'Woo-beanie-logo'),
(562, 85, '_regular_price', '20'),
(563, 85, '_sale_price', '18'),
(564, 85, '_sale_price_dates_from', ''),
(565, 85, '_sale_price_dates_to', ''),
(566, 85, 'total_sales', '0'),
(567, 85, '_tax_status', 'taxable'),
(568, 85, '_tax_class', ''),
(569, 85, '_manage_stock', 'no'),
(570, 85, '_backorders', 'no'),
(571, 85, '_sold_individually', 'no'),
(572, 85, '_weight', '.2'),
(573, 85, '_length', '6'),
(574, 85, '_width', '4'),
(575, 85, '_height', '1'),
(576, 85, '_upsell_ids', 'a:0:{}'),
(577, 85, '_crosssell_ids', 'a:0:{}'),
(578, 85, '_purchase_note', ''),
(579, 85, '_default_attributes', 'a:0:{}'),
(580, 85, '_virtual', 'no'),
(581, 85, '_downloadable', 'no'),
(582, 85, '_product_image_gallery', ''),
(583, 85, '_download_limit', '0'),
(584, 85, '_download_expiry', '0'),
(585, 85, '_thumbnail_id', '84'),
(586, 85, '_stock', ''),
(587, 85, '_stock_status', 'instock'),
(588, 85, '_wc_average_rating', '0'),
(589, 85, '_wc_rating_count', 'a:0:{}'),
(590, 85, '_wc_review_count', '0'),
(591, 85, '_downloadable_files', 'a:0:{}'),
(592, 85, '_product_attributes', 'a:1:{s:8:"pa_color";a:6:{s:4:"name";s:8:"pa_color";s:5:"value";s:0:"";s:8:"position";i:0;s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'),
(593, 85, '_product_version', '3.3.0'),
(594, 85, '_price', '18'),
(595, 85, '_edit_last', '1'),
(596, 87, '_wpcom_is_markdown', '1'),
(597, 87, '_children', 'a:3:{i:0;i:46;i:1;i:47;i:2;i:48;}'),
(598, 87, '_sku', 'logo-collection'),
(599, 87, '_regular_price', ''),
(600, 87, '_sale_price', ''),
(601, 87, '_sale_price_dates_from', ''),
(602, 87, '_sale_price_dates_to', ''),
(603, 87, 'total_sales', '0'),
(604, 87, '_tax_status', 'taxable'),
(605, 87, '_tax_class', ''),
(606, 87, '_manage_stock', 'no'),
(607, 87, '_backorders', 'no'),
(608, 87, '_sold_individually', 'no'),
(609, 87, '_weight', ''),
(610, 87, '_length', ''),
(611, 87, '_width', ''),
(612, 87, '_height', ''),
(613, 87, '_upsell_ids', 'a:0:{}'),
(614, 87, '_crosssell_ids', 'a:0:{}'),
(615, 87, '_purchase_note', ''),
(616, 87, '_default_attributes', 'a:0:{}'),
(617, 87, '_virtual', 'no'),
(618, 87, '_downloadable', 'no'),
(619, 87, '_product_image_gallery', '84,82,55'),
(620, 87, '_download_limit', '0'),
(621, 87, '_download_expiry', '0'),
(622, 87, '_thumbnail_id', '86'),
(623, 87, '_stock', ''),
(624, 87, '_stock_status', 'instock'),
(625, 87, '_wc_average_rating', '0'),
(626, 87, '_wc_rating_count', 'a:0:{}'),
(627, 87, '_wc_review_count', '0'),
(628, 87, '_downloadable_files', 'a:0:{}'),
(629, 87, '_product_attributes', 'a:0:{}'),
(630, 87, '_product_version', '3.3.0'),
(631, 87, '_price', ''),
(632, 87, '_price', ''),
(633, 87, '_edit_last', '1'),
(634, 89, '_wpcom_is_markdown', '1'),
(635, 89, '_sku', 'wp-pennant'),
(636, 89, '_regular_price', '11.05'),
(637, 89, '_sale_price', ''),
(638, 89, '_sale_price_dates_from', ''),
(639, 89, '_sale_price_dates_to', ''),
(640, 89, 'total_sales', '0'),
(641, 89, '_tax_status', 'taxable'),
(642, 89, '_tax_class', ''),
(643, 89, '_manage_stock', 'no'),
(644, 89, '_backorders', 'no'),
(645, 89, '_sold_individually', 'no'),
(646, 89, '_weight', ''),
(647, 89, '_length', ''),
(648, 89, '_width', ''),
(649, 89, '_height', ''),
(650, 89, '_upsell_ids', 'a:0:{}'),
(651, 89, '_crosssell_ids', 'a:0:{}'),
(652, 89, '_purchase_note', ''),
(653, 89, '_default_attributes', 'a:0:{}'),
(654, 89, '_virtual', 'no'),
(655, 89, '_downloadable', 'no'),
(656, 89, '_product_image_gallery', ''),
(657, 89, '_download_limit', '0'),
(658, 89, '_download_expiry', '0'),
(659, 89, '_thumbnail_id', '88'),
(660, 89, '_stock', ''),
(661, 89, '_stock_status', 'instock'),
(662, 89, '_wc_average_rating', '0'),
(663, 89, '_wc_rating_count', 'a:0:{}'),
(664, 89, '_wc_review_count', '0'),
(665, 89, '_product_url', 'https://mercantile.wordpress.org/product/wordpress-pennant/'),
(666, 89, '_button_text', 'Buy on the WordPress swag store!'),
(667, 89, '_downloadable_files', 'a:0:{}'),
(668, 89, '_product_attributes', 'a:0:{}'),
(669, 89, '_product_version', '3.3.0'),
(670, 89, '_price', '11.05'),
(671, 89, '_edit_last', '1'),
(672, 90, '_edit_lock', '1525191509:1'),
(673, 90, '_wp_trash_meta_status', 'publish'),
(674, 90, '_wp_trash_meta_time', '1525191527'),
(675, 91, '_edit_lock', '1525191765:1'),
(676, 91, '_wp_trash_meta_status', 'publish'),
(677, 91, '_wp_trash_meta_time', '1525191780'),
(678, 92, '_order_key', 'wc_order_5ae964a29e690'),
(679, 92, '_customer_user', '1'),
(680, 92, '_payment_method', 'bacs'),
(681, 92, '_payment_method_title', 'Direct bank transfer'),
(682, 92, '_transaction_id', ''),
(683, 92, '_customer_ip_address', '::1'),
(684, 92, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(685, 92, '_created_via', 'checkout'),
(686, 92, '_date_completed', ''),
(687, 92, '_completed_date', ''),
(688, 92, '_date_paid', ''),
(689, 92, '_paid_date', ''),
(690, 92, '_cart_hash', 'bd745aa6d40d1bd6af424eb91930131a'),
(691, 92, '_billing_first_name', 'Mangesh'),
(692, 92, '_billing_last_name', 'Navale'),
(693, 92, '_billing_company', 'ABC'),
(694, 92, '_billing_address_1', 'ABX'),
(695, 92, '_billing_address_2', ''),
(696, 92, '_billing_city', 'dqdw'),
(697, 92, '_billing_state', ''),
(698, 92, '_billing_postcode', '123'),
(699, 92, '_billing_country', 'DK'),
(700, 92, '_billing_email', 'meettomangesh@gmail.com'),
(701, 92, '_billing_phone', '9730872969'),
(702, 92, '_shipping_first_name', 'Mangesh'),
(703, 92, '_shipping_last_name', 'Navale'),
(704, 92, '_shipping_company', 'ABC'),
(705, 92, '_shipping_address_1', 'ABX'),
(706, 92, '_shipping_address_2', ''),
(707, 92, '_shipping_city', 'dqdw'),
(708, 92, '_shipping_state', ''),
(709, 92, '_shipping_postcode', '123'),
(710, 92, '_shipping_country', 'DK'),
(711, 92, '_order_currency', 'DKK'),
(712, 92, '_cart_discount', '0'),
(713, 92, '_cart_discount_tax', '0'),
(714, 92, '_order_shipping', '0.00'),
(715, 92, '_order_shipping_tax', '0'),
(716, 92, '_order_tax', '0'),
(717, 92, '_order_total', '18.00'),
(718, 92, '_order_version', '3.3.5'),
(719, 92, '_prices_include_tax', 'no'),
(720, 92, '_billing_address_index', 'Mangesh Navale ABC ABX  dqdw  123 DK meettomangesh@gmail.com 9730872969'),
(721, 92, '_shipping_address_index', 'Mangesh Navale ABC ABX  dqdw  123 DK'),
(722, 92, '_recorded_sales', 'yes'),
(723, 92, '_recorded_coupon_usage_counts', 'yes'),
(724, 92, '_order_stock_reduced', 'yes'),
(725, 92, '_edit_lock', '1525252588:1'),
(726, 93, '_order_key', 'wc_order_5ae991a76c5b9'),
(727, 93, '_customer_user', '1'),
(728, 93, '_payment_method', 'paypal'),
(729, 93, '_payment_method_title', 'PayPal'),
(730, 93, '_transaction_id', ''),
(731, 93, '_customer_ip_address', '::1'),
(732, 93, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(733, 93, '_created_via', 'checkout'),
(734, 93, '_date_completed', ''),
(735, 93, '_completed_date', ''),
(736, 93, '_date_paid', ''),
(737, 93, '_paid_date', ''),
(738, 93, '_cart_hash', 'bd745aa6d40d1bd6af424eb91930131a'),
(739, 93, '_billing_first_name', 'Mangesh'),
(740, 93, '_billing_last_name', 'Navale'),
(741, 93, '_billing_company', 'ABC'),
(742, 93, '_billing_address_1', 'ABX'),
(743, 93, '_billing_address_2', ''),
(744, 93, '_billing_city', 'dqdw'),
(745, 93, '_billing_state', ''),
(746, 93, '_billing_postcode', '123'),
(747, 93, '_billing_country', 'DK'),
(748, 93, '_billing_email', 'meettomangesh@gmail.com'),
(749, 93, '_billing_phone', '9730872969'),
(750, 93, '_shipping_first_name', 'Mangesh'),
(751, 93, '_shipping_last_name', 'Navale'),
(752, 93, '_shipping_company', 'ABC'),
(753, 93, '_shipping_address_1', 'ABX'),
(754, 93, '_shipping_address_2', ''),
(755, 93, '_shipping_city', 'dqdw'),
(756, 93, '_shipping_state', ''),
(757, 93, '_shipping_postcode', '123'),
(758, 93, '_shipping_country', 'DK'),
(759, 93, '_order_currency', 'DKK'),
(760, 93, '_cart_discount', '0'),
(761, 93, '_cart_discount_tax', '0'),
(762, 93, '_order_shipping', '0.00'),
(763, 93, '_order_shipping_tax', '0'),
(764, 93, '_order_tax', '0'),
(765, 93, '_order_total', '18.00'),
(766, 93, '_order_version', '3.3.5'),
(767, 93, '_prices_include_tax', 'no'),
(768, 93, '_billing_address_index', 'Mangesh Navale ABC ABX  dqdw  123 DK meettomangesh@gmail.com 9730872969'),
(769, 93, '_shipping_address_index', 'Mangesh Navale ABC ABX  dqdw  123 DK'),
(770, 94, '_order_key', 'wc_order_5aeab8709798e'),
(771, 94, '_customer_user', '0'),
(772, 94, '_payment_method', 'ppec_paypal'),
(773, 94, '_payment_method_title', 'PayPal Express Checkout'),
(774, 94, '_transaction_id', '9WW936047S7347809'),
(775, 94, '_customer_ip_address', '::1'),
(776, 94, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(777, 94, '_created_via', 'checkout'),
(778, 94, '_date_completed', ''),
(779, 94, '_completed_date', ''),
(780, 94, '_date_paid', ''),
(781, 94, '_paid_date', ''),
(782, 94, '_cart_hash', 'a3f5cea1df287b0e12c25af96cab83b1'),
(783, 94, '_billing_first_name', 'Mangesh'),
(784, 94, '_billing_last_name', 'Navale'),
(785, 94, '_billing_company', ''),
(786, 94, '_billing_address_1', ''),
(787, 94, '_billing_address_2', ''),
(788, 94, '_billing_city', ''),
(789, 94, '_billing_state', ''),
(790, 94, '_billing_postcode', ''),
(791, 94, '_billing_country', 'US'),
(792, 94, '_billing_email', 'testpaypal1988@gmail.com'),
(793, 94, '_billing_phone', ''),
(794, 94, '_shipping_first_name', ''),
(795, 94, '_shipping_last_name', ''),
(796, 94, '_shipping_company', ''),
(797, 94, '_shipping_address_1', ''),
(798, 94, '_shipping_address_2', ''),
(799, 94, '_shipping_city', ''),
(800, 94, '_shipping_state', ''),
(801, 94, '_shipping_postcode', ''),
(802, 94, '_shipping_country', ''),
(803, 94, '_order_currency', 'DKK'),
(804, 94, '_cart_discount', '0'),
(805, 94, '_cart_discount_tax', '0'),
(806, 94, '_order_shipping', '0.00'),
(807, 94, '_order_shipping_tax', '0'),
(808, 94, '_order_tax', '0'),
(809, 94, '_order_total', '2.00'),
(810, 94, '_order_version', '3.3.5'),
(811, 94, '_prices_include_tax', 'no'),
(812, 94, '_billing_address_index', 'Mangesh Navale       US testpaypal1988@gmail.com '),
(813, 94, '_shipping_address_index', '        '),
(814, 94, '_paypal_status', 'pending'),
(815, 94, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"9WW936047S7347809";s:6:"amount";s:4:"2.00";s:15:"refunded_amount";i:0;s:6:"status";s:18:"Pending_unilateral";}}s:8:"txn_type";s:4:"sale";}'),
(816, 94, '_recorded_sales', 'yes'),
(817, 94, '_recorded_coupon_usage_counts', 'yes'),
(818, 94, '_order_stock_reduced', 'yes'),
(819, 94, '_edit_lock', '1525341762:1'),
(820, 94, '_wp_trash_meta_status', 'wc-on-hold'),
(821, 94, '_wp_trash_meta_time', '1525341916'),
(822, 94, '_wp_desired_post_slug', 'order-may-03-2018-0721-am'),
(823, 94, '_wp_trash_meta_comments_status', 'a:1:{i:5;s:1:"1";}'),
(824, 93, '_wp_trash_meta_status', 'wc-cancelled'),
(825, 93, '_wp_trash_meta_time', '1525341916'),
(826, 93, '_wp_desired_post_slug', 'order-may-02-2018-1023-am'),
(827, 93, '_wp_trash_meta_comments_status', 'a:1:{i:4;s:1:"1";}'),
(828, 92, '_wp_trash_meta_status', 'wc-on-hold'),
(829, 92, '_wp_trash_meta_time', '1525341917'),
(830, 92, '_wp_desired_post_slug', 'order-may-02-2018-0711-am'),
(831, 92, '_wp_trash_meta_comments_status', 'a:1:{i:3;s:1:"1";}'),
(832, 95, '_order_key', 'wc_order_5aeadf145fdaf'),
(833, 95, '_customer_user', '1'),
(834, 95, '_payment_method', 'bacs'),
(835, 95, '_payment_method_title', 'Direct bank transfer'),
(836, 95, '_transaction_id', ''),
(837, 95, '_customer_ip_address', '::1'),
(838, 95, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(839, 95, '_created_via', 'checkout'),
(840, 95, '_date_completed', ''),
(841, 95, '_completed_date', ''),
(842, 95, '_date_paid', ''),
(843, 95, '_paid_date', ''),
(844, 95, '_cart_hash', 'bd745aa6d40d1bd6af424eb91930131a'),
(845, 95, '_billing_first_name', 'Mangesh'),
(846, 95, '_billing_last_name', 'Navale'),
(847, 95, '_billing_company', 'ABC'),
(848, 95, '_billing_address_1', 'ABX'),
(849, 95, '_billing_address_2', ''),
(850, 95, '_billing_city', 'dqdw'),
(851, 95, '_billing_state', ''),
(852, 95, '_billing_postcode', '123'),
(853, 95, '_billing_country', 'DK'),
(854, 95, '_billing_email', 'meettomangesh@gmail.com'),
(855, 95, '_billing_phone', '9730872969'),
(856, 95, '_shipping_first_name', 'Mangesh'),
(857, 95, '_shipping_last_name', 'Navale'),
(858, 95, '_shipping_company', 'ABC'),
(859, 95, '_shipping_address_1', 'ABX'),
(860, 95, '_shipping_address_2', ''),
(861, 95, '_shipping_city', 'dqdw'),
(862, 95, '_shipping_state', ''),
(863, 95, '_shipping_postcode', '123'),
(864, 95, '_shipping_country', 'DK'),
(865, 95, '_order_currency', 'DKK'),
(866, 95, '_cart_discount', '0'),
(867, 95, '_cart_discount_tax', '0'),
(868, 95, '_order_shipping', '0.00'),
(869, 95, '_order_shipping_tax', '0'),
(870, 95, '_order_tax', '0'),
(871, 95, '_order_total', '18.00'),
(872, 95, '_order_version', '3.3.5'),
(873, 95, '_prices_include_tax', 'no'),
(874, 95, '_billing_address_index', 'Mangesh Navale ABC ABX  dqdw  123 DK meettomangesh@gmail.com 9730872969'),
(875, 95, '_shipping_address_index', 'Mangesh Navale ABC ABX  dqdw  123 DK'),
(876, 95, '_recorded_sales', 'yes'),
(877, 95, '_recorded_coupon_usage_counts', 'yes'),
(878, 95, '_order_stock_reduced', 'yes'),
(879, 95, '_edit_lock', '1525341859:1'),
(880, 95, '_wp_trash_meta_status', 'wc-on-hold'),
(881, 95, '_wp_trash_meta_time', '1525342020'),
(882, 95, '_wp_desired_post_slug', 'order-may-03-2018-1006-am'),
(883, 95, '_wp_trash_meta_comments_status', 'a:1:{i:6;s:1:"1";}'),
(884, 96, '_order_key', 'wc_order_5aeadfb18d546'),
(885, 96, '_customer_user', '1'),
(886, 96, '_payment_method', 'ppec_paypal'),
(887, 96, '_payment_method_title', 'PayPal Express Checkout'),
(888, 96, '_transaction_id', '5YT257753V535432T'),
(889, 96, '_customer_ip_address', '::1'),
(890, 96, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(891, 96, '_created_via', 'checkout'),
(892, 96, '_date_completed', ''),
(893, 96, '_completed_date', ''),
(894, 96, '_date_paid', ''),
(895, 96, '_paid_date', ''),
(896, 96, '_cart_hash', 'a3f5cea1df287b0e12c25af96cab83b1'),
(897, 96, '_billing_first_name', 'Mangesh'),
(898, 96, '_billing_last_name', 'Navale'),
(899, 96, '_billing_company', ''),
(900, 96, '_billing_address_1', ''),
(901, 96, '_billing_address_2', ''),
(902, 96, '_billing_city', ''),
(903, 96, '_billing_state', ''),
(904, 96, '_billing_postcode', ''),
(905, 96, '_billing_country', 'US'),
(906, 96, '_billing_email', 'testpaypal1988@gmail.com'),
(907, 96, '_billing_phone', ''),
(908, 96, '_shipping_first_name', ''),
(909, 96, '_shipping_last_name', ''),
(910, 96, '_shipping_company', ''),
(911, 96, '_shipping_address_1', ''),
(912, 96, '_shipping_address_2', ''),
(913, 96, '_shipping_city', ''),
(914, 96, '_shipping_state', ''),
(915, 96, '_shipping_postcode', ''),
(916, 96, '_shipping_country', ''),
(917, 96, '_order_currency', 'DKK'),
(918, 96, '_cart_discount', '0'),
(919, 96, '_cart_discount_tax', '0'),
(920, 96, '_order_shipping', '0.00'),
(921, 96, '_order_shipping_tax', '0'),
(922, 96, '_order_tax', '0'),
(923, 96, '_order_total', '2.00'),
(924, 96, '_order_version', '3.3.5'),
(925, 96, '_prices_include_tax', 'no'),
(926, 96, '_billing_address_index', 'Mangesh Navale       US testpaypal1988@gmail.com '),
(927, 96, '_shipping_address_index', '        '),
(928, 96, '_paypal_status', 'pending'),
(929, 96, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"5YT257753V535432T";s:6:"amount";s:4:"2.00";s:15:"refunded_amount";i:0;s:6:"status";s:18:"Pending_unilateral";}}s:8:"txn_type";s:4:"sale";}'),
(930, 96, '_recorded_sales', 'yes'),
(931, 96, '_recorded_coupon_usage_counts', 'yes'),
(932, 96, '_order_stock_reduced', 'yes'),
(933, 97, '_order_key', 'wc_order_5aeae81087fb2'),
(934, 97, '_customer_user', '1'),
(935, 97, '_payment_method', 'ppec_paypal'),
(936, 97, '_payment_method_title', 'PayPal Express Checkout'),
(937, 97, '_transaction_id', '63X88359RG321845G'),
(938, 97, '_customer_ip_address', '::1'),
(939, 97, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(940, 97, '_created_via', 'checkout'),
(941, 97, '_date_completed', ''),
(942, 97, '_completed_date', ''),
(943, 97, '_date_paid', ''),
(944, 97, '_paid_date', ''),
(945, 97, '_cart_hash', 'bd745aa6d40d1bd6af424eb91930131a'),
(946, 97, '_billing_first_name', 'Mangesh'),
(947, 97, '_billing_last_name', 'Navale'),
(948, 97, '_billing_company', ''),
(949, 97, '_billing_address_1', '5501 "A" Street'),
(950, 97, '_billing_address_2', ''),
(951, 97, '_billing_city', 'Anchorage'),
(952, 97, '_billing_state', 'AK'),
(953, 97, '_billing_postcode', '99518'),
(954, 97, '_billing_country', 'US'),
(955, 97, '_billing_email', 'testpaypal1988@gmail.com'),
(956, 97, '_billing_phone', ''),
(957, 97, '_shipping_first_name', 'Mangesh'),
(958, 97, '_shipping_last_name', 'Navale'),
(959, 97, '_shipping_company', ''),
(960, 97, '_shipping_address_1', '5501 "A" Street'),
(961, 97, '_shipping_address_2', ''),
(962, 97, '_shipping_city', 'Anchorage'),
(963, 97, '_shipping_state', 'AK'),
(964, 97, '_shipping_postcode', '99518'),
(965, 97, '_shipping_country', 'US'),
(966, 97, '_order_currency', 'DKK'),
(967, 97, '_cart_discount', '0'),
(968, 97, '_cart_discount_tax', '0'),
(969, 97, '_order_shipping', '0'),
(970, 97, '_order_shipping_tax', '0'),
(971, 97, '_order_tax', '0'),
(972, 97, '_order_total', '18.00'),
(973, 97, '_order_version', '3.3.5'),
(974, 97, '_prices_include_tax', 'no'),
(975, 97, '_billing_address_index', 'Mangesh Navale  5501 "A" Street  Anchorage AK 99518 US testpaypal1988@gmail.com '),
(976, 97, '_shipping_address_index', 'Mangesh Navale  5501 "A" Street  Anchorage AK 99518 US'),
(977, 97, '_paypal_status', 'pending'),
(978, 97, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"63X88359RG321845G";s:6:"amount";s:5:"18.00";s:15:"refunded_amount";i:0;s:6:"status";s:18:"Pending_unilateral";}}s:8:"txn_type";s:4:"sale";}'),
(979, 97, '_recorded_sales', 'yes'),
(980, 97, '_recorded_coupon_usage_counts', 'yes'),
(981, 97, '_order_stock_reduced', 'yes'),
(982, 96, '_wp_trash_meta_status', 'wc-on-hold'),
(983, 96, '_wp_trash_meta_time', '1525344296'),
(984, 96, '_wp_desired_post_slug', 'order-may-03-2018-1008-am'),
(985, 96, '_wp_trash_meta_comments_status', 'a:1:{i:7;s:1:"1";}'),
(986, 97, '_edit_lock', '1525352188:1'),
(987, 98, '_order_key', 'wc_order_5aeb005b0f0bb'),
(988, 98, '_customer_user', '1'),
(989, 98, '_payment_method', 'paypalpro'),
(990, 98, '_payment_method_title', 'Credit Card Payment'),
(991, 98, '_transaction_id', ''),
(992, 98, '_customer_ip_address', '::1'),
(993, 98, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(994, 98, '_created_via', 'checkout'),
(995, 98, '_date_completed', ''),
(996, 98, '_completed_date', ''),
(997, 98, '_date_paid', ''),
(998, 98, '_paid_date', ''),
(999, 98, '_cart_hash', 'ccadb833cc6d5bbfceedbd099b3a4717'),
(1000, 98, '_billing_first_name', 'Mangesh'),
(1001, 98, '_billing_last_name', 'Navale'),
(1002, 98, '_billing_company', ''),
(1003, 98, '_billing_address_1', '5501 "A" Street'),
(1004, 98, '_billing_address_2', ''),
(1005, 98, '_billing_city', 'Anchorage'),
(1006, 98, '_billing_state', 'AK'),
(1007, 98, '_billing_postcode', '99518'),
(1008, 98, '_billing_country', 'US'),
(1009, 98, '_billing_email', 'testpaypal1988@gmail.com'),
(1010, 98, '_billing_phone', '9730872969'),
(1011, 98, '_shipping_first_name', 'Mangesh'),
(1012, 98, '_shipping_last_name', 'Navale'),
(1013, 98, '_shipping_company', ''),
(1014, 98, '_shipping_address_1', '5501 "A" Street'),
(1015, 98, '_shipping_address_2', ''),
(1016, 98, '_shipping_city', 'Anchorage'),
(1017, 98, '_shipping_state', 'AK'),
(1018, 98, '_shipping_postcode', '99518'),
(1019, 98, '_shipping_country', 'US'),
(1020, 98, '_order_currency', 'DKK'),
(1021, 98, '_cart_discount', '0'),
(1022, 98, '_cart_discount_tax', '0'),
(1023, 98, '_order_shipping', '0.00'),
(1024, 98, '_order_shipping_tax', '0'),
(1025, 98, '_order_tax', '0'),
(1026, 98, '_order_total', '45.00'),
(1027, 98, '_order_version', '3.3.5'),
(1028, 98, '_prices_include_tax', 'no'),
(1029, 98, '_billing_address_index', 'Mangesh Navale  5501 "A" Street  Anchorage AK 99518 US testpaypal1988@gmail.com 9730872969'),
(1030, 98, '_shipping_address_index', 'Mangesh Navale  5501 "A" Street  Anchorage AK 99518 US'),
(1031, 97, '_edit_last', '1'),
(1032, 98, '_wp_trash_meta_status', 'wc-pending'),
(1033, 98, '_wp_trash_meta_time', '1525352344'),
(1034, 98, '_wp_desired_post_slug', 'order-may-03-2018-1228-pm'),
(1035, 98, '_wp_trash_meta_comments_status', 'a:2:{i:9;s:1:"1";i:10;s:1:"1";}'),
(1036, 97, '_wp_trash_meta_status', 'wc-on-hold'),
(1037, 97, '_wp_trash_meta_time', '1525352345'),
(1038, 97, '_wp_desired_post_slug', 'order-may-03-2018-1044-am'),
(1039, 97, '_wp_trash_meta_comments_status', 'a:1:{i:8;s:1:"1";}'),
(1040, 99, '_order_key', 'wc_order_5aeb07e51efc7'),
(1041, 99, '_customer_user', '1'),
(1042, 99, '_payment_method', 'ppec_paypal'),
(1043, 99, '_payment_method_title', 'PayPal Express Checkout'),
(1044, 99, '_transaction_id', '7UX82164SE722525R'),
(1045, 99, '_customer_ip_address', '::1'),
(1046, 99, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1047, 99, '_created_via', 'checkout'),
(1048, 99, '_date_completed', ''),
(1049, 99, '_completed_date', ''),
(1050, 99, '_date_paid', ''),
(1051, 99, '_paid_date', ''),
(1052, 99, '_cart_hash', 'ccadb833cc6d5bbfceedbd099b3a4717'),
(1053, 99, '_billing_first_name', 'Mangesh'),
(1054, 99, '_billing_last_name', 'Navale'),
(1055, 99, '_billing_company', ''),
(1056, 99, '_billing_address_1', '5501 "A" Street'),
(1057, 99, '_billing_address_2', ''),
(1058, 99, '_billing_city', 'Anchorage'),
(1059, 99, '_billing_state', 'AK'),
(1060, 99, '_billing_postcode', '99518'),
(1061, 99, '_billing_country', 'US'),
(1062, 99, '_billing_email', 'testpaypal1988@gmail.com'),
(1063, 99, '_billing_phone', ''),
(1064, 99, '_shipping_first_name', 'Mangesh'),
(1065, 99, '_shipping_last_name', 'Navale'),
(1066, 99, '_shipping_company', ''),
(1067, 99, '_shipping_address_1', '5501 "A" Street'),
(1068, 99, '_shipping_address_2', ''),
(1069, 99, '_shipping_city', 'Anchorage'),
(1070, 99, '_shipping_state', 'AK'),
(1071, 99, '_shipping_postcode', '99518'),
(1072, 99, '_shipping_country', 'US'),
(1073, 99, '_order_currency', 'DKK'),
(1074, 99, '_cart_discount', '0'),
(1075, 99, '_cart_discount_tax', '0'),
(1076, 99, '_order_shipping', '0'),
(1077, 99, '_order_shipping_tax', '0'),
(1078, 99, '_order_tax', '0'),
(1079, 99, '_order_total', '45.00'),
(1080, 99, '_order_version', '3.3.5'),
(1081, 99, '_prices_include_tax', 'no'),
(1082, 99, '_billing_address_index', 'Mangesh Navale  5501 "A" Street  Anchorage AK 99518 US testpaypal1988@gmail.com '),
(1083, 99, '_shipping_address_index', 'Mangesh Navale  5501 "A" Street  Anchorage AK 99518 US'),
(1084, 99, '_paypal_status', 'pending'),
(1085, 99, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"7UX82164SE722525R";s:6:"amount";s:5:"45.00";s:15:"refunded_amount";i:0;s:6:"status";s:18:"Pending_unilateral";}}s:8:"txn_type";s:4:"sale";}'),
(1086, 99, '_recorded_sales', 'yes'),
(1087, 99, '_recorded_coupon_usage_counts', 'yes'),
(1088, 99, '_order_stock_reduced', 'yes'),
(1089, 99, '_edit_lock', '1525354478:1'),
(1090, 99, '_edit_last', '1'),
(1091, 99, '_wp_trash_meta_status', 'wc-on-hold'),
(1092, 99, '_wp_trash_meta_time', '1525354629'),
(1093, 99, '_wp_desired_post_slug', 'order-may-03-2018-0100-pm'),
(1094, 99, '_wp_trash_meta_comments_status', 'a:1:{i:11;s:1:"1";}'),
(1095, 100, '_order_key', 'wc_order_5aec31efaa99d'),
(1096, 100, '_customer_user', '1'),
(1097, 100, '_payment_method', 'ppec_paypal'),
(1098, 100, '_payment_method_title', 'PayPal Express Checkout'),
(1099, 100, '_transaction_id', '3GB18142YE553923X'),
(1100, 100, '_customer_ip_address', '::1'),
(1101, 100, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1102, 100, '_created_via', 'checkout'),
(1103, 100, '_date_completed', ''),
(1104, 100, '_completed_date', ''),
(1105, 100, '_date_paid', ''),
(1106, 100, '_paid_date', ''),
(1107, 100, '_cart_hash', 'dae023fd7a60a13b3472056c65c08eef'),
(1108, 100, '_billing_first_name', 'Test'),
(1109, 100, '_billing_last_name', 'brogaard'),
(1110, 100, '_billing_company', ''),
(1111, 100, '_billing_address_1', 'Vesterbrogade 3'),
(1112, 100, '_billing_address_2', ''),
(1113, 100, '_billing_city', 'K�benhavn'),
(1114, 100, '_billing_state', 'Danmark'),
(1115, 100, '_billing_postcode', '1630'),
(1116, 100, '_billing_country', 'DK'),
(1117, 100, '_billing_email', 'testbrogaard@gmail.com'),
(1118, 100, '_billing_phone', ''),
(1119, 100, '_shipping_first_name', 'Test'),
(1120, 100, '_shipping_last_name', 'brogaard'),
(1121, 100, '_shipping_company', ''),
(1122, 100, '_shipping_address_1', 'Vesterbrogade 3'),
(1123, 100, '_shipping_address_2', ''),
(1124, 100, '_shipping_city', 'K�benhavn'),
(1125, 100, '_shipping_state', 'Danmark'),
(1126, 100, '_shipping_postcode', '1630'),
(1127, 100, '_shipping_country', 'DK'),
(1128, 100, '_order_currency', 'DKK'),
(1129, 100, '_cart_discount', '0'),
(1130, 100, '_cart_discount_tax', '0'),
(1131, 100, '_order_shipping', '0'),
(1132, 100, '_order_shipping_tax', '0'),
(1133, 100, '_order_tax', '0'),
(1134, 100, '_order_total', '25.00'),
(1135, 100, '_order_version', '3.3.5'),
(1136, 100, '_prices_include_tax', 'no'),
(1137, 100, '_billing_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK testbrogaard@gmail.com '),
(1138, 100, '_shipping_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK'),
(1139, 100, '_paypal_status', 'pending'),
(1140, 100, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"3GB18142YE553923X";s:6:"amount";s:5:"25.00";s:15:"refunded_amount";i:0;s:6:"status";s:18:"Pending_unilateral";}}s:8:"txn_type";s:4:"sale";}'),
(1141, 100, '_recorded_sales', 'yes'),
(1142, 100, '_recorded_coupon_usage_counts', 'yes'),
(1143, 100, '_order_stock_reduced', 'yes'),
(1144, 100, '_edit_lock', '1525428934:1'),
(1145, 100, '_edit_last', '1'),
(1146, 100, '_wp_trash_meta_status', 'wc-on-hold'),
(1147, 100, '_wp_trash_meta_time', '1525429084'),
(1148, 100, '_wp_desired_post_slug', 'order-may-04-2018-1011-am'),
(1149, 100, '_wp_trash_meta_comments_status', 'a:1:{i:12;s:1:"1";}'),
(1150, 101, '_order_key', 'wc_order_5aec3643dd76e'),
(1151, 101, '_customer_user', '1'),
(1152, 101, '_payment_method', 'ppec_paypal'),
(1153, 101, '_payment_method_title', 'PayPal Express Checkout'),
(1154, 101, '_transaction_id', '2PJ84983R3647043D'),
(1155, 101, '_customer_ip_address', '::1'),
(1156, 101, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1157, 101, '_created_via', 'checkout'),
(1158, 101, '_date_completed', '1525437062'),
(1159, 101, '_completed_date', '2018-05-04 12:31:02'),
(1160, 101, '_date_paid', '1525429833'),
(1161, 101, '_paid_date', '2018-05-04 10:30:33'),
(1162, 101, '_cart_hash', 'dae023fd7a60a13b3472056c65c08eef'),
(1163, 101, '_billing_first_name', 'Test'),
(1164, 101, '_billing_last_name', 'brogaard'),
(1165, 101, '_billing_company', ''),
(1166, 101, '_billing_address_1', 'Vesterbrogade 3'),
(1167, 101, '_billing_address_2', ''),
(1168, 101, '_billing_city', 'K�benhavn'),
(1169, 101, '_billing_state', 'Danmark'),
(1170, 101, '_billing_postcode', '1630'),
(1171, 101, '_billing_country', 'DK'),
(1172, 101, '_billing_email', 'testbrogaard@gmail.com'),
(1173, 101, '_billing_phone', ''),
(1174, 101, '_shipping_first_name', 'Test'),
(1175, 101, '_shipping_last_name', 'brogaard');
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1176, 101, '_shipping_company', ''),
(1177, 101, '_shipping_address_1', 'Vesterbrogade 3'),
(1178, 101, '_shipping_address_2', ''),
(1179, 101, '_shipping_city', 'K�benhavn'),
(1180, 101, '_shipping_state', 'Danmark'),
(1181, 101, '_shipping_postcode', '1630'),
(1182, 101, '_shipping_country', 'DK'),
(1183, 101, '_order_currency', 'DKK'),
(1184, 101, '_cart_discount', '0'),
(1185, 101, '_cart_discount_tax', '0'),
(1186, 101, '_order_shipping', '0'),
(1187, 101, '_order_shipping_tax', '0'),
(1188, 101, '_order_tax', '0'),
(1189, 101, '_order_total', '25.00'),
(1190, 101, '_order_version', '3.3.5'),
(1191, 101, '_prices_include_tax', 'no'),
(1192, 101, '_billing_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK testbrogaard@gmail.com '),
(1193, 101, '_shipping_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK'),
(1194, 101, '_paypal_status', 'completed'),
(1195, 101, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"2PJ84983R3647043D";s:6:"amount";s:5:"25.00";s:15:"refunded_amount";i:0;s:6:"status";s:9:"Completed";}}s:8:"txn_type";s:4:"sale";}'),
(1196, 101, '_download_permissions_granted', 'yes'),
(1197, 101, '_recorded_sales', 'yes'),
(1198, 101, '_recorded_coupon_usage_counts', 'yes'),
(1199, 101, '_order_stock_reduced', 'yes'),
(1200, 101, '_edit_lock', '1525436920:1'),
(1201, 101, '_edit_last', '1'),
(1202, 102, '_order_key', 'wc_order_5aec37334f56e'),
(1203, 102, '_customer_user', '1'),
(1204, 102, '_payment_method', 'ppec_paypal'),
(1205, 102, '_payment_method_title', 'PayPal Express Checkout'),
(1206, 102, '_transaction_id', '7BY74865TC0405537'),
(1207, 102, '_customer_ip_address', '::1'),
(1208, 102, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1209, 102, '_created_via', 'checkout'),
(1210, 102, '_date_completed', ''),
(1211, 102, '_completed_date', ''),
(1212, 102, '_date_paid', '1525430072'),
(1213, 102, '_paid_date', '2018-05-04 10:34:32'),
(1214, 102, '_cart_hash', 'ccadb833cc6d5bbfceedbd099b3a4717'),
(1215, 102, '_billing_first_name', 'Test'),
(1216, 102, '_billing_last_name', 'brogaard'),
(1217, 102, '_billing_company', ''),
(1218, 102, '_billing_address_1', 'Vesterbrogade 3'),
(1219, 102, '_billing_address_2', ''),
(1220, 102, '_billing_city', 'K�benhavn'),
(1221, 102, '_billing_state', 'Danmark'),
(1222, 102, '_billing_postcode', '1630'),
(1223, 102, '_billing_country', 'DK'),
(1224, 102, '_billing_email', 'testbrogaard@gmail.com'),
(1225, 102, '_billing_phone', ''),
(1226, 102, '_shipping_first_name', 'Test'),
(1227, 102, '_shipping_last_name', 'brogaard'),
(1228, 102, '_shipping_company', ''),
(1229, 102, '_shipping_address_1', 'Vesterbrogade 3'),
(1230, 102, '_shipping_address_2', ''),
(1231, 102, '_shipping_city', 'K�benhavn'),
(1232, 102, '_shipping_state', 'Danmark'),
(1233, 102, '_shipping_postcode', '1630'),
(1234, 102, '_shipping_country', 'DK'),
(1235, 102, '_order_currency', 'DKK'),
(1236, 102, '_cart_discount', '0'),
(1237, 102, '_cart_discount_tax', '0'),
(1238, 102, '_order_shipping', '0'),
(1239, 102, '_order_shipping_tax', '0'),
(1240, 102, '_order_tax', '0'),
(1241, 102, '_order_total', '45.00'),
(1242, 102, '_order_version', '3.3.5'),
(1243, 102, '_prices_include_tax', 'no'),
(1244, 102, '_billing_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK testbrogaard@gmail.com '),
(1245, 102, '_shipping_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK'),
(1246, 102, '_paypal_status', 'completed'),
(1247, 102, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"7BY74865TC0405537";s:6:"amount";s:5:"45.00";s:15:"refunded_amount";i:0;s:6:"status";s:9:"Completed";}}s:8:"txn_type";s:4:"sale";}'),
(1248, 102, '_download_permissions_granted', 'yes'),
(1249, 102, '_recorded_sales', 'yes'),
(1250, 102, '_recorded_coupon_usage_counts', 'yes'),
(1251, 102, '_order_stock_reduced', 'yes'),
(1252, 102, '_edit_lock', '1525432016:1'),
(1253, 103, '_order_key', 'wc_order_5aec386941b72'),
(1254, 103, '_customer_user', '1'),
(1255, 103, '_payment_method', 'ppec_paypal'),
(1256, 103, '_payment_method_title', 'PayPal Express Checkout'),
(1257, 103, '_transaction_id', '6N534500RU032890J'),
(1258, 103, '_customer_ip_address', '::1'),
(1259, 103, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1260, 103, '_created_via', 'checkout'),
(1261, 103, '_date_completed', ''),
(1262, 103, '_completed_date', ''),
(1263, 103, '_date_paid', '1525430382'),
(1264, 103, '_paid_date', '2018-05-04 10:39:42'),
(1265, 103, '_cart_hash', '5b87e45f0d3a15b1a70c0e50b04eb2d3'),
(1266, 103, '_billing_first_name', 'Test'),
(1267, 103, '_billing_last_name', 'brogaard'),
(1268, 103, '_billing_company', ''),
(1269, 103, '_billing_address_1', 'Vesterbrogade 3'),
(1270, 103, '_billing_address_2', ''),
(1271, 103, '_billing_city', 'K�benhavn'),
(1272, 103, '_billing_state', 'Danmark'),
(1273, 103, '_billing_postcode', '1630'),
(1274, 103, '_billing_country', 'DK'),
(1275, 103, '_billing_email', 'testbrogaard@gmail.com'),
(1276, 103, '_billing_phone', ''),
(1277, 103, '_shipping_first_name', 'Test'),
(1278, 103, '_shipping_last_name', 'brogaard'),
(1279, 103, '_shipping_company', ''),
(1280, 103, '_shipping_address_1', 'Vesterbrogade 3'),
(1281, 103, '_shipping_address_2', ''),
(1282, 103, '_shipping_city', 'K�benhavn'),
(1283, 103, '_shipping_state', 'Danmark'),
(1284, 103, '_shipping_postcode', '1630'),
(1285, 103, '_shipping_country', 'DK'),
(1286, 103, '_order_currency', 'DKK'),
(1287, 103, '_cart_discount', '0'),
(1288, 103, '_cart_discount_tax', '0'),
(1289, 103, '_order_shipping', '0.00'),
(1290, 103, '_order_shipping_tax', '0'),
(1291, 103, '_order_tax', '0'),
(1292, 103, '_order_total', '90.00'),
(1293, 103, '_order_version', '3.3.5'),
(1294, 103, '_prices_include_tax', 'no'),
(1295, 103, '_billing_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK testbrogaard@gmail.com '),
(1296, 103, '_shipping_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK'),
(1297, 103, '_paypal_status', 'completed'),
(1298, 103, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"6N534500RU032890J";s:6:"amount";s:5:"90.00";s:15:"refunded_amount";i:0;s:6:"status";s:9:"Completed";}}s:8:"txn_type";s:4:"sale";}'),
(1299, 103, '_download_permissions_granted', 'yes'),
(1300, 103, '_recorded_sales', 'yes'),
(1301, 103, '_recorded_coupon_usage_counts', 'yes'),
(1302, 103, '_order_stock_reduced', 'yes'),
(1303, 103, '_edit_lock', '1525431832:1'),
(1304, 104, '_order_currency', 'DKK'),
(1305, 104, '_cart_discount', '0'),
(1306, 104, '_cart_discount_tax', '0'),
(1307, 104, '_order_shipping', '0'),
(1308, 104, '_order_shipping_tax', '0'),
(1309, 104, '_order_tax', '0'),
(1310, 104, '_order_total', '-90.00'),
(1311, 104, '_order_version', '3.3.5'),
(1312, 104, '_prices_include_tax', 'no'),
(1313, 104, '_refund_amount', '90.00'),
(1314, 104, '_refunded_by', '1'),
(1315, 104, '_refund_reason', ''),
(1316, 46, '_edit_lock', '1525431845:1'),
(1317, 102, '_edit_last', '1'),
(1318, 105, '_order_key', 'wc_order_5aec3fb362711'),
(1319, 105, '_customer_user', '1'),
(1320, 105, '_payment_method', 'paypal'),
(1321, 105, '_payment_method_title', 'PayPal'),
(1322, 105, '_transaction_id', ''),
(1323, 105, '_customer_ip_address', '::1'),
(1324, 105, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1325, 105, '_created_via', 'checkout'),
(1326, 105, '_date_completed', ''),
(1327, 105, '_completed_date', ''),
(1328, 105, '_date_paid', ''),
(1329, 105, '_paid_date', ''),
(1330, 105, '_cart_hash', 'da6b8a87ddec822f52c66f7c6f62ca0b'),
(1331, 105, '_billing_first_name', 'Test'),
(1332, 105, '_billing_last_name', 'brogaard'),
(1333, 105, '_billing_company', ''),
(1334, 105, '_billing_address_1', 'Vesterbrogade 3'),
(1335, 105, '_billing_address_2', ''),
(1336, 105, '_billing_city', 'K�benhavn'),
(1337, 105, '_billing_state', ''),
(1338, 105, '_billing_postcode', '1630'),
(1339, 105, '_billing_country', 'DK'),
(1340, 105, '_billing_email', 'testbrogaard@gmail.com'),
(1341, 105, '_billing_phone', ''),
(1342, 105, '_shipping_first_name', 'Test'),
(1343, 105, '_shipping_last_name', 'brogaard'),
(1344, 105, '_shipping_company', ''),
(1345, 105, '_shipping_address_1', 'Vesterbrogade 3'),
(1346, 105, '_shipping_address_2', ''),
(1347, 105, '_shipping_city', 'K�benhavn'),
(1348, 105, '_shipping_state', ''),
(1349, 105, '_shipping_postcode', '1630'),
(1350, 105, '_shipping_country', 'DK'),
(1351, 105, '_order_currency', 'DKK'),
(1352, 105, '_cart_discount', '0'),
(1353, 105, '_cart_discount_tax', '0'),
(1354, 105, '_order_shipping', '0'),
(1355, 105, '_order_shipping_tax', '0'),
(1356, 105, '_order_tax', '0'),
(1357, 105, '_order_total', '18.00'),
(1358, 105, '_order_version', '3.3.5'),
(1359, 105, '_prices_include_tax', 'no'),
(1360, 105, '_billing_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn  1630 DK testbrogaard@gmail.com '),
(1361, 105, '_shipping_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn  1630 DK'),
(1362, 105, '_edit_lock', '1525435974:1'),
(1363, 105, '_edit_last', '1'),
(1364, 105, '_wp_trash_meta_status', 'wc-pending'),
(1365, 105, '_wp_trash_meta_time', '1525436187'),
(1366, 105, '_wp_desired_post_slug', 'order-may-04-2018-1110-am'),
(1367, 106, '_order_key', 'wc_order_5aec4f369afa3'),
(1368, 106, '_customer_user', '1'),
(1369, 106, '_payment_method', 'paypal'),
(1370, 106, '_payment_method_title', 'PayPal'),
(1371, 106, '_transaction_id', ''),
(1372, 106, '_customer_ip_address', '::1'),
(1373, 106, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1374, 106, '_created_via', 'checkout'),
(1375, 106, '_date_completed', ''),
(1376, 106, '_completed_date', ''),
(1377, 106, '_date_paid', ''),
(1378, 106, '_paid_date', ''),
(1379, 106, '_cart_hash', 'dae023fd7a60a13b3472056c65c08eef'),
(1380, 106, '_billing_first_name', 'Test'),
(1381, 106, '_billing_last_name', 'brogaard'),
(1382, 106, '_billing_company', ''),
(1383, 106, '_billing_address_1', 'Vesterbrogade 3'),
(1384, 106, '_billing_address_2', ''),
(1385, 106, '_billing_city', 'K�benhavn'),
(1386, 106, '_billing_state', ''),
(1387, 106, '_billing_postcode', '1630'),
(1388, 106, '_billing_country', 'DK'),
(1389, 106, '_billing_email', 'testbrogaard@gmail.com'),
(1390, 106, '_billing_phone', ''),
(1391, 106, '_shipping_first_name', 'Test'),
(1392, 106, '_shipping_last_name', 'brogaard'),
(1393, 106, '_shipping_company', ''),
(1394, 106, '_shipping_address_1', 'Vesterbrogade 3'),
(1395, 106, '_shipping_address_2', ''),
(1396, 106, '_shipping_city', 'K�benhavn'),
(1397, 106, '_shipping_state', ''),
(1398, 106, '_shipping_postcode', '1630'),
(1399, 106, '_shipping_country', 'DK'),
(1400, 106, '_order_currency', 'DKK'),
(1401, 106, '_cart_discount', '0'),
(1402, 106, '_cart_discount_tax', '0'),
(1403, 106, '_order_shipping', '0'),
(1404, 106, '_order_shipping_tax', '0'),
(1405, 106, '_order_tax', '0'),
(1406, 106, '_order_total', '25.00'),
(1407, 106, '_order_version', '3.3.5'),
(1408, 106, '_prices_include_tax', 'no'),
(1409, 106, '_billing_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn  1630 DK testbrogaard@gmail.com '),
(1410, 106, '_shipping_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn  1630 DK'),
(1411, 106, '_edit_lock', '1525436953:1'),
(1412, 107, '_order_key', 'wc_order_5aec506b76685'),
(1413, 107, '_customer_user', '1'),
(1414, 107, '_payment_method', 'ppec_paypal'),
(1415, 107, '_payment_method_title', 'PayPal Express Checkout'),
(1416, 107, '_transaction_id', '8UJ42295ML328791V'),
(1417, 107, '_customer_ip_address', '::1'),
(1418, 107, '_customer_user_agent', 'mozilla/5.0 (x11; linux x86_64) applewebkit/537.36 (khtml, like gecko) chrome/66.0.3359.117 safari/537.36'),
(1419, 107, '_created_via', 'checkout'),
(1420, 107, '_date_completed', ''),
(1421, 107, '_completed_date', ''),
(1422, 107, '_date_paid', '1525436529'),
(1423, 107, '_paid_date', '2018-05-04 12:22:09'),
(1424, 107, '_cart_hash', 'ccadb833cc6d5bbfceedbd099b3a4717'),
(1425, 107, '_billing_first_name', 'Test'),
(1426, 107, '_billing_last_name', 'brogaard'),
(1427, 107, '_billing_company', ''),
(1428, 107, '_billing_address_1', 'Vesterbrogade 3'),
(1429, 107, '_billing_address_2', ''),
(1430, 107, '_billing_city', 'K�benhavn'),
(1431, 107, '_billing_state', 'Danmark'),
(1432, 107, '_billing_postcode', '1630'),
(1433, 107, '_billing_country', 'DK'),
(1434, 107, '_billing_email', 'testbrogaard@gmail.com'),
(1435, 107, '_billing_phone', ''),
(1436, 107, '_shipping_first_name', 'Test'),
(1437, 107, '_shipping_last_name', 'brogaard'),
(1438, 107, '_shipping_company', ''),
(1439, 107, '_shipping_address_1', 'Vesterbrogade 3'),
(1440, 107, '_shipping_address_2', ''),
(1441, 107, '_shipping_city', 'K�benhavn'),
(1442, 107, '_shipping_state', 'Danmark'),
(1443, 107, '_shipping_postcode', '1630'),
(1444, 107, '_shipping_country', 'DK'),
(1445, 107, '_order_currency', 'DKK'),
(1446, 107, '_cart_discount', '0'),
(1447, 107, '_cart_discount_tax', '0'),
(1448, 107, '_order_shipping', '0.00'),
(1449, 107, '_order_shipping_tax', '0'),
(1450, 107, '_order_tax', '0'),
(1451, 107, '_order_total', '45.00'),
(1452, 107, '_order_version', '3.3.5'),
(1453, 107, '_prices_include_tax', 'no'),
(1454, 107, '_billing_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK testbrogaard@gmail.com '),
(1455, 107, '_shipping_address_index', 'Test brogaard  Vesterbrogade 3  K�benhavn Danmark 1630 DK'),
(1456, 107, '_paypal_status', 'completed'),
(1457, 107, '_woo_pp_txnData', 'a:2:{s:15:"refundable_txns";a:1:{i:0;a:4:{s:5:"txnID";s:17:"8UJ42295ML328791V";s:6:"amount";s:5:"45.00";s:15:"refunded_amount";i:0;s:6:"status";s:9:"Completed";}}s:8:"txn_type";s:4:"sale";}'),
(1458, 107, '_download_permissions_granted', 'yes'),
(1459, 107, '_recorded_sales', 'yes'),
(1460, 107, '_recorded_coupon_usage_counts', 'yes'),
(1461, 107, '_order_stock_reduced', 'yes'),
(1462, 106, '_edit_last', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2018-04-30 06:38:28', '2018-04-30 06:38:28', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2018-04-30 06:38:28', '2018-04-30 06:38:28', '', 0, 'http://localhost/brogaard/?p=1', 0, 'post', '', 1),
(2, 1, '2018-04-30 06:38:28', '2018-04-30 06:38:28', 'This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://localhost/brogaard/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2018-04-30 06:38:28', '2018-04-30 06:38:28', '', 0, 'http://localhost/brogaard/?page_id=2', 0, 'page', '', 0),
(3, 1, '2018-04-30 06:51:51', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2018-04-30 06:51:51', '0000-00-00 00:00:00', '', 0, 'http://localhost/brogaard/?p=3', 0, 'post', '', 0),
(5, 1, '2018-04-30 12:33:34', '2018-04-30 12:33:34', '', 'Shop', '', 'publish', 'closed', 'closed', '', 'shop', '', '', '2018-04-30 12:33:34', '2018-04-30 12:33:34', '', 0, 'http://localhost/brogaard/shop/', 0, 'page', '', 0),
(6, 1, '2018-04-30 12:33:35', '2018-04-30 12:33:35', '[woocommerce_cart]', 'Cart', '', 'publish', 'closed', 'closed', '', 'cart', '', '', '2018-04-30 12:33:35', '2018-04-30 12:33:35', '', 0, 'http://localhost/brogaard/cart/', 0, 'page', '', 0),
(7, 1, '2018-04-30 12:33:35', '2018-04-30 12:33:35', '[woocommerce_checkout]', 'Checkout', '', 'publish', 'closed', 'closed', '', 'checkout', '', '', '2018-04-30 12:33:35', '2018-04-30 12:33:35', '', 0, 'http://localhost/brogaard/checkout/', 0, 'page', '', 0),
(8, 1, '2018-04-30 12:33:35', '2018-04-30 12:33:35', '[woocommerce_my_account]', 'My account', '', 'publish', 'closed', 'closed', '', 'my-account', '', '', '2018-04-30 12:33:35', '2018-04-30 12:33:35', '', 0, 'http://localhost/brogaard/my-account/', 0, 'page', '', 0),
(9, 1, '2018-04-30 12:55:15', '2018-04-30 12:55:15', '<label> Your Name (required)\n    [text* your-name] </label>\n\n<label> Your Email (required)\n    [email* your-email] </label>\n\n<label> Subject\n    [text your-subject] </label>\n\n<label> Your Message\n    [textarea your-message] </label>\n\n[submit "Send"]\nbrogaard "[your-subject]"\n[your-name] <meettomangesh@gmail.com>\nFrom: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on brogaard (http://localhost/brogaard)\nmeettomangesh@gmail.com\nReply-To: [your-email]\n\n0\n0\n\nbrogaard "[your-subject]"\nbrogaard <meettomangesh@gmail.com>\nMessage Body:\n[your-message]\n\n-- \nThis e-mail was sent from a contact form on brogaard (http://localhost/brogaard)\n[your-email]\nReply-To: meettomangesh@gmail.com\n\n0\n0\nThank you for your message. It has been sent.\nThere was an error trying to send your message. Please try again later.\nOne or more fields have an error. Please check and try again.\nThere was an error trying to send your message. Please try again later.\nYou must accept the terms and conditions before sending your message.\nThe field is required.\nThe field is too long.\nThe field is too short.', 'Contact form 1', '', 'publish', 'closed', 'closed', '', 'contact-form-1', '', '', '2018-04-30 12:55:15', '2018-04-30 12:55:15', '', 0, 'http://localhost/brogaard/?post_type=wpcf7_contact_form&p=9', 0, 'wpcf7_contact_form', '', 0),
(10, 1, '2018-04-30 12:55:24', '2018-04-30 12:55:24', '[yith_wcwl_wishlist]', 'Wishlist', '', 'publish', 'closed', 'closed', '', 'wishlist', '', '', '2018-04-30 12:55:24', '2018-04-30 12:55:24', '', 0, 'http://localhost/brogaard/wishlist/', 0, 'page', '', 0),
(11, 1, '2018-04-30 13:04:06', '2018-04-30 13:04:06', '', 'One Click Demo Import - log_file_2018-04-30__13-04-06', '', 'inherit', 'open', 'closed', '', 'one-click-demo-import-log_file_2018-04-30__13-04-06', '', '', '2018-04-30 13:04:06', '2018-04-30 13:04:06', '', 0, 'http://localhost/brogaard/wp-content/uploads/2018/04/log_file_2018-04-30__13-04-06.txt', 0, 'attachment', 'text/plain', 0),
(12, 1, '2018-04-30 13:22:26', '2018-04-30 13:22:26', '', 'One Click Demo Import - log_file_2018-04-30__13-22-26', '', 'inherit', 'open', 'closed', '', 'one-click-demo-import-log_file_2018-04-30__13-22-26', '', '', '2018-04-30 13:22:26', '2018-04-30 13:22:26', '', 0, 'http://localhost/brogaard/wp-content/uploads/2018/04/log_file_2018-04-30__13-22-26.txt', 0, 'attachment', 'text/plain', 0),
(13, 1, '2018-04-30 13:51:15', '2018-04-30 13:51:15', '', 'One Click Demo Import - log_file_2018-04-30__13-51-15', '', 'inherit', 'open', 'closed', '', 'one-click-demo-import-log_file_2018-04-30__13-51-15', '', '', '2018-04-30 13:51:15', '2018-04-30 13:51:15', '', 0, 'http://localhost/brogaard/wp-content/uploads/2018/04/log_file_2018-04-30__13-51-15.txt', 0, 'attachment', 'text/plain', 0),
(44, 1, '2017-12-15 03:56:33', '2017-12-15 03:56:33', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'V-Neck T-Shirt', 'This is a variable product.', 'publish', 'open', 'closed', '', 'v-neck-t-shirt', '', '', '2017-12-15 03:56:33', '2017-12-15 03:56:33', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=import-placeholder-for-woo-vneck-tee', 0, 'product', '', 0),
(45, 1, '2017-12-15 03:56:34', '2017-12-15 03:56:34', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Hoodie', 'This is a variable product.', 'publish', 'open', 'closed', '', 'hoodie', '', '', '2017-12-15 03:56:34', '2017-12-15 03:56:34', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=import-placeholder-for-woo-hoodie', 0, 'product', '', 0),
(46, 1, '2017-12-15 03:56:34', '2017-12-15 03:56:34', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Hoodie with Logo', 'This is a simple product.', 'publish', 'open', 'closed', '', 'hoodie-with-logo', '', '', '2017-12-15 03:56:34', '2017-12-15 03:56:34', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=import-placeholder-for-woo-hoodie-with-logo', 0, 'product', '', 0),
(47, 1, '2017-12-15 03:56:34', '2017-12-15 03:56:34', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'T-Shirt', 'This is a simple product.', 'publish', 'open', 'closed', '', 't-shirt', '', '', '2017-12-15 03:56:34', '2017-12-15 03:56:34', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=import-placeholder-for-woo-tshirt', 0, 'product', '', 0),
(48, 1, '2017-12-15 03:56:34', '2017-12-15 03:56:34', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Beanie', 'This is a simple product.', 'publish', 'open', 'closed', '', 'beanie', '', '', '2017-12-15 03:56:34', '2017-12-15 03:56:34', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=import-placeholder-for-woo-beanie', 0, 'product', '', 0),
(58, 1, '2017-12-15 03:56:41', '2017-12-15 03:56:41', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Belt', 'This is a simple product.', 'publish', 'open', 'closed', '', 'belt', '', '', '2017-12-15 03:56:41', '2017-12-15 03:56:41', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=belt', 0, 'product', '', 0),
(60, 1, '2017-12-15 03:56:42', '2017-12-15 03:56:42', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Cap', 'This is a simple product.', 'publish', 'open', 'closed', '', 'cap', '', '', '2017-12-15 03:56:42', '2017-12-15 03:56:42', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=cap', 0, 'product', '', 0),
(62, 1, '2017-12-15 03:56:43', '2017-12-15 03:56:43', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Sunglasses', 'This is a simple product.', 'publish', 'open', 'closed', '', 'sunglasses', '', '', '2017-12-15 03:56:43', '2017-12-15 03:56:43', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=sunglasses', 0, 'product', '', 0),
(64, 1, '2017-12-15 03:56:45', '2017-12-15 03:56:45', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Hoodie with Pocket', 'This is a simple product.', 'publish', 'open', 'closed', '', 'hoodie-with-pocket', '', '', '2017-12-15 03:56:45', '2017-12-15 03:56:45', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=hoodie-with-pocket', 0, 'product', '', 0),
(66, 1, '2017-12-15 03:56:45', '2017-12-15 03:56:45', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Hoodie with Zipper', 'This is a simple product.', 'publish', 'open', 'closed', '', 'hoodie-with-zipper', '', '', '2017-12-15 03:56:45', '2017-12-15 03:56:45', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=hoodie-with-zipper', 0, 'product', '', 0),
(68, 1, '2017-12-15 03:56:46', '2017-12-15 03:56:46', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Long Sleeve Tee', 'This is a simple product.', 'publish', 'open', 'closed', '', 'long-sleeve-tee', '', '', '2017-12-15 03:56:46', '2017-12-15 03:56:46', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=long-sleeve-tee', 0, 'product', '', 0),
(70, 1, '2017-12-15 03:56:47', '2017-12-15 03:56:47', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Polo', 'This is a simple product.', 'publish', 'open', 'closed', '', 'polo', '', '', '2017-12-15 03:56:47', '2017-12-15 03:56:47', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=polo', 0, 'product', '', 0),
(73, 1, '2017-12-15 03:56:49', '2017-12-15 03:56:49', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis orci ac odio dictum tincidunt. Donec ut metus leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed luctus, dui eu sagittis sodales, nulla nibh sagittis augue, vel porttitor diam enim non metus. Vestibulum aliquam augue neque. Phasellus tincidunt odio eget ullamcorper efficitur. Cras placerat ut turpis pellentesque vulputate. Nam sed consequat tortor. Curabitur finibus sapien dolor. Ut eleifend tellus nec erat pulvinar dignissim. Nam non arcu purus. Vivamus et massa massa.', 'Album', 'This is a simple, virtual product.', 'publish', 'open', 'closed', '', 'album', '', '', '2017-12-15 03:56:49', '2017-12-15 03:56:49', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=album', 0, 'product', '', 0),
(75, 1, '2017-12-15 03:56:49', '2017-12-15 03:56:49', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis orci ac odio dictum tincidunt. Donec ut metus leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed luctus, dui eu sagittis sodales, nulla nibh sagittis augue, vel porttitor diam enim non metus. Vestibulum aliquam augue neque. Phasellus tincidunt odio eget ullamcorper efficitur. Cras placerat ut turpis pellentesque vulputate. Nam sed consequat tortor. Curabitur finibus sapien dolor. Ut eleifend tellus nec erat pulvinar dignissim. Nam non arcu purus. Vivamus et massa massa.', 'Single', 'This is a simple, virtual product.', 'publish', 'open', 'closed', '', 'single', '', '', '2017-12-15 03:56:49', '2017-12-15 03:56:49', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=single', 0, 'product', '', 1),
(83, 1, '2017-12-15 03:56:52', '2017-12-15 03:56:52', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'T-Shirt with Logo', 'This is a simple product.', 'publish', 'open', 'closed', '', 't-shirt-with-logo', '', '', '2017-12-15 03:56:52', '2017-12-15 03:56:52', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=t-shirt-with-logo', 0, 'product', '', 0),
(85, 1, '2017-12-15 03:56:53', '2017-12-15 03:56:53', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Beanie with Logo', 'This is a simple product.', 'publish', 'open', 'closed', '', 'beanie-with-logo', '', '', '2017-12-15 03:56:53', '2017-12-15 03:56:53', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=beanie-with-logo', 0, 'product', '', 0),
(87, 1, '2017-12-15 03:56:54', '2017-12-15 03:56:54', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Logo Collection', 'This is a grouped product.', 'publish', 'open', 'closed', '', 'logo-collection', '', '', '2017-12-15 03:56:54', '2017-12-15 03:56:54', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=logo-collection', 0, 'product', '', 0),
(89, 1, '2017-12-15 03:57:20', '2017-12-15 03:57:20', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'WordPress Pennant', 'This is an external product.', 'publish', 'open', 'closed', '', 'wordpress-pennant', '', '', '2017-12-15 03:57:20', '2017-12-15 03:57:20', '', 0, 'https://woocommercecore.mystagingwebsite.com/?product=wordpress-pennant', 0, 'product', '', 0),
(90, 1, '2018-05-01 16:18:45', '2018-05-01 16:18:45', '{\n    "ecommerce-market::theme_options[footer_address]": {\n        "value": "Refshalevej 169A, 1. DK- 1432 Cph. K Copenhagen Denmark",\n        "type": "theme_mod",\n        "user_id": 1,\n        "date_modified_gmt": "2018-05-01 16:17:57"\n    },\n    "ecommerce-market::theme_options[footer_number]": {\n        "value": "09730872969",\n        "type": "theme_mod",\n        "user_id": 1,\n        "date_modified_gmt": "2018-05-01 16:18:45"\n    },\n    "ecommerce-market::theme_options[footer_email]": {\n        "value": "meettomangesh@gmail.com",\n        "type": "theme_mod",\n        "user_id": 1,\n        "date_modified_gmt": "2018-05-01 16:18:45"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'ddab1288-d195-436d-ae2e-2200e33e95ec', '', '', '2018-05-01 16:18:45', '2018-05-01 16:18:45', '', 0, 'http://localhost/brogaard/?p=90', 0, 'customize_changeset', '', 0),
(91, 1, '2018-05-01 16:23:00', '2018-05-01 16:23:00', '{\n    "ecommerce-market::theme_options[copyright_text]": {\n        "value": "copyright@brogaard.com",\n        "type": "theme_mod",\n        "user_id": 1,\n        "date_modified_gmt": "2018-05-01 16:23:00"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'ed493f27-d7bb-4f8d-9fb8-361ff24a6c09', '', '', '2018-05-01 16:23:00', '2018-05-01 16:23:00', '', 0, 'http://localhost/brogaard/?p=91', 0, 'customize_changeset', '', 0),
(92, 1, '2018-05-02 07:11:30', '2018-05-02 07:11:30', '', 'Order &ndash; May 2, 2018 @ 07:11 AM', '', 'trash', 'open', 'closed', 'order_5ae964a29e751', 'order-may-02-2018-0711-am__trashed', '', '', '2018-05-03 10:05:17', '2018-05-03 10:05:17', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=92', 0, 'shop_order', '', 1),
(93, 1, '2018-05-02 10:23:35', '2018-05-02 10:23:35', '', 'Order &ndash; May 2, 2018 @ 10:23 AM', '', 'trash', 'open', 'closed', 'order_5ae991a76c707', 'order-may-02-2018-1023-am__trashed', '', '', '2018-05-03 10:05:16', '2018-05-03 10:05:16', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=93', 0, 'shop_order', '', 1),
(94, 1, '2018-05-03 07:21:20', '2018-05-03 07:21:20', '', 'Order &ndash; May 3, 2018 @ 07:21 AM', '', 'trash', 'open', 'closed', 'order_5aeab87097a9a', 'order-may-03-2018-0721-am__trashed', '', '', '2018-05-03 10:05:16', '2018-05-03 10:05:16', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=94', 0, 'shop_order', '', 1),
(95, 1, '2018-05-03 10:06:12', '2018-05-03 10:06:12', '', 'Order &ndash; May 3, 2018 @ 10:06 AM', '', 'trash', 'open', 'closed', 'order_5aeadf145fe86', 'order-may-03-2018-1006-am__trashed', '', '', '2018-05-03 10:07:01', '2018-05-03 10:07:01', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=95', 0, 'shop_order', '', 1),
(96, 1, '2018-05-03 10:08:49', '2018-05-03 10:08:49', '', 'Order &ndash; May 3, 2018 @ 10:08 AM', '', 'trash', 'open', 'closed', 'order_5aeadfb18d694', 'order-may-03-2018-1008-am__trashed', '', '', '2018-05-03 10:44:56', '2018-05-03 10:44:56', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=96', 0, 'shop_order', '', 1),
(97, 1, '2018-05-03 10:44:32', '2018-05-03 10:44:32', '', 'Order &ndash; May 3, 2018 @ 10:44 AM', '', 'trash', 'closed', 'closed', 'order_5aeae81088093', 'order-may-03-2018-1044-am__trashed', '', '', '2018-05-03 12:59:05', '2018-05-03 12:59:05', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=97', 0, 'shop_order', '', 1),
(98, 1, '2018-05-03 12:28:11', '2018-05-03 12:28:11', '', 'Order &ndash; May 3, 2018 @ 12:28 PM', '', 'trash', 'open', 'closed', 'order_5aeb005b0f190', 'order-may-03-2018-1228-pm__trashed', '', '', '2018-05-03 12:59:04', '2018-05-03 12:59:04', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=98', 0, 'shop_order', '', 2),
(99, 1, '2018-05-03 13:00:21', '2018-05-03 13:00:21', '', 'Order &ndash; May 3, 2018 @ 01:00 PM', '', 'trash', 'closed', 'closed', 'order_5aeb07e51f0b2', 'order-may-03-2018-0100-pm__trashed', '', '', '2018-05-03 13:37:09', '2018-05-03 13:37:09', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=99', 0, 'shop_order', '', 1),
(100, 1, '2018-05-04 10:11:59', '2018-05-04 10:11:59', '', 'Order &ndash; May 4, 2018 @ 10:11 AM', '', 'trash', 'closed', 'closed', 'order_5aec31efaaa7d', 'order-may-04-2018-1011-am__trashed', '', '', '2018-05-04 10:18:04', '2018-05-04 10:18:04', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=100', 0, 'shop_order', '', 1),
(101, 1, '2018-05-04 10:30:27', '2018-05-04 10:30:27', '', 'Order &ndash; May 4, 2018 @ 10:30 AM', '', 'wc-completed', 'closed', 'closed', 'order_5aec3643dd8b5', 'order-may-04-2018-1030-am', '', '', '2018-05-04 12:31:02', '2018-05-04 12:31:02', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=101', 0, 'shop_order', '', 3),
(102, 1, '2018-05-04 10:34:27', '2018-05-04 10:34:27', '', 'Order &ndash; May 4, 2018 @ 10:34 AM', '', 'wc-processing', 'closed', 'closed', 'order_5aec37334f66f', 'order-may-04-2018-1034-am', '', '', '2018-05-04 11:07:22', '2018-05-04 11:07:22', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=102', 0, 'shop_order', '', 1),
(103, 1, '2018-05-04 10:39:37', '2018-05-04 10:39:37', '', 'Order &ndash; May 4, 2018 @ 10:39 AM', '', 'wc-refunded', 'open', 'closed', 'order_5aec386941c5d', 'order-may-04-2018-1039-am', '', '', '2018-05-04 11:05:49', '2018-05-04 11:05:49', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=103', 0, 'shop_order', '', 3),
(104, 1, '2018-05-04 11:05:43', '2018-05-04 11:05:43', '', 'Refund &ndash; May 04, 2018 @ 11:05 AM', '', 'wc-completed', 'closed', 'closed', 'order_5aec3e8758111', 'refund-may-04-2018-1105-am', '', '', '2018-05-04 11:05:43', '2018-05-04 11:05:43', '', 103, 'http://localhost/brogaard/?shop_order_refund=refund-may-04-2018-1105-am', 0, 'shop_order_refund', '', 0),
(105, 1, '2018-05-04 11:10:43', '2018-05-04 11:10:43', '', 'Order &ndash; May 4, 2018 @ 11:10 AM', '', 'trash', 'closed', 'closed', 'order_5aec3fb3627f6', 'order-may-04-2018-1110-am__trashed', '', '', '2018-05-04 12:16:27', '2018-05-04 12:16:27', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=105', 0, 'shop_order', '', 0),
(106, 1, '2018-05-04 12:16:54', '2018-05-04 12:16:54', '', 'Order &ndash; May 4, 2018 @ 12:16 PM', '', 'wc-pending', 'closed', 'closed', 'order_5aec4f369b082', 'order-may-04-2018-1216-pm', '', '', '2018-05-04 12:22:34', '2018-05-04 12:22:34', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=106', 0, 'shop_order', '', 1),
(107, 1, '2018-05-04 12:22:03', '2018-05-04 12:22:03', '', 'Order &ndash; May 4, 2018 @ 12:22 PM', '', 'wc-processing', 'open', 'closed', 'order_5aec506b7677b', 'order-may-04-2018-1222-pm', '', '', '2018-05-04 12:22:09', '2018-05-04 12:22:09', '', 0, 'http://localhost/brogaard/?post_type=shop_order&#038;p=107', 0, 'shop_order', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_termmeta`
--

INSERT INTO `wp_termmeta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 22, 'order', '0'),
(2, 23, 'order', '0'),
(3, 25, 'order', '0'),
(4, 27, 'order', '0'),
(5, 28, 'order', '0'),
(6, 29, 'order', '0'),
(7, 22, 'product_count_product_cat', '5'),
(8, 23, 'product_count_product_cat', '3'),
(9, 25, 'product_count_product_cat', '5'),
(10, 27, 'product_count_product_cat', '2'),
(11, 28, 'product_count_product_cat', '1'),
(12, 29, 'product_count_product_cat', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(6, 'exclude-from-search', 'exclude-from-search', 0),
(7, 'exclude-from-catalog', 'exclude-from-catalog', 0),
(8, 'featured', 'featured', 0),
(9, 'outofstock', 'outofstock', 0),
(10, 'rated-1', 'rated-1', 0),
(11, 'rated-2', 'rated-2', 0),
(12, 'rated-3', 'rated-3', 0),
(13, 'rated-4', 'rated-4', 0),
(14, 'rated-5', 'rated-5', 0),
(15, 'Uncategorized', 'uncategorized', 0),
(16, 'Blue', 'blue', 0),
(17, 'Green', 'green', 0),
(18, 'Large', 'large', 0),
(19, 'Medium', 'medium', 0),
(20, 'Red', 'red', 0),
(21, 'Small', 'small', 0),
(22, 'Tshirts', 'tshirts', 0),
(23, 'Hoodies', 'hoodies', 0),
(24, 'Gray', 'gray', 0),
(25, 'Accessories', 'accessories', 0),
(26, 'Yellow', 'yellow', 0),
(27, 'Music', 'music', 0),
(28, 'Clothing', 'clothing', 0),
(29, 'Decor', 'decor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(44, 4, 0),
(44, 8, 0),
(44, 16, 0),
(44, 17, 0),
(44, 18, 0),
(44, 19, 0),
(44, 20, 0),
(44, 21, 0),
(44, 22, 0),
(45, 4, 0),
(45, 16, 0),
(45, 17, 0),
(45, 20, 0),
(45, 23, 0),
(46, 2, 0),
(46, 16, 0),
(46, 23, 0),
(47, 2, 0),
(47, 22, 0),
(47, 24, 0),
(48, 2, 0),
(48, 20, 0),
(48, 25, 0),
(58, 2, 0),
(58, 25, 0),
(60, 2, 0),
(60, 8, 0),
(60, 25, 0),
(60, 26, 0),
(62, 2, 0),
(62, 8, 0),
(62, 25, 0),
(64, 2, 0),
(64, 6, 0),
(64, 7, 0),
(64, 8, 0),
(64, 23, 0),
(64, 24, 0),
(66, 2, 0),
(66, 8, 0),
(66, 23, 0),
(68, 2, 0),
(68, 17, 0),
(68, 22, 0),
(70, 2, 0),
(70, 16, 0),
(70, 22, 0),
(73, 2, 0),
(73, 27, 0),
(75, 2, 0),
(75, 13, 0),
(75, 27, 0),
(83, 2, 0),
(83, 22, 0),
(83, 24, 0),
(85, 2, 0),
(85, 20, 0),
(85, 25, 0),
(87, 3, 0),
(87, 28, 0),
(89, 5, 0),
(89, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'product_type', '', 0, 14),
(3, 3, 'product_type', '', 0, 1),
(4, 4, 'product_type', '', 0, 2),
(5, 5, 'product_type', '', 0, 1),
(6, 6, 'product_visibility', '', 0, 1),
(7, 7, 'product_visibility', '', 0, 1),
(8, 8, 'product_visibility', '', 0, 5),
(9, 9, 'product_visibility', '', 0, 0),
(10, 10, 'product_visibility', '', 0, 0),
(11, 11, 'product_visibility', '', 0, 0),
(12, 12, 'product_visibility', '', 0, 0),
(13, 13, 'product_visibility', '', 0, 1),
(14, 14, 'product_visibility', '', 0, 0),
(15, 15, 'product_cat', '', 0, 0),
(16, 16, 'pa_color', '', 0, 4),
(17, 17, 'pa_color', '', 0, 3),
(18, 18, 'pa_size', '', 0, 1),
(19, 19, 'pa_size', '', 0, 1),
(20, 20, 'pa_color', '', 0, 4),
(21, 21, 'pa_size', '', 0, 1),
(22, 22, 'product_cat', '', 0, 5),
(23, 23, 'product_cat', '', 0, 4),
(24, 24, 'pa_color', '', 0, 3),
(25, 25, 'product_cat', '', 0, 5),
(26, 26, 'pa_color', '', 0, 1),
(27, 27, 'product_cat', '', 0, 2),
(28, 28, 'product_cat', '', 0, 1),
(29, 29, 'product_cat', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'webmaster'),
(2, 1, 'first_name', 'Test'),
(3, 1, 'last_name', 'brogaard'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'yith_wcwl_panel'),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:3:{s:64:"a49254001516049d73065e3fa5ad982c53fefc206cf4038ed8eea7da83fffb4d";a:4:{s:10:"expiration";i:1525428178;s:2:"ip";s:3:"::1";s:2:"ua";s:105:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36";s:5:"login";i:1525255378;}s:64:"ebde499fc5c064af043a021f5e4cfa8bb8ca5e43fbb17e3afbdc53973be20a90";a:4:{s:10:"expiration";i:1525510536;s:2:"ip";s:3:"::1";s:2:"ua";s:105:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36";s:5:"login";i:1525337736;}s:64:"3a37ca064237e331041bb63182099898867333521eeb8c3a8c7d7200779ac536";a:4:{s:10:"expiration";i:1525600950;s:2:"ip";s:3:"::1";s:2:"ua";s:105:"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36";s:5:"login";i:1525428150;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '3'),
(18, 1, 'community-events-location', 'a:1:{s:2:"ip";s:2:"::";}'),
(20, 1, 'dismissed_template_files_notice', '1'),
(21, 1, 'last_update', '1525437062'),
(22, 1, 'billing_first_name', 'Test'),
(23, 1, 'billing_last_name', 'brogaard'),
(24, 1, 'billing_company', ''),
(25, 1, 'billing_address_1', 'Vesterbrogade 3'),
(26, 1, 'billing_city', 'K�benhavn'),
(27, 1, 'billing_postcode', '1630'),
(28, 1, 'billing_country', 'DK'),
(29, 1, 'billing_email', 'testbrogaard@gmail.com'),
(30, 1, 'billing_phone', ''),
(31, 1, 'shipping_first_name', 'Test'),
(32, 1, 'shipping_last_name', 'brogaard'),
(33, 1, 'shipping_company', ''),
(34, 1, 'shipping_address_1', 'Vesterbrogade 3'),
(35, 1, 'shipping_city', 'K�benhavn'),
(36, 1, 'shipping_postcode', '1630'),
(37, 1, 'shipping_country', 'DK'),
(53, 1, 'billing_state', 'Danmark'),
(54, 1, 'shipping_state', 'Danmark'),
(86, 1, 'closedpostboxes_shop_order', 'a:0:{}'),
(87, 1, 'metaboxhidden_shop_order', 'a:0:{}'),
(91, 1, 'shipping_method', 'a:1:{i:0;s:11:"flat_rate:1";}'),
(95, 1, 'paying_customer', '1'),
(99, 1, '_woocommerce_persistent_cart_1', 'a:1:{s:4:"cart";a:0:{}}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'webmaster', '$P$B6JbSqfDsRS3YaAE6UyynPuISpcgah.', 'webmaster', 'meettomangesh@gmail.com', '', '2018-04-30 06:38:27', '', 0, 'webmaster');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_download_log`
--

CREATE TABLE `wp_wc_download_log` (
  `download_log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_ip_address` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_webhooks`
--

CREATE TABLE `wp_wc_webhooks` (
  `webhook_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_url` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `secret` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `topic` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `api_version` smallint(4) NOT NULL,
  `failure_count` smallint(10) NOT NULL DEFAULT '0',
  `pending_delivery` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_api_keys`
--

CREATE TABLE `wp_woocommerce_api_keys` (
  `key_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `permissions` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `consumer_key` char(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `consumer_secret` char(43) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nonces` longtext COLLATE utf8mb4_unicode_520_ci,
  `truncated_key` char(7) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_access` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_attribute_taxonomies`
--

CREATE TABLE `wp_woocommerce_attribute_taxonomies` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `attribute_label` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `attribute_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `attribute_orderby` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_woocommerce_attribute_taxonomies`
--

INSERT INTO `wp_woocommerce_attribute_taxonomies` (`attribute_id`, `attribute_name`, `attribute_label`, `attribute_type`, `attribute_orderby`, `attribute_public`) VALUES
(1, 'color', 'color', 'select', 'menu_order', 0),
(2, 'size', 'size', 'select', 'menu_order', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_downloadable_product_permissions`
--

CREATE TABLE `wp_woocommerce_downloadable_product_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `download_id` varchar(36) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `order_key` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `downloads_remaining` varchar(9) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_log`
--

CREATE TABLE `wp_woocommerce_log` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `level` smallint(4) NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `context` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_itemmeta`
--

CREATE TABLE `wp_woocommerce_order_itemmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_woocommerce_order_itemmeta`
--

INSERT INTO `wp_woocommerce_order_itemmeta` (`meta_id`, `order_item_id`, `meta_key`, `meta_value`) VALUES
(1, 1, '_product_id', '48'),
(2, 1, '_variation_id', '0'),
(3, 1, '_qty', '1'),
(4, 1, '_tax_class', ''),
(5, 1, '_line_subtotal', '18'),
(6, 1, '_line_subtotal_tax', '0'),
(7, 1, '_line_total', '18'),
(8, 1, '_line_tax', '0'),
(9, 1, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(10, 2, 'method_id', 'flat_rate:1'),
(11, 2, 'cost', '0.00'),
(12, 2, 'total_tax', '0'),
(13, 2, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(14, 2, 'Items', 'Beanie &times; 1'),
(29, 5, '_product_id', '48'),
(30, 5, '_variation_id', '0'),
(31, 5, '_qty', '1'),
(32, 5, '_tax_class', ''),
(33, 5, '_line_subtotal', '18'),
(34, 5, '_line_subtotal_tax', '0'),
(35, 5, '_line_total', '18'),
(36, 5, '_line_tax', '0'),
(37, 5, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(38, 6, 'method_id', 'flat_rate:1'),
(39, 6, 'cost', '0.00'),
(40, 6, 'total_tax', '0'),
(41, 6, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(42, 6, 'Items', 'Beanie &times; 1'),
(43, 7, '_product_id', '75'),
(44, 7, '_variation_id', '0'),
(45, 7, '_qty', '1'),
(46, 7, '_tax_class', ''),
(47, 7, '_line_subtotal', '2'),
(48, 7, '_line_subtotal_tax', '0'),
(49, 7, '_line_total', '2'),
(50, 7, '_line_tax', '0'),
(51, 7, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(52, 8, '_product_id', '48'),
(53, 8, '_variation_id', '0'),
(54, 8, '_qty', '1'),
(55, 8, '_tax_class', ''),
(56, 8, '_line_subtotal', '18'),
(57, 8, '_line_subtotal_tax', '0'),
(58, 8, '_line_total', '18'),
(59, 8, '_line_tax', '0'),
(60, 8, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(61, 9, 'method_id', 'flat_rate:1'),
(62, 9, 'cost', '0.00'),
(63, 9, 'total_tax', '0'),
(64, 9, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(65, 9, 'Items', 'Beanie &times; 1'),
(75, 11, '_product_id', '75'),
(76, 11, '_variation_id', '0'),
(77, 11, '_qty', '1'),
(78, 11, '_tax_class', ''),
(79, 11, '_line_subtotal', '2'),
(80, 11, '_line_subtotal_tax', '0'),
(81, 11, '_line_total', '2'),
(82, 11, '_line_tax', '0'),
(83, 11, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(84, 12, '_product_id', '48'),
(85, 12, '_variation_id', '0'),
(86, 12, '_qty', '1'),
(87, 12, '_tax_class', ''),
(88, 12, '_line_subtotal', '18'),
(89, 12, '_line_subtotal_tax', '0'),
(90, 12, '_line_total', '18'),
(91, 12, '_line_tax', '0'),
(92, 12, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(93, 13, 'method_id', 'flat_rate:2'),
(94, 13, 'cost', '0.00'),
(95, 13, 'total_tax', '0'),
(96, 13, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(97, 13, 'Items', 'Beanie &times; 1'),
(112, 16, '_product_id', '46'),
(113, 16, '_variation_id', '0'),
(114, 16, '_qty', '1'),
(115, 16, '_tax_class', ''),
(116, 16, '_line_subtotal', '45'),
(117, 16, '_line_subtotal_tax', '0'),
(118, 16, '_line_total', '45'),
(119, 16, '_line_tax', '0'),
(120, 16, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(121, 17, 'method_id', 'flat_rate:2'),
(122, 17, 'cost', '0.00'),
(123, 17, 'total_tax', '0'),
(124, 17, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(125, 17, 'Items', 'Hoodie with Logo &times; 1'),
(126, 18, '_product_id', '46'),
(127, 18, '_variation_id', '0'),
(128, 18, '_qty', '1'),
(129, 18, '_tax_class', ''),
(130, 18, '_line_subtotal', '45'),
(131, 18, '_line_subtotal_tax', '0'),
(132, 18, '_line_total', '45'),
(133, 18, '_line_tax', '0'),
(134, 18, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(135, 19, 'method_id', 'flat_rate:2'),
(136, 19, 'cost', '0.00'),
(137, 19, 'total_tax', '0'),
(138, 19, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(139, 19, 'Items', 'Hoodie with Logo &times; 1'),
(140, 20, '_product_id', '68'),
(141, 20, '_variation_id', '0'),
(142, 20, '_qty', '1'),
(143, 20, '_tax_class', ''),
(144, 20, '_line_subtotal', '25'),
(145, 20, '_line_subtotal_tax', '0'),
(146, 20, '_line_total', '25'),
(147, 20, '_line_tax', '0'),
(148, 20, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(149, 21, 'method_id', 'flat_rate:1'),
(150, 21, 'cost', '0.00'),
(151, 21, 'total_tax', '0'),
(152, 21, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(153, 21, 'Items', 'Long Sleeve Tee &times; 1'),
(154, 22, '_product_id', '68'),
(155, 22, '_variation_id', '0'),
(156, 22, '_qty', '1'),
(157, 22, '_tax_class', ''),
(158, 22, '_line_subtotal', '25'),
(159, 22, '_line_subtotal_tax', '0'),
(160, 22, '_line_total', '25'),
(161, 22, '_line_tax', '0'),
(162, 22, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(163, 23, 'method_id', 'flat_rate:1'),
(164, 23, 'cost', '0.00'),
(165, 23, 'total_tax', '0'),
(166, 23, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(167, 23, 'Items', 'Long Sleeve Tee &times; 1'),
(168, 24, '_product_id', '46'),
(169, 24, '_variation_id', '0'),
(170, 24, '_qty', '1'),
(171, 24, '_tax_class', ''),
(172, 24, '_line_subtotal', '45'),
(173, 24, '_line_subtotal_tax', '0'),
(174, 24, '_line_total', '45'),
(175, 24, '_line_tax', '0'),
(176, 24, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(177, 25, 'method_id', 'flat_rate:1'),
(178, 25, 'cost', '0.00'),
(179, 25, 'total_tax', '0'),
(180, 25, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(181, 25, 'Items', 'Hoodie with Logo &times; 1'),
(182, 26, '_product_id', '62'),
(183, 26, '_variation_id', '0'),
(184, 26, '_qty', '1'),
(185, 26, '_tax_class', ''),
(186, 26, '_line_subtotal', '90'),
(187, 26, '_line_subtotal_tax', '0'),
(188, 26, '_line_total', '90'),
(189, 26, '_line_tax', '0'),
(190, 26, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(191, 27, 'method_id', 'flat_rate:1'),
(192, 27, 'cost', '0.00'),
(193, 27, 'total_tax', '0'),
(194, 27, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(195, 27, 'Items', 'Sunglasses &times; 1'),
(196, 28, '_product_id', '47'),
(197, 28, '_variation_id', '0'),
(198, 28, '_qty', '1'),
(199, 28, '_tax_class', ''),
(200, 28, '_line_subtotal', '18'),
(201, 28, '_line_subtotal_tax', '0'),
(202, 28, '_line_total', '18'),
(203, 28, '_line_tax', '0'),
(204, 28, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(205, 29, 'method_id', 'flat_rate:1'),
(206, 29, 'cost', '0.00'),
(207, 29, 'total_tax', '0'),
(208, 29, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(209, 29, 'Items', 'T-Shirt &times; 1'),
(210, 30, '_product_id', '68'),
(211, 30, '_variation_id', '0'),
(212, 30, '_qty', '1'),
(213, 30, '_tax_class', ''),
(214, 30, '_line_subtotal', '25'),
(215, 30, '_line_subtotal_tax', '0'),
(216, 30, '_line_total', '25'),
(217, 30, '_line_tax', '0'),
(218, 30, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(219, 31, 'method_id', 'flat_rate:1'),
(220, 31, 'cost', '0.00'),
(221, 31, 'total_tax', '0'),
(222, 31, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(223, 31, 'Items', 'Long Sleeve Tee &times; 1'),
(224, 32, '_product_id', '46'),
(225, 32, '_variation_id', '0'),
(226, 32, '_qty', '1'),
(227, 32, '_tax_class', ''),
(228, 32, '_line_subtotal', '45'),
(229, 32, '_line_subtotal_tax', '0'),
(230, 32, '_line_total', '45'),
(231, 32, '_line_tax', '0'),
(232, 32, '_line_tax_data', 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'),
(233, 33, 'method_id', 'flat_rate:1'),
(234, 33, 'cost', '0.00'),
(235, 33, 'total_tax', '0'),
(236, 33, 'taxes', 'a:1:{s:5:"total";a:0:{}}'),
(237, 33, 'Items', 'Hoodie with Logo &times; 1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_items`
--

CREATE TABLE `wp_woocommerce_order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `order_item_type` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_woocommerce_order_items`
--

INSERT INTO `wp_woocommerce_order_items` (`order_item_id`, `order_item_name`, `order_item_type`, `order_id`) VALUES
(1, 'Beanie', 'line_item', 92),
(2, 'Flat rate', 'shipping', 92),
(5, 'Beanie', 'line_item', 93),
(6, 'Flat rate', 'shipping', 93),
(7, 'Single', 'line_item', 94),
(8, 'Beanie', 'line_item', 95),
(9, 'Flat rate', 'shipping', 95),
(11, 'Single', 'line_item', 96),
(12, 'Beanie', 'line_item', 97),
(13, 'Flat rate', 'shipping', 97),
(16, 'Hoodie with Logo', 'line_item', 98),
(17, 'Flat rate', 'shipping', 98),
(18, 'Hoodie with Logo', 'line_item', 99),
(19, 'Flat rate', 'shipping', 99),
(20, 'Long Sleeve Tee', 'line_item', 100),
(21, 'Flat rate', 'shipping', 100),
(22, 'Long Sleeve Tee', 'line_item', 101),
(23, 'Flat rate', 'shipping', 101),
(24, 'Hoodie with Logo', 'line_item', 102),
(25, 'Flat rate', 'shipping', 102),
(26, 'Sunglasses', 'line_item', 103),
(27, 'Flat rate', 'shipping', 103),
(28, 'T-Shirt', 'line_item', 105),
(29, 'Flat rate', 'shipping', 105),
(30, 'Long Sleeve Tee', 'line_item', 106),
(31, 'Flat rate', 'shipping', 106),
(32, 'Hoodie with Logo', 'line_item', 107),
(33, 'Flat rate', 'shipping', 107);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokenmeta`
--

CREATE TABLE `wp_woocommerce_payment_tokenmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `payment_token_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokens`
--

CREATE TABLE `wp_woocommerce_payment_tokens` (
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_sessions`
--

CREATE TABLE `wp_woocommerce_sessions` (
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `session_key` char(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `session_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `session_expiry` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_woocommerce_sessions`
--

INSERT INTO `wp_woocommerce_sessions` (`session_id`, `session_key`, `session_value`, `session_expiry`) VALUES
(224, '1', 'a:14:{s:8:"customer";s:870:"a:26:{s:2:"id";s:1:"1";s:13:"date_modified";s:25:"2018-05-04T12:31:02+00:00";s:8:"postcode";s:4:"1630";s:4:"city";s:11:"K�benhavn";s:9:"address_1";s:15:"Vesterbrogade 3";s:7:"address";s:15:"Vesterbrogade 3";s:9:"address_2";s:0:"";s:5:"state";s:7:"Danmark";s:7:"country";s:2:"DK";s:17:"shipping_postcode";s:4:"1630";s:13:"shipping_city";s:11:"K�benhavn";s:18:"shipping_address_1";s:15:"Vesterbrogade 3";s:16:"shipping_address";s:15:"Vesterbrogade 3";s:18:"shipping_address_2";s:0:"";s:14:"shipping_state";s:7:"Danmark";s:16:"shipping_country";s:2:"DK";s:13:"is_vat_exempt";s:0:"";s:19:"calculated_shipping";s:0:"";s:10:"first_name";s:4:"Test";s:9:"last_name";s:8:"brogaard";s:7:"company";s:0:"";s:5:"phone";s:0:"";s:5:"email";s:22:"testbrogaard@gmail.com";s:19:"shipping_first_name";s:4:"Test";s:18:"shipping_last_name";s:8:"brogaard";s:16:"shipping_company";s:0:"";}";s:4:"cart";s:6:"a:0:{}";s:11:"cart_totals";s:367:"a:15:{s:8:"subtotal";i:0;s:12:"subtotal_tax";i:0;s:14:"shipping_total";i:0;s:12:"shipping_tax";i:0;s:14:"shipping_taxes";a:0:{}s:14:"discount_total";i:0;s:12:"discount_tax";i:0;s:19:"cart_contents_total";i:0;s:17:"cart_contents_tax";i:0;s:19:"cart_contents_taxes";a:0:{}s:9:"fee_total";i:0;s:7:"fee_tax";i:0;s:9:"fee_taxes";a:0:{}s:5:"total";i:0;s:9:"total_tax";i:0;}";s:15:"applied_coupons";s:6:"a:0:{}";s:22:"coupon_discount_totals";s:6:"a:0:{}";s:26:"coupon_discount_tax_totals";s:6:"a:0:{}";s:21:"removed_cart_contents";s:6:"a:0:{}";s:10:"wc_notices";N;s:22:"shipping_for_package_0";s:382:"a:2:{s:12:"package_hash";s:40:"wc_ship_e3289f77df069526b874219a7b6b442c";s:5:"rates";a:1:{s:11:"flat_rate:1";O:16:"WC_Shipping_Rate":2:{s:7:"\0*\0data";a:6:{s:2:"id";s:11:"flat_rate:1";s:9:"method_id";s:9:"flat_rate";s:11:"instance_id";i:1;s:5:"label";s:9:"Flat rate";s:4:"cost";s:4:"0.00";s:5:"taxes";a:0:{}}s:12:"\0*\0meta_data";a:1:{s:5:"Items";s:26:"Hoodie with Logo &times; 1";}}}}";s:25:"previous_shipping_methods";s:39:"a:1:{i:0;a:1:{i:0;s:11:"flat_rate:1";}}";s:22:"shipping_method_counts";s:14:"a:1:{i:0;i:1;}";s:21:"chosen_payment_method";s:11:"ppec_paypal";s:22:"order_awaiting_payment";N;s:23:"chosen_shipping_methods";s:29:"a:1:{i:0;s:11:"flat_rate:1";}";}', 1525600953),
(139, '4758c424281f61fc23f264043cc29f86', 'a:14:{s:4:"cart";s:6:"a:0:{}";s:11:"cart_totals";s:367:"a:15:{s:8:"subtotal";i:0;s:12:"subtotal_tax";i:0;s:14:"shipping_total";i:0;s:12:"shipping_tax";i:0;s:14:"shipping_taxes";a:0:{}s:14:"discount_total";i:0;s:12:"discount_tax";i:0;s:19:"cart_contents_total";i:0;s:17:"cart_contents_tax";i:0;s:19:"cart_contents_taxes";a:0:{}s:9:"fee_total";i:0;s:7:"fee_tax";i:0;s:9:"fee_taxes";a:0:{}s:5:"total";i:0;s:9:"total_tax";i:0;}";s:15:"applied_coupons";s:6:"a:0:{}";s:22:"coupon_discount_totals";s:6:"a:0:{}";s:26:"coupon_discount_tax_totals";s:6:"a:0:{}";s:21:"removed_cart_contents";s:6:"a:0:{}";s:8:"customer";s:860:"a:26:{s:2:"id";s:1:"1";s:13:"date_modified";s:25:"2018-05-03T13:00:20+00:00";s:8:"postcode";s:5:"99518";s:4:"city";s:9:"Anchorage";s:9:"address_1";s:15:"5501 "A" Street";s:7:"address";s:15:"5501 "A" Street";s:9:"address_2";s:0:"";s:5:"state";s:2:"AK";s:7:"country";s:2:"US";s:17:"shipping_postcode";s:5:"99518";s:13:"shipping_city";s:9:"Anchorage";s:18:"shipping_address_1";s:15:"5501 "A" Street";s:16:"shipping_address";s:15:"5501 "A" Street";s:18:"shipping_address_2";s:0:"";s:14:"shipping_state";s:2:"AK";s:16:"shipping_country";s:2:"US";s:13:"is_vat_exempt";s:0:"";s:19:"calculated_shipping";s:0:"";s:10:"first_name";s:7:"Mangesh";s:9:"last_name";s:6:"Navale";s:7:"company";s:0:"";s:5:"phone";s:0:"";s:5:"email";s:24:"testpaypal1988@gmail.com";s:19:"shipping_first_name";s:7:"Mangesh";s:18:"shipping_last_name";s:6:"Navale";s:16:"shipping_company";s:0:"";}";s:21:"chosen_payment_method";s:11:"ppec_paypal";s:22:"order_awaiting_payment";N;s:22:"shipping_for_package_0";s:382:"a:2:{s:12:"package_hash";s:40:"wc_ship_2f1e537fc9f1d41f0fecfff93e492120";s:5:"rates";a:1:{s:11:"flat_rate:2";O:16:"WC_Shipping_Rate":2:{s:7:"\0*\0data";a:6:{s:2:"id";s:11:"flat_rate:2";s:9:"method_id";s:9:"flat_rate";s:11:"instance_id";i:2;s:5:"label";s:9:"Flat rate";s:4:"cost";s:4:"0.00";s:5:"taxes";a:0:{}}s:12:"\0*\0meta_data";a:1:{s:5:"Items";s:26:"Hoodie with Logo &times; 1";}}}}";s:25:"previous_shipping_methods";s:39:"a:1:{i:0;a:1:{i:0;s:11:"flat_rate:2";}}";s:22:"shipping_method_counts";s:14:"a:1:{i:0;i:1;}";s:10:"wc_notices";N;s:23:"chosen_shipping_methods";s:29:"a:1:{i:0;s:11:"flat_rate:2";}";}', 1525504826);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zones`
--

CREATE TABLE `wp_woocommerce_shipping_zones` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `zone_order` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_woocommerce_shipping_zones`
--

INSERT INTO `wp_woocommerce_shipping_zones` (`zone_id`, `zone_name`, `zone_order`) VALUES
(1, 'Denmark', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_locations`
--

CREATE TABLE `wp_woocommerce_shipping_zone_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_woocommerce_shipping_zone_locations`
--

INSERT INTO `wp_woocommerce_shipping_zone_locations` (`location_id`, `zone_id`, `location_code`, `location_type`) VALUES
(1, 1, 'DK', 'country');

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_methods`
--

CREATE TABLE `wp_woocommerce_shipping_zone_methods` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `instance_id` bigint(20) UNSIGNED NOT NULL,
  `method_id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `method_order` bigint(20) UNSIGNED NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_woocommerce_shipping_zone_methods`
--

INSERT INTO `wp_woocommerce_shipping_zone_methods` (`zone_id`, `instance_id`, `method_id`, `method_order`, `is_enabled`) VALUES
(1, 1, 'flat_rate', 1, 1),
(0, 2, 'flat_rate', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rates`
--

CREATE TABLE `wp_woocommerce_tax_rates` (
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_country` varchar(2) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate` varchar(8) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT '0',
  `tax_rate_shipping` int(1) NOT NULL DEFAULT '1',
  `tax_rate_order` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_class` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rate_locations`
--

CREATE TABLE `wp_woocommerce_tax_rate_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_yith_wcwl`
--

CREATE TABLE `wp_yith_wcwl` (
  `ID` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishlist_id` int(11) DEFAULT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_yith_wcwl_lists`
--

CREATE TABLE `wp_yith_wcwl_lists` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wishlist_slug` varchar(200) NOT NULL,
  `wishlist_name` text,
  `wishlist_token` varchar(64) NOT NULL,
  `wishlist_privacy` tinyint(1) NOT NULL DEFAULT '0',
  `is_default` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_yith_wcwl_lists`
--

INSERT INTO `wp_yith_wcwl_lists` (`ID`, `user_id`, `wishlist_slug`, `wishlist_name`, `wishlist_token`, `wishlist_privacy`, `is_default`) VALUES
(1, 1, '', '', '9GLVSPAQ0UOG', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10)),
  ADD KEY `woo_idx_comment_type` (`comment_type`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wp_wc_download_log`
--
ALTER TABLE `wp_wc_download_log`
  ADD PRIMARY KEY (`download_log_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `wp_wc_webhooks`
--
ALTER TABLE `wp_wc_webhooks`
  ADD PRIMARY KEY (`webhook_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_woocommerce_api_keys`
--
ALTER TABLE `wp_woocommerce_api_keys`
  ADD PRIMARY KEY (`key_id`),
  ADD KEY `consumer_key` (`consumer_key`),
  ADD KEY `consumer_secret` (`consumer_secret`);

--
-- Indexes for table `wp_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_woocommerce_attribute_taxonomies`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `attribute_name` (`attribute_name`(20));

--
-- Indexes for table `wp_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_woocommerce_downloadable_product_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(16),`download_id`),
  ADD KEY `download_order_product` (`download_id`,`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `wp_woocommerce_log`
--
ALTER TABLE `wp_woocommerce_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `wp_woocommerce_order_itemmeta`
--
ALTER TABLE `wp_woocommerce_order_itemmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indexes for table `wp_woocommerce_order_items`
--
ALTER TABLE `wp_woocommerce_order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `wp_woocommerce_payment_tokenmeta`
--
ALTER TABLE `wp_woocommerce_payment_tokenmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `payment_token_id` (`payment_token_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indexes for table `wp_woocommerce_payment_tokens`
--
ALTER TABLE `wp_woocommerce_payment_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_woocommerce_sessions`
--
ALTER TABLE `wp_woocommerce_sessions`
  ADD PRIMARY KEY (`session_key`),
  ADD UNIQUE KEY `session_id` (`session_id`);

--
-- Indexes for table `wp_woocommerce_shipping_zones`
--
ALTER TABLE `wp_woocommerce_shipping_zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `wp_woocommerce_shipping_zone_locations`
--
ALTER TABLE `wp_woocommerce_shipping_zone_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Indexes for table `wp_woocommerce_shipping_zone_methods`
--
ALTER TABLE `wp_woocommerce_shipping_zone_methods`
  ADD PRIMARY KEY (`instance_id`);

--
-- Indexes for table `wp_woocommerce_tax_rates`
--
ALTER TABLE `wp_woocommerce_tax_rates`
  ADD PRIMARY KEY (`tax_rate_id`),
  ADD KEY `tax_rate_country` (`tax_rate_country`),
  ADD KEY `tax_rate_state` (`tax_rate_state`(2)),
  ADD KEY `tax_rate_class` (`tax_rate_class`(10)),
  ADD KEY `tax_rate_priority` (`tax_rate_priority`);

--
-- Indexes for table `wp_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp_woocommerce_tax_rate_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Indexes for table `wp_yith_wcwl`
--
ALTER TABLE `wp_yith_wcwl`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `wp_yith_wcwl_lists`
--
ALTER TABLE `wp_yith_wcwl_lists`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `wishlist_token` (`wishlist_token`),
  ADD KEY `wishlist_slug` (`wishlist_slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=663;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1463;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_wc_download_log`
--
ALTER TABLE `wp_wc_download_log`
  MODIFY `download_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_wc_webhooks`
--
ALTER TABLE `wp_wc_webhooks`
  MODIFY `webhook_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_api_keys`
--
ALTER TABLE `wp_woocommerce_api_keys`
  MODIFY `key_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_woocommerce_attribute_taxonomies`
  MODIFY `attribute_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_woocommerce_downloadable_product_permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_log`
--
ALTER TABLE `wp_woocommerce_log`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_order_itemmeta`
--
ALTER TABLE `wp_woocommerce_order_itemmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT for table `wp_woocommerce_order_items`
--
ALTER TABLE `wp_woocommerce_order_items`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `wp_woocommerce_payment_tokenmeta`
--
ALTER TABLE `wp_woocommerce_payment_tokenmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_payment_tokens`
--
ALTER TABLE `wp_woocommerce_payment_tokens`
  MODIFY `token_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_sessions`
--
ALTER TABLE `wp_woocommerce_sessions`
  MODIFY `session_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `wp_woocommerce_shipping_zones`
--
ALTER TABLE `wp_woocommerce_shipping_zones`
  MODIFY `zone_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_woocommerce_shipping_zone_locations`
--
ALTER TABLE `wp_woocommerce_shipping_zone_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_woocommerce_shipping_zone_methods`
--
ALTER TABLE `wp_woocommerce_shipping_zone_methods`
  MODIFY `instance_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wp_woocommerce_tax_rates`
--
ALTER TABLE `wp_woocommerce_tax_rates`
  MODIFY `tax_rate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_woocommerce_tax_rate_locations`
--
ALTER TABLE `wp_woocommerce_tax_rate_locations`
  MODIFY `location_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_yith_wcwl`
--
ALTER TABLE `wp_yith_wcwl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_yith_wcwl_lists`
--
ALTER TABLE `wp_yith_wcwl_lists`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
