<?php
/**
 * Created by PhpStorm.
 * User: achang
 * Date: 19-4-11
 * Time: 上午10:03
 */
require_once(__DIR__ . '/vendor/autoload.php');
// 启动队列
\Beanbun\Queue\MemoryQueue::server();