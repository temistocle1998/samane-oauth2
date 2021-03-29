<?php
class EncryptableFieldEntity
{
    protected $hashOptions = ['cost' => 11];

    protected function encryptField($value)
    {
        return password_hash(
            $value, PASSWORD_BCRYPT, $this->hashOptions);
    }

    protected function verifyEncryptedFieldValue($encryptedValue, $value)
    {
        return password_verify($value, $encryptedValue);
    }
}
