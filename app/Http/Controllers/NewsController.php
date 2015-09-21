<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
# Models
use App\User;
use App\News;
use App\news_comment;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->data['news'] = News::get();

       return view('news.list',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {     
        return view('news.addnews',$this->data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = 
        [
            'name' => 'required',
            'images' => 'required',
            'body' => 'required|min:8'
        ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails())
    {
        return redirect('/news/add')->withErrors($validator);
    }

#Если все отлично создаем запись

     $news = new News();


        $data = $request->only('name','body','url');
        $images = \Input::file('images');


     $news->create_news($data,$images);
    }




    public function show($id)
    {
   
        $news = News::get()->where('url',$id)->first();        #ЧПУ НОВОСТЕЙ        
        
        $news['comments'] = $this->get_comments($news);

        $this->data['news'] = $news;
        return view('news.detail',$this->data);
    }


// Коментарии к определенной новости
    private function get_comments(News $news){
        //dd($news->comments);
        #Делаем выборку по всем имеющимся коментам
        #  в таблице news_comments, и получаем по id имена в users
        foreach ($news->comments as $value) {
            $value->user_name = User::find($value->user)->name;
        }

        #Количество коментарий в новости $news
        $comment_count = new news_comment();
        $comment_count->get_count($news->id); 
        $news->comments['count'] = $comment_count->get_count($news->id); 
       
    return $news->comments;
    }

    public function add_comment($id,Request $request){
        $rules = 
        [
            'comment' => 'required',
        ];

    
    $form = $request->only('comment');
    $validator = Validator::make($form, $rules);

    if ($validator->fails())
    {
        return redirect()->back()->withErrors($validator);
    }

    $comments_model = new news_comment();


    $comments_model->comment = $form['comment'];
    $comments_model->news = News::where('url', $id)->get()->pluck('id')->first();
    $comments_model->user = \Auth::user()->id;
    $comments_model->save();
        return redirect()->back();
    }

}
