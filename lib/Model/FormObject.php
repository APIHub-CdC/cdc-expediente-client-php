<?php

namespace CdcExpediente\Client\Model;

use \ArrayAccess;
use \CdcExpediente\Client\ObjectSerializer;

class FormObject implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'FormObject';
    
    protected static $apihubTypes = [
        'nombre_formulario' => 'string',
        'secciones' => '\CdcExpediente\Client\Model\SectionObject[]'
    ];
    
    protected static $apihubFormats = [
        'nombre_formulario' => null,
        'secciones' => null
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
        'nombre_formulario' => 'nombreFormulario',
        'secciones' => 'secciones'
    ];
    
    protected static $setters = [
        'nombre_formulario' => 'setNombreFormulario',
        'secciones' => 'setSecciones'
    ];
    
    protected static $getters = [
        'nombre_formulario' => 'getNombreFormulario',
        'secciones' => 'getSecciones'
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
        $this->container['nombre_formulario'] = isset($data['nombre_formulario']) ? $data['nombre_formulario'] : null;
        $this->container['secciones'] = isset($data['secciones']) ? $data['secciones'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['nombre_formulario'] === null) {
            $invalidProperties[] = "'nombre_formulario' can't be null";
        }
        if ($this->container['secciones'] === null) {
            $invalidProperties[] = "'secciones' can't be null";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getNombreFormulario()
    {
        return $this->container['nombre_formulario'];
    }
    
    public function setNombreFormulario($nombre_formulario)
    {
        $this->container['nombre_formulario'] = $nombre_formulario;
        return $this;
    }
    
    public function getSecciones()
    {
        return $this->container['secciones'];
    }
    
    public function setSecciones($secciones)
    {
        $this->container['secciones'] = $secciones;
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
