# Doctrine Extra Bundle

## Installation

Install with composer

    composer req phpguild/doctrine-extra-bundle

## Usage

### Models

#### Entity with UUID

Auto generated UUID

    use Doctrine\ORM\Mapping as ORM;
    use PhpGuild\DoctrineExtraBundle\Model\Uuid\UuidInterface;
    use PhpGuild\DoctrineExtraBundle\Model\Uuid\UuidTrait;

    /**
     * Class User
     *
     * @ORM\Entity
     */
    class User implements UuidInterface
    {
        use UuidTrait;
    }

#### Entity with Identity

Auto increment numeric ID

    use Doctrine\ORM\Mapping as ORM;
    use PhpGuild\DoctrineExtraBundle\Model\Identity\IdentityInterface;
    use PhpGuild\DoctrineExtraBundle\Model\Identity\IdentityTrait;

    /**
     * Class User
     *
     * @ORM\Entity
     */
    class User implements IdentityInterface
    {
        use IdentityTrait;
    }

### Filters

#### SofDeletable

        doctrine:
            orm:
                filters:
                    soft_deletable:
                        class: PhpGuild\DoctrineExtraBundle\Doctrine\Filter\SoftDeletableFilter
                        enabled: true

### Doctrine Behaviors

View documentation https://github.com/KnpLabs/DoctrineBehaviors

 * [Blameable](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/blameable.md)
 * [Loggable](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/loggable.md)
 * [Sluggable](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/sluggable.md)
 * [SoftDeletable](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/soft-deletable.md)
 * [Uuidable](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/uuidable.md)
 * [Timestampable](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/timestampable.md)
 * [Translatable](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/translatable.md)
 * [Tree](https://github.com/KnpLabs/DoctrineBehaviors/blob/master/docs/tree.md)
