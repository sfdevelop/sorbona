<?php

namespace Database\Seeders\Traits;

use App\Faker\FakerImageProvider;
use Illuminate\Database\Eloquent\Collection;
use Storage;

trait SeedUploadImageTrait
{
    protected FakerImageProvider $image;

    public function __construct(FakerImageProvider $image)
    {
        $this->image = $image;
    }

    public function uploadImageToSeed(array|Collection $items): void
    {
        foreach ($items as $item) {
            $imageFile = storage_path($this->image->loremFlickr(self::$collectionName, self::$with, self::$height));
            $item->addMedia($imageFile)->toMediaCollection(self::$collectionName);
        }
    }

    public function uploadOneImageToSeed(object $item): void
    {
        $imageFile = storage_path($this->image->loremFlickr(self::$collectionName, self::$with, self::$height));
        $item->addMedia($imageFile)->toMediaCollection(self::$collectionName);
    }

    public function uploadOneImageToSeedOnline($items): void
    {
        foreach ($items as $item) {
            $sourcePath = public_path('onlineImg/'.$item->img);
            $destinationPath = 'online3/'.$item->img;

            if (file_exists($sourcePath)) {
                Storage::disk('public')->put(
                    $destinationPath,
                    file_get_contents("$sourcePath")
                );
                $item->addMediaFromDisk($destinationPath, 'public')->toMediaCollection(self::$collectionName);
            }
        }
    }

    public function uploadOneImageToSeedOnlineWithoutImg($items, string $nameImg): void
    {
        foreach ($items as $key => $item) {
            $key++;

            $extensions = ['png', 'svg'];

            foreach ($extensions as $extension) {
                $sourcePath = public_path("onlineImg/{$nameImg}-{$key}.{$extension}");
                $destinationPath = "online3/{$nameImg}-{$key}.{$extension}";

                if (file_exists($sourcePath)) {
                    $this->addImage($destinationPath, $sourcePath, $item);
                    break;
                }
            }
        }
    }

    private function addImage(string $destinationPath, string $sourcePath, mixed $item): void
    {
        Storage::disk('public')->put(
            $destinationPath,
            file_get_contents("$sourcePath")
        );
        $item->addMediaFromDisk($destinationPath, 'public')->toMediaCollection(self::$collectionName);
    }
}
