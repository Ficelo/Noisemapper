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
</head>
<body>
    <section class="banderole">
        <div class="Top_evenements">
            <H2>Top Évènements</H2>
    
        </div>
    </section>

    <script src="RESSOURCES/JAVASCIPT/app.js"></script>
    
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
    <script src="app.js"></script>

    <section class="banderole">
        <div class="Top_evenements">
            <H2>Calendrier des Évènements</H2>
        </div>
    </section>


    <section class="banderole">
        <div class="Top_evenements">
            <H2>Note des Concerts</H2>
        </div>
    </section>
    
    <?php include('./footer.php'); ?>
</section>
    
</body>



</html>
