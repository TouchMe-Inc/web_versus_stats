# About web_versus_stats
PHP script demonstrating statistics [versus_stats](https://github.com/TouchMe-Inc/l4d2_versus_stats).

## Install
1. Place the contents of the `src` directory in the root of your site.
2. Run `composer install` and `npm install`.
3. Set up environment variables in `.env` file.
4. Execute command `php artisan migrate`.
5. Execute command `php artisan storage:link`.
6. Execute command `npm run build`.
7. Please make sure your web server directs all requests to your application's `public/index.php` file.
8. Optimize the application following the [documentation](https://laravel.com/docs/10.x/deployment).

## Preview
### Light mode
Main page:
![image](https://github.com/TouchMe-Inc/web_versus_stats/assets/89782512/ae3030f7-8313-464a-95e4-c0e444a0da9b)

Player page:
![image](https://github.com/TouchMe-Inc/web_versus_stats/assets/89782512/6fedfa24-1f95-443d-9891-0c4705a5ccd3)

### Dark mode
Main page:
![image](https://github.com/TouchMe-Inc/web_versus_stats/assets/89782512/fa9aa441-d3e4-494b-b318-1c10ac2682ae)

Player page:
![image](https://github.com/TouchMe-Inc/web_versus_stats/assets/89782512/6bfa770e-893c-4088-b0a3-902be6b8cd4e)
