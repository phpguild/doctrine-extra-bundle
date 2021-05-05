<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model\Confirmed;

/**
 * Trait ConfirmedMethodsTrait
 */
trait ConfirmedMethodsTrait
{
    /**
     * isConfirmed
     *
     * @return bool
     */
    public function isConfirmed(): bool
    {
        return null !== $this->confirmedAt;
    }

    /**
     * getConfirmedAt
     *
     * @return \DateTime|null
     */
    public function getConfirmedAt(): ?\DateTime
    {
        return $this->confirmedAt;
    }

    /**
     * setConfirmedAt
     *
     * @param \DateTime|null $confirmedAt
     *
     * @return ConfirmedInterface
     */
    public function setConfirmedAt(?\DateTime $confirmedAt): ConfirmedInterface
    {
        $this->confirmedAt = $confirmedAt;

        return $this;
    }

    /**
     * getConfirmedToken
     *
     * @return string|null
     */
    public function getConfirmedToken(): ?string
    {
        return $this->confirmedToken;
    }

    /**
     * setConfirmedToken
     *
     * @param string|null $confirmedToken
     *
     * @return ConfirmedInterface
     */
    public function setConfirmedToken(?string $confirmedToken): ConfirmedInterface
    {
        $this->confirmedToken = $confirmedToken;

        return $this;
    }
}
