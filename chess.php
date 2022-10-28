<?php

class Pieces
{
    public $position;
    public $grille;

    public function __construct($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function show($position, $possiblePositions)
    {
        $this->grille = new Grille();
        $alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        echo "  A  B  C  D  E  F  G  H" . PHP_EOL;
        $position = str_split($position);
        for ($i = 1; $i <= 8; $i++) {
            echo $i;
            foreach ($alpha as $lettre) {
                if ($position[1] == $i) {
                    if ($position[0] === $lettre) {
                        echo " \u{265F} ";
                    } elseif ($possiblePositions[$lettre . $i] ?? null) {
                        echo " \u{1F3AF}";
                    } else {
                        echo " \u{2B1B} ";
                    }
                } elseif ($possiblePositions[$lettre . $i] ?? null) {
                    echo " \u{1F3AF}";
                } else {
                    echo " \u{2B1B} ";
                }
            }
            echo PHP_EOL;
        }
    }
}

class Grille
{
    public $width;

    public function __construct()
    {
        $this->width = 8;
    }
}

class Pion extends Pieces
{
    public function getPossiblePlay($position)
    {
        $position = str_split($position);
        $x = $position[0];
        $y = $position[1];

        if ($y != 2) {
            return [
                $x . ($y + 1) => $x . ($y + 1)
            ];
        } else {
            return [
                $x . ($y + 1) => $x . ($y + 1),
                $x . ($y + 2) => $x . ($y + 2)
            ];
        }
    }
}

class Cavalier extends Pieces
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

class Tour extends Pieces
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

class Fou extends Pieces
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
                $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y + $i) => $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y + $i),
                $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y - $i) => $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y - $i),
                $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y - $i) => $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y - $i),
                $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y + $i) => $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y + $i),
            ];

            $array = array_merge($array, $arrayPosition);
        }

        return $array;
    }
}

class Reine extends Pieces
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
                $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y + $i) => $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y + $i),
                $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y - $i) => $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y - $i),
                $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y - $i) => $alphabetToNumber[($numberToAlphabet[$x] + $i)] . ($y - $i),
                $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y + $i) => $alphabetToNumber[($numberToAlphabet[$x] - $i)] . ($y + $i),
                $x . $i => $x . $i,
                $alphabetToNumber[($numberToAlphabet[$x] + $i)] . $y => $alphabetToNumber[($numberToAlphabet[$x] + $i)] . $y,
                $alphabetToNumber[($numberToAlphabet[$x] - $i)] . $y => $alphabetToNumber[($numberToAlphabet[$x] - $i)] . $y,
            ];

            $array = array_merge($array, $arrayPosition);
        }

        return $array;
    }
}

class Roi extends Pieces
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
            $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y + 1) => $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y + 1),
            $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y - 1) => $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y - 1),
            $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y - 1) => $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y - 1),
            $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y + 1) => $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y + 1),
            $alphabetToNumber[($numberToAlphabet[$x] + 1)] . $y => $alphabetToNumber[($numberToAlphabet[$x] + 1)] . $y,
            $alphabetToNumber[($numberToAlphabet[$x] - 1)] . $y => $alphabetToNumber[($numberToAlphabet[$x] - 1)] . $y,
            $alphabetToNumber[$numberToAlphabet[$x]] . ($y + 1) => $alphabetToNumber[($numberToAlphabet[$x] + 1)] . ($y + 1),
            $alphabetToNumber[$numberToAlphabet[$x]] . ($y - 1) => $alphabetToNumber[($numberToAlphabet[$x] - 1)] . ($y - 1),
        ];
    }
}

$piece = new Tour('D5');
$position = $piece->position;
$xy = @$piece->getPossiblePlay($position);
$piece->show($position, $xy);