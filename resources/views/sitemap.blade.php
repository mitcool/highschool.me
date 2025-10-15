

<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
	
	@foreach($static_routes as $route)
	<url>
		<loc>{{ route($route->slug.'-'.app()->currentLocale()) }}</loc>
	</url>
	@endforeach

	@foreach($studies as $study)
		<url>
			<loc>{{ route('studies-'.app()->currentLocale(),$study->translated->slug) }}</loc>
		</url>
		@foreach($study->programs as $program)
		<url>
			<loc>{{ route('programs-'.app()->currentLocale(),[$study->translated->slug,$program->translated->slug]) }}</loc>
		</url>
		@endforeach
	@endforeach

	@foreach($news as $n)
		<url>
			<loc>{{ route('single-article-'.app()->currentLocale(),$n->slug) }}</loc>
		</url>
	@endforeach

	@foreach($tutorials as $tutorial)
		<url>
			<loc>{{ route('single-help-desk-'.app()->currentLocale(),$tutorial->translated->slug )}}</loc>
		</url>
	@endforeach

	@foreach($faq_categories as $category)
		<url>
			<loc>{{ route('single-faq-category-'.app()->currentLocale(),$category->translated->slug )}}</loc>
		</url>
	@endforeach

	@foreach($conferences as $conference)
		<url>
			<loc>{{ route('single-conference-'.app()->currentLocale(),$category->translated->slug )}}</loc>
		</url>
	@endforeach

	@foreach($categoriesNews as $c)
		<url>
			<loc>{{ route('single-article-'.app()->currentLocale(),$c->translated->slug )}}</loc>
		</url>
	@endforeach
</urlset>