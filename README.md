### 安装
`composer require "huid/laravel-ueditor:~2.0" -vvv`

### 配置
1. 发布配置文件与资源
`php artisan vendor:publish --provider='Huid\\LaravelUeditor\\LaravelUeditorServiceProvider'`

### 使用
1. `$form->ueditor('content', '内容');`
2. 默认路由：/admin/ueditor/serve
3. 监听Uploaded事件可进行入库操作
4. 各种上传动作，可查看`editoir.php` 跟 `LaravelUeditorController::serve()`

### 大感谢
---
- [laravel-admin](https://github.com/z-song/laravel-admin)
- [overtrue/laravel-ueditor](https://github.com/overtrue/laravel-ueditor)
- [Laravel-UEditor](https://github.com/codingyu/laravel-ueditor)
- [neditor](https://github.com/notadd/neditor)

### 参考
[ueditor上传视频，显示不出问题](https://blog.csdn.net/weixin_43239106/article/details/82830615)
