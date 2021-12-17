<?php

require __DIR__ . '/vendor/autoload.php';

use Zttp\Zttp;
use function Termwind\{render};

$response = Zttp::get('https://reddit.com/r/laravel.json')->json();

foreach($response['data']['children'] as $thread) {
    $title = $thread['data']['title'];
    $url = $thread['data']['url'];
    $author = $thread['data']['author'];
    $upvotes = $thread['data']['ups'];

    // echo $title . PHP_EOL;
    // echo "Author: {$author} | Upvotes: {$upvotes}" . PHP_EOL;
    // echo "" . PHP_EOL;
    $renderHtml = "<div class='mb-4'>
        <a class='font-bold underline mb-2' href='{$url}'>{$title}</a><br>
        <span class='bg-blue-700 text-blue-200 p-2'>{$author}</span>
        <span class='bg-green-700 text-green-200 p-2 ml-2'>{$upvotes}</span>
    </div>";

    render($renderHtml);
}