<?php

declare(strict_types=1);

namespace PhpGuild\DoctrineExtraBundle\EventSubscriber\DoctrineClassMetadata;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;
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
     */
    public function onFlush(OnFlushEventArgs $eventArgs): void
    {
        $entityManager = $eventArgs->getEntityManager();
        $unitOfWork = $entityManager->getUnitOfWork();

        foreach ($unitOfWork->getScheduledEntityInsertions() as $entity) {
            if (!$entity instanceof PositionInterface || 0 !== $entity->getPosition()) {
                continue;
            }
            
            $currentPosition = (int) $entityManager->getRepository(get_class($entity))
                ->createQueryBuilder('e')
                ->select(sprintf('MAX(e.%s)', PositionInterface::POSITION_FIELD_NAME))
                ->getQuery()
                ->getSingleScalarResult()
            ;

            $entity->setPosition($currentPosition + 1);

            $unitOfWork->recomputeSingleEntityChangeSet($entityManager->getClassMetadata(get_class($entity)), $entity);
        }
    }
}
