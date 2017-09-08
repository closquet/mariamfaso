
<section class="contact-section__contact-form-section" aria-labelledby="contact-section__contact-form-section__title">
	<h3 class="contact-section__contact-form-section__title" id="contact__title" role="heading" aria-level="3">
		<?= __('Formulaire de contact', 'fr') ?>
	</h3>
	
	<div class="contact-section__contact-form-section__form-container">
		<form class="contact-section__contact-form-section__form" id="contact-form" method="post" action="/send-contact-form.php" data-parsley-validate>
			<div class="contact-section__contact-form-section__field-container">
				<label class="contact-section__contact-form-section__label" for="nom">Nom :</label>
				<input class="contact-section__contact-form-section__field" type="text" id="nom" name="nom" value="<?= htmlspecialchars($_REQUEST['nom'])?>" aria-required="true" required="">
			</div>
			<div class="contact-section__contact-form-section__field-container">
				<label class="contact-section__contact-form-section__label" for="email">Email :</label>
				<input class="contact-section__contact-form-section__field" type="email" id="email" name="email" value="<?= htmlspecialchars($_REQUEST['email'])?>" aria-required="true" required="">
			</div>
			
			<div class="contact-section__contact-form-section__field-container">
				<label class="contact-section__contact-form-section__label" for="message">Message :</label>
				<textarea class="contact-section__contact-form-section__field" id="message" name="message" cols="30" rows="8" aria-required="true" required=""><?= htmlspecialchars($_REQUEST['message'])?></textarea>
			</div>
			
			<input class="contact-section__contact-form-section__submit" type="submit"  value="Envoyer">
		</form>
		<img class="contact-section__contact-form-section__image" src="<?php ec_asset( 'images/deco/msg-deco.jpg' ); ?>" alt="Un membre de mariam faso entouré de villageois à Lengo" width="562" height="527">
	</div>
</section>