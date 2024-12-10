<?php
// tests/Service/LateFeeCalculatorTest.php
namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\LateFeeCalculator;

class LateFeeCalculatorTest extends TestCase
{
public function testCalculateLateFee(): void
{
$calculator = new LateFeeCalculator();
$dueDate = new \DateTime('2024-01-01');
$returnDate = new \DateTime('2024-01-04');

$this->assertEquals(1.5, $calculator->calculateLateFee($dueDate, $returnDate));
}

public function testCalculateLateFeeAvantDate(): void
{
$calculator = new LateFeeCalculator();
$dueDate = new \DateTime('2024-01-01');
$returnDate = new \DateTime('2023-12-30');

$this->assertEquals(0.0, $calculator->calculateLateFee($dueDate, $returnDate));
}

public function testCalculateLateFeeOnDueDate(): void
{
$calculator = new LateFeeCalculator();
$dueDate = new \DateTime('2024-01-01');
$returnDate = new \DateTime('2024-01-01');

$this->assertEquals(0.0, $calculator->calculateLateFee($dueDate, $returnDate));
}

public function testCalculateLateFeeAvecTroisJourDeRetard(): void
{
$calculator = new LateFeeCalculator();
$dueDate = new \DateTime('2024-01-01');
$returnDate = new \DateTime('2024-01-04');

$this->assertEquals(1.5, $calculator->calculateLateFee($dueDate, $returnDate));
}
}