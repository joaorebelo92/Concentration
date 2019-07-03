<?php

use Illuminate\Database\Seeder;
use App\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create(['nickname' => 'tiago', 'email' => 'asdasd@asdas.com', 'password' => bcrypt('123')]);
        User::Create(['nickname' => 'joao', 'email' => 'joao@asdas.com', 'password' => bcrypt('123')]);
        User::Create(['nickname' => 'beatriz', 'email' => 'teste@asdas.com', 'password' => bcrypt('123')]);
    }
}
