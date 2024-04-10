<?php

namespace Khannedy\BelajarPhpPsr;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    public function testSave()
    {
        $logger = new Logger("belajar-php-psr");

        $streamHandler = new StreamHandler("php://stdout");
        $streamHandler->setFormatter(new JsonFormatter());
        $logger->pushHandler($streamHandler);

        $userService = new UserService($logger);
        $userService->save("Eko");

        self::assertNotNull($logger);
    }


}
