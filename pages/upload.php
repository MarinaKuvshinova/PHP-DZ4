<h1>Upload Form</h1>
<?php
if (!isset($_POST["uppbtn"])):?>
<form action="index.php?page=2" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="myFile">Select file for upload:</label>
        <input type="file" class="form-control" name="myFile" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary" name="uppbtn">Send File</button>
</form>
<?php else:?>
<?php
if(isset($_POST["uppbtn"]))
{
    if ($_FILES["myFile"]["error"]!=0)
    {
        echo "<h3><span class='text-danger'>Upload error code: ".$_FILES["myFile"]["error"]."</span></h3>";
        return false;
    }
    if (is_uploaded_file($_FILES["myFile"]["tmp_name"]))
    {
        move_uploaded_file($_FILES["myFile"]["tmp_name"],"./images/".$_FILES["myFile"]["name"]);
    }
    echo "<h3><span class='text-success'>File Upload Successfule!</span></h3>";
}
?>
<?php endif;?>
