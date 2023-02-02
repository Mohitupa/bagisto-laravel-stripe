<?php
return [
    'paypal_smart_button' => [
        'code'             => 'paypal_smart_button',
        'title'            => 'PayPal Smart Button',
        'description'      => 'PayPal',
        'client_id'        => 'AW1DPb643cciZycmuNEIAJvtN8wgpd9ysc3EZrgDTpbTFXhBCRb9VbKap2AHnAbvxZLG7is0JTVZaxLI',
        'class'            => 'Webkul\Paypal\Payment\SmartButton',
        'sandbox'          => true,
        'active'           => true,
        'sort'             => 0,
    ],

    'paypal_standard' => [
        'code'             => 'paypal_standard',
        'title'            => 'PayPal Standard',
        'description'      => 'PayPal Standard',
        'class'            => 'Webkul\Paypal\Payment\Standard',
        'sandbox'          => true,
        'active'           => true,
        'business_account' => 'test@webkul.com',
        'sort'             => 3,
    ],
];