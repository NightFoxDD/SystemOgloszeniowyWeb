<?php 

    foreach($model['Categoies'] as $content){
        //echo  $content['id'] . "/" . $content['name'] . "<bR>";
        ?>
            <form method = "POST" action = "<?php echo ROOT_URL?>admin/SubCategoiers">
                <input type= "hidden" name="id" value="<?php echo $content['id'] ?>">
                <input type= "hidden" name="name" value="<?php echo $content['name'] ?>">
                <button type="submit"><?php echo $content['name'] ?></button>
            </form>
        <?php
    }
?>