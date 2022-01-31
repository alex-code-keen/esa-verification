<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.css" />
  <link rel="stylesheet" href="js/nav/nav.css">
</head>
<body>
  <div class="container-fluid main-wrapper">
    <header class="header header--shadow">
      <a href="#" class="left-menu-logo"></a>
      <div id="menu" class="menu left-menu sidenav sidenav-fixed"></div>
    </header>

    <main class="main">
      <div id="dashboard-wrapper" class="container-fluid dashboard-wrapper">
        <!-- SIDEBAR TOGGLE -->
        <!-- <a href="#" class="openLeftMenu hide-on-med-and-down"></a> -->

        <!-- PROFILE SECTION -->
        <section id="esa-section" class="tab-section esa-section">
          <div class="row header-block header-block--wider">
						<div class="header-block__container">
							<h3 class="header-block__title">My ESA Documents</h3>
						</div>
					</div>
          <div></div> 
        </section>
      </div>
    </main>
  </div>

  <script src="js/min-jquery.js"></script>
  <!-- <script src="js/materialize.min.js"></script> -->
  <!-- <script src="js/main.js"></script> -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <script src="js/main_test_new_api.js"></script> -->
  <script>
    // let selectedId = <?php echo $selectedId; ?>;
    let selectedId = 1;
  </script>
  <script src="js/nav/nav.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </body>
</html>