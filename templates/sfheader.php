    <header id="goToTopLink" class="banner">
      <h2 id="headerStandFor"><a href="/">SeaFilmz</a></h2>
      <p class="solgan">6 Degrees of Seattle</p>

      <?php
        require_once 'moviesearchform.php';
        movieSearchForm();
      ?>

      <div class="mobile-menu" onclick="onClickMenu()">
        <span class="bar1"></span>
        <span class="bar2"></span>
        <span class="bar3"></span>
      </div>

      <?php $mobileNavItems = [
        ["seattle-movies", "Movies Filmed in Seattle by Title or Year Released"],
        ["seattle-movies-runtime", "Movies Filmed in Seattle by Runtime"],
        ["seattle-movies-gross", "Movies Filmed in Seattle by Total Worldwide Gross"],
        ["seattle-actors", "Seattle Born Actors by First Name or Birthdate"],
        ["seattle-musicians", "Seattle Born Musicians"],
        ["seattle-athletes", "Seattle Born Athletes"],
        ["seattle-washington", "Seattle Facts"],
        ["washington-cities", "Washington State Cities"],
        ["oregon-cities", "Oregon State Cities"],
        ["idaho-cities", "Idaho State Cities"],
        ["alaska-cities", "Alaska State Cities"],
      ]; ?>

      <nav class="MobileNav">
        <?php for ($i = 0; $i < count($mobileNavItems); $i++) { ?>
            <p><a href="<?= "{$mobileNavItems[$i][0]}"; ?>"><?= $mobileNavItems[$i][1]; ?></a></p>
        <?php } ?>
      </nav>

      <nav class="navigation">
        <div class="dropdown">
          <span class="NavMove">Seattle Movies</span><div class="upsideDownTriangle">&#9660;</div>
          <div class="dropdown-content">
            <p><a href="seattle-movies">Title or Year Released</a></p>
            <p><a href="seattle-movies-runtime">Runtime</a></p>
            <p><a href="seattle-movies-gross">Total Worldwide Gross</a></p>
            <p><a href="streaming-services">Where To Watch</a></p>
          </div>
        </div>
        <div class="dropdown">
          <span class="NavMove">Seattle Born</span><div class="upsideDownTriangle">&#9660;</div>
          <div class="dropdown-content">
            <p><a href="seattle-actors">Actors</a></p>
            <p><a href="seattle-musicians">Musicians</a></p>
            <p><a href="seattle-athletes">Athletes</a></p>
          </div>
        </div>
        <div class="dropdown">
          <span class="NavMove">Washington City Facts</span><div class="upsideDownTriangle">&#9660;</div>
          <div class="dropdown-content">
            <p><a href="seattle-washington">Seattle</a></p>
            <p><a href="spokane-washington">Spokane</a></p>
            <p><a href="tacoma-washington">Tacoma</a></p>
            <p><a href="vancouver-washington">Vancouver</a></p>
            <p><a href="bellevue-washington">Bellevue</a></p>
            <p><a href="everett-washington">Everett</a></p>
            <p><a href="renton-washington">Renton</a></p>
            <p><a href="olympia-washington">Olympia</a></p>
            <p><a href="washington-cities">More Cities</a></p>
          </div>
        </div>
        <div class="dropdown">
          <span class="NavMove">Other States</span><div class="upsideDownTriangle">&#9660;</div>
          <div class="dropdown-content">
            <p><a href="oregon-cities">Oregon</a></p>
            <p><a href="idaho-cities">Idaho</a></p>
            <p><a href="alaska-cities">Alaska</a></p>
          </div>
        </div>
      </nav>
    </header>