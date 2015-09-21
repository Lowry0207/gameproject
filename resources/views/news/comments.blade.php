@section('script')
	<script src="/public/style/js/coments.js"></script>
@stop
@section('comments')
	<div class='news-detail col-xs-12 col-sm-12 col-md-9 col-lg-9' style="margin-top:10px;">
	<h3 style="display:inline-block">Коментарии</h3>
	<hr>

	@foreach($news['comments'] as $comment)	
	<div class="news-comment">
		<a href="/profile/"<span class="name">{{$comment['user_name']}}</span></a>
		
		<span class="text">{{$comment['comment']}}</span> 
	</div>
	@endforeach	

	<hr> 

	@if(Auth::user())
	<form id="comments" action="" method="POST">
	<div class="form-group col-md-9">
		<textarea name="comment" class="form-control" rows="4"></textarea>
	</div>
	<div class="col-md-offset-9">
		   <input type="hidden" name="_token" value="{{ csrf_token() }}">
		   <input type="submit" class="btn btn-comment " value="Отправить">
		  </div>
	</form> 
	@else
	<span class="msg msg-auth">Чтобы оставить коментарий, <a href="/auth/login">авторизируйтесь</a>
	@endif
@stop