<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
    $_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
    Confirm_Login(); 
?>
<?php
    if (isset($_GET["id"])) {
        $MovieId = $_GET["id"];
        $ConnectingDB;
        $sql = "SELECT *
                FROM movies
                WHERE id='$MovieId'";
        $stmt = $ConnectingDB->query($sql);

        while ($DataRows = $stmt->fetch()) {
            $Title = $DataRows["title"];
        }
    } elseif (isset($_GET['SerieId'])) {
        $SerieId = $_GET["SerieId"];
        $ConnectingDB;
        $sql = "SELECT *
                FROM series
                WHERE id='$SerieId'";
        $stmt = $ConnectingDB->query($sql);

        while ($DataRows = $stmt->fetch()) {
            $Title = $DataRows["title"];
        }
    }
    

?>


<!DOCTYPE html>
<html>

    <head>
        <title><?php echo htmlentities($Title); ?></title>
        
        <!--Header-->
        <?php require_once("Includes/header.php"); ?>
        <!--End Header-->

      <section class="page-container">
        <section class="content-wrap">
            <section class="container">

              
                <section style="padding: 15px 0; background-color: rgba(100, 100, 100, 0.842); border-radius: 5px;">
                        <p class="movie_title"><?php echo htmlentities($Title); ?></p>
                    </section>
              
              <section class="player-watch">
                
              <br><br>
              <div style="text-align: center">
                  <video controls id="video" height="auto" width="100%">
                      <source src="videos/<?php echo htmlentities($Title . '/' . $Title); ?> HD.mp4" type="video/mp4" id="videosrc">
                  </video>
                  <div style="text-align: center; margin-top: 75px;">
                    <div style="display: inline-block; margin: 10px">
                        <a class="botaoplayer" id="sd">SD Resolution</a>
                    </div>
                    <div style="display: inline-block; margin: 10px">
                        <a class="botaoplayer" id="hd">HD Resolution</a>
                    </div>
                  </div>
                  <script>
                      
                      var mudar_sd = document.getElementById("sd");
                      var mudar_hd = document.getElementById("hd");
                      var video = document.getElementById("video");
                      var source = document.getElementById("videosrc");
      
                      function play_sd() {
      
                      source.setAttribute("src", "videos/<?php echo htmlentities($Title . '/' . $Title); ?> SD.mp4");
                      video.load();
                      }
      
                      function play_hd() {
      
                      source.setAttribute("src", "videos/<?php echo htmlentities($Title . '/' . $Title); ?> HD.mp4");
                      video.load();
      
                      }
      
                      mudar_sd.addEventListener("click", play_sd);
                      mudar_hd.addEventListener("click", play_hd);
          
                  </script>
              </div>
              <!--Footer-->

          <?php require_once("Includes/footer.php"); ?>

    </body>

</html>