<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Confirmed;

use PhpGuild\DoctrineExtraBundle\Model\IdInterface;

/**
 * Interface ConfirmedInterface
 */
interface ConfirmedInterface
{
    public const CONFIRMED_AT_FIELD_NAME = 'confirmedAt';
    public const CONFIRMED_TOKEN_FIELD_NAME = 'confirmedToken';

    /**
     * isConfirmed
     *
     * @return bool
     */
    public function isConfirmed(): bool;

    /**
     * getConfirmedAt
     *
     * @return \DateTime|null
     */
    public function getConfirmedAt(): ?\DateTime;

    /**
     * setConfirmedAt
     *
     * @param \DateTime|null $confirmedAt
     *
     * @return ConfirmedInterface
     */
    public function setConfirmedAt(?\DateTime $confirmedAt): ConfirmedInterface;

    /**
     * getConfirmedToken
     *
     * @return string|null
     */
    public function getConfirmedToken(): ?string;

    /**
     * setConfirmedToken
     *
     * @param string|null $confirmedToken
     *
     * @return ConfirmedInterface
     */
    public function setConfirmedToken(?string $confirmedToken): ConfirmedInterface;
}
