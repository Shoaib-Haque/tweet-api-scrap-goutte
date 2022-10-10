<h1>Features</h1>
<ol type="1">
    <li>Tweet api using guzzle/client.<br>
    <a href="https://stackoverflow.com/questions/48279382/curl-request-in-laravel">curl-request-in-laravel</a></li>
    <li>Scraping data using goutte.<br>
    <a href="https://medium.com/@digitaldaswani/web-scraping-with-laravel-ab5f1c5f00a5">Web Scraping with Laravel/goutte</a></li>
</ol>

<h1>scratch</h1>
<ol type="1">
    <li><strong>install laravel project</strong><br> 
        composer create-project laravel/laravel tweet-api-scrap-goutte</li>
    <li><strong>install guzzle</strong><br>composer require guzzlehttp/guzzle</li>
    <li><strong>install laravel-goutte</strong><br>composer require weidner/goutte</li>
    <li><strong>register goutte in config/app.php and provide an alias for its Facade</strong><br>
        <b>in providers</b><br>
        /*<br>
         * Package Service Providers...<br>
         */<br>
        Weidner\Goutte\GoutteServiceProvider::class,<br>
        <b>in aliases</b><br>
        'Goutte' => Weidner\Goutte\GoutteFacade::class,<br>
    </li>
    <li><strong>Write route and controller/methods</strong></li>
    <li>php artisan serve</li>
</ol>

<h1>clone</h1>
<ol type="1">
    <li><strong>clone the project from git</strong><br> 
        git clone https://github.com/Shoaib2018/tweet-api-scrap-goutte.git</li>
    <li><strong>change directory</strong><br> cd tweet-api-scrap-goutte</li>
    <li><strong>install packages</strong><br> composer install</li>
    <li><strong>make a copy of .env.example and rename it .env</strong><br> copy .env.example .env</li>
    <li><strong>generate application encryption key</strong><br> php artisan key:generate</li>
    <li>php artisan cache:clear<br> php artisan config:clear</li>
    <li>php artisan serve</li>
</ol>
