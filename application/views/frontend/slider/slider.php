<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <?php foreach ($slider as $slide) : ?>
            <div class="single-slider pt-175 pb-258 bg-img" style="background-image:url(assets/images/<?= $slide['slider_gambar']; ?>);">
                <div class="container">
                    <div class="slider-content slider-animated-1">
                        <h3 class="animated"><?= $slide['slider_judul']; ?></h3>
                        <h5 class="animated"><?= $slide['slider_ket']; ?></h5>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
