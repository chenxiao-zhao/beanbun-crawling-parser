<?php
use Beanbun\Beanbun;
use Beanbun\Lib\Helper;

require_once(__DIR__ . '/vendor/autoload.php');

$beanbun = new Beanbun;
$beanbun->name = 'deepnorth';
$beanbun->count = 5;
$beanbun->seed = 'https://www.deepnorth.cn/';
$beanbun->max = 30;
$beanbun->logFile = __DIR__ . '/deepnorth_access.log';
/*$beanbun->urlFilter = [
    '/http:\/\/www.qiushibaike.com\/8hr\/page\/(\d*)\?s=(\d*)/'
];*/
// 设置队列
$beanbun->setQueue('memory', [
    'host' => '127.0.0.1',
    'port' => '2207'
]);

$beanbun->afterDownloadPage = function($beanbun) {
    $pathname = __DIR__ . '/deepnorth/';
    if (!file_exists($pathname)) {
        mkdir($pathname, 0777, true);
    }
    if(!empty(pathinfo( parse_url($beanbun->url)['path'] )['extension'])){
        file_put_contents( $pathname.md5($beanbun->url).'.'.pathinfo( parse_url($beanbun->url)['path'] )['extension'] , $beanbun->page);
    }else{
        file_put_contents( $pathname.md5($beanbun->url).".html" , $beanbun->page);
    }
};
$beanbun->start();