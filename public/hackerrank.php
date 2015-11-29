<?php

require_once __DIR__.'/../vendor/autoload.php';

use alanmanderson\tictactoe\Models\Board;
use alanmanderson\tictactoe\Models\Player;
use alanmanderson\tictactoe\Models\Game;
//http://tictactoe.localhost.com/hackerrank.php?board[0][]=_&player=X&board[0][]=_&board[0][]=X&board[1][]=O&board[1][]=_&board[1][]=_&board[2][]=X&board[2][]=_&board[2][]=O
$board = $_GET['board'];
$player = $_GET['player'];

print_r($board);
$board = new Board($board);
if ($player == "X"){
	$ai = new Player("O");
} else {
	$ai = new Player("X");
}
$me = new Player($player);