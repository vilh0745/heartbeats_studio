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

<section id="primary" class="content-area">
	<main id="main" class="site-main">

	<button class="luk">Tilbage</button>
	<section class="indhold">
		<article class="enkeltProdukt">
			<h5></h5>
			<h6></h6>
			<img id="pic" src="" alt="">
			<p class="text"></p>
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
		document.querySelector("h5").innerHTML = produkt.titel;
		document.querySelector("h6").innerHTML = produkt.produkttype;
		document.querySelector("#pic").src = produkt.billede.guid;
		document.querySelector(".text").innerHTML = produkt.beskrivelse;
	}

			document.querySelector(".luk").addEventListener("click", () => {
				history.back();
			});
</script>

</section>

<?php
get_footer();
