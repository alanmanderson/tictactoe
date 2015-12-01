<?php namespace alanmanderson\TicTacToe\Models;

class Move{
    public $x;
    public $y;
    public $score;
    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }
}