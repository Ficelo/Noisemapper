    <?php session_start();?>
    <?php include('./header.php'); ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NoiseMapper</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./RESSOURCES/CSS/bandeaux.css" />
        <link rel="stylesheet" href="./RESSOURCES/CSS/index.css" />
        
        <script src="./RESSOURCES/JAVASCRIPT/formButton.js"></script>

    </head>
    <body>
        <section class="banderole">
            <div class="Top_evenements">
                <H2>Top Évènements</H2>
            </div>
        </section>
        
        <section class="slider">
            <img src="RESSOURCES/IMAGES/1.jpg" alt="img1" class="img__slider active" />
            <img src="RESSOURCES/IMAGES/2.jpg" alt="img2" class="img__slider" />
            <img src="RESSOURCES/IMAGES/3.jpg" alt="img3" class="img__slider" />
            <img src="RESSOURCES/IMAGES/4.jpg" alt="img3" class="img__slider" />
            <img src="RESSOURCES/IMAGES/5.jpg" alt="img3" class="img__slider" />
            <img src="RESSOURCES/IMAGES/6.jpg" alt="img3" class="img__slider" />

            <div class="suivant">
                <i class="fas fa-chevron-circle-right"></i>
            </div>
            <div class="precedent">
                <i class="fas fa-chevron-circle-left"></i>
            </div>
        </section>
        <script src="RESSOURCES/JAVASCRIPT/app.js"></script>

        <section class="banderole" id="cal">
            <div class="Top_evenements">
                <H2>Calendrier des Évènements</H2>
            </div>
        </section>

    <section>
    </form>



    <div class="dateconcert">  <!-- Supposons que ce code soit dans votre fichier HTML, par exemple, index.php -->


    <form action="index.php#cal"  method="post">
        <label for="selectConcert">Sélectionnez une date :</label>
        <select id="selectConcert" name="selectConcert">
            <?php
            // Inclure le fichier de configuration de la base de données
            include('./db.php');

            // Requête pour récupérer les dates des concerts
            $sql = "SELECT DISTINCT Date FROM concert";
            $result = $conn->query($sql);

            // Vérifier s'il y a des résultats
            if ($result->num_rows > 0) {
                // Parcourir les résultats et ajouter des options à la liste déroulante
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Date"] . "'>" . $row["Date"] . "</option>";
                }
            } else {
                echo "<option value=''>Aucun concert disponible</option>";
            }

            // Fermer la connexion
            $conn->close();
            ?>

            
        </select>
        <input type="submit" value="Choisir cette date">
    </form>

    <?php
        // trier par ordre alphabétique
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectConcert = document.getElementById('selectConcert');
        var concertOptions = Array.from(selectConcert.options);

        concertOptions.sort(function(a, b) {
        var textA = a.text.toUpperCase();
        var textB = b.text.toUpperCase();
        return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
        });

        concertOptions.forEach(function(option) {
        selectConcert.add(option);
        });
    });


    </script>

    </div>
    </div>
    </div>  
    </section>
                <div class="tableauconcert">
                <?php
                    include ("afficherConcerts.php")
                ?>
                </div>
    </form>


        <section class="banderole">
            <div class="Top_evenements">
                <H2>Note des Concerts</H2>
            </div>

            <form id="ratingForm">

        </section>

        <?php
    include('db.php');



    // Sélectionne les données nécessaires de la table Concert
    $sql = "SELECT idConcert, Nom FROM Concert";

    // Exécute la requête SQL
    $result = $conn->query($sql);

    // Vérifie si des données ont été récupérées avec succès
    if ($result->num_rows > 0) {
        // Initialise le tableau pour stocker les données
        $concerts = array();

        // Parcourt les données et les stocke dans le tableau
        while($row = $result->fetch_assoc()) {
            $concerts[] = $row;
        }
    } else {
        // Si aucune donnée n'est disponible, renvoie un tableau vide
        echo json_encode(array());
    }

    // Ferme la connexion à la base de données
    $conn->close();
    ?>


    </form>

    <section>

    </section>



        </div>    

    
        <section>
        <form action="votreScriptDeTraitement.php" method="post">
            <label for="selectConcert">Choisissez un concert :</label>
            <select id="selectConcert" name="selectConcert">
                <?php
                // Inclure le fichier de configuration de la base de données
                include('./db.php');

                // Requête pour récupérer les noms des concerts
                $sql = "SELECT Nom FROM concert";
                $result = $conn->query($sql);

                // Vérifier s'il y a des résultats
                if ($result->num_rows > 0) {
                    // Parcourir les résultats et ajouter des options à la liste déroulante
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["Nom"] . "'>" . $row["Nom"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Aucun concert disponible</option>";
                }

                // Fermer la connexion
                $conn->close();
                ?>
            </select>
            <input type="submit" value="Attribuer une note">
        </form>
    </div>
    </div>
        

    </body>
        
    <?php include('./footer.php'); ?>

    </html>

