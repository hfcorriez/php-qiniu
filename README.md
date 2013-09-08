# php-qiniu

[七牛云存储](http://qiniu.com)非官方SDK，采用[PSR规范](https://github.com/hfcorriez/fig-standards)，支持[Composer](http://getcomposer.org)安装

`开发中...`

# 安装

添加 `"qiniu/qiniu": "*"` 到 [`composer.json`](http://getcomposer.org).

```
composer.phar install
```

# 使用

## 基本用法

```php
require dirname(__DIR__) . '/vendor/autoload.php';

$client = \Qiniu\Qiniu::create(array(
    'access_key' => '<!>',
    'secret_key' => '<!>',
    'bucket'     => '<!>'
));

// 查看文件状态
$res = $client->stat('index.html');

print_r($res);
```

输出

```
Qiniu\Result Object
(
    [error] =>
    [data] => Array
            (
                [fsize] => 4276
                [hash] => FpLJ7yTujtJ85yU6QLA79ZaR3kKg
                [mimeType] => text/html
                [putTime] => 13707100228731119
            )
    [debug] => Array
            (
                [log] => BDT;BDT;LBD
                [id] => zxwAAMj4OP6_7yET
            )
)
```

推荐用法

```php
if ($res->ok()) {
    // 成功上传或者操作

    // 获取返回的数据
    $data = $res->data; // Or $res->toArray()

    //做一些事情
} else {
    // 失败，获取失败信息
    $res->error;

    // 七牛的Debug头信息
    $res->debug;
}
```

## 上传文件

```php
// 上传文件
$res = $client->uploadFile('/home/hfcorriez/Code/index.html', 'index.html');

// 上传字符串
$res = $client->upload('I am Qiniu SDK', 'readme.txt');

print_r($res);
```

## 文件操作

```php
// 查看文件状态
$res = $client->stat('index.html');

// 复制文件
$res = $client->copy('index.html', 'index.html.new');

// 移动文件
$res = $client->move('index.html.new', 'index1.html');

// 删除文件
$res = $client->delete('index1.html');

print_r($res);
```

## 图片查看

> 进行中...

## 图片生成

> 进行中...

## 断点续传

> 进行中...

# License

(The MIT License)

Copyright (c) 2012 hfcorriez &lt;hfcorriez@gmail.com&gt;

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.