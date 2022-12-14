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
	.enkeltProdukt {
	display: grid;
	gap: 20px;
}

h5,
h2 {
	grid-column: 1;
	margin-left: 28px;
	position: relative;
	
}

.text {
	margin-left: 28px;
	margin-right: 28px;
	position: relative;
}

.video_pics {
	width: 100vw;
	height: auto;
}

.luk {
	display: none;
}

.indhold {
	overflow: hidden;
}

h5 {
		margin-bottom: 20px;;
	}

@media (min-width: 492px) {
.luk {
	display: block;
}

	.text {
		grid-column: 2;
		margin-left: 0;
		position: sticky;
	}

	h6 {
		max-width: 220px;
	}

	h5,
	h2 {
	margin-left: 0;
	position: relative;
	
}

.titelnavn {
	margin-left: 20px;}

	.video_pics {
	width: 100%;
	height: auto;
	object-fit: cover;
}

	.enkeltProdukt {
	display: grid;
	grid-template-columns: 22vw 1fr;
	gap: 20px;
}

.indhold {
    gap: 20px;
    width: 100vw;
    max-width: 1580px;
    margin: 30px auto;
}

.video_pics {
	grid-column: 2;
}

.txtbox {
	margin-left: 0;
	grid-column: 2;
}
}

@media (min-width: 960px) {
.enkeltProdukt {
	display: grid;
	grid-template-columns: 20vw 1fr 1fr;
	gap: 20px;
}

.txtbox {
	grid-column: 3;
}

.text {
	grid-column: 3;
	margin-right: 25px;
	position: fixed;
	max-width: 600px;
	height: 460px;
    overflow: scroll;
    scroll-behavior: smooth;
    cursor: s-resize;
	padding-bottom: 60px;
}

#overskrift {
	position: fixed;
}

h5,
h2 {
	grid-column: 3;
	margin-left: 0;
}

.titelnavn {
	position: fixed;
}

}
</style>

	<section class="indhold">
		
		<article class="enkeltProdukt">
			
			<div class="titelnavn">

			<button class="luk">Tilbage</button>
			</div>
			<img id="pic" class="video_pics" src="" alt="">
			<div class="txtbox">
			<div id="overskrift">
				<h2></h2>
				<h5></h5>
			<p class="text"></p>
			</div>
			</div>
			<video id="video1" class="video_pics" src="" poster="" autoplay muted loop controls></video>
			<video id="video2" class="video_pics" src="" poster="" autoplay muted loop controls ></video>
		</article>
	</section>

</main>

<script>
	let produkt;
	document.addEventListener("DOMContentLoaded", getJson);

	async function getJson() {
		console.log("id er", <?php echo get_the_ID() ?>);

		let jsonData = await fetch(`http://vilhelmsaxild.com/kea/heartbeats_studio/wordpress/wp-json/wp/v2/produkt/<?php echo get_the_ID() ?>`);
		produkt = await jsonData.json();
		visProdukt();
	}

	function visProdukt() {
		document.querySelector("h2").innerHTML = produkt.titel;
		document.querySelector("h5").innerHTML = produkt.produkttype;
		document.querySelector("#pic").src = produkt.billede.guid;
		document.querySelector(".text").innerHTML = produkt.beskrivelse;
		document.querySelector("#video1").poster = produkt.video1.guid;
		document.querySelector("#video2").poster = produkt.video2.guid;
		document.querySelector("#video1").src = produkt.video1.guid;
		document.querySelector("#video2").src = produkt.video2.guid;
	}

			document.querySelector(".luk").addEventListener("click", () => {
				history.back();
			});
</script>

</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer">

		<img src="../../wp-content/themes/heartbeats-studio/img/gfx-footer-desktop.svg" alt="footer-picture">

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>