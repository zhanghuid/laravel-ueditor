<?php

namespace Huid\LaravelUeditor;

use Encore\Admin\Extension;
use Encore\Admin\Form\Field;
use Illuminate\Support\Str;

class Ueditor extends Field
{
    protected $view = 'laravel-ueditor::index';

    public static $js = [
        'vendor/laravel-admin-ext/laravel-ueditor/neditor.config.js',
        'vendor/laravel-admin-ext/laravel-ueditor/neditor.all.js',
        'vendor/laravel-admin-ext/laravel-ueditor/neditor.parse.js',
        'vendor/laravel-admin-ext/laravel-ueditor/neditor.service.js',
        'vendor/laravel-admin-ext/laravel-ueditor/i18n/zh-cn/zh-cn.js',
        'vendor/laravel-admin-ext/laravel-ueditor/third-party/browser-md5-file.min.js',

    ];

    public static $css = [
    ];

    public function render()
    {

        $jsId = Str::studly(Str::slug($this->id));

        $config = Extension::config('config', []);

        $config = json_encode(array_merge($config, $this->options));
        $laravel_ueditor_route = config('ueditor.route.name');

        $token = csrf_token();

        $this->script = <<<EOT
window.NEDITOR_UPLOAD = '{$laravel_ueditor_route}';
UE.delEditor("{$this->id}");
var ue_{$jsId} = UE.getEditor('{$this->id}', {$config});
ue_{$jsId}.ready(function() {
    ue_{$jsId}.execCommand('serverparam', '_token', '$token');
});
uParse("#{$this->id}", {rootPath: window.UEDITOR_CONFIG.UEDITOR_HOME_URL});

EOT;
        return parent::render();
    }
}
