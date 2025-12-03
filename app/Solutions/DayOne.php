<?php

namespace App\Solutions;

use App\PuzzleBoard;
use Iterator;
use Illuminate\Support\Str;

use function Laravel\Prompts\info;

class DayOne implements PuzzleBoard
{
    public function firstPuzzle(Iterator $data): mixed
    {
        $position = 50;
        $numberOfMoves = 0;
        $count = 0;

        foreach ($data as $row) {
            $position = $this->rotate(
                direction: Str::of($row[0])->charAt(0),
                distance: Str::of($row[0])->substr(1)->toInteger() % 100,
                from: $position
            );

            if ($position === 0) {
                $count++;
            }
        }

        dump($numberOfMoves);

        return $count;
    }

    public function rotate(string $direction, int $distance, int $from): int
    {
        if ($direction === 'L') {
            // If the distance is greater than the position, set position to 100 - the delta.
            if ($distance > $from) {
                $position = 100 - ($distance - $from);
            } else {
                $position = $from - $distance;
            }
        } else if ($direction === 'R') {
            // If the resulting from would be more than 100, set from to the delta.
            if ($from + $distance >= 100) {
                $position = $distance - (100 - $from);
            } else {
                $position = $from + $distance;
            }
        } else {
            throw new \Exception('Invalid direction');
        }

        return $position;
    }

    public function rotateWithCount(string $direction, int $distance, int $from): array
    {
        $count = (int) floor($distance / 100) ?? 0;
        $distance = $distance % 100;

        if ($direction === 'L' && $from - $distance <= 0 && $from !== 0) {
            $count++;
        } else if ($direction === 'R' && $from + $distance >= 100) {
            $count++;
        }

        $position = $this->rotate($direction, $distance, $from);

        return [$position, $count];
    }

    public function secondPuzzle(Iterator $data): mixed
    {
        $position = 50;
        $count = 0;

        foreach ($data as $row) {
            $oldPosition = $position;
            $direction = Str::of($row[0])->charAt(0);
            $distance = Str::of($row[0])->substr(1)->toInteger();
            [$position, $numberOfZeros] = $this->rotateWithCount(
                direction: $direction,
                distance: $distance,
                from: $position
            );

            // if ($position === 0) {
            //     $numberOfZeros++;
            // }

            info("Moving {$direction} {$distance} from {$oldPosition} to {$position} - {$numberOfZeros} " . Str::plural('zero', $numberOfZeros));

            $count += $numberOfZeros;
        }

        return $count;
    }
}
