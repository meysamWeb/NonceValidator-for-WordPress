# NonceValidator for WordPress

## Overview

**NonceValidator** is a robust PHP class designed to enhance the security of your WordPress applications by validating nonces. Nonces are a key part of WordPress security, used to protect URLs and forms from being misused in cross-site request forgery (CSRF) attacks. This class provides a simple yet effective method to validate nonces and ensure the integrity of your forms and requests.

## Features

- **Simple Integration**: Easy to integrate into any WordPress plugin or theme.
- **Effective Security**: Validates nonces to protect against CSRF attacks.
- **Customizable Error Handling**: Allows custom error messages to be specified for better user experience.

## Installation

1. **Requirements**: Ensure your server is running PHP version 8.0 or above.
2. **Download**: Clone or download the repository.
3. **Include**: Include the `NonceValidator.php` file in your WordPress plugin or theme.

## Usage

To use the `NonceValidator` class, call the `validate` method with the appropriate parameters. Below is an example of how to integrate it into your code.

### Example

```php
<?php

namespace MeysamWeb;

class NonceValidator {
	/**
	 * Validate a nonce.
	 *
	 * @param string $nonce_name The name of the nonce field to validate.
	 * @param string $error_message The error message to return if validation fails.
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
```
## How to Use

Below is an example of how to use the `NonceValidator` class in a typical WordPress form handling scenario.

#### Form Handling Example
```php
<?php

use MeysamWeb\NonceValidator;

// Validate nonce in a form submission
NonceValidator::validate( 'nonce', 'Access is not allowed' );

// Continue processing form data if nonce is valid
// Your form processing code here

```

### Applicable Models

The `NonceValidator` class can be effectively utilized in various scenarios within WordPress, such as:

* Form Submissions: Validate nonces in form submissions to ensure the request is legitimate.
* AJAX Requests: Protect AJAX endpoints by validating nonces in the request data.
* URL Protection: Validate nonces in URLs to prevent unauthorized access and CSRF attacks.

## Contributing

Contributions are welcome! If you have suggestions for improvements or have found a bug, please open an issue or submit a pull request. Make sure to follow the contributing guidelines.

## License
This project is licensed under the MIT License.

## Contact
For questions or support, please contact [MeysamWeb](https://github.com/meysamweb).