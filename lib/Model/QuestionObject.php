<?php

namespace CdcExpediente\Client\Model;

use \ArrayAccess;
use \CdcExpediente\Client\ObjectSerializer;

class QuestionObject implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'QuestionObject';
    
    protected static $apihubTypes = [
        'pregunta' => 'string',
        'respuesta' => 'string'
    ];
    
    protected static $apihubFormats = [
        'pregunta' => null,
        'respuesta' => null
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
        'pregunta' => 'pregunta',
        'respuesta' => 'respuesta'
    ];
    
    protected static $setters = [
        'pregunta' => 'setPregunta',
        'respuesta' => 'setRespuesta'
    ];
    
    protected static $getters = [
        'pregunta' => 'getPregunta',
        'respuesta' => 'getRespuesta'
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
        $this->container['pregunta'] = isset($data['pregunta']) ? $data['pregunta'] : null;
        $this->container['respuesta'] = isset($data['respuesta']) ? $data['respuesta'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['pregunta'] === null) {
            $invalidProperties[] = "'pregunta' can't be null";
        }
        if ($this->container['respuesta'] === null) {
            $invalidProperties[] = "'respuesta' can't be null";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getPregunta()
    {
        return $this->container['pregunta'];
    }
    
    public function setPregunta($pregunta)
    {
        $this->container['pregunta'] = $pregunta;
        return $this;
    }
    
    public function getRespuesta()
    {
        return $this->container['respuesta'];
    }
    
    public function setRespuesta($respuesta)
    {
        $this->container['respuesta'] = $respuesta;
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
