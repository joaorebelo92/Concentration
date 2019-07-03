function isBoardComplete(a){
	for (i=0; i<9; i++)
		if (a[i] === 0)
			return false;
	return true;	
}

function gameEnd(game){
	if (hasRow(1, game.board))
		return 11;
	if (hasRow(2, game.board))
		return 12;
	if (isBoardComplete(game.board))
		return 13;
	return 0;
}

var playersInfo = function(number, timePlayed, moves, score){
		this.number = number;
		this.timePlayed = timePlayed;
		this.moves = moves;
		this.score = score;
/*
		// Funcoes para o tempo 
		 var timedCount = function() {
		     gameObj.appendSeconds();
		  updateSeconds(gameObj.seconds);
		     timeGame = setTimeout(timedCount, 1000);
		 };
		 
		 var startCount= function() {
		     if (!timer_is_on) {
		         timer_is_on = 1;
		         timedCount();
		     }
		 };
		 
		 var stopCount = function() {
		     clearTimeout(timeGame);
		     timer_is_on = 0;
		 };

		 */

	};












//Objeto Jogo 
	
var memoryGame = function(gameId, lines, columns, maker, type){
	this.lines = lines;
	this.columns = columns;
	this.totalTiles = lines*columns;
	this.remainingTiles = this.totalTiles;
	this.board = new Array(this.totalTiles);
	gameStatus = 0;
	//0 nao iniciado / 1 iniciado / 2 terminado  
	players = [];
	gameMaker = maker;
	typeOfGame = type;
	this.tilesShowed = [];
	this.boardM = [[]];
	this.gameId = gameId;

	this.appendremainingTiles = function(){
		this.remainingTiles-=2;
	};

	this.generateBoard = function(){
		//restartGame tem de ser no Controlador
		//restartGame(this.remainingTiles);
		var arr = [];
		var vecImage=[];

		//gera numero aleatorios nao repetidos de 0-40, e preenche o array das imagens(vecImage)
		while(arr.length < (this.totalTiles/2)){
			var randomnumber = Math.floor(Math.random()*41);
			var found=false;
			for(var i=0;i<arr.length;i++){
				if(arr[i]==randomnumber){
					found=true;
					break
				}
			}
			if(!found){
				arr[arr.length]=randomnumber;
			}
		}

		//junta duas vezes o array auxiliar (arr), que fica com que cada numero repita 2 vezes 
		//(8 pecas, 4 imagens diferentes)
		vecImage = arr.concat(arr);

		//baralhar os numeros no array
		vecImage.sort(function(){
			return Math.round(Math.random()) - 0.5;
		});
		
		for (var i = 0; i < this.totalTiles; i++) {
			this.board[i] = new objectTiles(i,"img/"+vecImage[i]+".png",2);
		}

		var k=0;
		for(var i=0; i<lines; i++) {
		    this.boardM[i] = [];
		    for(var j=0; j<columns; j++) {
		        this.boardM[i][j] = this.board[k];
		        k++;
		    }
		}
		console.log(this.boardM);
	};
	
	this.getPositionflipTile = function(e){
		var element = this.board[e];
		if(this.tilesShowed.length == 0 && element.state==2){
			this.tilesShowed.push(element);
			return 0;
		//vira 2 pecas
		}else if(this.tilesShowed.length == 1 && element.state==2){
	    	this.appendMoves();
	    	this.tilesShowed.push(element);
	    	return 1;
	    }
	}

	/*Funcao que compara as imagens seleccionadas*/
	this.compareTiles =  function(){
		if(this.tilesShowed[0].image==this.tilesShowed[1].image){
			return true;
		}
		return false;
	};
};














module.exports = {
    gameStart: function(gameId, lines, colums, maker, type){
		var game = new memoryGame(gameId, lines, colums, maker, type);
		return game;
	},
	playMove: function(game, playerNumber, position){
		if ((game.gameStatus!=1) && (game.gameStatus!=2))
			return false;		
		if ((position<0) || (position>9))
			return false;
		if ((playerNumber!=1) && (playerNumber!=2))
			return false;
		if (game.gameStatus != playerNumber)
			return false;
		if (game.board[position] === 0){
			game.board[position] = playerNumber;	
			var endStatus = gameEnd(game);			
			if (endStatus === 0)
				game.gameStatus = (playerNumber == 1) ? 2 : 1;
			else
				game.gameStatus = endStatus;
			return true;
		}			
		return false;
	}
};