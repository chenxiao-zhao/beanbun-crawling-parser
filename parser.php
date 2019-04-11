<?php
/**
 * Created by PhpStorm.
 * User: achang
 * Date: 19-4-11
 * Time: 下午5:16
 */
use Beanbun\Beanbun;
use Beanbun\Middleware\Parser;

require_once(__DIR__ . '/vendor/autoload.php');

$beanbun = new Beanbun;
$beanbun->name = '950d';
$beanbun->count = 5;
$beanbun->seed = 'http://www.950d.com/';
$beanbun->max = 100;
$beanbun->urlRegex = [
    '/http:\/\/www.950d.com\/list-1.html\?page=(\d*)/'
];

$beanbun->middleware(new Parser());
$beanbun->fields = [
    [
        'name' => 'title',
        'selector' => ['title', 'text']
    ],
    [
        'name' => 'template',
        'children' => [
            [
                'name' => 'title',
                'selector' => ['.js-course-list li h5', 'text'],
                'repeated' => true,
            ],
            [
                'name' => 'url',
                'selector' => ['.js-course-list li .course-list-img a', 'href'],
                'repeated' => true,
            ],
            [
                'name' => 'image',
                'selector' => ['.js-course-list li .course-list-img img', 'src'],
                'repeated' => true,
            ]
        ]
    ]
];

$beanbun->afterDownloadPage = function($beanbun) {
    print_r($beanbun->data);
};
$beanbun->start();