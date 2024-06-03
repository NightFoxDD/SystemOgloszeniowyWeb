<form method = "POST" action = "<?php echo ROOT_URL?>admin/addCategories">
    <input type= "text" name="name">
    <button>dodaj </button>
</form>
<?php 
    foreach($model['Categoies'] as $content){
        //echo  $content['id'] . "/" . $content['name'] . "<bR>";
        ?>
        <li>
            <form method = "POST" action = "<?php echo ROOT_URL?>admin/removeCategories">
                    <input type= "hidden" name="id" value="<?php echo $content['id'] ?>">
                    <button type="submit">usun</button>
            </form>
            <form method = "POST" action = "<?php echo ROOT_URL?>admin/SubCategoiers">
                <input type= "hidden" name="id" value="<?php echo $content['id'] ?>">
                <input type= "hidden" name="name" value="<?php echo $content['name'] ?>">
                <button type="submit"><?php echo $content['name'] ?></button>
            </form>
        <li>
        
        <?php
    }
?>