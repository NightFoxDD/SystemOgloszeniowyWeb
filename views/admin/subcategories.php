<div class="container m-auto">
   <form method = "POST" action = "<?php echo ROOT_URL?>admin/addSubCategories">
      <label class="m-2 h4">Nazwa kategori:</label>
         <input type= "text" name="name" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0">
         <input type='hidden' name = "id" class="m-3 p-2 bg-transparent border-top border-left border-right bt-0 rounded-2" value='<?php echo $model['Master'][0] ?>'>
      <button class="m-3 p-2 bg-transparent border-top border-left border-right bt-0 rounded-2">dodaj </button>
   </form>
   <?php

   foreach($model['SubCategoies'] as $content){
      
      ?>
      <form method = "POST" action = "<?php echo ROOT_URL?>admin/removeSubCategories">
         <label class="m-2 h4"><?php echo $content['name']?></label>
         <input type= "hidden" value='<?php echo $content['name']?>'>
         <input type= "hidden" name="id" value='<?php echo $content['id']?>'>
         <input type='hidden' name = "master_id" value='<?php echo $model['Master'][0] ?>'>
         <button class="m-3 p-2  btn btn-danger border-top border-left border-right bt-0 rounded-2">usun </button>
      </form>
      <?php
   }
   ?>

</div>
