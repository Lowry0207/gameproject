<?php
use \App\news_comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('Таблица пользователей заполнена данными!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
    

       news_comment::create(array('user' => 12));
        $this->command->info('Coment create');
    }

}