<?php

namespace App\Console\Commands;

use App\Models\Translation;
use Illuminate\Console\Command;
use Spatie\SimpleExcel\SimpleExcelReader;

class ImportCsvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:english {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import english text that will have translations';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $filename = $this->argument('filename');
        $path     = base_path("data/{$filename}");

        $reader = SimpleExcelReader::create($path)->useHeaders(['english', 'limbu']);
        $reader->getRows()
            ->filter(function (array $row) {
                return isset($row['english']);
            })->unique('english')
            ->each(function ($row) {
                $this->info("Inserting English: {$row['english']}");
                Translation::query()->create(['english' => $row['english']]);
        });
    }
}
