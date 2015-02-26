<?php

namespace TestBundle\Tests\Adjustment\CriterionType;

use Monolog\Logger;
use PHPUnit_Framework_MockObject_MockObject;
use TestBundle\Adjustment\ActionType\ProductCategoryOrderItemCurrencyActionType;
use TestBundle\Adjustment\CriterionType\ProductCategoryCriterionType;
use TestBundle\Entity\AdjustmentRuleAction;
use TestBundle\Entity\AdjustmentRuleActionValue;
use TestBundle\Entity\AdjustmentRuleCriterion;
use TestBundle\Entity\OrderItem;
use TestBundle\Entity\Product;
use TestBundle\Entity\ProductCategory;
use TestBundle\Entity\ProductProductCategory;
use TestBundle\Entity\ProductVariant;
use TestBundle\Entity\Order;
use TestBundle\Repository\BaseRepository;
use TestBundle\Repository\ProductCategoryStructureRepository;
use TestBundle\Service\TypeService;
use TestBundle\Tests\BaseTestCase;

class ProductCategoryOrderItemCurrencyActionTypeTest extends BaseTestCase
{
    /** @var ProductCategoryOrderItemCurrencyActionType */
    private $criterionType;
    /** @var AdjustmentRuleAction */
    private $adjustmentRuleAction;
    /** @var PHPUnit_Framework_MockObject_MockObject|ProductCategoryStructureRepository */
    private $mProductCategoryStructureRepository;
    /** @var PHPUnit_Framework_MockObject_MockObject|BaseRepository */
    private $mAdjustmentResultRepository;
    /** @var Order */
    private $order;

    public function setUp()
    {
        parent::setUp();

        $this->mProductCategoryStructureRepository = $this->getMockEntityRepository('ProductCategoryStructure');
        $this->mAdjustmentResultRepository = $this->getMockEntityRepository('AdjustmentResult', ['persist', 'flush']);

        $logger = new Logger('productCategoryCriterionTypeTestLogger');
        $this->criterionType = new ProductCategoryOrderItemCurrencyActionType(
            new TypeService($this->getMockEntityManager()),
            $this->mProductCategoryStructureRepository,
            $this->mAdjustmentResultRepository
        );

        $this->adjustmentRuleAction = new AdjustmentRuleAction();
        $adjustmentRuleActionValue = new AdjustmentRuleActionValue();
        $adjustmentRuleActionValue->setValue(5.00);
        $this->adjustmentRuleAction->setAdjustmentRuleActionValue($adjustmentRuleActionValue);

        $this->adjustmentRuleAction->addProductCategory(new ProductCategory(ProductCategory::CORPORATE));
    }

    /** @test */
    public function evaluate_true()
    {
        $this->packageProductInOrder(new ProductCategory(ProductCategory::CORPORATE));

        $this->mAdjustmentResultRepository
            ->expects($this->once())
            ->method('persist');

        $this->mAdjustmentResultRepository
            ->expects($this->once())
            ->method('flush');

        $this->criterionType->apply($this->adjustmentRuleAction, $this->order);
    }

    /** @test */
    public function evaluate_false()
    {
        $this->packageProductInOrder();

        $this->mAdjustmentResultRepository
            ->expects($this->never())
            ->method('persist');

        $this->mAdjustmentResultRepository
            ->expects($this->never())
            ->method('flush');

        $this->criterionType->apply($this->adjustmentRuleAction, $this->order);
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
