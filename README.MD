<h1>SitemapGenerator on PHP</h1>
<p>Hello, tutorial for initializing and using the library to create a sitemap</p>

<h2>Initializing</h2>
<ul>
    <li>Open your terminal</li>
    <li>For necessary, install composer</li>
        <i>php composer install</i>
    <li>Install library <b>SitemapGenerator</b></li>
        <i>php composer require egvolkvolk/smg</i>
    <li>Later, library create needed files as <b>vendor</b>, <b>egvolkvolk</b>, e.t.c...</li>
</ul>

<h2>Using</h2>
<ul>
    <li>Create new php-file, for example <i>index.php</i></li>
    <li>Add require</li>
        <i>require 'vendor\egvolkvolk\smg\src\SitemapGenerator.php';</i>
    <li>Add site data
    <ul>
        <li><b>data</b> - list of site pages with parameters
        <ul>
            <li><b>loc</b> - page address</li>
            <li><b>lastmod</b> - modified date</li>
            <li><b>priortity</b> - parsing priority</li>
            <li><b>changefreq</b> - update frequency</li>
        </ul></li>
        <li><b>datatype</b> - file type for generation. Could be array</li>
        <li><b>directory</b> - path to the file to save</li>
    </ul></li> 
    <li>Add this code</li>

        $sitemapGenerator = new SitemapGenerator();
        foreach ($dataTypes as $dataType) {
            $sitemapGenerator->convertToDataType($data, $dataType, $directory);
        }
</ul>

<h3>My executable php-file</h3>

    <?php
    
    use src\SitemapGenerator;
    
    require 'vendor\egvolkvolk\smg\src\SitemapGenerator.php';

    $data = [
            [
                'loc' => 'https://pyrobyte.ru/',
                'lastmod' => '2024-05-05',
                'priority' => '0.9',
                'changefreq' => 'weekly',
            ],
            [
                'loc' => 'https://pyrobyte.ru/cases',
                'lastmod' => '2024-04-03',
                'priority' => '0.5',
                'changefreq' => 'monthly',
            ],
            [
                'loc' => 'https://pyrobyte.ru/career',
                'lastmod' => '2024-02-24',
                'priority' => '0.3',
                'changefreq' => 'yearly',
            ],
            [
                'loc' => 'https://pyrobyte.ru/blog',
                'lastmod' => '2024-05-07',
                'priority' => '0.7',
                'changefreq' => 'daily',
            ],
        ];
    
        $directory = './upload';
    
        $dataTypes = [
            'xml',
            'csv',
            'json',
        ];
    
        $sitemapGenerator = new SitemapGenerator();
    
        foreach ($dataTypes as $dataType) {
            $sitemapGenerator->convertToDataType($data, $dataType, $directory);
        }

<h3>Result of the library</h3>

<h4>CSV</h4>

    loc;lastmod;priority;changefreq
    https://pyrobyte.ru/;2024-05-05;0.9;weekly
    https://pyrobyte.ru/cases;2024-04-03;0.5;monthly
    https://pyrobyte.ru/career;2024-02-24;0.3;yearly
    https://pyrobyte.ru/blog;2024-05-07;0.7;daily

<h4>JSON</h4>

    [
        {
        "loc": "https://pyrobyte.ru/",
        "lastmod": "2024-05-05",
        "priority": "0.9",
        "changefreq": "weekly"
        },
        {
        "loc": "https://pyrobyte.ru/cases",
        "lastmod": "2024-04-03",
        "priority": "0.5",
        "changefreq": "monthly"
        },
        {
        "loc": "https://pyrobyte.ru/career",
        "lastmod": "2024-02-24",
        "priority": "0.3",
        "changefreq": "yearly"
        },
        {
        "loc": "https://pyrobyte.ru/blog",
        "lastmod": "2024-05-07",
        "priority": "0.7",
        "changefreq": "daily"
        }
    ]

<h4>XML</h4>

    <?xml version="1.0" encoding="utf-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
            <loc>https://pyrobyte.ru/</loc>
            <lastmod>2024-05-05</lastmod>
            <priority>0.9</priority>
            <changefreq>weekly</changefreq>
        </url>
        <url>
            <loc>https://pyrobyte.ru/cases</loc>
            <lastmod>2024-04-03</lastmod>
            <priority>0.5</priority>
            <changefreq>monthly</changefreq>
        </url>
        <url>
            <loc>https://pyrobyte.ru/career</loc>
            <lastmod>2024-02-24</lastmod>
            <priority>0.3</priority>
            <changefreq>yearly</changefreq>
        </url>
        <url>
            <loc>https://pyrobyte.ru/blog</loc>
            <lastmod>2024-05-07</lastmod>
            <priority>0.7</priority>
            <changefreq>daily</changefreq>
        </url>
    </urlset>

