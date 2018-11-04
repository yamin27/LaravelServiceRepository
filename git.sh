git init
git add -A
git commit -m 'Initial commit'
php artisan key:generate
php artisan config:clear  
php artisan config:cache 