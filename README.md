# Image Resizer

Change the maximum image size to get storage-efficient image files. Crop the image into a square to make it easier to create a profile photo.

## Instalation

```bash
composer require trisnawan/image-resizer
```

## Initialization

```php
use Trisnawan\ImageResizer\ImageResizer;
```

```php
// Image from user upload
$filePath = $_FILES["image"]["tmp_name"];

// Image from local storage
$filePath = "path/to/image_file.jpg";

$resizer = new ImageResizer($filePath);
```

## Simple reduce image size

Use the maximum pixels and the image will be automatically reduced to the maximum size.

```php
// Max Width in pixels
$maxWidth = 640;
$resizer->maxWidth($maxWidth);
```

## Simple crop image

```php
// Crop the image into a square from the center
$resizer->cropCenter();

// Crop the image into a square from the top
$resizer->cropTop();
```

## Save to local storage

```php
$saveFilePath = "path/to/image_new.jpg";
$resizer->writeImage($saveFilePath);
```

## Show Blob image

```php
// Show in blob
$resizer->getBlob();
```
