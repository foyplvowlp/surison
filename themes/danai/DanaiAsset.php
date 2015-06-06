<?php

namespace app\themes\danai;

use yii\web\AssetBundle;

class DanaiAsset extends AssetBundle {

    public $sourcePath = '@app/themes/danai/assets';
    public $css = [
        'css/bootstrap.css',
        'css/style.css'
    ];
    public $js = [
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',    // Plugin ตัวเสริม bootstrap
    ];

}
