#Make Model
php artisan make:model Project -mc

#Make Notifications
php artisan make:notification Followed

#Run all seeders
php artisan db:seed
#Run one seeder
php artisan db:seed --class=UserSeeder

#Clean db and seed
php artisan migrate:fresh --seed

#TINKER

#save queries
DB::enableQueryLog();
#show queries
DB::getQueryLog();
