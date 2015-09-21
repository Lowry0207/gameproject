$(document).ready(function(){
	
	
	$("#comments input").on("click", function() {
		var comment = $("#comments textarea");
  		if(comment.val().length < 3){
			comment.addClass('error');
			return false;
  		}
	});
})