<!--link to the start of a seafilmz general webpage template-->
<?php
  require_once 'new_db_connection.php';

  $cityStateSLUGPart = $_SERVER['REQUEST_URI'];
  $cityStateSLUGPartFixed = str_replace('/', '', $cityStateSLUGPart);

  require_once 'queryfunctions/cityfunctions.php';
  $result = cityQuery(trim($cityStateSLUGPartFixed));

  // 3. Use returned data (if any)
  if ($cityFact = mysqli_fetch_assoc($result)) {
    $rows = mysqli_num_rows($result);
    $city = $cityFact["City"];
    $StateProvince = $cityFact["StateProvince"];
    $title = "{$city} - SeaFilmz";
    $mDesc = "Fact page about the city of {$city}";
    $ogTitle = "{$city} - SeaFilmz";
    $ogURL = 'https://seafilmz.com' . $cityStateSLUGPart;
    $body = "MainBody";
    require_once 'templates/main-page-structure.php';
    headerTemp();
?>

		<main class="CityMainFacts">
      <h1 class="CityPageHeader"><?= "{$city}, {$StateProvince}"; ?>
        <?php if ($cityFact["StateProvinceCapital"] === 1) { ?>
          (State Capital City)
        <?php } ?>
      </h1>

      <table class="CityTable">
        <?php if ($cityFact["IncorporatedDate"] !== NULL) { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Officially Became a City</td>
            <td class="cityData"><?php $date = date_create($cityFact["IncorporatedDate"]); echo date_format($date, "F d, Y"); ?></td>
          </tr>
        <?php } ?>

        <?php if ($cityFact["Country"] === 'USA') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Country</td>
            <td class="cityData"><a href="<?= "{$cityFact["OfficialCountryLinks"]}"; ?>" target="_blank"><?= "United States of America"; ?></a></td>
          </tr>
        <?php } ?>

          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">State</td>
            <td class="cityData"><a href="<?= "{$cityFact["OfficialStateProvinceLinks"]}"; ?>" target="_blank"><?= $StateProvince; ?></a></td>
          </tr>

        <?php if ($rows === 1) { ?>
          <?php if ($StateProvince !== 'Alaska') { ?>
            <tr class="cityDataPointRow">
              <td class="cityData cityDataDesc">County</td>
              <td class="cityData"><a href="<?= "{$cityFact["OfficialCountyLinks"]}"; ?>" target="_blank"><?= "{$cityFact["County"]}"; ?></a></td>
            </tr>
          <?php } elseif ($StateProvince === 'Alaska') { ?>
            <tr class="cityDataPointRow">
              <td class="cityData cityDataDesc">Borough</td>
              <td class="cityData"><a href="<?= "{$cityFact["OfficialCountyLinks"]}"; ?>" target="_blank"><?= "{$cityFact["County"]}"; ?></a></td>
            </tr>
          <?php }
        } elseif ($city === 'Bothell') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://kingcounty.gov/" target="_blank">King</a></div>
              <div><a href="https://snohomishcountywa.gov/" target="_blank">Snohomish</a><div>
            </td>
          </tr>
        <?php } elseif ($city === 'Portland') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://multco.us/" target="_blank">Multnomah</a></div>
              <div class="cityDataPointOfMany"><a href="https://www.clackamas.us/" target="_blank">Clackamas</a></div>
              <div><a href="https://www.co.washington.or.us/" target="_blank">Washington</a><div>
            </td>
          </tr>
        <?php } elseif ($city === 'Milwaukie') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://multco.us/" target="_blank">Multnomah</a></div>
              <div><a href="https://www.clackamas.us/" target="_blank">Clackamas</a><div>
            </td>
          </tr>
        <?php } elseif ($city === 'Salem') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://www.co.marion.or.us/" target="_blank">Marion</a></div>
              <div><a href="https://www.co.polk.or.us/" target="_blank">Polk</a><div>
            </td>
          </tr>
        <?php } elseif ($city === 'Pocatello') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://www.bannockcounty.us/" target="_blank">Bannock</a></div>
              <div><a href="https://www.co.power.id.us/" target="_blank">Power</a><div>
            </td>
          </tr>
        <?php } ?>

        <?php if ($cityFact["CityLinks"] !== NULL) { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">City</td>
            <td class="cityData"><a href="<?= "{$cityFact["OfficialCityLinks"]}"; ?>" target="_blank"><?= "{$city}"; ?></a></td>
          </tr>
        <?php } ?>

        <?php if ($city === 'Seattle') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Movie Theaters</td>
            <td class="cityData"><a href="seattle-movie-theaters">List of Movie Theaters</a></td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Movies Filmed</td>
            <td class="cityData"><a href="seattle-movies">	List of Movies Filmed</a></td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Other Film and Media Resources for Seattle</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://www.seattle.gov/filmandmusic" target="_blank">Seattle Office of Film and Music</a></div>
              <div class="cityDataPointOfMany"><a href="https://www.washingtonfilmworks.org/" target="_blank">Washington Filmworks</a></div>
              <div class="cityDataPointOfMany"><a href="https://www.siff.net/" target="_blank">Seattle International Film Festival</a></div>
              <div><a href="https://nwfilmforum.org/" target="_blank">Northwest Film Forum</a></div>
            </td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">People Born</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="seattle-actors">Actors</a></div>
              <div class="cityDataPointOfMany"><a href="seattle-athletes">Athletes</a></div>
              <div class="cityDataPointOfMany"><a href="seattle-musicians">Musicians</a></div>
            </td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Professional Sports Teams</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="http://www.seahawks.com/" target="_blank">Seattle Seahawks</a> (men's football)</div>
              <div class="cityDataPointOfMany"><a href="https://www.mlb.com/mariners" target="_blank">Seattle Mariners</a> (men's baseball)</div>
              <div class="cityDataPointOfMany"><a href="https://www.soundersfc.com/" target="_blank">Seattle Sounders FC</a> (men's soccer)</div>
              <div class="cityDataPointOfMany"><a href="https://www.nhl.com/kraken" target="_blank">Seattle Kraken</a> (men's hockey)</div>
              <div class="cityDataPointOfMany"><a href="http://storm.wnba.com/" target="_blank">Seattle Storm</a> (women's basketball)</div>
              <div class="cityDataPointOfMany"><a href="https://www.reignfc.com/" target="_blank">Seattle Reign FC</a> (women's soccer)</div>
            </td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Libraries</td>
            <td class="cityData"><a href="https://www.spl.org/hours-and-locations">List of Libraries</a></td>
          </tr>
        <?php } ?>

        <?php if ($city === 'Portland') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Movie Theaters</td>
            <td class="cityData"><a href="portland-oregon-movie-theaters">List of Movie Theaters</a></td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Movies Filmed</td>
            <td class="cityData"><a href="portland-oregon-movies">	List of Movies Filmed</a></td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">People Born</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="portland-oregon-actors">Actors</a></div>
              <div class="cityDataPointOfMany"><a href="portland-oregon-athletes">Athletes</a></div>
            </td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Professional Sports Teams</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://www.nba.com/blazers/" target="_blank">Portland Trail Blazers</a> (men's basketball)</div>
              <div class="cityDataPointOfMany"><a href="https://www.timbers.com/" target="_blank">Portland Timbers</a> (men's soccer)</div>
              <div><a href="https://www.thorns.com/" target="_blank">Portland Thorns FC</a> (women's soccer)</div>
            </td>
          </tr>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Libraries</td>
            <td class="cityData"><a href="portland-oregon-libraries">List of Libraries</a></td>
          </tr>
        <?php } ?>

        <?php if ($city === 'Tacoma') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">People Born</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="tacoma-washington-actors">Actors</a></div>
              <div class="cityDataPointOfMany"><a href="tacoma-washington-athletes">Athletes</a></div>
            </td>
          </tr>
        <?php } ?>

        <?php if ($city === 'Bellevue') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">People Born</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="bellevue-washington-actors">Actors</a></div>
              <div class="cityDataPointOfMany"><a href="bellevue-washington-athletes">Athletes</a></div>
            </td>
          </tr>
        <?php } ?>

        <?php
          if ($city === 'Seattle' or $city === 'Portland') {
          } else {
            cityAttractionTableQuery($city, 'Movie Theater');
            cityFilmedMovieTableQuery($city);
          }

          cityAttractionTableQuery($city, 'College');

          if ($StateProvince === "Idaho" or $StateProvince === "Alaska" or ($StateProvince === "Oregon" and $city !== "Portland") or ($StateProvince === "Washington" and $city !== "Seattle")) {
            cityAttractionTableQuery($city, 'Library');
        }

          cityAttractionTableQuery($city, 'Bowling Alley');
          cityAttractionTableQuery($city, 'Board Game Hangout Store');
          cityAttractionTableQuery($city, 'Golf Course');
          cityAttractionTableQuery($city, 'Amusement Park');
        ?>
			</table>
		</main>

		<?php if ($city === 'Seattle') { ?>
      <div class="SeattleFFImage">
        <p class="PopsicleText">Where in Seattle is this popsicle's location?</p>
        <img class="PopsicleSculpture" src="/images/popsicle-sculpture.JPG" alt="Giant red popsicle located in the city of Seattle">
      </div>

      <div id="imageAnswer">
        <button id="popsicleImageAnswer">Answer</button>
      </div>

      <script src="/js/popsicle-answer.js" defer></script>
    <?php } ?>

<?php
  }

  // 4. Release returned data
  mysqli_free_result($result);

  // link to footer
  footerTemp();
?>