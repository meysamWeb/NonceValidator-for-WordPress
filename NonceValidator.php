<?php

namespace MeysamWeb;

class NonceValidator {
	/**
	 * @param string $nonce_name
	 * @param string $error_message
	 */
	public static function validate(string $nonce_name, string $error_message): void {
		if ( ! isset( $_POST[$nonce_name] ) || ! wp_verify_nonce( $_POST[$nonce_name] ) ) {
			wp_send_json(
				[
					'error'   => true,
					'message' => $error_message,
				], 403
			);
			die();
		}
	}
}