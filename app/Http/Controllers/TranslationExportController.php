<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Spatie\SimpleExcel\SimpleExcelWriter;

class TranslationExportController extends Controller
{
    public function index()
    {
        $writer = SimpleExcelWriter::streamDownload('eng_limbu.csv');

        Translation::query()
            ->whereNotNull('limbu')
            ->whereNotNull('english')
            ->cursor()
            ->each(function (Translation $item) use ($writer) {
                $writer->addRow([
                    'eng' => $item->english,
                    'lim' => $item->limbu
                ]);
            });

        $writer->toBrowser();
    }
}
