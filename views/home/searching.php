
<div class="container mt-5">
    <div class="row mt-5 mb-5">
        <form method="post" action="<?php echo ROOT_URL ?>home/searchView">
                <div class="input-group">
                    <input type="text" name="name" class="form-control bg-white border-dark-subtle" placeholder="Stanowisko, firma, słowo klucz ?">
                    
                    <div class="form-floating">
                        <input type="text" name="localization" class="form-control bg-white border-dark-subtle" placeholder="Stanowisko, firma, słowo klucz ?">
                        <label for="floatingSelect">Lokalizacja</label>
                    </div>
                    <div class="col-1 d-flex  justify-content-center">
                        <button class="btn btn-outline-light border-dark-subtle text-dark" type="submit" id="button-addon2">Szukaj
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
    </div>
  <div class="row" id="accordionExample1">
        <div class="col-4 accordion-item p-2">
            <h2 class="accordion-header">
                <button  class=" border rounded-2 border-2 accordion-button p-2 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_filters" aria-expanded="false" aria-controls="collapse_filters">
                    <h2>Filtry</h2>
                </button>
            </h2>
            <div id="collapse_filters" class="accordion-collapse collapse " data-bs-parent="#accordionExample1">
            <div class="row accordion" id="accordionExample1">
                    <?php 
                        $categories = "";
                        $subcategories = "";
                        foreach($model['categories'] as $category){
                            if($category['checked'] == true){
                                $categories = $categories . $category['id'] . ";";
                            };
                            foreach($model['subcategories'] as $subcategory){
                                if($subcategory['checked'] == true && $subcategory['master_id'] == $category['id']){
                                    $subcategories = $subcategories . $subcategory['master_id'] . "_" . $subcategory['id'] . ";";
                                }; 
                            }
                        ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button onclick="showSubCategories_search(<?php echo $category['id'] ?>)" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo $category['id']; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $category['id']; ?>">
                            <?php echo $category['name'] ?>
                        </button>
                        </h2>
                        <div id="collapse_<?php echo $category['id']; ?>" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body" id = "accordcontainer_<?php echo $category['id'] ?>"></div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            <input type="hidden" name="SavedSubCategories" id="savedSubCategories" value="<?php echo $subcategories; ?>">
            <input type="hidden" name="SavedCategories" id="savedCategories" value="<?php echo $categories; ?>">
        </form>
                        </div>
            
    </div>
    <div class="col-8 m-auto p-auto">
        <?php
            foreach($model['Advertisements'] as $content){
                echo $content;
            }
        ?>
    </div>
  </div>
</div>
   

