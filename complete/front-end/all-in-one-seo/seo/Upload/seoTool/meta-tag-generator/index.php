<?php
    require_once("../vendor/autoload.php");

    use PedroBorges\MetaTags\MetaTags;

    $tags = new MetaTags;

    // <title>My Awesome Site</title>
    $tags->title('My Awesome Site');

    // <meta name="description" content="My site description">
    $tags->meta('description', 'My site description');

    // <link rel="canonical" href="https://pedroborg.es">
    // <link rel="alternate" hreflang="en" href="https://en.pedroborg.es">
    $tags->link('canonical', 'https://pedroborg.es');
    $tags->link('alternate', [
        'hreflang' => 'en',
        'href' => 'https://en.pedroborg.es'
    ]);

    // <meta property="og:title" content="The Title">
    // <meta property="og:type" content="website">
    // <meta property="og:url" content="https://pedroborg.es">
    // <meta property="og:image" content="https://pedroborg.es/cover.jpg">
    $tags->og('title', 'The title');
    $tags->og('type', 'website');
    $tags->og('url', 'https://pedroborg.es');
    $tags->og('image', 'https://pedroborg.es/cover.jpg');

    // <meta name="twitter:card" content="summary">
    // <meta name="twitter:site" content="@pedroborg_es">
    $tags->twitter('card', 'summary');
    $tags->twitter('site', '@pedroborg_es');

    // <script type="application/ld+json">
    // {
    //     "@context": "http://schema.org",
    //     "@type": "Person",
    //     "name": "Pedro Borges"
    // }
    // </script>
    $tags->jsonld([
        '@context' => 'http://schema.org',
        '@type' => 'Person',
        'name' => 'Pedro Borges'
    ]);


    echo "<code> <pre>";
    echo $tags->render();
    echo "</pre></code>";
?>

<!-- <code><pre>
&lt;!DOCTYPE HTML&gt;

&lt;html&gt;

    &lt;head&gt;

        &lt;link rel="stylesheet" href="index.css"&gt;

        &lt;link href="style.css" rel="stylesheet"&gt;

     &lt;link href="grid.css" rel="stylesheet"&gt;

    &lt;/head&gt;

    &lt;body&gt;

    &lt;/body&gt;

&lt;/html&gt; -->
