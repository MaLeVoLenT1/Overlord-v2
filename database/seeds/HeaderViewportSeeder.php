<?php
namespace Database\Seeds;
use Illuminate\Database\Seeder;
use App\Base\HeaderViewport;

class HeaderViewportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property = new HeaderViewport();
        $property -> property = 'width=device-width';
        $property -> is_active = true;
        $property -> pages = 'all';
        $property -> save();

        $property = new HeaderViewport();
        $property -> property = 'initial-scale=1';
        $property -> is_active = true;
        $property -> pages = 'all';
        $property -> save();

        $property = new HeaderViewport();
        $property -> property = 'maximum-scale=1';
        $property -> is_active = true;
        $property -> pages = 'all';
        $property -> save();
    }
}
