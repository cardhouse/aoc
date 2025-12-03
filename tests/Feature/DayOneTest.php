<?php

use App\Solutions\DayOne;

test('it lands on zero after moving left one spot from 1', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('L', 1, 1))->toBe(0);
});

test('it lands on 99 after moving left one spot from 0', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('L', 1, 0))->toBe(99);
});

test('it lands on zero after moving right one spot from 99', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('R', 1, 99))->toBe(0);
});

test('it lands on 0 after moving left 50 spots from 50', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('L', 50, 50))->toBe(0);
});

test('it lands on 0 after moving right 50 spots from 50', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('R', 50, 50))->toBe(0);
});

test('it lands on 0 after moving left 0 spots from 0', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('L', 0, 0))->toBe(0);
});

test('it lands on 0 after moving right 0 spots from 0', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('R', 0, 0))->toBe(0);
});

test('it lands on 10 after moving right 50 spots from 60', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('R', 50, 60))->toBe(10);
});

test('it lands on 95 moving 5 left from 0', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('L', 5, 0))->toBe(95);
});

test('it lands on zero after moving 750 left from 50', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotate('L', 150, 50))->toBe(0);
});

test('it counts one zero after moving 1 left from 1', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotateWithCount('L', 1, 1))->toBe([0, 1]);
});

test('it counts one zero after moving 10 left from 5', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotateWithCount('L', 10, 5))->toBe([95, 1]);
});

test('it counts 2 zeros after moving 200 left from 5', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotateWithCount('L', 200, 5))->toBe([5, 2]);
});

test('it counts 2 zeros after moving 105 left from 5', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotateWithCount('L', 105, 5))->toBe([0, 2]);
});

test('it counts 3 zeros after moving 205 left from 5', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotateWithCount('L', 205, 5))->toBe([0, 2]);
});

test('it counts 1 zero after moving 100 left from 0', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotateWithCount('L', 100, 0))->toBe([0, 1]);
});

test('it counts 10 zeros after moving 1000 left from 50', function () {
    $puzzle = new DayOne();
    $this->expect($puzzle->rotateWithCount('L', 1000, 50))->toBe([50, 10]);
});
