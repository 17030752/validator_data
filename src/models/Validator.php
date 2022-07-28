<?php
namespace d17030752\Validator\models;

class Validator
{
    private array $result;
    public function __construct(private $value)
    {
        $this->result = [];
    }
    public function isEmail()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->includeValidationError("Email not valid");

        }return $this;
    }
    public function isUrl()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_URL)) {
            $this->includeValidationError("Url not valid");

        }return $this;
        
    }
    public function contains(array $options){
        if (!is_array($options)) {
            # code...
            throw new Error('Options variable is not an array');
        }
        $contains = false;
        foreach ($options as $option) {
            # code...
            if (str_contains((string) $this->value,(string) $option)) {
                # code...
                $contains =true;
            }
        }
        if (!$contains) {
            # code...
            $this->includeValidationError("Value is not present");
        }return $this;
    }
    public function isDate(){
        if (!strtotime($this->value)) {
            $this->includeValidationError('Date not found');
        }return $this;
    }
    public function isNumber()
    {
        if (!is_numeric($this->value)) {
            $this->includeValidationError("Email not number");

        }return $this;
    }
    public function getErrors()
    {
        return $this->result;
    }
    public function minLength($length)
    {
        if (is_array($this->value)) {
            # code...
            if (count($this->value) < $length) {
                # code...
                $this->includeValidationError("Not minimun length");
            }
        } else if (strlen((string) $this->value) < $length) {
            $this->includeValidationError("Not minimun length");
        }return $this;
    }
    public function includeValidationError($text)
    {
        array_push($this->result, ['text' => $text, 'value' => $this->value]);
    }
}
