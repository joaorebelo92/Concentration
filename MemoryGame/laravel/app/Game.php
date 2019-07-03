<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'games';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nline', 'ncolumn', 'game_maker', 'state', 'typeOfGame'];

    public function users()
	{
		return $this->belongsToMany('App\User');
	}
    public function maker()
    {
        return $this->belongsTo('App\User');
    }
    // id
    // nline
    // ncolumn
    // game_maker
    // game_invited
    // state
    // typeOfGame
}