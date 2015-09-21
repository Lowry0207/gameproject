<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Путь к изображениям новостей
    public $image_path = 'public/style/img/news';



    public function comments()
    {
        return $this->hasMany('App\news_comment','news');
    }

    public function create_news(Array $data){

# Получаем основные поля name, body, title
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
        $this->save();

#Если файл загружен добавляем его к созданной выше записи
   if(\Input::hasFile('images')){
        $images =\Input::file('images');
        $last_news = $this->select('id')->orderBy('id', 'desc')->first();
        
    #Генерация имени
		$name = str_random(10).$last_news['id'].'.jpg';

		$images->move($this->image_path, $name);
	#Записываем в базу имя картинки
		$this->where('id', $last_news['id'])
        	->update(array('images' => $name));
    }

    return true;
    }



}



   

