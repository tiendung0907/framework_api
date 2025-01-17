<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $repositoriesPath = app_path('Repositories/Eloquent');

        // Duyệt qua tất cả các file trong thư mục Interfaces
        foreach (File::allFiles($repositoriesPath) as $file) {
            // Lấy namespace đầy đủ của Interface
            $interface = 'App\\Repositories\\Interfaces\\' . $file->getFilenameWithoutExtension() . "Interface";

            // Lấy namespace đầy đủ của Repository
            $repository = 'App\\Repositories\\Eloquent\\' . $file->getFilenameWithoutExtension();

            // Kiểm tra nếu Repository tồn tại và implement Interface
            if (class_exists($repository) && is_subclass_of($repository, $interface)) {
                // Bind Interface với Repository
                $this->app->singleton($interface, $repository);
            } else {
                // Ghi log nếu Repository không hợp lệ
                logger()->warning("Repository {$repository} không tồn tại hoặc không implement {$interface}.");
            }
        }
    }
}
