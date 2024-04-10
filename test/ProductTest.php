<?php

namespace Khannedy\BelajarPhpPsr;

use DI\Container;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testManual()
    {
        $repository = new ProductRepository();
        $service = new ProductService($repository);
        $controller = new ProductController($service);

        self::assertNotNull($service->productRepository);
        self::assertNotNull($controller->productService);
    }

    public function testDependencyInjection()
    {
        $container = new Container();

        $controller = $container->get(ProductController::class);
        self::assertNotNull($controller);
        self::assertNotNull($controller->productService);
        self::assertNotNull($controller->productService->productRepository);

        $service = $container->get(ProductService::class);
        self::assertNotNull($service);
        self::assertSame($service, $controller->productService);
        self::assertSame($service->productRepository, $controller->productService->productRepository);

        $repository = $container->get(ProductRepository::class);
        self::assertNotNull($repository);
        self::assertSame($repository, $service->productRepository);
    }


}
