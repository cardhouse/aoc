<?php

namespace App\Console\Commands;

use App\Http\Controllers\PuzzleFile;
use App\SolutionFactory;
use Illuminate\Console\Command;

class AdventOfCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aoc:run {day} {--second : Run the second puzzle} {--test : Run the test puzzle}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the Advent of Code puzzle for a given day';

    /**
     * Execute the console command.
     */
    public function handle(PuzzleFile $puzzleFile)
    {
        $day = $this->argument('day');
        $second = $this->option('second');
        $test = $this->option('test');

        $puzzle = $puzzleFile($day, $test);
        $puzzleBoard = SolutionFactory::create($day);

        $solution = $second ? $puzzleBoard->secondPuzzle($puzzle) : $puzzleBoard->firstPuzzle($puzzle);

        $this->info($solution);
    }
}
