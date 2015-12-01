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
	
	public function testScoreSecondMove(){
		$board = new Board(['X__','___','___']);
		$player = new Player("O");
		$actual = $player->bestMove($board);
		$expected = new Move(1,1);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreThirdMove(){
		$board = new Board(['X__','_O_','___']);
		$player = new Player("X");
		$actual = $player->bestMove($board);
		$expected = new Move(1,2);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreFourthMove(){
		$board = new Board(['X__','_O_','_X_']);
		$player = new Player("O");
		$actual = $player->bestMove($board);
		$expected = new Move(0,2);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreFifthMove(){
		$board = new Board(['X__','_O_','OX_']);
		$player = new Player("X");
		$actual = $player->bestMove($board);
		$expected = new Move(2,0);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreSixthMove(){
		$board = new Board(['X_X','_O_','OX_']);
		$player = new Player("O");
		$actual = $player->bestMove($board);
		$expected = new Move(1,0);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreSeventhMove(){
		$board = new Board(['XOX','_O_','OX_']);
		$player = new Player("X");
		$actual = $player->bestMove($board);
		$expected = new Move(0,1);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreEighthMove(){
		$board = new Board(['XOX','XO_','OX_']);
		$player = new Player("O");
		$actual = $player->bestMove($board);
		$expected = new Move(2,2);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreNinthMove(){
		$board = new Board(['XOX','XO_','OXO']);
		$player = new Player("X");
		$actual = $player->bestMove($board);
		$expected = new Move(2,1);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreBlockMove(){
		$board = new Board(['XOX','OO_','X__']);
		$player = new Player("X");
		$actual = $player->bestMove($board);
		$expected = new Move(1,2);
		$this->assertEquals($expected, $actual);
	}
	
	public function testScoreWinMove(){
		$board = new Board(['X_X','OO_','X_O']);
		$player = new Player("X");
		$actual = $player->bestMove($board);
		$expected = new Move(1,0);
		$this->assertEquals($expected, $actual);
	}
	
}