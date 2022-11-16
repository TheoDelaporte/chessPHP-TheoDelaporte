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
        $this->grille = new ChessBoard();
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