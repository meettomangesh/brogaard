<?php

$mkd_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$mkd_pages[$page->ID] = $page->post_title;
}

//Portfolio Images

$mkdPortfolioImages = new IndustrialistMikadoMetaBox("portfolio-item", esc_html__("Portfolio Images (multiple upload)",'industrialist'), '', '', 'portfolio_images');
$industrialist_Framework->mkdMetaBoxes->addMetaBox("portfolio_images",$mkdPortfolioImages);

	$mkd_portfolio_image_gallery = new IndustrialistMikadoMultipleImages("mkd_portfolio-image-gallery",esc_html__("Portfolio Images",'industrialist'),esc_html__("Choose your portfolio images",'industrialist'));
	$mkdPortfolioImages->addChild("mkd_portfolio-image-gallery",$mkd_portfolio_image_gallery);

//Portfolio Images/Videos 2

$mkdPortfolioImagesVideos2 = new IndustrialistMikadoMetaBox("portfolio-item", esc_html__("Portfolio Images/Videos (single upload)",'industrialist'));
$industrialist_Framework->mkdMetaBoxes->addMetaBox("portfolio_images_videos2",$mkdPortfolioImagesVideos2);

	$mkd_portfolio_images_videos2 = new IndustrialistMikadoImagesVideosFramework(esc_html__("Portfolio Images/Videos 2",'industrialist'),esc_html__("ThisIsDescription",'industrialist'));
	$mkdPortfolioImagesVideos2->addChild("mkd_portfolio_images_videos2",$mkd_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$mkdAdditionalSidebarItems = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('portfolio-item'),
        'title' => esc_html__('Additional Portfolio Sidebar Items','industrialist'),
        'name' => 'portfolio_properties'
    )
);

	$mkd_portfolio_properties = industrialist_mikado_add_options_framework(
	    array(
	        'label' => esc_html__('Portfolio Properties','industrialist'),
	        'name' => 'mkd_portfolio_properties',
	        'parent' => $mkdAdditionalSidebarItems
	    )
	);