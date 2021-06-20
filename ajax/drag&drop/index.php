 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="src/dropzone.css">
    <link rel="stylesheet" type="text/css" href="../dist/style.css">
    <title>PHP & AJAX</title>
</head>

<body>
    <div class="container">
        <div class="content-box">
            <div class="header">
                <h1>PHP CRUD WITH AJAX</h1>
                <div class="search">
                    <input type="text" name="search" placeholder="search" id="search">
                </div>
            </div>

            <div class="upload-box">
                <h2 class="txt-center">Image Upload</h2>
                  <div class="box">
                     <form class="dropzone" id="file_upload"></form>
                     <span class="abc">Upload</span>
                  </div>
                    <button id="upload_btn">Upload</button>
            </div>
        </div>
    </div>
    <script src="../dist/jQuery.js"></script>
    <script src="src/dropzone.js"></script>
<script>

Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#file_upload", {

                url: "drag&drop.php",
                parallelUploads : 4,
                uploadMultiple : true,
                acceptedFiles : '.jpg,.png,.jpeg',
                autoProcessQueue : false,
                success : function(file,msg){
                        if(msg == 1){
                            alert('Image Uploaded Successfully');
                        }else if(msg == 0){
                            alert('Image is not uploaded');
                        }else{
                            alert(msg);
                        }
                  } 
              });


$('#upload_btn').click(function(){
    myDropzone.processQueue();
});
</script>
</body>
</html>