<?php

namespace App\Tests\Service;

use App\Entity\Book;
use App\Entity\Client;
use App\Service\BorrowingManager;
use PHPUnit\Framework\TestCase;

class BorrowingManagerTest extends TestCase
{
    public function testClientWithFiveBooksCannotBorrow(): void
    {
        $client = new Client();
        $manager = new BorrowingManager();

        for ($i = 0; $i < 5; $i++) {
            $borrowedBook = new Book();
            $borrowedBook->setBorrowed(true);
            $client->addBorrow($borrowedBook);}

        $newBook = new Book();
        $newBook->setBorrowed(false);

        $this->assertFalse($manager->canBorrowBook($client, $newBook));
    }


    public function testClientCanBorrowAvailableBook(): void
    {
        $client = new Client();
        $book = new Book();
        $book->setBorrowed(false);

        $manager = new BorrowingManager();
        $this->assertTrue($manager->canBorrowBook($client, $book));
    }

    public function testClientCannotBorrowAlreadyBorrowedBook(): void
    {
        $client = new Client();
        $book = new Book();
        $book->setBorrowed(true);

        $manager = new BorrowingManager();
        $this->assertFalse($manager->canBorrowBook($client, $book));
    }
}
