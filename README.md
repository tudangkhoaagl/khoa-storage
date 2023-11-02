# 1. Implement package to your project:
## 1.1 Add value in root composer.json

```bash
{
    ...,
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:tudangkhoaagl/khoa-storage.git"
        }
    ],
    ...
}
```

## 1.2 Run command to install package

```bash
composer require khoa/khoa-storage:dev-main
```

## 1.3 Add provider in configs/app.php

```bash
'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */
        KhoaStorageServiceProvider::class, //Add this

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),
```

# 2. Implement the package
## 1.1 Upload file

```bash
\StoragePackage::initStorage(?string $disk //optional. Example: 'local')
    ->uploadFile(
        string $filePath, //required
        UploadedFile $uploadedFile // required
    );
```

## 1.2 Show file

```bash
\StoragePackage::initStorage(?string $disk //optional. Example: 'local')
    ->getFile(string $fileUrl // required);
```

## 1.3 Delete file

```bash
\StoragePackage::initStorage(?string $disk //optional. Example: 'local')
    ->deleteFile(string $fileUrl // required);
```

## 1.4 Download file

```bash
\StoragePackage::initStorage(?string $disk //optional. Example: 'local')
    ->downloadFile(
        string $fileUrl, //required. Example: 'test/image.png'
        string $fileName, //required. Example: 'test.png'
        array $headers //required. Example: ['Content-Type' => 'image/png',]
    );
```

## 1.4 Get URL of image

```bash
get_image_url(string $fileUrl);
```
