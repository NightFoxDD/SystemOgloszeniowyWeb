<?php
   print_r($model['SubCategoies']);
?>
<form method = "POST" action = "<?php echo ROOT_URL?>admin/addSubCategories">
    <input type= "text" name="name">
      <input type='text' name = "id" value='<?php echo $model['Master'][0] ?>'>
    <button>dodaj </button>
</form>
<?php

 foreach($model['SubCategoies'] as $content){
    echo $content['id']. "/" . $content['master_id'] . "/" . $content['name'] . "<bR>";
    ?>
   <form method = "POST" action = "<?php echo ROOT_URL?>admin/removeSubCategories">
      <input type= "text" value='<?php echo $content['name']?>'>
      <input type= "text" name="id" value='<?php echo $content['id']?>'>
      <input type='text' name = "master_id" value='<?php echo $model['Master'][0] ?>'>
      <button>usun </button>
   </form>
    <?php
 }
?>
