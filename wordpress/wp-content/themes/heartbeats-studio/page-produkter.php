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

         .dropdown {
        position: relative;
        margin-top: 50px;
        margin-left: 28px;
     }

     .dropdown-content {
        display: none;
        position: absolute;
        background-color: #0a0a0a;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1002;
    }

    .dropdown:hover .dropdown-content {
        display: grid;
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
        transition: 0.2s;
     }

     .gren {
        grid-column: 1;
        position: relative;
        display: block;
        overflow: hidden;
        width: fit-content;
    }

             .dropdown {
        position: fixed;
        margin-top: 0;
        margin-left: 28px;
     }

     .dropdown-content {
        display: none;
        position: absolute;
    }

    .dropdown:hover .dropdown-content {
        display: grid;
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

     .dropdown {
        position: fixed;
        margin-top: 0;
        margin-left: 28px;
     }

     .dropdown-content {
        display: none;
    }

    .dropdown:hover .dropdown-content {
        display: grid;
    }
    
}

@media (min-width: 1457px) {
     .dropdown-content {
        display: grid;
    }
}


 </style>


<div class="dropdown">
    <h4>Filtrer &#8964</h4>
<nav class="gren dropdown-content"></nav>
</div>
<section id="case_oversigt"></section>
</main>
<template>
    <article>
        <img src="" alt="">
        <h4></h4>
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
            klon.querySelector("h4").innerHTML = produkt.titel + " " + produkt.medvirkende;
            klon.querySelector("h6").innerHTML = produkt.produkttype;
            klon.querySelector("article").addEventListener("click", () => {
                location.href = produkt.link;
            })
            liste.appendChild(klon);
        }
    })
}

</script>

</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer">

		<img src="../wordpress/wp-content/themes/heartbeats-studio/img/gfx-footer-desktop.svg" alt="footer-picture">

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
