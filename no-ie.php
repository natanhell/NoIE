<?php
// Block access from IE
class NoIE {
    private $useragent;

    public function __construct() {
        $this->useragent = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
    }

    public function is() {
        $regexp = implode('|', [
            'MSIE',
            'Trident.*rv\:11\.'
        ]);
        $regexp = "/{$regexp}/i";

        return preg_match($regexp, $this->useragent) > 0;
    }

    public function php_transparent_black() {
        $img = imagecreate(1, 1);
        imagecolorallocatealpha($img, 0, 0, 0, 100);

        header('Content-Type: image/png');
        imagepng($img);
        imagedestroy($img);
    }

    public function html($l = 'en') {
        // If $l is not set,
        // it will be "en" (english)
        $strings = json_decode(file_get_contents(realpath(__DIR__ . '/no-ie.json')));

        if (!isset($strings->$l)) {
            $strings = $strings->en;
        } else {
            $strings = $strings->$l;
        }

        $bg = "{$_SERVER['PHP_SELF']}?phpassets=imagepng-1";
        return <<<EOT
<!doctype html><html><head><title>{$strings->title}</title><meta charset="utf-8" /><script>(function(){var uri=document.location.href,msurl="https://go.microsoft.com/fwlink/?linkid=2135547";document.location.href="microsoft-edge:"+uri,setTimeout(function(){document.location.href=msurl},1)})();</script><style>#ie{padding:0;margin:0;font-size:0;background:url('$bg')}#ie .container{position:relative;display:block;padding:95px 10px 80px}#ie .window{width:480px;padding:30px 0 80px;background:#fff;display:block;margin:0 auto}#ie .window .no-ie{margin:0 auto 20px;display:block;width:75px}#ie .window h1{font-size:20px;font-weight:700}#ie .window .text{padding:0 15px;text-align:center;font-family:Arial,sans-serif;color:#000}#ie .window p{font-size:13.5px}#ie .window a{color:red;text-decoration:underline}</style></head><body id="ie"><div class="container"><div class="window">
<div style="width:100%;height:20px;"></div><img src="/no-ie/no-ie.png" class="no-ie" alt="NoIE" /><div style="width:100%;height:7px;"></div><h1 class="text">{$strings->title}</h1><p class="text">{$strings->description}</p><p class="text"><a href="https://github.com/natanhell/NoIE">NoIE</a></p><div style="width:100%;height:20px;"></div></div></div></body></html>
EOT;
    }
}

$noie = new NoIE();
if ($noie->is()) {
    // Is IE, Block Access
    if (isset($_GET['phpassets'])) {
        $assets = $_GET['phpassets'];
        switch ($assets) {
            case "imagepng-1":
                $noie->php_transparent_black();
            break;
        }
    } else {
        echo $noie->html((isset($_GET['lang']) ? $_GET['lang'] : null));
    }

    // Die anyway
    exit;
}
