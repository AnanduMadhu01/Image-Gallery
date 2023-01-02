<?php
    include_once "assets/dbactions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"  href="css/view.css">
    <title>Image Gallery</title>
</head>
<body>
    <!-- Representing the images from database-->
    <div class="wrapper">
        <?php
        $_SESSION['id']="";
            $sql="SELECT * FROM `image_details`";
            $result = getData($sql);
	        if ($result->num_rows > 0) 
	        {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="image_container">
                        <a href="#view"><img id="<?php echo $row['ID'];?>" onClick="ID_click(this.id)" onclick="view()" src="images/<?php echo $row['NAME'];?>" alt=""></a>
                        <div class="caption">
                            <p><a href="https://www.google.com/search?q=images&tbm=isch&ved=2ahUKEwjRtvvvgan8AhU4g2MGHcj2BasQ2-cCegQIABAA&oq=images&gs_lcp=CgNpbWcQAzIECCMQJzIECCMQJzIHCAAQsQMQQzIECAAQQzIKCAAQsQMQgwEQQzIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIECAAQQzIHCAAQsQMQQzoFCAAQgARQpwtYpwtg1A5oAHAAeACAAZwBiAGvApIBAzAuMpgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=Lt-yY9HnLLiGjuMPyO2X2Ao&bih=663&biw=1366"><?php echo $row['CAPTION'];?></a></p>
                            <p><a href="https://www.google.com/search?q=images&tbm=isch&ved=2ahUKEwjRtvvvgan8AhU4g2MGHcj2BasQ2-cCegQIABAA&oq=images&gs_lcp=CgNpbWcQAzIECCMQJzIECCMQJzIHCAAQsQMQQzIECAAQQzIKCAAQsQMQgwEQQzIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIECAAQQzIHCAAQsQMQQzoFCAAQgARQpwtYpwtg1A5oAHAAeACAAZwBiAGvApIBAzAuMpgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=Lt-yY9HnLLiGjuMPyO2X2Ao&bih=663&biw=1366"><?php echo $row['SITE'];?></a></p>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
    <!-- end of image wrapper-->
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id= $_POST['id'];
            $_SESSION['id']=$id;
        }
    ?>
    <!-- A hidden form used to convert the JavaScript varible to PHP varible-->
    <form id="form__submit" action="#view" method="post">
        <input type="hidden" id="img_id" name="id" value="">
    </form>
    <!-- End of form-->
    <!--   Starting of the view box-->
    <div id="view">
    <?php
        $imgid=0;
        $imgid= $_SESSION['id'];
        if($imgid != 0){
        $sql="SELECT * FROM `image_details` WHERE `ID` = $imgid";
            $result = getData($sql);
	        if ($result->num_rows > 0) 
	        {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div id="viewbox">
                    <button class="btn_close" onclick="closebox()">&times;</button>
                    <div class="left">
                        <img src="images/<?php echo $row["NAME"];?>" alt="">
                    </div>
                    <div class="right">
                        <a href="https://www.google.com/search?q=images&tbm=isch&ved=2ahUKEwjRtvvvgan8AhU4g2MGHcj2BasQ2-cCegQIABAA&oq=images&gs_lcp=CgNpbWcQAzIECCMQJzIECCMQJzIHCAAQsQMQQzIECAAQQzIKCAAQsQMQgwEQQzIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIECAAQQzIHCAAQsQMQQzoFCAAQgARQpwtYpwtg1A5oAHAAeACAAZwBiAGvApIBAzAuMpgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=Lt-yY9HnLLiGjuMPyO2X2Ao&bih=663&biw=1366"><p id="heading"><?php echo $row["CAPTION"];?></p></a>
                        <a href="https://www.google.com/search?q=images&tbm=isch&ved=2ahUKEwjRtvvvgan8AhU4g2MGHcj2BasQ2-cCegQIABAA&oq=images&gs_lcp=CgNpbWcQAzIECCMQJzIECCMQJzIHCAAQsQMQQzIECAAQQzIKCAAQsQMQgwEQQzIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIKCAAQgAQQsQMQDTIECAAQQzIHCAAQsQMQQzoFCAAQgARQpwtYpwtg1A5oAHAAeACAAZwBiAGvApIBAzAuMpgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=Lt-yY9HnLLiGjuMPyO2X2Ao&bih=663&biw=1366"><p id="sub"> <?php echo $row["SITE"];?></p></a>
                        <button>website</button>
                        <button>website</button>
                        <button>website</button>
                        <button>share</button>
                        <div class="related_images">
                            <?php
                        $sql1="SELECT `CATAGORY` FROM `image_details` WHERE `ID` = $id";
                        $result1 = getData($sql1);
                        if ($result1->num_rows > 0) 
                        {
                            while($row1 = $result1->fetch_assoc()) {
                                $catagory= $row1["CATAGORY"];
                                $sql2="SELECT * FROM `image_details` WHERE `CATAGORY` = '$catagory'";
                                $count=0;
                                $result2 = getData($sql2);
                                if ($result2->num_rows > 0) 
                                {
                                    while($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <a href="#view"></a><img id="<?php echo $row2['ID'];?>" onClick="ID_click(this.id)" onclick="view()" src="images/<?php echo $row2["NAME"];?>" alt=""></a>
                                        <?php
                                        $count=$count+1;
                                        if ($count ==4){
                                            ?> 
                                             <div class="clear"></div>
                                             <?php 
                                        } elseif($count ==8){
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                    <?php
                }
            } 
        }
    ?>
    </div>
    <!-- end of view box-->
    <!--Script for accessing the image id and viewing and closing the view box -->
    <script>
        var img_id = document.getElementById("img_id");
        document.getElementById("view").style.display="block";
        function ID_click(clicked) {
            var id= clicked;
            // document.write(id);
            console.log(id);
            img_id.value = clicked;
            let form = document.getElementById("form__submit");
            form.submit();
            } 
        function closebox(){
            document.getElementById("view").style.display="none";
        }
    </script>
    <!-- End of Script-->
</body>
</html>