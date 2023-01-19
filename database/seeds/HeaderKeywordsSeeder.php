<?php

use Illuminate\Database\Seeder;
use App\Base\HeaderKeywords;

class HeaderKeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keyword = new HeaderKeywords();
        $keyword -> name = 'overlord';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'community';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'crypto';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'blockchain';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'decentralized';
        $keyword -> is_active = false;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'games';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'manager';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();
    }
}
