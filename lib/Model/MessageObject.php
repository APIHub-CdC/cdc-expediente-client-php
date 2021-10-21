<?php

namespace CdcExpediente\Client\Model;

use \ArrayAccess;
use \CdcExpediente\Client\ObjectSerializer;

class MessageObject implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'MessageObject';
    
    protected static $apihubTypes = [
        'accepted' => 'bool',
        'message' => 'string'
    ];
    
    protected static $apihubFormats = [
        'accepted' => null,
        'message' => null
    ];
    
    public static function apihubTypes()
    {
        return self::$apihubTypes;
    }
    
    public static function apihubFormats()
    {
        return self::$apihubFormats;
    }
    
    protected static $attributeMap = [
        'accepted' => 'accepted',
        'message' => 'message'
    ];
    
    protected static $setters = [
        'accepted' => 'setAccepted',
        'message' => 'setMessage'
    ];
    
    protected static $getters = [
        'accepted' => 'getAccepted',
        'message' => 'getMessage'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$apihubModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['accepted'] = isset($data['accepted']) ? $data['accepted'] : null;
        $this->container['message'] = isset($data['message']) ? $data['message'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['accepted'] === null) {
            $invalidProperties[] = "'accepted' can't be null";
        }
        if ($this->container['message'] === null) {
            $invalidProperties[] = "'message' can't be null";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getAccepted()
    {
        return $this->container['accepted'];
    }
    
    public function setAccepted($accepted)
    {
        $this->container['accepted'] = $accepted;
        return $this;
    }
    
    public function getMessage()
    {
        return $this->container['message'];
    }
    
    public function setMessage($message)
    {
        $this->container['message'] = $message;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
