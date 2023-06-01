<?php

/* 
TODO : créer 2 card bootstrap avec les produits suivants :
- nom : PC Gamer
- prix : 1200€
- stock : 5
- un bouton "voir le produit" qui redirige vers la page detail_produit.php
$_GET
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="card mx-3" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2020/10/12/15/15/video-game-5649076_640.png" class="card-img-top" alt="PC Gamer">
                <div class="card-body">
                    <h5 class="card-title">PS5</h5>
                    <p class="card-text">Prix : 599 €</p>
                    <p class="card-text">Stock : 12</p>
                    <a href="detail_produit.php?title=PS5&price=599&stock=12" class="btn btn-primary">voir le produit</a>
                </div>
            </div>

            <div class="card mx-3" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2015/01/08/18/25/desk-593327_640.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">PC Gamer</h5>
                    <p class="card-text">Prix : 100 €</p>
                    <p class="card-text">Stock : 5</p>
                    <a href="detail_produit.php?title=PC GAMER&price=100&stock=5" class="btn btn-primary">voir le produit</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>