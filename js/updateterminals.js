function editComment(pint_CommentId)
{
  var commentId=pint_CommentId.split("_")[1];
  $("#"+pint_CommentId).hide();
  $("#saveComment_"+commentId).show();
  $("#valueComment_"+commentId).prop( "disabled", false );
}

function saveComment(pint_CommentId)
{
  var commentId=pint_CommentId.split("_")[1];
  $("#"+pint_CommentId).hide();

  var data = {
      Fn: "editComment",
      IdComment: commentId,
      Comments: $("#valueComment_"+commentId).val()
  };

  $.ajax({
      type: "POST",
      url: '../comunication/middleware.php',
      data: data,
      success: function (output) {
          $("#editComment_"+commentId).show();
          $("#valueComment_"+commentId).prop( "disabled", true );
          console.log(output);
      },
      error: function (output) {
          console.log(output);
          //error
      }
  });
}

function confirmDelete(pint_CommentId){
	var r = confirm("Tem a certeza que pretente apagar o comentário?")
	if(r)
	{
		deleteComment(pint_CommentId);
	}
	else{
		//no need
	}
	
}

function deleteComment(pint_CommentId)
{
  var commentId=pint_CommentId.split("_")[1];
  var data = {
      Fn: "deleteComment",
      IdComment: commentId
  };

  $.ajax({
      type: "POST",
      url: '../comunication/middleware.php',
      data: data,
      success: function (output) {
        $("#trComment_"+commentId).remove();
        console.log(output);
      },
      error: function (output) {
          console.log(output);
          //error
      }
  });
}

$(document).ready(function () {

  // single comment
  $("#newComment").click(function () {
      $(this).hide();
      $("#saveNewComment").show();
      $($("[id^='addComment_']")[0]).prop("disabled", false );
  });

  var gobj_SaveNewComment = null;
  $("#saveNewComment").click(function () {
      gobj_SaveNewComment = $(this);
      var data = {
          Fn: "addNewComment",
          IdTerminal: $("[id^='addComment_']")[0].id.split("_")[1],
          Comments: $($("[id^='addComment_']")[0]).val()
      };

      $.ajax({
          type: "POST",
          url: '../comunication/middleware.php',
          data: data,
          success: function (output) {
              var returnedValues = output.split(".!.");
              if (returnedValues[0] != "false")
              {
                gobj_SaveNewComment.hide();
                $("#newComment").show();
                $($("[id^='addComment_']")[0]).prop( "disabled", true );
                $($("[id^='addComment_']")[0]).val('');

                $("#tblComents").html($("#tblComents").html().replace("</tbody>", returnedValues[0] + "</tbody>"));

                $("[id^='editComment_']").click(function () {
                  editComment(this.id);
                });

                $("[id^='saveComment_']").click(function () {
                  saveComment(this.id);
                });

                $("[id^='deleteComment_']").click(function () {
                  confirmDelete(this.id);
                });
              }
              else
              {
                alert("Ocorreu um erro ao adicionar novo comentário!");
              }

              console.log(output);
          },
          error: function (output) {
              console.log(output);
              //error
          }
      });
  });


// table
  $("[id^='editComment_']").click(function () {
    editComment(this.id);
  });

  $("[id^='saveComment_']").click(function () {
    saveComment(this.id);
  });

  $("[id^='deleteComment_']").click(function () {
    confirmDelete(this.id);
  });
});
