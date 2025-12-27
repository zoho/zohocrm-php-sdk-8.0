<?php
namespace com\zoho\api\authenticator\store;

use com\zoho\crm\api\util\Constants;

class DBBuilder
{
    private $userName = Constants::MYSQL_USER_NAME;
    private $portNumber = Constants::MYSQL_PORT_NUMBER;
    private $password = "";
    private $host = Constants::MYSQL_HOST;
    private $databaseName = Constants::MYSQL_DATABASE_NAME;
    private $tableName = Constants::MYSQL_TABLE_NAME;
    private $key = null;
    private $certificate = null;
    private $caCertificate = null;
    private $caPath = null;
    private $cipherAlgos = null;

    public function userName(string $userName)
    {
        if($userName != null)
        {
            $this->userName = $userName;
        }
        return $this;
    }

    public function portNumber(string $portNumber)
    {
        if($portNumber != null)
        {
            $this->portNumber = $portNumber;
        }
        return $this;
    }

    public function password(string $password)
    {
        if($password != null)
        {
            $this->password = $password;
        }
        return $this;
    }

    public function host(string $host)
    {
        if($host != null)
        {
            $this->host = $host;
        }
        return $this;
    }

    public function databaseName(string $databaseName)
    {
        if($databaseName != null)
        {
            $this->databaseName = $databaseName;
        }
        return $this;
    }

    public function tableName(string $tableName)
    {
        if($tableName != null)
        {
            $this->tableName = $tableName;
        }
        return $this;
    }

    public function key(string $key)
    {
        if($key != null)
        {
            $this->key = $key;
        }
        return $this;
    }

    public function certificate(string $certificate)
    {
        if($certificate != null)
        {
            $this->certificate = $certificate;
        }
        return $this;
    }

    public function caCertificate(string $caCertificate)
    {
        if($caCertificate != null)
        {
            $this->caCertificate = $caCertificate;
        }
        return $this;
    }

    public function caPath(string $caPath)
    {
        if($caPath != null)
        {
            $this->caPath = $caPath;
        }
        return $this;
    }

    public function cipherAlgos(string $cipherAlgos)
    {
        if($cipherAlgos != null)
        {
            $this->cipherAlgos = $cipherAlgos;
        }
        return $this;
    }

    public function build()
    {
        $class = new \ReflectionClass(DBStore::class);
        $constructor = $class->getConstructor();
        $constructor->setAccessible(true);
        $object = $class->newInstanceWithoutConstructor();
        $constructor->invoke($object, $this->host, $this->databaseName, $this->tableName, $this->userName, $this->password, $this->portNumber, $this->key, $this->certificate, $this->caCertificate, $this->caPath, $this->cipherAlgos);
        return $object;
    }
}
?>