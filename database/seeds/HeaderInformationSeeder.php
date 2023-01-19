<?php

use Illuminate\Database\Seeder;
use App\Base\HeaderInformation;

class HeaderInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $information = new HeaderInformation();
        $information -> author = 'MaLeVoLenT';
        $information -> description ='Overlord App is a robust analytical application for video game and cryptocurrency communities. Overlord connects to and snapshots data from various APIs for games, media, and digital arts on the web and soon blockchains ecosystems.';
        $information -> is_active = true;
        $information -> pages = 'all';
        $information -> save();
    }
}
