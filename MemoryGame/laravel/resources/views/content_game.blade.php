<div class="content_game">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Create a new game</button>

	<div class="game_table">
		game
	</div>
	<div class="chat_room">
		chat game
	</div>

	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  		<div class="modal-dialog modal-sm">
    	<div class="modal-content">
    	<form>
            <div class='form-group'>
            <label class='col-sm-2 control-label'>Number of Lines:</label>
            <input id='numberLine' class='form-control' type='text'>
            </div>
             <div class='form-group'>
             <label class='col-sm-2 control-label'>Number of Colums:</label>
             <input id='numberCols' class='form-control' type='text'>
              </div>
             <div class='form-group'>
           <label class='col-sm-2 control-label'>Type:</label>
                <select id='type'>
                        <option value='private'>Private</option>
                  <option value='public'>Public</option>
                      </select>
             </div>
                   <div class='form-group'>
                <button ng-click='startGame()' class='btn btn-default' type='button' data-dismiss="modal">Create</button>
             </div>
             </form>
    	</div>
  	</div>
</div>
</div>