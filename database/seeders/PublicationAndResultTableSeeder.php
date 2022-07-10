<?php

namespace Database\Seeders;

use App\Services\ImporterLottoService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicationAndResultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ImporterLottoService $importerLottoService)
    {
        $importerLottoService->import();
    }
}
