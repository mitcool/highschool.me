<?php echo '<?xml version="1.0" encoding="UTF-8"?> '?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>Graduate.me</title>
    <link>https://graduate.me/en</link>
	<atom:link href="https://graduate.me/en/rss" rel="self" type="application/rss+xml"></atom:link>
    <description>You want to study from home and alongside your job? Discover our future-proof online learning programs. ✔ Flexible ✔ Practice-oriented ✔ Accredited. Click now!</description>
    <language>de</language>
    @foreach ($news as $n )
        <item>
            <title>{{ $n->sections[0]->translated->content }}</title>
            <link>{{ route('single-article-en',$n->all_translations[0]->slug) }}</link>
	         <guid>{{ route('single-article-en',$n->all_translations[0]->slug) }}</guid>
            <description>{{ strip_tags(str_replace('&nbsp;', ' ',$n->sections[1]->translated->content)) }}</description>
            <pubDate>{{ date('r',strtotime($n->created_at)) }}</pubDate>
      </item>
    @endforeach
  </channel>
</rss>