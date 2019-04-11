# beanbun-crawling-parser

##简介

学习使用beanbun，通过一个简单的crawling和parser了解爬虫网页概念和使用方法

## 前提环境保证

- 需安装xml保证php有dom来parser爬下来的网页

`php -v`

`apt-cache search php-xml`

`apt-get install php-xml` or `apt-get install php7.2-xml`

## 此爬虫框架可以有两项主要功能

### 1、将爬到的网页、图片等下载指定目录

使用方法

在工程根目录下

```sh
$ php queue.php start
$ php start.php start
$ php start.php stop
$ php queue.php stop
$ php start.php clean
```

### 2、parser分析爬到的网页，根据field过滤条件过滤出网页title、url、网页中的image，以指定数组格式返回；

使用方法

在工程根目录下

```
$ php parser.php
```