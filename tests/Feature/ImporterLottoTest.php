<?php

namespace Tests\Feature;

use App\Services\ImporterLottoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImporterLottoTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
        $this->lottoImporter = app(ImporterLottoService::class);
    }

    public function test_check_importer()
    {
        $result = $this->lottoImporter->import();
        $this->assertEquals($result, 'successful import');
    }
}
