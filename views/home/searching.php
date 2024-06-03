<?php
    print_r($_POST);
    print_r($model['Advertisements']);
?>
<input type="text" name="SavedSubCategories" id="savedSubCategories">
<input type="text" name="SavedCategories" id="savedCategories">
<ol>
        <?php 
            foreach($model['categories'] as $category){
                echo "<li>". $category['name'] ."<ol>";
                foreach($model['subcategories'] as $subcategories){
                    if($category['id'] == $subcategories['master_id'])
                    echo "<li>" . $subcategories['name'] ."</li>";
                }
                echo "</ol></li>";
            }
        ?>
</ol>

