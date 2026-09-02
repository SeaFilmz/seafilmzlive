<!--link to the start of a seafilmz general webpage template-->
<?php
  require_once 'new_db_connection.php';

  $cityStateSLUGPart = $_SERVER['REQUEST_URI'];
  $cityStateSLUGPartFixed = str_replace('/', '', $cityStateSLUGPart);

  require_once 'queryfunctions/city-functions.php';
  $result = cityQuery(trim($cityStateSLUGPartFixed));

  // 3. Use returned data (if any)
  if ($cityFact = mysqli_fetch_assoc($result)) {
    $rows = mysqli_num_rows($result);
    $city = $cityFact["city"];
    $StateProvince = $cityFact["state_province"];
    $county = $cityFact["county"];
    $title = "{$city} - SeaFilmz";
    $mDesc = "Fact page about the city of {$city}";
    $ogTitle = "{$city} - SeaFilmz";
    $ogURL = 'https://seafilmz.com' . $cityStateSLUGPart;
    $schemaType = 'Place';
    $cityStateName = "{$city}, {$StateProvince}";
    $cityStateURLSlug = $cityStateSLUGPart;
    $body = "MainBody";
    require_once 'templates/main-page-structure.php';
    headerTemp();
?>

		<main class="CityMainFacts">
      <h1 class="CityPageHeader"><?= "{$city}, {$StateProvince}"; ?>
        <?php if ($cityFact["state_province_capital"] === 1) { ?>
          (State Capital City)
        <?php } ?>
      </h1>

      <?php function tableFactRow($label, $content) { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc"><?= htmlspecialchars($label) ?></td>
            <td class="CityData"><?= $content ?></td>
          </tr>
      <?php } ?>

      <table class="CityTable">
        <?php if ($cityFact["incorporated_date"] !== NULL) { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Officially Became a City</td>
            <td class="CityData"><?php $date = date_create($cityFact["incorporated_date"]); echo date_format($date, "F d, Y"); ?></td>
          </tr>
        <?php } ?>

        <?php if ($cityFact["country"] === 'USA') {
          tableFactRow('Country', '<a href="' . htmlspecialchars($cityFact["official_country_links"]) . '" target="_blank">United States of America</a>');
        }

          tableFactRow('State', '<a href="' . htmlspecialchars($cityFact["official_state_province_links"]) . '" target="_blank">' . $StateProvince . '</a>');
        ?>

        <?php if ($rows === 1) { ?>
          <?php if ($StateProvince !== 'Alaska') { ?>
            <tr class="CityDataPointRow">
              <td class="CityData CityDataDesc">County</td>
              <td class="CityData"><a href="<?= "{$cityFact["official_county_links"]}"; ?>" target="_blank"><?= $county; ?></a></td>
            </tr>
          <?php } elseif ($StateProvince === 'Alaska') { ?>
            <tr class="CityDataPointRow">
              <td class="CityData CityDataDesc">Borough</td>
              <td class="CityData"><a href="<?= "{$cityFact["official_county_links"]}"; ?>" target="_blank"><?= $county; ?></a></td>
            </tr>
          <?php }
        } elseif ($city === 'Bothell') { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">County</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="https://kingcounty.gov/" target="_blank"><?= $county; ?></a></div>
              <div><a href="https://snohomishcountywa.gov/" target="_blank">Snohomish</a></div>
            </td>
          </tr>
        <?php } elseif ($city === 'Portland') { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">County</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="https://multco.us/" target="_blank"><?= $county; ?></a></div>
              <div class="CityDataPointOfMany"><a href="https://www.clackamas.us/" target="_blank">Clackamas</a></div>
              <div class="CityDataPointOfMany"><a href="https://www.co.washington.or.us/" target="_blank">Washington</a></div>
            </td>
          </tr>
        <?php } elseif ($city === 'Milwaukie') { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">County</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="https://multco.us/" target="_blank"><?= $county; ?></a></div>
              <div class="CityDataPointOfMany"><a href="https://www.clackamas.us/" target="_blank">Clackamas</a></div>
            </td>
          </tr>
        <?php } elseif ($city === 'Salem') { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">County</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="https://www.co.marion.or.us/" target="_blank">Marion</a></div>
              <div class="CityDataPointOfMany"><a href="https://www.co.polk.or.us/" target="_blank">Polk</a></div>
            </td>
          </tr>
        <?php } elseif ($city === 'Pocatello') { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">County</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="https://www.bannockcounty.us/" target="_blank">Bannock</a></div>
              <div class="CityDataPointOfMany"><a href="https://www.co.power.id.us/" target="_blank">Power</a></div>
            </td>
          </tr>
        <?php } ?>

        <?php if ($cityFact["city_links"] !== NULL) {
          tableFactRow('City', '<a href="' . htmlspecialchars($cityFact["official_city_links"]) . '" target="_blank">' . htmlspecialchars($city) . '</a>');
        } ?>

        <?php if ($city === 'Seattle') { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Movie Theaters</td>
            <td class="CityData"><a href="seattle-movie-theaters">List of Movie Theaters</a></td>
          </tr>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Movies Filmed</td>
            <td class="CityData"><a href="seattle-movies">List of Movies Filmed</a></td>
          </tr>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Other Film and Media Resources for Seattle</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="https://www.seattle.gov/filmandmusic" target="_blank">Seattle Office of Film and Music</a></div>
              <div class="CityDataPointOfMany"><a href="https://www.washingtonfilmworks.org/" target="_blank">Washington Filmworks</a></div>
              <div class="CityDataPointOfMany"><a href="https://www.siff.net/" target="_blank">Seattle International Film Festival</a></div>
              <div class="CityDataPointOfMany"><a href="https://nwfilmforum.org/" target="_blank">Northwest Film Forum</a></div>
            </td>
          </tr>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">People Born</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="seattle-actors">Actors</a></div>
              <div class="CityDataPointOfMany"><a href="seattle-athletes">Athletes</a></div>
              <div class="CityDataPointOfMany"><a href="seattle-musicians">Musicians</a></div>
            </td>
          </tr>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Professional Sports Teams</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="http://www.seahawks.com/" target="_blank">Seattle Seahawks</a> (men's football)</div>
              <div class="CityDataPointOfMany"><a href="https://www.mlb.com/mariners" target="_blank">Seattle Mariners</a> (men's baseball)</div>
              <div class="CityDataPointOfMany"><a href="https://www.soundersfc.com/" target="_blank">Seattle Sounders FC</a> (men's soccer)</div>
              <div class="CityDataPointOfMany"><a href="https://www.nhl.com/kraken" target="_blank">Seattle Kraken</a> (men's hockey)</div>
              <div class="CityDataPointOfMany"><a href="http://storm.wnba.com/" target="_blank">Seattle Storm</a> (women's basketball)</div>
              <div class="CityDataPointOfMany"><a href="https://www.reignfc.com/" target="_blank">Seattle Reign FC</a> (women's soccer)</div>
              <div class="CityDataPointOfMany"><a href="https://www.thepwhl.com/en/teams/seattle-torrent" target="_blank">Seattle Torrent</a> (women's hockey)</div>
            </td>
          </tr>
          <?php cityAttractionTableQuery($city, 'Major League Sports Venue'); ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Libraries</td>
            <td class="CityData"><a href="https://www.spl.org/hours-and-locations">List of Libraries</a></td>
          </tr>
        <?php } ?>

        <?php if ($city === 'Portland') { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Movie Theaters</td>
            <td class="CityData"><a href="portland-oregon-movie-theaters">List of Movie Theaters</a></td>
          </tr>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Movies Filmed</td>
            <td class="CityData"><a href="portland-oregon-movies">List of Movies Filmed</a></td>
          </tr>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">People Born</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="portland-oregon-actors">Actors</a></div>
              <div class="CityDataPointOfMany"><a href="portland-oregon-athletes">Athletes</a></div>
              <div class="CityDataPointOfMany"><a href="portland-oregon-musicians">Musicians</a></div>
            </td>
          </tr>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Professional Sports Teams</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="https://www.nba.com/blazers/" target="_blank">Portland Trail Blazers</a> (men's basketball)</div>
              <div class="CityDataPointOfMany"><a href="https://www.timbers.com/" target="_blank">Portland Timbers</a> (men's soccer)</div>
              <div class="CityDataPointOfMany"><a href="https://www.thorns.com/" target="_blank">Portland Thorns FC</a> (women's soccer)</div>
            </td>
          </tr>
          <?php cityAttractionTableQuery($city, 'Major League Sports Venue'); ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">Libraries</td>
            <td class="CityData"><a href="portland-oregon-libraries">List of Libraries</a></td>
          </tr>
        <?php } ?>

        <?php function peopleBornByCityState($cityState) { ?>
          <tr class="CityDataPointRow">
            <td class="CityData CityDataDesc">People Born</td>
            <td class="CityData">
              <div class="CityDataPointOfMany"><a href="<?= "{$cityState}" ?>-actors">Actors</a></div>
              <div class="CityDataPointOfMany"><a href="<?= "{$cityState}" ?>-athletes">Athletes</a></div>
            </td>
          </tr>
        <?php } ?>

        <?php
          if ($city === 'Tacoma') {
            peopleBornByCityState('tacoma-washington');
          } elseif ($city === 'Bellevue') {
            peopleBornByCityState('bellevue-washington');
          } elseif ($city === 'Spokane') {
            peopleBornByCityState('spokane-washington');
          } elseif ($city === 'Anchorage') {
            peopleBornByCityState('anchorage-alaska');
          }
        ?>

        <?php
          if ($city === 'Seattle' or $city === 'Portland') {
          } else {
            cityAttractionTableQuery($city, 'Movie Theater');
            cityFilmedMovieTableQuery($city, $StateProvince);
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

      <div id="ImageAnswer">
        <button id="PopsicleImageAnswer">Answer</button>
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