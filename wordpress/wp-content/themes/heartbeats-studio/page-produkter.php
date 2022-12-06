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
        margin: 50px;
      }

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

      article img:hover {
        cursor: pointer;
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
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
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



<nav class="gren"></nav>
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
    let categories;
    const liste = document.querySelector("#case_oversigt");
    const skabelon = document.querySelector("template");
    let filterProdukt = "alle";
    document.addEventListener("DOMContentLoaded", start);

    function start() {
        getJson();
    }

    const url = "http://vilhelmsaxild.com/kea/heartbeats_studio/wordpress/wp-json/wp/v2/produkt?per_page=100";
    const catUrl = "http://vilhelmsaxild.com/kea/heartbeats_studio/wordpress/wp-json/wp/v2/categories?per_page=100";

    async function getJson() {
        let response = await fetch(url);
        let catdata = await fetch(catUrl);
        produkter = await response.json();
        categories = await catdata.json();

        visProdukter();
        opretKnapper();
    }

    function opretKnapper() {
         categories.sort(function(a, b){
    return a.id - b.id;
});
        categories.forEach(cat => {
            document.querySelector(".gren").innerHTML += `<button class="filter" data-produkt="${cat.id}">${cat.name}</button>`
        });
          

        addEventListenersToButtons();
        visProdukter();
    }

    function addEventListenersToButtons () {
        document.querySelectorAll("button").forEach(elm => {
          elm.addEventListener("click", filtrering);
        })
      };

      function filtrering() {
        filterProdukt = this.dataset.produkt;
        console.log(filterProdukt);
        visProdukter();
      }


    function visProdukter() {
        console.log(produkter);
        liste.innerHTML = "";
     
        produkter.forEach(produkt => {
            if ( filterProdukt == "alle" || produkt.categories.includes(parseInt(filterProdukt))) {
            const klon = skabelon.cloneNode(true).content;
            klon.querySelector("img").src = produkt.billede.guid;
            klon.querySelector("h5").innerHTML = produkt.titel + " " + produkt.medvirkende;
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
