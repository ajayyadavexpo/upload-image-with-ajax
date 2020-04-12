<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload image</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row mt-4">
		<div class="col-sm-4">
			<div class="card p-5">
				<form>
					<div class="form-group">
					  <label for="image">Select Image</label>
					  <input type="file" onchange="changeImage(this)" name="file" id="file" class="form-control">
					</div>
					<button type="button" id="submit"  class="btn btn-info">Upload</button>

					<p class="text-success mt-2 success_message float-right">Successfully uploaded</p>
					<p class="text-danger mt-2 error_message float-right">Try again</p>
				</form>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="row">
				<div class="col-sm-3">
					<div class="card">
						<img src="" id="selectedImage"  height="150">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
$(".success_message").hide();	
$(".error_message").hide();	

$(document).ready(function (e) {
 $("#submit").on('click',(function(e) {
  e.preventDefault();
    var image_file = $('#selectedImage').attr('src'); // getting file
    if(image_file != ''){ // check if image is selected

	  $.ajax({
	   url: "upload.php",
	   type: "POST",
	   data: {file:image_file},
	   success: function(data){
	    	console.log(data);
	    	if(data=='error'){
	    		console.log('error');
	    	}else{
	    		$(".success_message").fadeIn(1000);
	    		$(".error_message").hide();	
	    	}
	    },
	    error: function(e){
	      console.log(e);
	    }          
	    });
    }else{
    	$(".error_message").fadeIn(1000);
    }

    }));
});

// Change photo
function changeImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#selectedImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



// fetch all images from server




</script>
</body>
</html>