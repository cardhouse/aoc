<?php

namespace App\Http\Controllers;

use League\Csv\Reader;

class PuzzleFile extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(int $day, bool $test)
    {
        $filename = $test ? 'test.csv' : 'puzzle.csv';
        $path = storage_path("puzzles/day-{$day}/{$filename}");

        $csv = Reader::from($path);

        return $csv->getRecords();
    }
}
