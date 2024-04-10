<?php

namespace Khannedy\BelajarPhpPsr;

class ProductController
{
    public function __construct(public ProductService $productService)
    {
    }
}
