<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Events
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Events\V1\Schema;

use Twilio\Exceptions\TwilioException;
use Twilio\Version;
use Twilio\InstanceContext;


class SchemaVersionContext extends InstanceContext
    {
    /**
     * Initialize the SchemaVersionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $id The unique identifier of the schema. Each schema can have multiple versions, that share the same id.
     * @param int $schemaVersion The version of the schema
     */
    public function __construct(
        Version $version,
        $id,
        $schemaVersion
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'id' =>
            $id,
        'schemaVersion' =>
            $schemaVersion,
        ];

        $this->uri = '/Schemas/' . \rawurlencode($id)
        .'/Versions/' . \rawurlencode($schemaVersion)
        .'';
    }

    /**
     * Fetch the SchemaVersionInstance
     *
     * @return SchemaVersionInstance Fetched SchemaVersionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): SchemaVersionInstance
    {

        $payload = $this->version->fetch('GET', $this->uri, [], []);

        return new SchemaVersionInstance(
            $this->version,
            $payload,
            $this->solution['id'],
            $this->solution['schemaVersion']
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Events.V1.SchemaVersionContext ' . \implode(' ', $context) . ']';
    }
}