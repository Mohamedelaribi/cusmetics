<?php
if (isset($_POST['submit'])) {
  $db = mysqli_connect("localhost", "root", "", "immobilier-db");
  if ($db) {
    $titre = $_POST['titre'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $superficie = $_POST['superficie'];
    $adresse = $_POST['adresse'];
    $montant = $_POST['montant'];
    $type = $_POST['type']; 

    // Ajouter les données dans la table
    $sql = "INSERT INTO annonce (titre_annonce ,image_annonce ,description_annonce ,superficie_annonce ,adresse_annonce ,montant_annonce, type_annonce) VALUES ('$titre','$image','$description','$superficie' ,'$adresse','$montant','$type')";
    $query = mysqli_query($db, $sql);
    // Fermer la connexion
    mysqli_close($db);

    header('location:' . $_SERVER['PHP_SELF']);
    die();


  } else {
    echo 'error';
  }
}

if (isset($_POST['modify'])) {
  $db = mysqli_connect('localhost', 'root', '', 'immobilier-db');
  $id = $_POST['idModify'];
  $titre = $_POST['titre'];
  $image = $_POST['image'];
  $description = $_POST['description'];
  $superficie = $_POST['superficie'];
  $adresse = $_POST['adresse'];
  $montant = $_POST['montant'];
  $type = $_POST['type'];

  $sql = "UPDATE annonce SET titre_annonce='$titre', image_annonce='$image', description_annonce='$description', superficie_annonce='$superficie', adresse_annonce='$adresse', montant_annonce='$montant', type_annonce='$type' WHERE id_annonce=$id";

  if (mysqli_query($db, $sql)) {
    echo ("<meta http-equiv='refresh' content='1'>");
  } else {
    echo "Error updating record";
  }
  mysqli_close($db);
}



?>
<?php
if (isset($_POST['delete'])) {
  $db = mysqli_connect('localhost', 'root', '', 'immobilier-db');
  $id = $_POST['idDelete'];
  $sql = "DELETE FROM annonce WHERE id_annonce=$id";

  if (mysqli_query($db, $sql)) {
    echo ("<meta http-equiv='refresh' content='1'>");
  } else {
    echo "Error deleting record";
  }
  mysqli_close($db);
}

?>

<?php

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "immobilier-db");

// Check if the form is submitted
if (isset($_POST['modifier'])) {
  // Get form data
  $id_annonce = $_POST['id_annonce'];
  $titre = $_POST['titre'];
  $image = $_POST['image'];
  $description = $_POST['description'];
  $superficie = $_POST['superficie'];
  $adresse = $_POST['adresse'];
  $montant = $_POST['montant'];
  $type = $_POST['type'];

  // Update the advertisement in the database
  $update_query = "UPDATE annonce SET titre_annonce='$titre', image_annonce='$image', description_annonce='$description', superficie_annonce='$superficie', adresse_annonce='$adresse', montant_annonce='$montant', type_annonce='$type' WHERE id_annonce='$id_annonce'";
  mysqli_query($conn, $update_query);

  // Redirect to the home page
  // echo ("<meta http-equiv='refresh' content='1'>");
}
?>




<!--                    html                        -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Luxury.Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
  <div id="viewAdmin">
    <i class="fa-solid fa-globe"></i>
    <span id="admin">

      Admin
    </span>

  </div>

  <section id="selection">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.html"><span>L</span>uxury<span>.H</span>ome</a></h1>


        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#team">Offers</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <button type="button" id="AddOffer" class="btn btn-outline-warning" data-toggle="modal"
          data-target="#myModal">Add new
          Offer</button>
        <button id="view"><i class="fa-solid fa-eye"></i></button>
        <!-- <button class="view" id="viewAdmin"><i class="fa-solid fa-eye-slash"></i></button> -->

        <!-- Modal -->




      </div>
    </header>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
          <div class="col-xl-6 col-lg-8">
            <h3 class="text">We are team of talented digital marketers</h3>
            <h2> Luxury<span>.</span>Home</h2>
          </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-store-line"></i>
              <h3><a href="">Lorem Ipsum</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line"></i>
              <h3><a href="">Dolor Sitema</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-calendar-todo-line"></i>
              <h3><a href="">Sedare Perspiciatis</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-paint-brush-line"></i>
              <h3><a href="">Magni Dolores</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-database-2-line"></i>
              <h3><a href="">Nemos Enimade</a></h3>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Hero -->

    <main id="main">
      <section id="team" class="team">          
        <div class="section-title">
            <h2>Offers</h2>
            <p>Check Offers</p>
            <input type="text" id="search" placeholder=recherche>
          </div>
        <div class="container flex" id="resultSeach" data-aos="fade-up">



          <!-- Loop through each ad and display a card for it -->
          <?php
          $db = mysqli_connect("localhost", "root", "", "immobilier-db");
          $sql = "SELECT * FROM annonce";
          $result = mysqli_query($db, $sql);

          while ($row = mysqli_fetch_array($result)) {
            $titre = $row['titre_annonce'];
            $image = $row['image_annonce'];
            $description = $row['description_annonce'];
            $superficie = $row['superficie_annonce'];
            $adresse = $row['adresse_annonce'];
            $montant = $row['montant_annonce'];
            $date = $row['date_annonce'];
            $type = $row['type_annonce'];
            $id_annonce = $row['id_annonce'];
            ?>
            <div class="card col-3">
              <img src="assets/img/<?php echo $image; ?>" alt="Ad Image" height="50%">
              <h5>
                <?php echo $titre; ?>
              </h5>
              <p>
                <?php echo $superficie; ?>M²
              </p>
              <p>
                <?php echo $montant; ?>$
              </p>
              <button type="button" class="btn btn-primary" id="modal" data-toggle="modal"
                data-target='#modal<?= $id_annonce; ?>'>Open Modal</button>

              <!-- Modal -->
              <div class="modal" id="modal<?= $id_annonce ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">
                        <?php echo $titre; ?>

                      </h4>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">&times;</span></button>
                    </div>
                    <?php echo $id_annonce; ?>
                    <div class="modal-body">
                      <p>
                        <strong>description:</strong>
                        <?php echo $description; ?>
                      </p>
                      <p><strong>Superficie:</strong>
                        <?php echo $superficie; ?>
                      </p>
                      <p><strong>Adresse:</strong>
                        <?php echo $adresse; ?>
                      </p>
                    </div>
                    <?php echo $date; ?>
                    <div class="modal-footer">
                      <div>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                          data-target="#deleteModal<?= $id_annonce ?>">
                          Supprimer
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal<?= $id_annonce ?>" tabindex="-1" role="dialog"
                          aria-labelledby="deleteModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est définitive.
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <form method="post">
                                  <input type="hidden" name="idDelete" value="<?= $id_annonce ?>">
                                  <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="button" class="btn" data-toggle="modal" data-target="#modifier<?= $id_annonce ?>">
                          Modifier
                        </button>
                        <div class="modal fade" id="modifier<?= $id_annonce ?>" tabindex="-1" role="dialog"
                          aria-labelledby="deleteModalLabel" class="modifierModal" aria-hidden="true">
                          

                          <form method="post" class="formEdit">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">&times;</span></button>
                            <h4 style="display:block;">Edit Offre :</h4>
                            <input type="hidden" name="idModify" value="<?php echo $id_annonce; ?>">
                            <div class="form-group">
                              <label for="titre">Title:</label>
                              <input type="text" class="form-control" id="titre" name="titre"
                                value="<?php echo $titre; ?>">
                            </div>
                            <div class="form-group">
                              <label for="image">Image:</label>
                              <input type="text" class="form-control" id="image" name="image"
                                value="<?php echo $image; ?>">
                            </div>
                            <div class="form-group">
                              <label for="description">Description:</label>
                              <input type="text" class="form-control" id="description" name="description"
                                value="<?php echo $description; ?>">
                            </div>
                            <div class="form-group">
                              <label for="superficie">Surface:</label>
                              <input type="text" class="form-control" id="superficie" name="superficie"
                                value="<?php echo $superficie; ?>">
                            </div>
                            <div class="form-group">
                              <label for="adresse">Address:</label>
                              <input type="text" class="form-control" id="adresse" name="adresse"
                                value="<?php echo $adresse; ?>">
                            </div>
                            <div class="form-group">
                              <label for="montant">Amount:</label>
                              <input type="text" class="form-control" id="montant" name="montant"
                                value="<?php echo $montant; ?>">
                            </div>
                            <div class="form-group">
                              <label for="type">Type:</label>
                              <input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>">
                            </div>
                            <button type="submit" name="modify" class="btn btn-primary active">Modify</button>
                          </form>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>






        </div>
      </section>
      <script>
        document.getElementById("Modifier").onclick = function () {
          console.log("test Modifier");

          document.getElementById("formEdit").style.display = "none";
        }

        var viewlink = document.getElementById("view");

        viewlink.addEventListener("click", function () {
          document.querySelector("body").style.backgroundColor = "white";
          document.querySelector("body").style.color = "white";
          document.getElementById("selection").style.margin = "0px";
          document.getElementById("viewAdmin").style.display = "none";
          document.querySelector("header").style.margin = "0px";
          document.getElementById("AddOffer").style.display = "none";

        });


      </script>
      <style>
        .modifierModal {
          background-color: whitesmoke;
        }
      </style>


      </div>
      <!-- End Offers Section -->
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Services</h2>
            <p>Check our Services</p>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4><a href="">Lorem Ipsum</a></h4>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
              data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Sed ut perspiciatis</a></h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
              data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4><a href="">Magni Dolores</a></h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4><a href="">Nemo Enim</a></h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-slideshow"></i></div>
                <h4><a href="">Dele cardo</a></h4>
                <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-arch"></i></div>
                <h4><a href="">Divera don</a></h4>
                <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Services Section -->
      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="image col-lg-6"
              style=' background-image:
                          url("assets/img/Tonekabon_Villa_in_Mazandaran_Iran_designed_by_Mehrdad_Soheili___Fidar.jpg");' data-aos="fade-right">
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
              <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-receipt"></i>
                <h4>Est labore ad</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
              <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-cube-alt"></i>
                <h4>Harum esse qui</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
              <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-images"></i>
                <h4>Aut occaecati</h4>
                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
              </div>
              <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                <i class="bx bx-shield"></i>
                <h4>Beatae veritatis</h4>
                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Features Section -->

      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

          <div class="row no-gutters">

            <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left"
              data-aos-delay="100">
              <div class="content d-flex flex-column justify-content-center">
                <h3>Voluptatem dignissimos provident quasi</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Duis aute irure dolor in reprehenderit
                </p>
                <div class="row">
                  <div class="col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                      <i class="bi bi-emoji-smile"></i>
                      <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="2"
                        class="purecounter"></span>
                      <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
                    </div>
                  </div>

                  <div class="col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                      <i class="bi bi-journal-richtext"></i>
                      <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="2"
                        class="purecounter"></span>
                      <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan
                      </p>
                    </div>
                  </div>

                  <div class="col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                      <i class="bi bi-clock"></i>
                      <span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="4"
                        class="purecounter"></span>
                      <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate
                        non vel</p>
                    </div>
                  </div>

                  <div class="col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                      <i class="bi bi-award"></i>
                      <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="4"
                        class="purecounter"></span>
                      <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
                    </div>
                  </div>
                </div>
              </div><!-- End .content-->
            </div>
            <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start"
              data-aos="fade-right" data-aos-delay="100"></div>
          </div>

        </div>
      </section><!-- End Counts Section -->





      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </div>

          <div class="row mt-5">

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>

              </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">

              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->
      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section><!-- End Clients Section -->

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6">
              <div class="footer-info">
                <h3>Luxury<span>.</span>Home</h3>
                <p>
                  A108 Adam Street <br>
                  NY 535022, USA<br><br>
                  <strong>Phone:</strong> +1 5589 55488 55<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>

            </div>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Luxury</span></strong>. <span>Home</span> All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://linkden.ma/soulaimaneelbouzdoudi">Maryam </a>Et <a
            href="https://linkden.ma/soulaimaneelbouzdoudi">Soulaimane</a>
        </div>
      </div>
    </footer><!-- End Footer -->

    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></>
        <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </section>
  >

  <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Add new ad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="home.php" method="post">
            <input type="text" name="titre" placeholder="titre" required>
            <input type="file" name="image" placeholder="image" required>
            <input type="text" name="description" placeholder="description" required>
            <input type="number" name="superficie" placeholder="superficie" required>
            <input type="text" name="adresse" placeholder="adresse" required>
            <input type="number" name="montant" placeholder="montant" required>
            <select required name="type">
              <option value="">Select type</option>
              <option value="Location">Location</option>
              <option value="Vente">Vente</option>
            </select>
            <input type="submit" name="submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://kit.fontawesome.com/a602b3a089.js" crossorigin="anonymous"></script>


<script type='text/javascript'>
$(document).ready(function(){
  $('#search').keyup(function(){
    var search = $(this).val();
    $.ajax({
      url: 'search.php',
      method: 'POST',
      data:{query:search},
      success:function(response){
        $('#resultSeach').html(response);
d
      }

    })
  })
})

</script>


</html>