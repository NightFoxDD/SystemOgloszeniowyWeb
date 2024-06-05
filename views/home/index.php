<div class="container ">
    <div class="row">
        <div class="column mt-5 mb-5">
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="1000">
                            <img src="<?php echo ROOT_IMG ?>Swiftlly_transparent_FullName.png" class="d-block w-100" alt="...">
                        </div>
                    <div class="carousel-item">
                        <img src="<?php echo ROOT_IMG ?>Swiftlly_transparent_FullName.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo ROOT_IMG ?>Swiftlly_transparent_FullName.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev CarouselButtons" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next CarouselButtons" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="container justify-content-center mt-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="post" action="<?php echo ROOT_URL ?>home/search">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control bg-white border-dark-subtle" placeholder="Stanowisko, firma, słowo klucz ?">
                                <div class="form-floating">
                                    <select name="category" class="form-select border-dark-subtle" id="floatingSelect" aria-label="Floating label select example">
                                        <option value = "-1"> brak </option>
                                        <?php
                                            foreach($model['categories'] as $item){
                                                echo "<option value = '". $item['id'] ."'>" . $item['name'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Kategorie</label>
                                </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="m" class="carousel mt-5">
                <div class="container">
                    <div class="row d-flex justify-content-center mb-3">
                        <button type="button" class="col-3 active button text-primary bg-transparent border-0 m-1 p-1 border-bottom border-primary" data-bs-target="#m" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1">Ostatio oglądane</button>
                        <button type="button" class="col-3 button text-primary bg-transparent border-0 m-1 p-1 border-bottom border-primary" data-bs-target="#m" data-bs-slide-to="1" aria-label="Slide 2">Najnowsze oferty</button>
                    </div>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-content">
                            <div class="container">
                                <div class="row d-flex justify-content-start">
                                <?php 
                                    foreach ($model['lastAds'] as $content ) {
                                        echo $content;
                                    }
                                ?>
                                
                                </div>
                                <div class="row">
                            
                                <div class="col-12 d-flex justify-content-center">
                                        <button class="button border rounded-5 border-primary text-primary bg-white p-3">Pokaż więcej
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-content">
                            <div class="carousel-content">
                                <div class="container">
                                    <div class="row d-flex justify-content-start">
                                    <?php 
                                        foreach ($model['lastAds'] as $content ) {
                                            echo $content;
                                        }
                                    ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="button border rounded-5 border-primary text-primary bg-white p-3">Pokaż więcej
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-5 mb-5">
            <h1 class="text-primary text-center">Pracodawcy, których warto znać</h1>
        </div>
        <div class="col-12">
            <div id="wrapper">
                <div id="carousel">
                    <div id="content">
                            <?php 
                                foreach($model['companies'] as $content){
                                    echo $content;
                                }
                            ?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <button id="prev" class="bg-transparent border-0" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#007FFF" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16" id="prev_svg">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
                    </svg>
                </button>
                <button id="next" class="bg-transparent border-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#007FFF" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16" id="next_svg">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-12 mt-5">
            <p class="text-primary fs-5 text-center">Interesuje Cię inna firma?</p>
            <h1 class="text-primary text-center s">Znajdziesz ją w profilach pracodawców</h1>
            <div class="col-12 d-flex justify-content-center">
                <button class="button border rounded-5 border-primary text-primary bg-white p-3 mt-3">Pokaż pracodawców
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>