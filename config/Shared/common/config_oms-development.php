<?php

use Spryker\Shared\DummyPayment\DummyPaymentConfig;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Oms\OmsConstants;
use Spryker\Shared\Sales\SalesConstants;

// ----------------------------------------------------------------------------
// ------------------------------ OMS -----------------------------------------
// ----------------------------------------------------------------------------

$config[KernelConstants::DEPENDENCY_INJECTOR_YVES] = [
    'CheckoutPage' => [
        'DummyPayment',
    ],
];
$config[KernelConstants::DEPENDENCY_INJECTOR_ZED] = [
    'Payment' => [
        'DummyPayment',
    ],
    'Oms' => [
        'DummyPayment',
    ],
];

$config[OmsConstants::ACTIVE_PROCESSES] = array_merge([
    'DummyPayment01',
], $config[OmsConstants::ACTIVE_PROCESSES]);

$config[SalesConstants::PAYMENT_METHOD_STATEMACHINE_MAPPING] = array_replace(
    $config[SalesConstants::PAYMENT_METHOD_STATEMACHINE_MAPPING],
    [
    DummyPaymentConfig::PAYMENT_METHOD_INVOICE => 'DummyPayment01',
    DummyPaymentConfig::PAYMENT_METHOD_CREDIT_CARD => 'DummyPayment01',
    ]
);
