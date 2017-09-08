    <?php wp_footer(); ?>
    </main>
    <footer>
        <section aria-labelledby="last-cta__title" class=" bloc last-cta<?= (($_SERVER['REQUEST_URI'] == '/') || ($_SERVER['REQUEST_URI'] == '/projets/')) ? ' last-cta--travels' : ' last-cta--projects'; ?>">
            <h2 id="last-cta__title" role="heading" aria-level="2" class="page-title last-cta__title"><?= (($_SERVER['REQUEST_URI'] == '/') || ($_SERVER['REQUEST_URI'] == '/projets/')) ? __('Voyager avec nous', 'fr') . '&nbsp;?' : __('En savoir plus sur nos projets', 'fr') . '&nbsp;?'; ?></h2>
            <p class="last-cta__content">
			    <?= (($_SERVER['REQUEST_URI'] == '/') || ($_SERVER['REQUEST_URI'] == '/projets/')) ? __('Vous avez envie de découvrir de nouveaux horizons, rencontrer des personnes chaleureuses et participer à un de nos projets sur le terrain', 'fr') . '&nbsp;?' : __('Pour en savoir plus sur tous nos projets, n’hésitez pas à parcourir la page qui en contient une liste complète.', 'fr'); ?>
            </p>
            <a class="btn last-cta__btn" href="<?= (($_SERVER['REQUEST_URI'] == '/') || ($_SERVER['REQUEST_URI'] == '/projets/')) ? '/projets/voyages' : '/projets'; ?>">
			    <?= (($_SERVER['REQUEST_URI'] == '/') || ($_SERVER['REQUEST_URI'] == '/projets/')) ?  __('Voir tous les voyages', 'fr') : __('Voir nos projets', 'fr'); ?>
            </a>
        </section>
        <div class="footer__main-part bloc">
            <div class="wrap footer__main-part__container">
                <section aria-labelledby="footer__item__title3" class="footer__item">
                    <h2 id="footer__item__title3" role="heading" aria-level="2" class="footer__item__title"><?= __('Nos partenaires', 'fr'); ?></h2>
                    <a class="partner-logo" title="Aller sur le site de La Fondation Roi Baudouin" href="https://www.kbs-frb.be"><img width="280" height="123" src="<?php ec_asset( 'images/logo/fond-roi-baud.svg' ); ?>" alt="Logo de la Fondation Roi Baudouin"></a>
                    <a class="partner-logo" title="Aller sur le site de La Fédération Wallonie-Bruxelles" href="http://www.federation-wallonie-bruxelles.be/"><img width="280" height="62" src="<?php ec_asset( 'images/logo/fed-wal-bru.svg' ); ?>" alt="Logo de la Fédération Wallonie-Bruxelles"></a>
                </section>
                <section aria-labelledby="footer__item__title1" class="footer__item">
                    <h2 id="footer__item__title1" role="heading" aria-level="2" class="footer__item__title"><?= __('Nous contacter', 'fr'); ?></h2>
                    <p class=address">
                        <span itemprop="name" class="p-name address__part">Mariam Faso ASBL</span>
                        <span  itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <span itemprop="streetAddress" class="p-street-address address__part">Rue de la gare, 15</span>
                            <span class="address__part"><span itemprop="postalCode" class="p-postal-code">6600</span> <span itemprop="addressLocality" class="p-locality">Bastogne</span></span>
                        </span>
                        
                    </p>
                    <p>
                        <span itemprop="email"><a class="u-email link" href="mailto:info@mariam-faso.be">info@mariam-faso.be</a></span>
                    </p>
                    <p itemprop="telephone">
                        <a class="p-tel link" href="tel: +32479215744">+32 (0) 479 21 57 44</a>
                    </p>
                </section>
                <section aria-labelledby="footer__item__title2" class="footer__item">
                    <h2 id="footer__item__title2" role="heading" aria-level="2" class="footer__item__title"><?= __('Nous aider', 'fr'); ?></h2>
                    <p>
                        <?= __('Les dons peuvent vous apporter une déduction fiscale', 'fr'); ?> <span class="bold">(<?= __('Belgique', 'fr'); ?>)</span> <?= __('à partir de', 'fr'); ?> <span class="bold">40 €</span>.
                    </p>
                    <p>
                        <a class="dons-btn" href="/dons"><?= __('Faire un don', 'fr'); ?></a>
                    </p>
                </section>
                <section aria-labelledby="footer__item__title4" class="footer__item">
                    <h2 id="footer__item__title4" role="heading" aria-level="2" class="footer__item__title"><?= __('Nous Suivre', 'fr'); ?></h2>
                    <a class="social-logo u-url" title="Aller sur notre page Facebook" href="https://www.facebook.com/MariamFaso/"><img width="50" height="50" src="<?php ec_asset( 'images/logo/fb.svg' ); ?>" alt="Logo Facebook"></a>
                    <meta itemprop="url" content="https://www.facebook.com/MariamFaso/">
                </section>
            </div>
        </div>
        <div class="footer__copyright-part">
            <p>
                &copy; 2017 <a class="link" href="http://eric-closquet.be">Eric Clsoquet</a>
            </p>
        </div>
    </footer>
    </body>
</html>
