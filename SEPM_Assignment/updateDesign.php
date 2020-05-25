<?php
require "functions.php";
$dairyID = $_GET['id'];
$result = adminGetDairyByID($dairyID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Design</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
</head>
<body class="orderDiaryBody"  onload="paperColorType()">

<div  class="orderDiaryMain">
  
  <div class="orderDiaryContent">
    <form action="updateDesignController.php" method="post">
        <?php
            echo "<input type='text' name='dairyID' hidden='hidden' value='" . $dairyID . "'>";
        ?>
         <div class="editDairy">

                <div class="title">Edit Diary</div>
                <div class="paperColorType">
                    <div class="inputTitle">Cover Type:</div>

                    <div class="paperColorTypeOption">
                        <input type="radio" name="paperColorType" value="color" onclick="changePaperColorType()" <?php if($result['type'] =='color') echo " checked=\"checked\""; ?> ><span>Color</span>
                        <input type="radio" name="paperColorType" value="theme" onclick="changePaperColorType()"<?php if($result['type'] =='theme') echo " checked=\"checked\""; ?> ><span>Theme</span>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="paperColor">
                    <div class="inputTitle">Cover Color:</div>
                      <?php
                       echo "<input type='color' name='coverColor' value = '".$result['cover_color'] ."'>";
                       ?>
                </div>
                <div class="clear"></div>
                <div class="paperTheme">
                    <div class="inputTitle">Cover Theme:</div>
                    <select id="paperTheme" name="paperTheme">
                        <option value="0">No Options Now</option>
                    </select>
                </div>
                <div class="clear"></div>
                <div class="paperType">
                    <div class="inputTitle">Paper Type:</div>
                    <div class="paperTypeOption">
                
                        <input type="radio" name="paperType" value="plain" <?php if($result['paper_type'] =='plain') echo " checked=\"checked\""; ?> ><span>Plain</span>
                        <input type="radio" name="paperType" value="lined"<?php if($result['paper_type'] =='lined') echo " checked=\"checked\""; ?> ><span>Lined</span>
                        <input type="radio" name="paperType" value="dotted" <?php if($result['paper_type'] =='dotted') echo " checked=\"checked\""; ?> ><span>Dotted</span>
                        
                    </div>
                </div>
                <div class="clear"></div>
                <div class="coverColor">
                    <div class="inputTitle">Paper Color:</div>
                    <?php
                    echo "<input type='color' name='paperColor' value = '".$result['paper_color'] ."'>";
                    ?>
                </div>
                <div class="clear"></div>
                <div class="coverText">
                    <div class="inputTitle">Cover Text:</div>
                    <?php
                    echo "<input type='text' name='coverText' value = '".$result['cover_text'] ."'>";
                    ?>
                </div>
                <div class="buttonDiv">
                    <button type="button" onclick="window.location.href='editDesign.php'">Back</button>
                    <button type="submit">Update</button>
                </div>
                <div class="clear"></div>

            </div>

    </form>
  </div>
</div>

</body>
</html>