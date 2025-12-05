<?php

namespace App\Solutions;

use App\PuzzleBoard;
use Iterator;
use Illuminate\Support\Str;

use function Laravel\Prompts\info;

class DayTwo implements PuzzleBoard
{
    public float $total = 0;

    public function firstPuzzle(Iterator $data): mixed
    {
        // 11-22
        $data->rewind();
        foreach ($data->current() as $row) {
            [$low, $high] = explode('-', $row);

            info("Low: {$low}, High: {$high}");

            while ($this->hasOddDigits($low) && $low <= $high) {
                if ($this->double($low) <= $high) {
                    info("Adding {$this->double($low)} to the total.");
                    $this->total += $this->double($low);
                }
                $low++;
            }

            // Find the first half of the number
            $length = str($low)->length();
            $check = str($low)->substr(start: 0, length: $length/2)->toFloat();

            while ($this->double($check) <= (float) $high) {
                $doubled = $this->double((string) $check);

                if ($doubled >= (float) $low && $doubled <= (float) $high) {
                    info("Adding {$doubled} to the total.");
                    $this->total += $doubled;
                }

                $check++;
            }

        }

        return $this->total;
    }

    private function double(string $int)
    {
        return (float) ($int . $int);
    }

    public function secondPuzzle(Iterator $data): mixed
    {
        $data->rewind();

        dump($data->current());

        return 'foo';
    }

    /**
     * @param string $low
     * @return bool
     */
    public function hasOddDigits(string $low): bool
    {
        return str($low)->length() % 2 === 1;
    }
}
