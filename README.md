# 环境
php 7.2.34
nginx 1.25.0
mysql 8.0.33
laravel 7.29
laravel-admin 1.7

# 安装过程

- 安装laravel `composer create-project laravel/laravel example-app`
- 改变数据库配置
- 安装laravel-admin `composer require encore/laravel-admin`
- 执行安装 `php artisan admin:install`
- 登录, 访问 `http://domain/admin/auth/login` , 账号密码 `admin admin`

- 创建user控制器和路由,以及菜单。
`php artisan admin:make UserController --model=App\\User`  
`app/Admin/routes.php里添加 $router->resource('users', UserController::class);`
`文件 /admin/auth/menu 添加用户菜单 users   ` 

# to-do
### 安装lavel-admin ✅
### 管理员登录，查看管理员列表 ✅
- view目录：/vendor/encore/laravel-admin/resources/views/
### 添加其它菜单， `/admin/auth/menu` 🚗




