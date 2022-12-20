<?php


class Knight extends Pieces
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

        return [
            $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y + 2) => $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y + 2),
            $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y + 2) => $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y + 2),
            $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y - 2) => $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y - 2),
            $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y - 2) => $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y - 2),
            $alphabetToNumber[($numberToAlphabet[$x] + 2)] . ($y + 1) => $alphabetToNumber[($numberToAlphabet[$x] + 2)] . ($y + 1),
            $alphabetToNumber[($numberToAlphabet[$x] - 2)] . ($y - 1) => $alphabetToNumber[($numberToAlphabet[$x] - 2)] . ($y - 1),
            $alphabetToNumber[($numberToAlphabet[$x] - 2)] . ($y + 1) => $alphabetToNumber[($numberToAlphabet[$x] - 2)] . ($y + 1),
            $alphabetToNumber[($numberToAlphabet[$x] + 2)] . ($y - 1) => $alphabetToNumber[($numberToAlphabet[$x] + 2)] . ($y - 1),
        ];
    }
}