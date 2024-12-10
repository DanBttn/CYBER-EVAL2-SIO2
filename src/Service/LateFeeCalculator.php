<?php

namespace App\Service;

class LateFeeCalculator
{
    public function calculateLateFee(\DateTime $dueDate, \DateTime $returnDate): float
    {
        if ($returnDate <= $dueDate) {
            return 0.0;
        }

        $daysLate = $returnDate->diff($dueDate)->days;

        return $daysLate * 0.5;
    }
}