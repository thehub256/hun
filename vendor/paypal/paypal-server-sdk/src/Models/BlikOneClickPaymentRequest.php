<?php

declare(strict_types=1);

/*
 * PaypalServerSdkLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace PaypalServerSdkLib\Models;

use stdClass;

/**
 * Information used to pay using BLIK one-click flow.
 */
class BlikOneClickPaymentRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $authCode;

    /**
     * @var string
     */
    private $consumerReference;

    /**
     * @var string|null
     */
    private $aliasLabel;

    /**
     * @var string|null
     */
    private $aliasKey;

    /**
     * @param string $consumerReference
     */
    public function __construct(string $consumerReference)
    {
        $this->consumerReference = $consumerReference;
    }

    /**
     * Returns Auth Code.
     * The 6-digit code used to authenticate a consumer within BLIK.
     */
    public function getAuthCode(): ?string
    {
        return $this->authCode;
    }

    /**
     * Sets Auth Code.
     * The 6-digit code used to authenticate a consumer within BLIK.
     *
     * @maps auth_code
     */
    public function setAuthCode(?string $authCode): void
    {
        $this->authCode = $authCode;
    }

    /**
     * Returns Consumer Reference.
     * The merchant generated, unique reference serving as a primary identifier for accounts connected
     * between Blik and a merchant.
     */
    public function getConsumerReference(): string
    {
        return $this->consumerReference;
    }

    /**
     * Sets Consumer Reference.
     * The merchant generated, unique reference serving as a primary identifier for accounts connected
     * between Blik and a merchant.
     *
     * @required
     * @maps consumer_reference
     */
    public function setConsumerReference(string $consumerReference): void
    {
        $this->consumerReference = $consumerReference;
    }

    /**
     * Returns Alias Label.
     * A bank defined identifier used as a display name to allow the payer to differentiate between
     * multiple registered bank accounts.
     */
    public function getAliasLabel(): ?string
    {
        return $this->aliasLabel;
    }

    /**
     * Sets Alias Label.
     * A bank defined identifier used as a display name to allow the payer to differentiate between
     * multiple registered bank accounts.
     *
     * @maps alias_label
     */
    public function setAliasLabel(?string $aliasLabel): void
    {
        $this->aliasLabel = $aliasLabel;
    }

    /**
     * Returns Alias Key.
     * A Blik-defined identifier for a specific Blik-enabled bank account that is associated with a given
     * merchant. Used only in conjunction with a Consumer Reference.
     */
    public function getAliasKey(): ?string
    {
        return $this->aliasKey;
    }

    /**
     * Sets Alias Key.
     * A Blik-defined identifier for a specific Blik-enabled bank account that is associated with a given
     * merchant. Used only in conjunction with a Consumer Reference.
     *
     * @maps alias_key
     */
    public function setAliasKey(?string $aliasKey): void
    {
        $this->aliasKey = $aliasKey;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->authCode)) {
            $json['auth_code']      = $this->authCode;
        }
        $json['consumer_reference'] = $this->consumerReference;
        if (isset($this->aliasLabel)) {
            $json['alias_label']    = $this->aliasLabel;
        }
        if (isset($this->aliasKey)) {
            $json['alias_key']      = $this->aliasKey;
        }

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}