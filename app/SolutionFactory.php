<?php

namespace App;

use Illuminate\Support\Number;
use Illuminate\Support\Str;

class SolutionFactory
{
    public static function create(int $day): PuzzleBoard
    {
        $dayString = Str::camel('day ' . Number::spell($day));
        $className = "App\Solutions\\{$dayString}";

        if (!class_exists($className)) {
            throw new \Exception("Solution for day {$day} not found");
        }

        return new $className();
    }
}
