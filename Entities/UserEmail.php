<?php

declare(strict_types=1);

namespace Entities;

use Entities\Helpers\EntityHelper;
use Entities\Interfaces\EntityInterface;
use DateTimeImmutable;

/**
 * Class Email
 * @package App\Entities
 */
class UserEmail implements EntityInterface
{
    public const TABLE_NAME = 'user_mail';

    public const LABEL_EMAIL_ID          = 'user_email_id';
    public const LABEL_USER_ID           = 'user_id';
    public const LABEL_USER_EMAIL        = 'user_email';
    public const LABEL_EMAIL_LOCAL_PART  = 'local_part';
    public const LABEL_EMAIL_DOMAIN_NAME = 'domain_name';
    public const LABEL_EMAIL_DOMAIN_EXT  = 'domain_ext';
    public const LABEL_EMAIL_ENABLED     = 'email_enabled';
    public const LABEL_CREATION_DATE     = 'creation_date';
    public const LABEL_UPDATE_DATE       = 'update_date';

    /** @var int $userEmailId */
    private int $userEmailId;

    /** @var int $userId */
    private int $userId;

    /** @var string $userEmail */
    private string $userEmail;

    /** @var string $localPart */
    private string $localPart;

    /** @var string $domainName */
    private string $domainName;

    /** @var string $domainExt */
    private string $domainExt;

    /** @var bool $emailEnabled */
    private bool $emailEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * Email constructor.
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
            $this->{$method}($value);
        }
    }

    /** @return int */
    public function getUserEmailId(): int
    {
        return $this->userEmailId;
    }

    /** @param int $userEmailId */
    public function setUserEmailId(int $userEmailId): void
    {
        $this->userEmailId = $userEmailId;
    }

    /** @return int */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /** @param int $userId */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /** @return string */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /** @param string $userEmail */
    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    /** @return string */
    public function getLocalPart(): string
    {
        return $this->localPart;
    }

    /** @param string $localPart */
    public function setLocalPart(string $localPart): void
    {
        $this->localPart = $localPart;
    }

    /** @return string */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /** @param string $domainName */
    public function setDomainName(string $domainName): void
    {
        $this->domainName = $domainName;
    }

    /** @return string */
    public function getDomainExt(): string
    {
        return $this->domainExt;
    }

    /** @param string $domainExt */
    public function setDomainExt(string $domainExt): void
    {
        $this->domainExt = $domainExt;
    }

    /** @return bool */
    public function isEmailEnabled(): bool
    {
        return $this->emailEnabled;
    }

    /** @param bool $emailEnabled */
    public function setEmailEnabled(bool $emailEnabled): void
    {
        $this->emailEnabled = $emailEnabled;
    }

    /** @return DateTimeImmutable */
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    /** @param DateTimeImmutable $creationDate */
    public function setCreationDate(DateTimeImmutable $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /** @return DateTimeImmutable|null */
    public function getUpdateDate(): ?DateTimeImmutable
    {
        return $this->updateDate;
    }

    /** @param DateTimeImmutable|null $updateDate */
    public function setUpdateDate(DateTimeImmutable $updateDate = null): void
    {
        $this->updateDate = $updateDate;
    }
}
