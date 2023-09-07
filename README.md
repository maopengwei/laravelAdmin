# 环境


# 安装过程

- 安装laravel `composer create-project laravel/laravel example-app`
- 改变数据库配置
- 执行数据库迁移 `php artisan migrate`
- 安装laravel-admin `composer require encore/laravel-admin`
- 执行安装 `php artisan admin:install`
- 添加控制器 `php artisan admin:make UserController --model=App\\User`
- 添加路由 `$router->resource('demo/users', UserController::class);`
- 登录, 访问 `http://domain/admin/auth/login` , 账号密码 `admin admin`

# to-do
### 安装lavel-admin ✅
### 添加用户注册登录，用户列表
### 添加其它菜单， `/admin/auth/menu`




