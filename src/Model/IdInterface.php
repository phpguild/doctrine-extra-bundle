<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\Model;

/**
 * Interface IdInterface
 */
interface IdInterface
{
    /** @var string */
    public const ID_FIELD_NAME = 'id';

    /**
     * getId
     *
     * @return mixed
     */
    public function getId();

    /**
     * setId
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function setId($id);
}
