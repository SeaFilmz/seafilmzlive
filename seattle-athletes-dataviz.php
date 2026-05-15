<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Athletes DataViz - SeaFilmz';
  $mDesc = 'List of athletes born is the city of Seattle organized in many different ways.';
  $ogTitle = 'Seattle Athletes DataViz - SeaFilmz';
  $ogURL = 'https://seafilmz.com/seattle-athletes-dataviz';
  $schemaType = 'WebSite';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

		<main>

      <h2 class="SFAthleteDatavizHeader">Athletes Born in Seattle DataViz</h2>

      <h3 class="SFAthleteDatavizTitles">Total Number Athletes per Sport</h3>

			<div class="SportTypeTotal"></div>
      <div class="AthleteTextCenter"><p id="AthleteText" class="AthleteTextClear"></p></div>

			<?php
          //Declare Global Variables
          $city = 'Seattle';
          $job = 'athlete';


          // 2.5 Perform database query
          $query = $newConnection->prepare("SELECT COUNT(*) as total, sport_known_for FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND sport_known_for IS NOT NULL GROUP BY sport_known_for ");

          $query->bind_param("ss", $city, $job);
          $query->execute();

          //Result variable with an error check
          $resultSC = $query->get_result()
            or die("Database query failed.");

          $json_array_sc = array();

            // 3.5 Use returned data (if any)
          while($athletesSC = mysqli_fetch_assoc($resultSC)) {
            $json_array_sc[] = $athletesSC;
            // output data from each row
          }


          // 2.5 Baseball Perform database query
          $query = $newConnection->prepare("SELECT COUNT(*) as total, sport_known_for FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND sport_known_for = ? AND sport_known_for IS NOT NULL GROUP BY sport_known_for ");

          $sport = 'Baseball';
          $query->bind_param("sss", $city, $job, $sport);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3.5 Baseball Use returned data (if any)
          $baseballCount = mysqli_fetch_assoc($result);
            /* output data from each row*/


          // 2.5 Basketball Perform database query
          $query = $newConnection->prepare("SELECT COUNT(*) as total, sport_known_for FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND sport_known_for = ? AND sport_known_for IS NOT NULL GROUP BY sport_known_for ");

          $sport = 'Basketball';
          $query->bind_param("sss", $city, $job, $sport);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3.5 Basketball Use returned data (if any)
          $basketballCount = mysqli_fetch_assoc($result);
            /* output data from each row*/


          // 2.5 Football Perform database query
          $query = $newConnection->prepare("SELECT COUNT(*) as total, sport_known_for FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND sport_known_for = ? AND sport_known_for IS NOT NULL GROUP BY sport_known_for ");

          $sport = 'Football';
          $query->bind_param("sss", $city, $job, $sport);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3.5 Basketball Use returned data (if any)
          $footballCount = mysqli_fetch_assoc($result);
            /* output data from each row*/


          // 2.5 Golf Perform database query
          $query = $newConnection->prepare("SELECT COUNT(*) as total, sport_known_for FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND sport_known_for = ? AND sport_known_for IS NOT NULL GROUP BY sport_known_for ");

          $sport = 'Golf';
          $query->bind_param("sss", $city, $job, $sport);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3.5 Golf Use returned data (if any)
          $golfCount = mysqli_fetch_assoc($result);
            /* output data from each row*/
			?>

			<script type="text/javascript">

        //Convert PHP athlete data variable declared above to JavaScript athlete data variable
        const athletesSCJS = <?php echo json_encode($json_array_sc) ?>;
        const baseballTC = <?php echo json_encode($baseballCount) ?>;
        const basketballTC = <?php echo json_encode($basketballCount) ?>;
        const footballTC = <?php echo json_encode($footballCount) ?>;
        const golfTC = <?php echo json_encode($golfCount) ?>;

        const sportTypeTotalDisplay = document.querySelector(".SportTypeTotal");
        const athleteTextDisplay = document.querySelector("#AthleteText");

        const tableAthleteEnd = '</table>';


				function totalAthletesSport(){
            athleteTextDisplay.innerHTML = "";

            sportTypeTotalDisplay.innerHTML = "";

            function displaySportsTotalGraph(){
              sportTypeTotalDisplay.innerHTML =
                `<div class="Baseball ST"  style="height: ${baseballTC.total * 2}rem;">${baseballTC.total}<br>Baseball</div>`
                + `<div class="Basketball ST" style="height: ${basketballTC.total * 2}rem;">${basketballTC.total}<br>Basketball</div>`
                + `<div class="Football ST" style="height: ${footballTC.total * 2}rem;">${footballTC.total}<br>Football</div>`
                + `<div class="Golf ST" style="height: ${golfTC.total * 2}rem;">${golfTC.total}<br>Golf</div>`;
            }

						displaySportsTotalGraph();


						const tableSportTotalsHeader = '<table class="AthletesTable">' + '<tr>' + '<th class="AthletesColumnHeader1">Sport</th>' + '<th class="AthletesColumnHeader2">Total Number of Athletes per Sport</th>' + '</tr>';

            function displaySportCount(querySCJS){
              const athleteDataC = querySCJS.map(element => '<tr class="AthletesContent">' + '<td class="AthletesNameContent">' + element.sport_known_for + '</td>' + '<td class="SportPlayed">'+ element.total + '</td>' + '</tr>');
              return athleteDataC;
            }

            athleteTextDisplay.innerHTML += tableSportTotalsHeader + displaySportCount(athletesSCJS).join('') + tableAthleteEnd;
          }

        totalAthletesSport();

      </script>

      <?php
        require_once 'queryfunctions/people-functions.php';
        peopleCityBornByJobCount("$city", $job);
      ?>

    </main>

		<style>
        .SportTypeTotal{
          display: flex;
          justify-content: center;
          align-items: flex-end;
          font-size: 1rem;
        }

        .ST{
          text-align: center;
          font-weight: 600;
          border: 5px solid black;
          width: 15%;
          margin: 1rem 0.25rem 0.5rem 0.25rem;
        }
        .Baseball{
          color: white;
          background-color: #551A8B;
        }
        .Basketball{
          color: white;
          background-color: blue;
        }
        .Football{
          color: white;
          background-color: #296700
        }
        .Golf{
          color: white;
          background-color: #7B3F00;
        }


        @media screen
        and (max-width: 35rem) {
          .SportTypeTotal{
            font-size: 0.75rem;
          }
        }

        @media screen
        and (max-width: 26rem) {
          .SportTypeTotal{
            font-size: 0.6rem;
          }
        }
    </style>

    <!--link to footer-->
    <?php
      footerTemp();
    ?>