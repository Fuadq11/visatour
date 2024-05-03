<?php

namespace Database\Seeders;

use App\Models\FeeType;
use Illuminate\Database\Seeder;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["az" => "Viza rüsumu", "en" => "Includes Consulate fee"],
            ["az" => "Xidmət haqqımız daxildir", "en" => "Our processing fee"],
            ["az" => "Xidmət haqqımız daxil deyil", "en" => "Our processing fee is not included"],
            ["az" => "Administrativ xərc", "en" => "Includes Administrative fees"],
            ["az" => "Kuryer xidməti haqqı", "en" => "Includes Courier fee"],
            ["az" => "Viza xərcləri daxildir", "en" => "Includes Processing fee"],
            ["az" => "Viza xərcləri daxil deyil", "en" => "Processing fee is not included"],
            ["az" => "Viza Müraciət Mərkəzinin xidmət haqqı", "en" => "VAC fee"],
            ["az" => "Siğorta Ödənişi", "en" => "Insurance fee"],
        ];

        foreach ($types as $type) {
            $newType = new FeeType();
            $newType->setTranslation('name', "az", $type['az']);
            $newType->setTranslation('name', "en", $type['en']);
            $newType->save();
        }
    }
}
