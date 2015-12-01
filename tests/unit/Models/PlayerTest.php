<?php

use alanmanderson\tictactoe\Models\Player;
use alanmanderson\tictactoe\Models\Board;
use alanmanderson\tictactoe\Models\Move;

class PlayerTest extends PHPUnit_Framework_TestCase{
	
	public function testScoreFirstMove(){
		$board = new Board(['___','___','___']);
		$player = new Player("X");
		$actual = $player->bestMove($board);
		$expected = new Move(0,0);
		$this->assertEquals($expected, $actual);
	}
	
}