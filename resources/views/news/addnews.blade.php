@extends('app')

@section('h1')
	Add News
@endsection

@section('content')
	<form action="/news/store" method="post" enctype="multipart/form-data">
		<div class="form-group">
    <label>Название статьи</label>
    	<input name="name" type="text" class="form-control"  placeholder="Game">
   
    <label>URL</label>
    	<input name="url" type="text" class="form-control" placeholder="assasins-creed">
    

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
		<textarea name="body" id="news_create"></textarea>
        
    <label>Image</label>
        <input name="images" type="file">
	<br>
		<input type="submit" class="btn btn-primary" value="Создать">
	</form>	

    @foreach($errors->all() as $error)

<div style="color:red">
{{$error}}
</div>

@endforeach
@endsection


