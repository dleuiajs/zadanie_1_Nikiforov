<?php
function generateBanner()
{
    $imgs = glob("assets/img/banner/*jpg");
    $data = json_decode(file_get_contents("assets/data/banner.json"), true);
    $texth1 = $data["text_h1_banner"];
    $texth3 = $data["text_h3_banner"];
    $textp = $data["text_p_banner"];

    // pre každý obrázok pridame tlačidlo
    echo '    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">';
    for ($i = 0; $i < count($imgs); $i++) {
        echo '<li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="' . $i . '"';
        if ($i == 0) { // ak je to prvý prvok
            echo ' class="active"'; // pridame class active
        }
        echo '></li>';
    }
    echo '</ol>
     <div class="carousel-inner">';

    $i = 0;
    foreach ($imgs as $img) {
        $i++;
        echo '<div class="carousel-item';
        if ($i == 1) { // ak je to prvý prvok
            echo ' active'; // pridame class active
        }
        echo '">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="' . $img . '" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success">' . $texth1[basename($img)] . '</h1>
                                <h3 class="h2">' . $texth3[basename($img)] . '</h3>
                                <p>' . $textp[basename($img)] . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
    echo '</div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
    </div>';
}
?>