<?php
  $db = mysqli_connect('localhost', 'root', '', 'immobilier-db');

    $output ="";
    if (isset($_POST['query'])){
      $search = $_POST['query'];
      $sql = "SELECT * FROM annonce WHERE titre_annonce LIKE '%$search%'";

      $result = mysqli_query($db, $sql);
          
      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $titre = $row['titre_annonce'];
            $image = $row['image_annonce'];
            $description = $row['description_annonce'];
            $superficie = $row['superficie_annonce'];
            $adresse = $row['adresse_annonce'];
            $montant = $row['montant_annonce'];
            $date = $row['date_annonce'];
            $type = $row['type_annonce'];
            $id_annonce = $row['id_annonce'];
            echo "
            
            <div class='card col-3'>
            <img src='assets/img/".$row['image_annonce']."' alt='Ad Image' height='50%'>
            <h5>
               ".$row['titre_annonce']."
            </h5>
            <p>
            ".$row['superficie_annonce']."
            </p>
            <p>
            ".$row['montant_annonce']."
            </p>
            <button type='button' class='btn btn-primary' id='modal' data-toggle='modal'
              data-target='#modal ".$row['id_annonce']."'>Open Modal</button>
            </div>
  

     
      ";}
      
    }
}

?>