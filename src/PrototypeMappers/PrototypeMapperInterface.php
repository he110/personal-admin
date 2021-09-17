<?php

declare(strict_types=1);

namespace App\PrototypeMappers;

use Google\Protobuf\Internal\Message;

interface PrototypeMapperInterface
{
    public function createFrom(Message $message);
    public function mapMessageTo(Message $message, $target);
}
