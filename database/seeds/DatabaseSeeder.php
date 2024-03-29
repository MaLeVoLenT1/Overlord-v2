<?php

use Database\Seeds\HeaderInformationSeeder;
use Database\Seeds\HeaderKeywordsSeeder;
use Database\Seeds\HeaderViewportSeeder;
use Database\Seeds\MaLeVoLenTSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(HeaderKeywordsSeeder::class);
        $this->call(HeaderInformationSeeder::class);
        $this->call(HeaderViewportSeeder::class);
        $this->call(MaLeVoLenTSeeder::class);
    }
}
