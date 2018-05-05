# nativo-carousel
Simple Post Carousel for WP

Version 0.1 - En desarrollo.

Muestra un post carousel segun por categoria (funciona con Owl Carousel).

Compatible con Polylang (Varios strings registrados para su correcto funcionamiento).

Uso mediante el shotcode [nativo-carousel] con las siguientes opciones:

<table>
	<tr>
		<th>Option Name</th>
		<th>Description</th>
		<th>Example</th>
	</tr>
	<tr>
		<td>cat</td>
		<td>Elige la categoria a mostrar en el carousel</td>
		<td>Ej: Para mostrar la categoria "Noticias", colocamos el slug de esta categoria de la siguiente manera:  [nativo-carousel cat="noticias"]</td>
	</tr>
	<tr>
		<td>per_page</td>
		<td>La cantidad de post que mostrara el carousel</td>
		<td>Ej: Para mostrar 10 post de la categoria noticias: [nativo-carousel cat="noticias" per_page="10"]</td>
	</tr>
</table>