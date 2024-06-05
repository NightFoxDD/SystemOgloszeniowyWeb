<div class="container m-auto">
    <form method = "POST" action = "<?php echo ROOT_URL?>admin/addCategories" class="m-auto">
        <label class="m-2 h4">Nazwa kategori:</label>
        <input type= "text" name="name" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0">
        <button class="m-3 p-2 bg-transparent border-top border-left border-right bt-0 rounded-2"> dodaj </button>
    </form>
    <?php 
        foreach($model['Categoies'] as $content){
            ?>
            <div class="row">
              
                <form method = "POST" class="col-auto" action = "<?php echo ROOT_URL?>admin/SubCategoiers">
                    <input type= "hidden" name="id" value="<?php echo $content['id'] ?>">
                    <input type= "hidden" name="name" value="<?php echo $content['name'] ?>">
                    <button type="submit" class="m-3 p-2 bg-transparent border-top border-left border-right bt-0 rounded-2"><?php echo $content['name'] ?></button>
                </form>
                <form method = "POST" class="col-auto" action = "<?php echo ROOT_URL?>admin/removeCategories">
                        <input type= "hidden" name="id" value="<?php echo $content['id'] ?>">
                        <button type="submit" class="m-3 p-2 btn btn-danger border-1 rounded-2">usun</button>
                </form>
            </div>
            
            
            <?php
        }
    ?>
</div>
