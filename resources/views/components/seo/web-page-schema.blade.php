@props(['url', 'name', 'description', 'breadcrumbs'])

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "@id": @json($url . '#webpage'),
    "url": @json($url),
    "name": @json($name),
    "description": @json($description),
    "isPartOf": {
        "@type": "WebSite",
        "@id": @json(route('welcome') . '#website'),
        "url": @json(route('welcome')),
        "name": "ONSITES Graduate School"
    },
    "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
            @foreach ($breadcrumbs as $position => $breadcrumb)
            {
                "@type": "ListItem",
                "position": {{ $position + 1 }},
                "name": @json($breadcrumb['name']),
                "item": @json($breadcrumb['url'])
            }@if (! $loop->last),@endif
            @endforeach
        ]
    }
}
</script>
