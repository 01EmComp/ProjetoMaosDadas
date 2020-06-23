<?php

namespace Classes;

class StrValidator
{
    function __construct()
    {
        $this->valor = "";
        $this->valid = true;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }
    public function isNumber()
    {
        if ((is_numeric($this->valor)) && ($this->valid)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        return $this;
    }
    public function min($size)
    {
        if ((strlen($this->valor) > $size) && ($this->valid)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        return $this;
    }
    public function max($size)
    {
        if ((strlen($this->valor) < $size) && ($this->valid)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        return $this;
    }
    public function exactSize($size)
    {
        if ((strlen($this->valor) == $size) && ($this->valid)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        return $this;
    }
    public function email()
    {
        if ((strpos($this->valor,'.com'))&&(strpos($this->valor,'@')) && ($this->valid)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        return $this;
    }
    public function tel()
    {
        if ((strpos($this->valor,'+55'))&&(strlen($this->valor)==14) && ($this->valid)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        return $this;
    }
    
    public function required()
    {
        if ((!empty($this->valor)) && ($this->valid)) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        return $this;
    }
    public function isValid()
    {
        return $this->valid;
    }
}
