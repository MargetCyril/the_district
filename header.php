
<header class="bg-color">

            <nav class="navbar navbar-expand-sm">
                <img src="images_the_district/the_district_brand/logo_transparent.png" title="logo transparent"
                    class="navbar-brand">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="index.php" title="Acceuil" class="nav-link header">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a href="categorie.php" title="Catégorie" class="nav-link header">Catégorie</a>
                        </li>
                        <li class="nav-item">
                            <a href="plats.php" title="Plats" class="nav-link header">Plats</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" title="Contact" class="nav-link header">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="basilic">
                <div class="search">
                    <?php
                    if ($titre == "Acceuil") {
                    echo '<form method="post" action="">';
                    echo    '<label for="recherche"></label>';
                    echo    '<input type="text" name="recherche" id="recherche" placeholder="recherche...">';
                    echo '</form>';
                    }
                    else {
                    echo '<div class="page">';
                    echo $titre;
                    echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </header>
