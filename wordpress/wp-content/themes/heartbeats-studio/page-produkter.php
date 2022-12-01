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
 get_header();
 ?>

 <style>
    #main {
        display: grid;
        grid-template-columns: 10vw 80vw;
    }

    #case_oversigt {
        grid-column: 2;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        width: 90vw;
        max-width: 1580px;
        margin: 0 auto;
      }

      img {
        width: 100%;
        height: auto;
        display: block;
      }
 </style>


<section id="primary" class="content-area">
    <main id="main" class="site-main">

<section id="case_oversigt"></section>
</main>
<template>
    <article>
        <img src="" alt="">
        <h5></h5>
        <h6></h6>
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
        liste.innerHTML = "";
        produkter.forEach(produkt => {
            if (filterProdukt == "alle" || produkt.categories.includes(parseInt(filterProdukt))) {
            const klon = skabelon.cloneNode(true).content;
            klon.querySelector("img").src = produkt.billede.guid;
            klon.querySelector("h5").innerHTML = produkt.titel;
            klon.querySelector("h6").innerHTML = produkt.produkttype;
            klon.querySelector("article").addEventListener("click", () => {
                location.href = produkt.link;
            })
            liste.appendChild(klon);
        }
    })
}
</script>

<?php
get_footer();
?>
