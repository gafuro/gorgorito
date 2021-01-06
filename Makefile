#Make Model
php artisan make:model Project -mc

#Make Notifications
php artisan make:notification Followed

#Run all seeders
php artisan db:seed

#TINKER

#save queries
DB::enableQueryLog();
#show queries
DB::getQueryLog();
