
 $(function() {

	// $(".reply-button").addClass(".comment-reply-form");

$(".reply-button").on("click", function() {
        $(this).closest(".comment-body").find('.comment-reply-form-hide').toggle();
        
    });
$(".edit-button").on("click", function() {
        $(this).closest(".comment-body").find('.replyied-comment-edit').toggle();
        
    });
	// setIntervale(function(){
	// 	'.comment-reply-form-hide'
	// }(),3000);


// $(".reply-button").on("click", function() {
//         $(this).closest(".comment-body").find('.comment-reply-form-hide').show();
        
//     });
});