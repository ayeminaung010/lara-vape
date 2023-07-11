<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $seo->title }}</title>
<link rel="icon" type="image/png" href="{{ asset('dbImg/seo/'.$seo->favicon) }}">
<meta name="description" content="{{ $seo->description }}">
<meta name="keywords" content="{{ $seo->keywords }}">
<meta name="author" content="{{ $seo->author }}">
<meta name="robots" content="{{ $seo->robots }}">
<meta property="og:title" content="{{ $seo->social_title }}">
<meta property="og:description" content="{{ $seo->social_description }}">
<meta property="og:image" content="{{ $seo->social_image }}">
<meta property="og:url" content="">
<meta property="og:type" content="">
<meta name="twitter:title" content="{{ $seo->social_title }}">
<meta name="twitter:description" content="{{ $seo->social_description }}">
<meta name="twitter:image" content="{{ $seo->social_image }}">
<meta name="twitter:card" content="">
