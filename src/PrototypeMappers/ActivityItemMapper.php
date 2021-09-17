<?php

declare(strict_types=1);

namespace App\PrototypeMappers;

use App\Entity\ActivityItem;
use Generated\PrototypeActivityItem;
use Google\Protobuf\Internal\Message;

class ActivityItemMapper implements PrototypeMapperInterface
{
    /**
     * @param PrototypeActivityItem $message
     *
     * @return ActivityItem
     */
    public function createFrom(Message $message): ActivityItem
    {
        $item = new ActivityItem();
        return $this->mapMessageTo($message, $item);
    }

    /**
     * @param PrototypeActivityItem $message
     * @param ActivityItem $target
     *
     * @return ActivityItem
     */
    public function mapMessageTo(Message $message, $target): ActivityItem
    {
        return $target->setId($message->getId())
            ->setTitle($message->getTitle())
            ->setDescription($message->getDescription())
            ->setType($message->getType())
            ->setImageUrl($message->getImageUrl())
            ->setLabels($message->getLabels())
            ->setLink($message->getLink());
    }
}
