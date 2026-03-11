<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;

/**
 * Automatically converts uploaded images (jpeg, png, gif) to WebP format.
 *
 * Usage: Add the trait to any model and define a $webpImageFields property
 * listing the image columns that should be auto-converted.
 *
 *   use ConvertsImagesToWebp;
 *   protected array $webpImageFields = ['main_image'];
 */
trait ConvertsImagesToWebp
{
    public static function bootConvertsImagesToWebp(): void
    {
        static::saving(function ($model) {
            $fields = $model->webpImageFields ?? ['main_image'];
            $disk = Storage::disk('public');

            foreach ($fields as $field) {
                if (! $model->isDirty($field) || ! $model->{$field}) {
                    continue;
                }

                $path = $model->{$field};

                // Already webp — skip
                if (str_ends_with(strtolower($path), '.webp')) {
                    continue;
                }

                $fullPath = $disk->path($path);

                if (! file_exists($fullPath)) {
                    continue;
                }

                $image = self::createImageResource($fullPath, $path);

                if (! $image) {
                    continue;
                }

                // Preserve alpha for PNG
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);

                $webpPath = preg_replace('/\.(jpe?g|png|gif|bmp)$/i', '.webp', $path);
                $webpFullPath = $disk->path($webpPath);

                // Ensure directory exists
                $dir = dirname($webpFullPath);
                if (! is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }

                imagewebp($image, $webpFullPath, 85);
                imagedestroy($image);

                // Delete original non-webp file
                if ($disk->exists($path)) {
                    $disk->delete($path);
                }

                $model->{$field} = $webpPath;
            }
        });
    }

    private static function createImageResource(string $fullPath, string $path): \GdImage|false|null
    {
        $lower = strtolower($path);

        return match (true) {
            str_ends_with($lower, '.jpg'),
            str_ends_with($lower, '.jpeg') => @imagecreatefromjpeg($fullPath),
            str_ends_with($lower, '.png')  => @imagecreatefrompng($fullPath),
            str_ends_with($lower, '.gif')  => @imagecreatefromgif($fullPath),
            str_ends_with($lower, '.bmp')  => @imagecreatefrombmp($fullPath),
            default => null,
        };
    }
}
