<?php 
$route = Yii::$app->controller->getRoute();
?>
<?php if ($route === 'site/index'): ?>
    <div id="hero" class="carousel slide carousel-fade" data-ride="carousel">
        <img src="/images/scroll-arrow.svg" alt="Scroll down" class="scroll" />

        <div class="container">
            <ol class="carousel-indicators">
                <li data-target="#hero" data-slide-to="0" class="active"></li>
                <li data-target="#hero" data-slide-to="1"></li>
                <li data-target="#hero" data-slide-to="2"></li>
            </ol>
        </div>

        <div class="carousel-inner">
            <div class="item active" style="background-image: url(/images/hero-1.jpg)">
                <div class="container">
                    <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                        <div class="col-md-9">
                            <span class="title">Action, Adventure, Fantasy</span>
                            <h1>End of the World: Part II</h1>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum.</p>
                            <div class="buttons">
                                <span class="certificate">
                                    PG
                                </span>
                                <a href="https://youtu.be/RhFMIRuHAL4" data-vbtype="video" class="venobox btn btn-default">
                                    <i class="material-icons">play_arrow</i>
                                    <span>Play trailer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(/images/hero-2.jpg)">

                <div class="container">
                    <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                        <div class="col-md-9">
                            <span class="title">Action, Adventure, Fantasy</span>
                            <h1>End of the World: Part II</h1>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamu.</p>
                            <div class="buttons">
                                <span class="certificate">
                                    15
                                </span>
                                <a href="https://youtu.be/RhFMIRuHAL4" data-vbtype="video" class="venobox btn btn-default">
                                    <i class="material-icons">play_arrow</i>
                                    <span>Play trailer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url(/images/hero-3.jpg)">

                <div class="container">
                    <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                        <div class="col-md-9">
                            <span class="title">Action, Adventure, Fantasy</span>
                            <h1>End of the World: Part II</h1>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum.</p>
                            <div class="buttons">
                                <span class="certificate">
                                    PG
                                </span>
                                <a href="https://youtu.be/RhFMIRuHAL4" data-vbtype="video" class="venobox btn btn-default">
                                    <i class="material-icons">play_arrow</i>
                                    <span>Play trailer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div id="content_hero" style="background-image: url(/images/hero-contact.jpg)">
            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                </div>
            </div>
        </div>
    <?php endif ?>
