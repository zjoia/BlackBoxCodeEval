<?php

namespace TestBundle\Tests\Adjustment\CriterionType;

use Monolog\Logger;
use PHPUnit_Framework_MockObject_MockObject;
use TestBundle\Adjustment\CriterionType\ProductCategoryCriterionType;
use TestBundle\Entity\AdjustmentRuleCriterion;
use TestBundle\Entity\OrderItem;
use TestBundle\Entity\Product;
use TestBundle\Entity\ProductCategory;
use TestBundle\Entity\ProductProductCategory;
use TestBundle\Entity\ProductVariant;
use TestBundle\Entity\Order;
use TestBundle\Repository\ProductCategoryStructureRepository;
use TestBundle\Tests\BaseTestCase;

class ProductCategoryCriterionTypeTest extends BaseTestCase
{
    /** @var ProductCategoryCriterionType */
    private $criterionType;
    /** @var AdjustmentRuleCriterion */
    private $adjustmentRuleCriterion;
    /** @var PHPUnit_Framework_MockObject_MockObject|ProductCategoryStructureRepository */
    private $mProductCategoryStructureRepository;
    /** @var Order */
    private $order;

    public function setUp()
    {
        parent::setUp();

        $this->mProductCategoryStructureRepository = $this->getMockEntityRepository('ProductCategoryStructure');
        $logger = new Logger('productCategoryCriterionTypeTestLogger');
        $this->criterionType = new ProductCategoryCriterionType($this->mProductCategoryStructureRepository, $logger);

        $this->adjustmentRuleCriterion = new AdjustmentRuleCriterion();

        $this->adjustmentRuleCriterion->addProductCategory(new ProductCategory(ProductCategory::CORPORATE));
    }

    /** @test */
    public function evaluate_true()
    {
        $this->packageProductInOrder(new ProductCategory(ProductCategory::CORPORATE));

        $this->assertTrue($this->criterionType->evaluate($this->adjustmentRuleCriterion, $this->order));
    }

    /** @test */
    public function evaluate_false()
    {
        $this->packageProductInOrder();

        $this->assertFalse($this->criterionType->evaluate($this->adjustmentRuleCriterion, $this->order));
    }

    private function packageProductInOrder(ProductCategory $productCategory = null) {
        $this->order = new Order();
        $product = new Product();

        if ($productCategory) {
            $productProductCategory = new ProductProductCategory();
            $productProductCategory->setProductCategory($productCategory);

            $product->addProductProductCategory($productProductCategory);
        }

        $productVariant = new ProductVariant();
        $productVariant->setProduct($product);

        $orderItem = new OrderItem();
        $orderItem->setProductVariant($productVariant);

        $this->order->addOrderItem($orderItem);
    }
}
