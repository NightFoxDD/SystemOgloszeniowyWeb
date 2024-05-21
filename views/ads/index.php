<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col p-3 card shadow-sm">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="d-flex justify-content-start align-items-top">
              <?php echo $model['CompanyImage']; ?>
            <div class="container">
              <?php echo $model['PositionName'];?>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <?php 
                foreach ($model['BasicInformations'] as $content ) {
                  echo $content;
              }
            ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-5">
      <?php
        echo $model['Map'];
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col mt-5 rounded-3 shadow-sm border p-3">
      <h1 class="fs-3">Twój zakres obowiązków</h1>
        <ul class="list-group list-group-flush">
          <?php 
            foreach ($model['Duties'] as $content ) {
              echo $content;
            }
          ?>
        </ul>
    </div>
  </div>
  <div class="row">
    <div class="col mt-5 rounded-3 shadow-sm border p-3">
      <h1 class="fs-3">Nasze wymagania</h1>
      <ul class="list-group list-group-flush">
            <?php
            foreach ($model['Requirements'] as $content ) {
                echo $content;
              }
            ?>
      </ul>
      <h1 class="fs-3">Mile widziane</h1>
      <ul class="list-group list-group-flush">
              <?php
              foreach ($model['Welcome'] as $content ) {
                echo $content;
              }
              ?>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col mt-5 rounded-3 shadow-sm border p-3">
      <h2 class="fs-4">Benefity</h2>
      <div class="container">
        <div class="row d-flex justify-content-start">
          <?php 
                foreach ($model['Benefits'] as $content ) {
                  echo $content;
              }
            ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
            <?php 
                foreach ($model['Description'] as $content ) {
                  echo $content;
                }
            ?>
  </div>
  <div class="row">
    <div class="col mt-5 border rounded-3 p-3">
      <h1 class="fs-3">Dowiedz się więcej o Pracodawcy:</h1>
      <a href="" class="text-decoration-none">
        Zobacz profil pracodawcy
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
        </svg>
      </a>
    </div>
  </div>
</div>