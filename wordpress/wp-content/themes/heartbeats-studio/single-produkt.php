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
	grid-template-columns: .5fr 2fr 3fr;
}

h5,
h6,
.luk {
	grid-column: 1;
	position: fixed;
}

#pic {
	grid-column: 2;
}

.text {
	grid-column: 3
}

.indhold {
    gap: 20px;
    width: 90vw;
    max-width: 1580px;
    margin: 30px auto;
}
.enkeltProdukt {
    padding: 10px;
    margin: 10px;
	max-height: 50vh;
}

</style>

	<section class="indhold">
		<article class="enkeltProdukt">
			<h5></h5>
			<h6></h6>
			<button class="luk">Tilbage</button>
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
