<?php
class ChaptchaImage {
	
	public static $CAPTCHA = null;
	
	public static function createCaptcha() {
		header('Content-Type: image/png');

		// Create the image
		$im = imagecreatetruecolor(110, 30);

		// Create some colors
		$white = imagecolorallocate($im, 200, 200, 200);
		$grey = imagecolorallocate($im, 128, 128, 128);
		$black = imagecolorallocate($im, 0, 0, 0);
		imagefilledrectangle($im, 0, 0, 399, 29, $white);

		// Draw text in 6 length you can modify it as long you need
		$text =  substr(md5(openssl_random_pseudo_bytes(32)), 3, 6);
		// Replace path by your own font path
		$font = 'fonts/TR_Century_Gothic.ttf';

		// Add some shadow to the text
		imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

		// Add the text
		imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

		// Using imagepng() results in clearer text compared with imagejpeg()
		imagepng($im);
		imagedestroy($im);
	}
}

$captcha = new ChaptchaImage();
$captcha::createCaptcha();
?>
