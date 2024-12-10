<?php

namespace App\Tests\Unit;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{

    public function testBookValide() : void
    {
        $book = new Book();
        $book->setTitle('Ratatouille');
            $book->setIsbn('9780316769488');
                $book->setPublishedAt(new \DateTime('1964-07-16'));

      $this->assertEquals('Ratatouille', $book->getTitle());
      $this->assertEquals('9780316769488', $book->getIsbn());
        $this->assertEquals(new \DateTime('1964-07-16'), $book->getPublishedAt());
    }

    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
}
