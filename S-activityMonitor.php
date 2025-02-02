<?php
// Paths updated
include('./Php/sideBar.php');
include('./Php/session.php');

$user = $_SESSION["username"];
$sql = "SELECT * FROM logs where Username = ?  ORDER BY `Timestamp` DESC";
$stmt =  $pdo_conn->prepare($sql);
$stmt->bindParam(1, $user);
$stmt->execute();
$activites = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ofppt WFS205</title>
  <?php include('styles.php') ?>

  <link rel="stylesheet" href="./assets/css/Ajouter.css">
  <link rel="stylesheet" href="./assets/css/popup.css">


</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- SIDEBAR AND NAVBAR  -->
    <?php include("SIDE&NAV.php") ?>
    <!--  Main CONTENT -->
    <div class="container-fluid d-flex flex-column gap-3">
      <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Surveillance d'Activité</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="./index.php">Accueil</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">Surveillance d'Activité</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">
                <img src="./assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4 active" id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab" aria-controls="pills-account" aria-selected="true">
              <i class="ti ti-user-circle me-2 fs-6"></i>
              <span class="d-none d-md-block">Mes Activités</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button" role="tab" aria-controls="pills-notifications" aria-selected="false" tabindex="-1">
              <i class="ti ti-bell me-2 fs-6"></i>
              <span class="d-none d-md-block">Activités des Autres Utilisateurs</span>
            </button>
          </li>
        </ul>
        <div class="card-body">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
              mes Activités contenue
            </div>
            <div class="tab-pane fade" id="pills-notifications" role="tabpanel" aria-labelledby="pills-notifications-tab" tabindex="0">
                users activities contenue
            </div>
          </div>
        </div>
      </div>



      <!-- footer -->
      <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Copyright By <a href="#" target="_blank" class="pe-1 text-primary text-decoration-underline">WFS205</a> 2023</p>
      </div>
    </div>
  </div>
  </div>
  <?php include('scripts.php') ?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="./assets/js/getGroups.js"></script>
  <script src="./assets/js/popup.js"></script>
  <?php
  if (isset($_GET["ajouter"]) && $_GET["ajouter"] == "true") {
    echo "
    <script>
    iziToast.success({
      title: 'Stagiaire Ajouter',
      message: 'Le Stagiaire été Ajouter avec succès.',
      position:'topRight',
      maxWidth:'400px',
      progressBarColor: 'grey',
      transitionIn: 'fadeInLeft',
      transitionOut: 'fadeOutRight',
  });      
    </script>
  ";
  }
  if (isset($_GET["restoreAvertissement"]) && $_GET["restoreAvertissement"] == "true") {
    echo "
    <script>
    iziToast.success({
      title: 'Avertissement Restoré',
      message: 'Avertissement été Restoré avec succès.',
      position:'topRight',
      maxWidth:'400px',
      progressBarColor: 'grey',
      transitionIn: 'fadeInLeft',
      transitionOut: 'fadeOutRight',
  });      
    </script>
  ";
  }
  if (isset($_GET["restoreStagiaire"]) && $_GET["restoreStagiaire"] == "true") {
    echo "
    <script>
    iziToast.success({
      title: 'Stagiaire Restoré',
      message: 'Stagiaire été Restoré avec succès.',
      position:'topRight',
      maxWidth:'400px',
      progressBarColor: 'grey',
      transitionIn: 'fadeInLeft',
      transitionOut: 'fadeOutRight',
  });      
    </script>
  ";
  }
  if (isset($_GET['error']) && $_GET['error'] === 'true') {
    //echo "<script>alert('An error occurred.');</script>";
    echo "
    <script>
    iziToast.error({
      title: 'Error',
      message: 'An error occurred.',
      position:'topRight',
      maxWidth:'400px',
      progressBarColor: 'grey',
      transitionIn: 'fadeInLeft',
      transitionOut: 'fadeOutRight',
  });      
    </script>
  ";
  }
  if (isset($_GET["deleteDb"]) && $_GET["deleteDb"] == "true") {
    echo "
    <script>
    iziToast.success({
      title: 'Supprimi Database',
      message: 'Supprimi de la base de données avec succès.',
      position:'topRight',
      maxWidth:'400px',
      progressBarColor: 'grey',
      transitionIn: 'fadeInLeft',
      transitionOut: 'fadeOutRight',
  });      
    </script>
  ";
  }
  if (isset($_GET["importDb"]) && $_GET["importDb"] == "true") {
    echo "
    <script>
    iziToast.success({
      title: 'Import Stagaires',
      message: 'Importer les stagaires avec succès.',
      position:'topRight',
      maxWidth:'400px',
      progressBarColor: 'grey',
      transitionIn: 'fadeInLeft',
      transitionOut: 'fadeOutRight',
  });      
    </script>
  ";
  }

  if (isset($_SESSION['import_error'])) {
    echo "<script>alert('" . $_SESSION['import_error'] . "');</script>";

    // Clear the session variable
    unset($_SESSION['import_error']);
  }
  ?>
  <script src="./assets/js/validerAjouterStagiaireProfile.js"></script>
</body>

</html>