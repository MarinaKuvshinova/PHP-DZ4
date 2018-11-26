<h1>Gallery</h1>
<form action="index.php?page=3" method="post">
    <h3>Select graphics extension to display:</h3>
    <select name="ext">
        <?php
        $path = "images/";
        if ($dir = opendir($path))
        {
            $ar = [];
            while($file = readdir($dir))
            {
                $fullname = $path.$file;
                $pos = strrpos($fullname,".");
                $ext = substr($fullname,$pos+1);
                if (!in_array($ext,$ar) && !empty($ext))
                {
                    $ar[]=$ext;
                    echo "<option>$ext</option>";
                }
            }
            echo "<option>*</option>";
            closedir($dir);
        }
        ?>
    </select>
    <input type="submit" name="submit" value="Show Picture" class="btn btn-primary">
</form>
<?php
if (isset($_POST['submit']))
{
    $ext = $_POST["ext"];
    $arr=glob($path."*.".$ext);
    echo  "<div class='panel panel-primary'>";
        echo "<div class='panel-heading'>";
            echo "<h3 class='panel-title'>Gallery content</h3></div>";
            echo "<div class='panel-body row'>";
        foreach ( $arr as $a)
        {
            echo "<a href=".$a." target='_blank' class='col-xs-3'><img src=".$a." alt=".$a." class='img-responsive img-thumbnail'></a>";
        }
        echo "</div></div>";
}
?>