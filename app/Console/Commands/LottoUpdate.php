<?php

namespace App\Console\Commands;

use App\Services\ImporterLottoService;
use Illuminate\Console\Command;

class LottoUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lotto:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Lotto DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImporterLottoService $lottoService)
    {
        $lottoService->import(now()->format('d.m.Y'));
        $this->info('Update Lotto DB has been successfully');
    }
}
