# Laravel on SAE

Laravel on SAE 是修改过彻底解决了`putenv`和本地写问题的Laravel，因而它可以在SAE上完美地运行。

一次性彻底解决问题并且适应各个版本的Laravel。


## 解决`putenv`被禁用

SAE禁用了`putenv`函数（其他很多开发平台也同样会禁用`putenv`），Laravel中使用的phpdotenv模块不能正常使用。

Laravel on SAE 使用[sae-phpdotenv](https://github.com/litp/sae-phpdotenv)替代phpdotenv，然后修改env()函数使其从全局变量`$_ENV`中获取变量，从而使phpdotenv可以在禁用`putenv`的平台中正常使用。

## 本地写被禁止

SAE只允许通过git或者svn上传代码，并且代码在运行过程中对文件系统只有读取权限没有写入权限。

在Laravel 5中需要进行本地写操作的地方有：
> 1. 模板编译
> 2. 缓存类
> 3. 日志处理
> 4. Session类
> 5. 服务提供者缓存
> 
> 参考 [夏天的风博客](http://www.xtwind.com/laravel-5-1-on-sae.html)

解决的办法是使用SAE提供的Storage的文件Wrapper，把需要本地写的内容存到SAE Storage中。

具体操作为：
1. 在SAE Storage 中新建一个bucket, 名字为 `laravel`
2. 完成。

详细原理和细节请参考 [这里]()。

因为在Laravel中这些相关的写操作的目录都被硬编码在Laravel Framwork中，所以不能通过修改配置而只能通过修改laravel framework的源码来实现。
[Sae-laravel-framework](https://github.com/litp/sae-laravel-framework)就是我fork自laravel官方framework并在相应地方做了修改的版本，使用时只需用它替换`composer.json`中的`laravel/laravel`即可。

## 感谢

欢迎提供各种意见及建议。
