<?php

namespace Khannedy\BelajarPhpPsr;

class ProductService
{
    public function __construct(public ProductRepository $productRepository)
    {
    }
}
