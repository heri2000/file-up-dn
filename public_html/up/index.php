<!DOCTYPE html>
<html>
  <head>
    <title>Upload File</title>
  </head>
  <body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      Select file to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
  </body>
</html>