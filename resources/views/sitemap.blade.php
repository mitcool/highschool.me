

<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
	
	@foreach($routes as $route)
	<url>
		<loc>{{ route($route->getName()) }}</loc>
	</url>
	@endforeach

	
</urlset>