<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['name' => 'TechNova',      'website' => 'https://technova.com'],
            ['name' => 'UrbanStyle',     'website' => 'https://urbanstyle.com'],
            ['name' => 'GreenLeaf',      'website' => 'https://greenleaf.com'],
            ['name' => 'PeakForce',      'website' => 'https://peakforce.com'],
            ['name' => 'PageTurner',     'website' => 'https://pageturner.com'],
            ['name' => 'FunZone',        'website' => 'https://funzone.com'],
            ['name' => 'GlowUp',         'website' => 'https://glowup.com'],
            ['name' => 'DriveMax',       'website' => 'https://drivemax.com'],
            ['name' => 'VitaLife',       'website' => 'https://vitalife.com'],
            ['name' => 'TastyBite',      'website' => 'https://tastybite.com'],
        ];

        foreach ($brands as $index => $data) {
            $brand = Brand::create([
                'name'    => $data['name'],
                'slug'    => Str::slug($data['name']),
                'website' => $data['website'],
                'status'  => true,
            ]);

            $imageContent = file_get_contents("https://picsum.photos/seed/brand{$index}/200/200");

            if ($imageContent !== false) {
                $fileName = 'brand_' . ($index + 1) . '.jpg';
                $filePath = 'brands/' . $fileName;
                $fullPath = storage_path('app/public/' . $filePath);

                if (!is_dir(dirname($fullPath))) {
                    mkdir(dirname($fullPath), 0755, true);
                }

                file_put_contents($fullPath, $imageContent);

                $brand->media()->create([
                    'name'      => $fileName,
                    'path'      => $filePath,
                    'disk'      => 'public',
                    'mime_type' => 'image/jpeg',
                    'size'      => strlen($imageContent),
                ]);
            }
        }
    }
}
