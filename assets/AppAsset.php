<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 *
 * @author Muhamad Alfan <muhamad.alfan01@gmail.com>
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        "swagger/css/index.css",
        "swagger/css/standalone.css",
        "swagger/css/api-explorer.css",
        "swagger/css/api2-explorer.css",
        "swagger/css/core.min.css",
        "swagger/css/components.min.css",
        "swagger/css/screen.css",
        "swagger/plugins/codemirror/lib/codemirror.css",
        "swagger/plugins/codemirror/addon/lint/lint.css",
        "swagger/plugins/codemirror/theme/eclipse.css"
    ];

    public $js = [
        "swagger/lib/jquery-1.8.0.min.js",
        "swagger/lib/jquery.slideto.min.js",
        "swagger/lib/jquery.wiggle.min.js",
        "swagger/lib/jquery.ba-bbq.min.js",
        "swagger/lib/handlebars-2.0.0.js",
        "swagger/lib/underscore-min.js",
        "swagger/lib/backbone-min.js",
        "swagger/swagger-ui.min.js",
        "swagger/lib/jsoneditor.js",
        "swagger/lib/highlight.7.3.pack.js",
        "swagger/lib/marked.js",
        "swagger/lib/swagger-oauth.js",
        "swagger/lib/bootstrap.min.js",
        "swagger/plugins/codemirror/lib/codemirror.js",
        "swagger/plugins/codemirror/mode/javascript/javascript.js",
        "swagger/plugins/codemirror/addon/lint/lint.js",
        "swagger/plugins/codemirror/addon/lint/jsonlint.js",
        "swagger/plugins/codemirror/addon/lint/json-lint.js",
        "swagger/plugins/codemirror/addon/display/autorefresh.js",
        "swagger/plugins/codemirror/addon/edit/closebrackets.js",
        "swagger/plugins/codemirror/addon/edit/matchbrackets.js",
        "swagger/plugins/codemirror/addon/edit/trailingspace.js",
        "swagger/plugins/codemirror/addon/edit/continuelist.js"
    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];
}
