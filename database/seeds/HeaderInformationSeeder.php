<?php
namespace Database\Seeds;
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
        $information -> description ='Overlord App is a robust AI analytical application for communities.';
        $information -> is_active = true;
        $information -> pages = 'all';
        $information -> save();
    }
}
