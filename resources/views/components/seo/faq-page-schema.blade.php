@props(['url', 'faqs'])

@php
    // Google only supports a limited set of HTML tags inside FAQ answers
    $allowedTags = '<h1><h2><h3><h4><h5><h6><br><ol><ul><li><a><p><div><b><strong><i><em>';
@endphp

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "@id": @json($url . '#faq'),
    "url": @json($url),
    "isPartOf": {
        "@id": @json($url . '#webpage')
    },
    "mainEntity": [
        @foreach ($faqs as $faq)
        {
            "@type": "Question",
            "name": @json(trim(strip_tags($faq->question))),
            "acceptedAnswer": {
                "@type": "Answer",
                "text": @json(trim(strip_tags($faq->answer, $allowedTags)))
            }
        }@if (! $loop->last),@endif
        @endforeach
    ]
}
</script>
