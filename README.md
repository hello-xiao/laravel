
##这是一个根据网上学习的laravel8.0学习练习项目

##使用工具phpstorm(编辑工具)+phpstudy(环境)+Navicat Premium 15（数据库工具）

*创建资源控制器可选择指定模型`--model=User` `artisan make:controller --resource --model=User UserController`

*laravel编辑显示用户列表页面出现问题——（数据库分页links布局混乱）
    *解决方法：使用 vendor:
        *1、publish 命令导出视图文件到resources/views/vendor 目录(index.blade.php是调用了links的视图文件)
        `artisan vendor:publish --tag index.blade.php`
        *2、找到了在app\Providers\AppServiceProvider.php中
        加入`use Illuminate\Pagination\Paginator;`
        在public function boot(){}中
        加入`Paginator::defaultView('vendor.pagination.bootstrap-4');`
        

*通过`auth()`获取当前登录的用户                           href="{{route('logout')}}" class="btn btn-info my-2 my-sm-0 mr-2">退出

        