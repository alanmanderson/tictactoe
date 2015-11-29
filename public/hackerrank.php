<?php

require_once __DIR__.'/../vendor/autoload.php';

use alanmanderson\tictactoe\Models\Board;
use alanmanderson\tictactoe\Models\Player;
use alanmanderson\tictactoe\Models\Game;

$board = $_GET['board'];
$player = $_GET['player'];

$board = new Board($board);
if ($player == "X"){
	$ai = new Player("O");
} else {
	$ai = new Player("X");
}
$me = new Player($player);