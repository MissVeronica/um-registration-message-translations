<?php
/**
 * Template for the message after registration process
 *
 * This template can be overridden by copying it to your-theme/ultimate-member/templates/message.php
 *
 * Call: function parse_shortcode_args()
 *
 * @version 2.6.1
 *
 * @var string $mode
 * @var int    $form_id
 *
 * Source: https://github.com/MissVeronica/um-registration-message-translations
 * Version 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="um <?php echo esc_attr( $this->get_class( $mode ) ); ?> um-<?php echo esc_attr( $form_id ); ?>">

	<div class="um-postmessage">
		<?php

        if ( empty( $this->custom_message )) {

            $role = UM()->roles()->role_data( sanitize_key( $_REQUEST['um_role'] ) );
            if ( ! empty( $role ) && ! empty( $role['status'] ) ) {

                switch( $role['status'] ) {
                    case 'pending':   $message = __( 'Thank you for applying for membership to our site. We will review your details and send you an email letting you know whether your application has been successful or not.', 'ultimate-member' );
                                      break;
                    case 'checkmail': $message = __( 'Thank you for registering. Before you can login we need you to activate your account by clicking the activation link in the email we just sent you.', 'ultimate-member' );
                                      break;
                    default:          $message = '';
                }

                echo $this->convert_user_tags( stripslashes( $message ) );
            }

        } else {
            // translators: %s: The message after registration process based on a role data and user status after registration
			printf( __( '%s', 'ultimate-member' ), $this->custom_message );
		} ?>
	</div>

</div>
