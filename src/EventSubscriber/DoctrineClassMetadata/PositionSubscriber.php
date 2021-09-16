<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\EventSubscriber\DoctrineClassMetadata;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use PhpGuild\DoctrineExtraBundle\Model\Position\PositionInterface;

/**
 * Class PositionSubscriber.
 */
final class PositionSubscriber implements EventSubscriber
{
    /**
     * getSubscribedEvents
     *
     * @return array
     */
    public function getSubscribedEvents(): array
    {
        return [ Events::onFlush ];
    }

    /**
     * onFlush
     *
     * @param OnFlushEventArgs $eventArgs
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function onFlush(OnFlushEventArgs $eventArgs): void
    {
        $entityManager = $eventArgs->getEntityManager();
        $unitOfWork = $entityManager->getUnitOfWork();

        $nextPosition = null;

        foreach ($unitOfWork->getScheduledEntityInsertions() as $entity) {
            if (!$entity instanceof PositionInterface || null !== $entity->getPosition()) {
                continue;
            }

            $className = \get_class($entity);

            if (null === $nextPosition) {
                $nextPosition = $entityManager->getRepository($className)
                    ->createQueryBuilder('e')
                    ->select(sprintf('MAX(e.%s)', PositionInterface::POSITION_FIELD_NAME))
                    ->getQuery()
                    ->getSingleScalarResult()
                ;
            }

            $nextPosition = null === $nextPosition ? 0 : $nextPosition + 1;
            $entity->setPosition($nextPosition);

            $unitOfWork->recomputeSingleEntityChangeSet($entityManager->getClassMetadata($className), $entity);
        }
    }
}
