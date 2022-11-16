<?php
require_once 'Pieces.php';

class Rook extends Pieces
{
    public function getPossiblePlay($position)
    {
        $position = str_split($position);
        $x = $position[0];
        $y = $position[1];
        $alphabetToNumber = [
            1 => 'A',
            2 => 'B',
            3 => 'C',
            4 => 'D',
            5 => 'E',
            6 => 'F',
            7 => 'G',
            8 => 'H',
        ];
        $numberToAlphabet = [
            'A' => 1,
            'B' => 2,
            'C' => 3,
            'D' => 4,
            'E' => 5,
            'F' => 6,
            'G' => 7,
            'H' => 8,
        ];

        $array = [];

        for ($i = 1; $i <= 8; $i++) {
            $arrayPosition = [
                $x . $i => $x . $i,
                $alphabetToNumber[($numberToAlphabet[$x] + $i)] . $y => $alphabetToNumber[($numberToAlphabet[$x] + $i)] . $y,
                $alphabetToNumber[($numberToAlphabet[$x] - $i)] . $y => $alphabetToNumber[($numberToAlphabet[$x] - $i)] . $y,
            ];

            $array = array_merge($array, $arrayPosition);
        }

        return $array;
    }
}