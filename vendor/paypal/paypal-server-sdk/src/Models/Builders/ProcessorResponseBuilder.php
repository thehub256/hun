<?php

declare(strict_types=1);

/*
 * PaypalServerSdkLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace PaypalServerSdkLib\Models\Builders;

use Core\Utils\CoreHelper;
use PaypalServerSdkLib\Models\ProcessorResponse;

/**
 * Builder for model ProcessorResponse
 *
 * @see ProcessorResponse
 */
class ProcessorResponseBuilder
{
    /**
     * @var ProcessorResponse
     */
    private $instance;

    private function __construct(ProcessorResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new processor response Builder object.
     */
    public static function init(): self
    {
        return new self(new ProcessorResponse());
    }

    /**
     * Sets avs code field.
     */
    public function avsCode(?string $value): self
    {
        $this->instance->setAvsCode($value);
        return $this;
    }

    /**
     * Sets cvv code field.
     */
    public function cvvCode(?string $value): self
    {
        $this->instance->setCvvCode($value);
        return $this;
    }

    /**
     * Sets response code field.
     */
    public function responseCode(?string $value): self
    {
        $this->instance->setResponseCode($value);
        return $this;
    }

    /**
     * Sets payment advice code field.
     */
    public function paymentAdviceCode(?string $value): self
    {
        $this->instance->setPaymentAdviceCode($value);
        return $this;
    }

    /**
     * Initializes a new processor response object.
     */
    public function build(): ProcessorResponse
    {
        return CoreHelper::clone($this->instance);
    }
}