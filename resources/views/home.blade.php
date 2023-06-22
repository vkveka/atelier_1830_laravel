@extends('layouts.app')

@section('content')
    <div class="row justify-content-center gutter_row">

        <!-- **************** HEADER **************** -->
        <header>
            <div class="container text_header">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Atelier 1830</h1>
                        <h4>Tapissière en décors</h4>
                    </div>
                </div>
            </div>


            <!-- **************** CARROUSSEL **************** -->

            <div class="marquee">
                <ul class="marquee-content">
                    <li><img src="./images/default_picture1.jpg" alt=""></li>
                    <li><img src="./images/default_picture2.jpg" alt=""></li>
                    <li><img src="./images/default_picture3.jpg" alt=""></li>
                    <li><img src="./images/default_picture4.jpg" alt=""></li>
                    <li><img src="./images/default_picture5.jpg" alt=""></li>
                    <li><img src="./images/default_picture6.jpg" alt=""></li>
                    <li><img src="./images/default_picture8.jpg" alt=""></li>
                    <li><img src="./images/default_picture9.jpg" alt=""></li>
                </ul>
            </div>

            <div class="container bloc_l1">
                <div class="row text-center">
                    <h1>Qui sommes-nous</h1>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-5 col-lg-4 text-center">
                        <div class="article_header">
                            <h3>Mon Entreprise</h3>
                            <p>Atelier 1830 est une entreprise qui dédie son activité à la tapisserie en décoration. Le
                                savoir-faire artisanal de cette enseigne révèle une qualité de travail remarquable.
                                Fidèle,
                                l'atelier ne manque pas de satisfaire ses clients par sa précision et son application.
                            </p>
                            <a><img src="./images/IMG_header/coussin_bnw_header.jpeg"
                                    alt="coussin noir et blanc" id="img1"></a>
                        </div>
                        {{-- <div class="img_header_tab">
                            <a href=""><img src="./images/IMG_header/coussin_bnw_header.jpeg"
                                    alt="coussin noir et blanc"></a>
                        </div> --}}
                    </div>
                    <div class="col-md-6 mt-5 col-lg-4 text-center">
                        <div class="article_header">
                            <h3>Les activités de l'atelier</h3>
                            <p>Passionné, l'atelier confectionne dans les règles de l'art des rideaux, voilages, housses
                                pour canapé, chaises, coussins ; des stores bateau, des galettes de mousses etc...<br>
                                Chaque client propose ses idées accompagnées des éléments essentiels à la bonne
                                conception
                                du produit (tissu, couleurs,... )</p>
                            <a><img src="./images/IMG_header/Draps_header.jpeg"
                                    alt="draps" id="img2"></a>
                        </div>
                        {{-- <div class="img_header_tab">
                            <a target="_blank" href=""><img src="./images/IMG_header/Draps_header.jpeg"
                                    alt="draps"></a>
                        </div> --}}
                    </div>
                    <div class="col-md-6 mt-5 col-lg-4 text-center">
                        <div class="article_header">
                            <h3>Pourquoi 1830 ?</h3>
                            <p>Un peu d'histoire : en 1830, M Barthélémy Thimonnier invente le premier métier à coudre
                                qui
                                peut enchaîner jusqu'à 200 points par minute. Rassurez vous, l'atelier travaille sur une
                                machine un peu plus évoluée et se caractérise par une certaine rapidité d'exécution et
                                une
                                précision toujours plus accrue.</p>
                            <a><img src="./images/IMG_header/machineacoudre_thimonnier_header.jpg"
                                    alt="première machine à coudre" id="img3"></a>
                        </div>
                    </div>
                    <div class="col-md-6 img_mac_header_tab text-center">
                        <img src="./images/machineacoudre_thimonnier.jpg" alt="première machine à coudre">
                    </div>
                </div>
            </div>
        </header>





        <!-- **************** A PROPOS DE VOTRE ARTISAN **************** -->
        <section id="info_artisan">
            <h2>&#192; propos de votre Artisan</h2>
            <div class="container">
                <div class="row bloc text-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="bloc_info">
                            <h3>Son Parcours</h3>
                            <p>Formée par des maîtres d'apprentissage très exigeants, je suis diplômée du CFA <strong>La
                                    Bonne Graine</strong> à Paris et ai obtenu mon CAP en alternance au sein de la
                                capitale.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="bloc_info">
                            <h3>Artisan d'Art</h3>
                            <p>Tapissière au savoir-faire artisanal reconnu.</p>
                            <img src="./images/logo-artisan-art.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="row bloc m-1 text-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="bloc_info_loc">
                            <h3>Localistaion</h3>
                            <p>L'atelier se situe à Versailles.<br><strong>78</strong></p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>




            <script>
                const root = document.documentElement;
                const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
                const marqueeContent = document.querySelector("ul.marquee-content");

                root.style.setProperty("--marquee-elements", marqueeContent.children.length);

                for (let i = 0; i < marqueeElementsDisplayed; i++) {
                    marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
                }
            </script>
    </div>
@endsection
