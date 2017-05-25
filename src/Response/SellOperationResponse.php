<?php
/**
 * Created by PhpStorm.
 * User: sitdikov
 * Date: 25.05.17
 * Time: 16:07
 */

namespace SSitdikov\ATOL\Response;


class SellOperationResponse implements ResponseInterface
{

    const SELL_STATUS_WAIT = 'wait';
    const SELL_STATUS_DONE = 'done';
    const SELL_STATUS_FAIL = 'fail';

    /**
     * @var string
     */
    private $uuid = '';

    /**
     * @var string
     */
    private $timestamp = '';

    /**
     * @var string
     */
    private $status = self::SELL_STATUS_WAIT;

    /**
     * @var null | ErrorResponse
     */
    private $error;

    public function __construct(\stdClass $json)
    {
        $this->uuid = $json->uuid;
        $this->timestamp = $json->timestamp;
        $this->status = $json->status;
        $this->error = $json->error ? new ErrorResponse($json->error) : null;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return null|ErrorResponse
     */
    public function getError()
    {
        return $this->error;
    }


}