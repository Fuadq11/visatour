<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        Language::create([
            'name' => 'Az',
            'code' => 'az',
        ]);

        Language::create([
            'name' => 'En',
            'code' => 'en',
        ]);
    }
}
