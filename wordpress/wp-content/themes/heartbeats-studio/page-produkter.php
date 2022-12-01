<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>


<section id="primary" class="content-area">
    <main id="main" class="site-main">

    <h1 id="overskrift">Cases</h1>
    <section id="case_oversigt"></section>
</main>
<template>
    <article>
        <img src="" alt="">
        <h2></h2>
        <h3></h3>
    </article>
</template>

<script>
    let produkter = [];
    const liste = document.querySelector("#case_oversigt");
    const skabelon = document.querySelector("template");
    let filterProdukt = "alle"
    document.addEventListener("DOMContentLoaded", start);

    function start() {
        getJson();
    }

    const url = "http://vilhelmsaxild.com/kea/heartbeats_studio/wordpress/wp-json/wp/v2/produkt?per_page=100";
    async function getJson() {
        let response = await fetch(url);
        produkter = await response.json();
        visProdukter();
    }

    function visProdukter() {
        console.log(produkter);
        produkter.forEach(produkt => {
            const klon = skabelon.cloneNode(true).content;
            klon.querySelector("img").src = produkt.billede.guid;
            klon.querySelector("h2").innerHTML = produkt.titel.rendered;
            klon.querySelector("h3").innerHTML = produkt.produkttype.rendered;

            liste.appendChild(klon);
        })
    }
</script>

<?php
get_footer();
?>
