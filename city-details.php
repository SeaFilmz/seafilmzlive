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
    $body = "MainBody";
    require_once 'sftemplate.php';
    headerTemp();
?>

		<main class="CityMainFacts">
      <h2 class="CityPageHeader"><?= "{$city}, {$StateProvince}"; ?>
        <?php if ($cityFact["StateProvinceCapital"] === 1) { ?>
          (State Capital City)
        <?php
        }
        ?>
      </h2>

      <table class="CityTable">
        <?php if ($cityFact["IncorporatedDate"] !== NULL) { ?> 
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Officially Became a City</td>
            <td class="cityData"><?php $date = date_create($cityFact["IncorporatedDate"]); echo date_format($date, "F d, Y"); ?></td>
          </tr>
        <?php
        }
        ?>
        <?php if ($cityFact["Country"] === 'USA') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">Country</td>
            <td class="cityData"><a href="<?= "{$cityFact["OfficialCountryLinks"]}"; ?>"><?= "United States of America"; ?></a></td>
          </tr>
        <?php
        }
        ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">State</td>
            <td class="cityData"><a href="<?= "{$cityFact["OfficialStateProvinceLinks"]}"; ?>"><?= $StateProvince; ?></a></td>
          </tr>
        <?php if ($rows === 1) { ?>
          <?php if ($StateProvince === 'Washington' or $StateProvince === 'Oregon') { ?>
            <tr class="cityDataPointRow">
              <td class="cityData cityDataDesc">County</td>
              <td class="cityData"><a href="<?= "{$cityFact["OfficialCountyLinks"]}"; ?>"><?= "{$cityFact["County"]}"; ?></a></td>
            </tr>
          <?php
          }
        } else if ($city === 'Bothell') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://kingcounty.gov/">King</a></div>
              <div><a href="https://snohomishcountywa.gov/">Snohomish</a><div>
            </td>
          </tr>
        <?php 
        } else if ($city === 'Portland') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://multco.us/">Multnomah</a></div>
              <div class="cityDataPointOfMany"><a href="https://www.clackamas.us/">Clackamas</a></div>
              <div><a href="https://www.co.washington.or.us/">Washington</a><div>
            </td>
          </tr>
        <?php 
        } else if ($city === 'Milwaukie') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://multco.us/">Multnomah</a></div>
              <div><a href="https://www.clackamas.us/">Clackamas</a><div>
            </td>
          </tr>
        <?php 
        } else if ($city === 'Salem') { ?>
          <tr class="cityDataPointRow">
            <td class="cityData cityDataDesc">County</td>
            <td class="cityData">
              <div class="cityDataPointOfMany"><a href="https://www.co.marion.or.us/">Marion</a></div>
              <div><a href="https://www.co.polk.or.us/">Polk</a><div>
            </td>
          </tr>
        <?php
        }
        ?> 
			</table>
		</main>

		<?php if ($city === 'Seattle') { ?>
      <div class="SeattleFFImage">
        <p class="PopsicleText">Where in Seattle is this popsicle's location?</p>
        <img class="PopsicleSculpture" src="/images/popsiclesculpture.JPG" alt="Giant red popsicle located in the city of Seattle">
      </div>

      <div id="imageAnswer">
        <button id="popsicleImageAnswer">Answer</button>
      </div>

      <script src="/js/popsicleanswer.js" defer></script>
    <?php } ?>

<?php
  }

  // 4. Release returned data
  mysqli_free_result($result);

  // link to footer
  footerTemp();
?>