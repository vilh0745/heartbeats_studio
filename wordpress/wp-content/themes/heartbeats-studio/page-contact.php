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
    #case_oversigt {
        display: grid;
        gap: 70px;
        margin: 50px;      }

      img {
        width: 100%;
        height: auto;
        display: block;
      }

       article img {
         margin-bottom: 12px;
         transition-duration: 0.5s;
      }

       article {
        margin-bottom: 20px;
      }

      .contact img:hover {
        cursor: normal;
        scale: 1.01;
    }

     .gren {
        position: relative;
        display: flex;
        scroll-behavior: smooth;
        overflow-x: scroll;
    }

    @media (min-width: 492px) {
     #case_oversigt {
        display: grid;
        margin-left: 0;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 20px;
        width: 57vw;
        max-width: 1580px;
        margin: 0 auto;
     }

     .gren {
        grid-column: 1;
        position: relative;
        display: block;
        overflow: hidden;
        width: fit-content;
    }

}

@media (min-width: 960px) {
        .gren {
        grid-column: 1;
        position: fixed;
        display: grid;
        overflow: hidden;
    }

    #case_oversigt {
        width: 75vw;
     }
}
 </style>



<aside class="contacts">
    <h4>Contact</h4>
    <p>Havneholmen 33 - 8. sal <br>
    1561 København V <br>
    Danmark</p>
    <br>
    <a href="mailto:contact@heartbeats.dk">contact@heartbeats.dk</a>
</aside>
<section id="case_oversigt"></section>
</main>
<template>
    <article class="contact">
        <img src="" alt="">
        <h5></h5>
        <h6></h6>
    </article>
</template>

<script>
    let medarbejdere = [];
    const liste = document.querySelector("#case_oversigt");
    const skabelon = document.querySelector("template");
    document.addEventListener("DOMContentLoaded", getJson);

    const url = "http://vilhelmsaxild.com/kea/heartbeats_studio/wordpress/wp-json/wp/v2/medarbejder?per_page=100";

    async function getJson() {
        let response = await fetch(url);
        medarbejdere = await response.json();
       

        visMedarbejdere();
    }

    function visMedarbejdere() {
        medarbejdere.sort(function(a, b){
    return a.id - b.id;
});
        medarbejdere.forEach(medarbejder => {
            const klon = skabelon.cloneNode(true).content;
            klon.querySelector("img").src = medarbejder.billede.guid;
            klon.querySelector("h5").innerHTML = medarbejder.navn;
            klon.querySelector("h6").innerHTML = medarbejder.stilling + " " + medarbejder.kontakt;
            liste.appendChild(klon);
        
    })
}

</script>

<?php
get_footer();
?>
