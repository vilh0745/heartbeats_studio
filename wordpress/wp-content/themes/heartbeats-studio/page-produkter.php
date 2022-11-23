<?php

get_header();
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">

    <h1 id="overskrift">Cases</h1>
    <section id="case_oversigt"></section>
</main>
<template>
    <article>
        <img src="" alt="">
        <h2></h2>
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
            liste.appendChild(klon);
        })
    }
</script>

<?php
get_footer();
?>