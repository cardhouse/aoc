<?php

namespace App;

use Iterator;

interface PuzzleBoard
{
    public function firstPuzzle(Iterator $data): mixed;

    public function secondPuzzle(Iterator $data): mixed;
}
