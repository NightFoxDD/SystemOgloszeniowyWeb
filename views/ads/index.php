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
      <iframe class="rounded-4" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d657940.051106515!2d20.090383960156245!3d49.8973328250177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgoogle%20map%20html!5e0!3m2!1spl!2spl!4v1701428323050!5m2!1spl!2spl" width="100%" height="350em" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <div class="row">
    <div class="col mt-5 rounded-3 shadow-sm border p-3">
      <h1 class="fs-3">Twój zakres obowiązków</h1>
      <ul class="list-group list-group-flush">
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          An item Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque tempora non obcaecati corporis et rem quis ipsam laudantium corrupti, voluptatum eaque odio deleniti quaerat repellat reiciendis quas minus tempore voluptatibus.
        </li>
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          An item Lorem ipsum dolor sit ametndis quas minus tempore voluptatibus.
        </li>
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          An item Lorem ipsum dolor sit amet co.
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col mt-5 rounded-3 shadow-sm border p-3">
      <h1 class="fs-3">Nasze wymagania</h1>
      <ul class="list-group list-group-flush">
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          Wykształcenie wyższe,
        </li>
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          Staż/praktyka na stanowisku z zakresu rachunkowości, finansów lub audytu,
        </li>
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          Znajomość języka angielskiego w stopniu komunikatywnym,
        </li>
      </ul>
      <h1 class="fs-3">Mile widziane</h1>
      <ul class="list-group list-group-flush">
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          Znajomość zasad rozliczania cła i podatku VAT w imporcie towarów,
        </li>
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          Znajomość zasad Incoterms,
        </li>
        <li class="list-group-item border-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          Znajomość procesów księgowych i schematów obiegu dokumentów finansowych w dużych, nowoczesnych organizacjach.
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col mt-5 rounded-3 shadow-sm border p-3">
      <h2 class="fs-4">Benefity</h2>
      <div class="container">
        <div class="row d-flex justify-content-start">
          <div class="col-lg-3 col-md-6 col-sm-12 p-1">
            <div class="rounded-3 shadow-sm border m-3 p-3">
              <div class="d-flex justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                  <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                </svg>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <p class="text-center">dofinansowanie zajęć sportowych</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 p-1">
            <div class="rounded-3 shadow-sm border m-3 p-3">
              <div class="d-flex justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                  <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                </svg>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <p class="text-center">dofinansowanie zajęć sportowych</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 p-1">
            <div class="rounded-3 shadow-sm border m-3 p-3">
              <div class="d-flex justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                  <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                </svg>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <p class="text-center">dofinansowanie zajęć sportowych</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 p-1">
            <div class="rounded-3 shadow-sm border m-3 p-3">
              <div class="d-flex justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                  <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                </svg>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <p class="text-center">dofinansowanie zajęć sportowych</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 p-1">
            <div class="rounded-3 shadow-sm border m-3 p-3">
              <div class="d-flex justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                  <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                </svg>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <p class="text-center">dofinansowanie zajęć sportowych</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-5 border rounded-3 shadow-sm p-4">
      <p>Każdy dzień ze świeżą energią?</p>
      <p>Dołącz do zespołu, który ją tworzy i zmieniaj z nami przyszłość!</p>
      <p>Kim jesteśmy i co robimy?</p>
      <p>W Green Cell działamy perspektywicznie. Śledzimy otaczający nas świat i chcemy go ulepszać, wprowadzając rozwiązania korzystne dla środowiska i wygodne dla użytkowników. Projektujemy i produkujemy urządzenia przetwarzające i magazynujące energię. Wpływamy na rozwój elektromobilności w całej Europie, tworząc innowacyjne rozwiązania dla użytkowników pojazdów elektrycznych.</p>
    </div>
    <div class="col-12 mt-5 border rounded-3 shadow-sm p-4">
      <p>Nie zapominamy także o produktach codziennego użytku, takich jak powerbanki, ładowarki, akumulatorki, bez których trudno się obejść w domu, w pracy i w podróży. Niezwykle ważna jest dla nas jakość, więc skrupulatnie testujemy i certyfikujemy to, co wytwarzamy. Ale to nie wszystko. Wielką wagę przykładamy także do użyteczności i wyglądu naszego asortymentu - inspirujemy się opiniami i potrzebami użytkowników, kompleksowo projektujemy design produktów od ich cech użytkowych aż po opakowanie.</p>
      <p>Naszym celem jest pełne zadowolenie klienta - zarówno z korzystania, jak i otaczania się produktami marki Green Cell. Jesteśmy docenianą firmą w branży technologicznej w Polsce. Firmą rozwijającą się tak szybko jak prędkość światła i nieskończenie świeża energia.</p>
      <p>Chcesz mieć realny wpływ na jej rozwój? Uczestniczyć w ciekawych, ambitnych i rozwojowych projektach? Współtworzyć produkty, wpływające na lepszą przyszłość</p>
      <p>Zobacz, kogo szukamy!</p>
    </div>
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