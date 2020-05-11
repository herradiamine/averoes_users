<?php

declare(strict_types=1);

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;
use InvalidArgumentException;
use TypeError;

/**
 * Class UserProperty
 * @package App\Entities
 */
class UserProperty implements EntityInterface
{
    public const TABLE_NAME = 'user_property';

    public const INT_VALUE    = 'INTEGER';
    public const FLOAT_VALUE  = 'FLOAT';
    public const BOOL_VALUE   = 'BOOLEAN';
    public const STRING_VALUE = 'STRING';
    public const NULL_VALUE   = 'NULL';
    public const OBJECT_VALUE = [
        'user' => User::class,
        'user_email' => UserEmail::class,
        'user_group' => UserGroup::class,
        'user_password' => UserPassword::class,
        'user_property' => UserProperty::class,
        'user_property_value' => UserPropertyValue::class
    ];

    public const LABEL_USER_PROPERTY_ID = 'user_property_id';
    public const LABEL_USER_GROUP_ID    = 'user_group_id';
    public const LABEL_PROPERTY_NAME    = 'property_name';
    public const LABEL_PROPERTY_TYPE    = 'property_type';
    public const LABEL_PROPERTY_ENABLED = 'property_enabled';
    public const LABEL_CREATION_DATE    = 'creation_date';
    public const LABEL_UPDATE_DATE      = 'update_date';

    /** @var int $userPropertyId */
    private int $userPropertyId;

    /** @var int|null $userGroupId */
    private ?int $userGroupId;

    /** @var string $propertyName */
    private string $propertyName;

    /** @var string $propertyType */
    private string $propertyType;

    /** @var bool $propertyEnabled */
    private bool $propertyEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * UserProperty constructor.
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function __construct(array $entityData = [])
    {
        if (!empty($entityData)) {
            $this->initEntity($entityData);
        }
    }

    /**
     * @param array $entityData
     * @codeCoverageIgnore
     */
    public function initEntity(array $entityData): void
    {
        foreach ($entityData as $key => $value) {
            $method = 'set' . EntityHelper::snakeToCamelCase($key, true);
            try {
                $this->{$method}($value);
            } catch (TypeError $error) {
                echo TypeError::class . ' : ' . $error->getMessage();
            } catch (InvalidArgumentException $exception) {
                echo InvalidArgumentException::class . ' : ' . $exception->getMessage();
            }
        }
    }

    /**
     * @codeCoverageIgnore
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $method = 'set' . EntityHelper::snakeToCamelCase($name, true);
        try {
            switch ($method) {
                case 'setUserPropertyId':
                case 'setGroupId':
                    $value = ($value) ? (int) $value : null ;
                    $this->{$method}($value);
                    break;
                case 'setPropertyName':
                case 'setPropertyType':
                    $this->{$method}($value);
                    break;
                case 'setPropertyEnabled':
                    $value = (bool) $value;
                    $this->{$method}($value);
                    break;
                case 'setCreationDate':
                case 'setUpdateDate':
                    if ($value) {
                        $value = DateTimeImmutable::createFromFormat(
                            DATE_W3C,
                            date(DATE_W3C, strtotime($value))
                        );
                    } else {
                        $value = null;
                    }
                    $this->{$method}($value);
                    break;
            }
        } catch (TypeError $error) {
            echo TypeError::class . ' : ' . $error->getMessage();
        } catch (InvalidArgumentException $exception) {
            echo InvalidArgumentException::class . ' : ' . $exception->getMessage();
        }
    }

    /** @return int */
    public function getUserPropertyId(): int
    {
        return $this->userPropertyId;
    }

    /**
     * @param int $userPropertyId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserPropertyId(int $userPropertyId): bool
    {
        if ($userPropertyId) {
            $this->userPropertyId = $userPropertyId;
            return true;
        } else {
            throw new InvalidArgumentException("$userPropertyId is not a valid user password id");
        }
    }

    /** @return int|null */
    public function getUserGroupId(): ?int
    {
        return $this->userGroupId;
    }

    /**
     * @param int|null $userGroupId
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setUserGroupId(int $userGroupId = null): bool
    {
        if ($userGroupId || is_null($userGroupId)) {
            $this->userGroupId = $userGroupId;
            return true;
        } else {
            throw new InvalidArgumentException("$userGroupId is not a valid user group id");
        }
    }

    /** @return string */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * @param string $propertyName
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setPropertyName(string $propertyName): bool
    {
        if ($propertyName != '') {
            $this->propertyName = $propertyName;
            return true;
        } else {
            throw new InvalidArgumentException("$propertyName is not a valid property name");
        }
    }

    /** @return string */
    public function getPropertyType(): string
    {
        return $this->propertyType;
    }

    /**
     * @param string $propertyType
     * @return true
     * @throws InvalidArgumentException|TypeError
     */
    public function setPropertyType(string $propertyType): bool
    {
        if ($propertyType != '') {
            $this->propertyType = $propertyType;
            return true;
        } else {
            throw new InvalidArgumentException("$propertyType is not a valid property type");
        }
    }

    /** @return bool */
    public function isPropertyEnabled(): bool
    {
        return $this->propertyEnabled;
    }

    /**
     * @param bool $propertyEnabled
     * @return void
     * @throws TypeError
     */
    public function setPropertyEnabled(bool $propertyEnabled): void
    {
        $this->propertyEnabled = $propertyEnabled;
    }

    /** @return DateTimeImmutable */
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    /**
     * @param DateTimeImmutable $creationDate
     * @return void
     * @throws TypeError
     */
    public function setCreationDate(DateTimeImmutable $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /** @return DateTimeImmutable|null */
    public function getUpdateDate(): ?DateTimeImmutable
    {
        return $this->updateDate;
    }

    /**
     * @param DateTimeImmutable|null $updateDate
     * @return void
     * @throws TypeError
     */
    public function setUpdateDate(?DateTimeImmutable $updateDate = null): void
    {
        $this->updateDate = $updateDate;
    }
}
