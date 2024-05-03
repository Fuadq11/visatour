<?php

namespace Database\Seeders;

use App\Models\VisaType;
use Illuminate\Database\Seeder;

class VisaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["az" => "VİZASIZ", "en" => "VISA IS FREE"],
            ["az" => "E-VİZA", "en" => "E-VISA"],
            ["az" => "VİZA TƏLƏB OLUNUR", "en" => "VISA IS REQUIRED"],
            ["az" => "TURİST KARTI", "en" => "TOURIST CARD"],
            ["az" => "SƏRHƏDDƏ VİZA", "en" => "VISA ON ARRIVAL"],
        ];

        foreach ($types as $type) {
            $newType = new VisaType();
            $newType->setTranslation('name', "az", $type['az']);
            $newType->setTranslation('name', "en", $type['en']);
            $newType->save();
        }
    }
}
