<?php

namespace TestBundle\Service;

class MathService
{
    const MULTIPLY = '*';
    const DIVIDE = '/';
    const PLUS = '+';
    const MINUS = '-';

    private $supportedArithmeticOperators = [
        MathService::MULTIPLY => 'multiply',
        MathService::DIVIDE => 'divide',
        MathService::PLUS => 'add',
        MathService::MINUS => 'subtract',
        MathService::ASSIGN => 'assign'
    ];

    const EQUAL = '==';
    const NOT_EQUAL = '!=';
    const GREATER_THAN = '>';
    const GREATER_THAN_OR_EQUAL = '>=';
    const LESS_THAN = '<=';
    const LESS_THAN_OR_EQUAL = '<=';

    private $supportedComparisonOperators = [
        MathService::EQUAL => 'isEqual',
        MathService::NOT_EQUAL => 'isNotEqual',
        MathService::GREATER_THAN => 'isGreaterThan',
        MathService::GREATER_THAN_OR_EQUAL => 'isGreaterThanOrEqual',
        MathService::LESS_THAN => 'isLessThan',
        MathService::LESS_THAN_OR_EQUAL => 'isLessThanOrEqual'
    ];

    const ASSIGN = '=';

    private $supportedAssignmentOperators = [
        MathService::ASSIGN => 'assign',
    ];


    const ARITHMETIC_OPERATION = 'arithmetic';
    const COMPARISON_OPERATION = 'comparison';
    const ASSIGNMENT_OPERATION = 'assignment';


    /**
     * Determines the type of operation, given the operator
     *
     * @param $operator
     * @return string
     * @throws \Exception
     */
    public function getOperationType($operator)
    {
        $res = '';
        switch(true)
        {
            case array_key_exists($operator, $this->supportedArithmeticOperators):
                $res = MathService::ARITHMETIC_OPERATION; break;
            case array_key_exists($operator, $this->supportedComparisonOperators):
                $res = MathService::COMPARISON_OPERATION; break;
            case array_key_exists($operator, $this->supportedAssignmentOperators):
                $res = MathService::ASSIGNMENT_OPERATION; break;
            default:
                {
                    throw new \Exception('Unknown operator: ' . $operator);
                }
        }
        return $res;
    }

    /**
     * Performs a mathematical operation, given two values and an operator
     *
     * @param $left
     * @param $operator
     * @param $right
     * @return mixed
     * @throws \Exception
     */
    public function evaluate($left, $operator, $right)
    {
        if(array_key_exists($operator, $this->supportedArithmeticOperators) == false )
        {
            throw new \Exception('Invalid arithmetical operator: ' . $operator);
        }
        $functionName = $this->supportedArithmeticOperators[$operator];
        return $this->$functionName($left, $right);
    }

    /**
     * Performs a comparison operation, given two values and an comparison operator
     *
     * @param $left
     * @param $operator
     * @param $right
     * @return bool
     * @throws \Exception
     */
    public function compare($left, $operator, $right)
    {
        if(array_key_exists($operator, $this->supportedComparisonOperators) == false )
        {
            throw new \Exception('Invalid comparison operator: ' . $operator);
        }
        $functionName = $this->supportedComparisonOperators[$operator];
        return $this->$functionName($left, $right);
    }

    /**
     * Assigns the value from right to left
     *
     * @param $left
     * @param $right
     * @return mixed
     */
    public function assign($left, $right)
    {
        /**
         * TODO: just here for completeness sake. we probably dont need it
         * other option would be to pass an object, and the name of the setter, then call setter($left)
         * and return the object
         */

        return $right;
    }

    /**
     * Performs multiplication, given two values
     *
     * @param $left
     * @param $right
     * @return string
     */
    private function multiply($left, $right)
    {
        return bcmul($left, $right);
    }

    /**
     * Performs division, given two values
     *
     * @param $left
     * @param $right
     * @return string
     */
    private function divide($left, $right)
    {
        return bcdiv($left, $right);
    }

    /**
     * Performs addition, given two values
     *
     * @param $left
     * @param $right
     * @return string
     */
    private function add($left, $right)
    {
        return bcadd($left, $right);
    }

    /**
     * Performs subtraction, given two values
     *
     * @param $left
     * @param $right
     * @return string
     */
    private function subtract($left, $right)
    {
        return bcsub($left, $right);
    }

    /**
     * Returns whether two values are equal
     *
     * @param $left
     * @param $right
     * @return bool
     */
    private function isEqual($left, $right)
    {
        return $left == $right;
    }

    /**
     * Returns whether two values are not equal
     *
     * @param $left
     * @param $right
     * @return bool
     */
    private function isNotEqual($left, $right)
    {
        return $left != $right;
    }

    /**
     * Returns whether the left value is greater than the right value
     *
     * @param $left
     * @param $right
     * @return bool
     */
    private function isGreaterThan($left, $right)
    {
        return $left > $right;
    }

    /**
     * Returns whether the left value is greater than or equal to the right value
     *
     * @param $left
     * @param $right
     * @return bool
     */
    private function isGreaterThanOrEqual($left, $right)
    {
        return $left >= $right;
    }

    /**
     * Returns whether the left value is less than the right value
     *
     * @param $left
     * @param $right
     * @return bool
     */
    private function isLessThan($left, $right)
    {
        return $left < $right;
    }

    /**
     * Returns whether the left value is kess than or equal to the right value
     *
     * @param $left
     * @param $right
     * @return bool
     */
    private function isLessThanOrEqual($left, $right)
    {
        return $left <= $right;
    }

    /**
     * Validates a credit card number using Luhn algorithm
     *
     * @param $input
     */
    public function validateLuhn($input)
    {
        if($valid = is_numeric($input))
        {
            $sum = 0;
            $alt = false;

            for($i = strlen($input) - 1; $i >= 0; $i--){
                $n = substr($input, $i, 1);
                if($alt){
                    $n *= 2;
                    if($n > 9) {
                        $n = ($n % 10) +1;
                    }
                }
                $sum += $n;
                $alt = !$alt;
            }

            $valid = ($sum % 10 == 0);
        }

        if (!$valid)
        {
            throw new \InvalidArgumentException("$input is not a valid credit card number");
        }
    }

}
