<?php

namespace App\Tests\Unit;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookRelationTest extends KernelTestCase
{

    public function testTitleIsInvalid(): void
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('');
        $book->setIsbn('97803167694888');
        $book->setPublishedAt(new \DateTime('1964-07-16'));

        $errors = $validator->validate($book);

        $this->assertCount(1, $errors);

    }

    public function testIsbnIsInvalid(): void
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('Ratatouille');
        $book->setIsbn('');
        $book->setPublishedAt(new \DateTime('1964-07-16'));

        $errors = $validator->validate($book);

        $this->assertCount(2, $errors);
    }

    public function testWithBlankPublishedAt(): void
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('Ratatouille');
        $book->setIsbn('978-0316769488');

        $errors = $validator->validate($book);

        $this->assertCount(1, $errors);

    }

    public function testWithValidBook()
    {
        self::bootKernel();
        $validator = static ::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('Ratatouille');
        $book->setIsbn('978-0316769488');
        $book->setPublishedAt(new \DateTime('1964-07-16'));

        $errors = $validator->validate($book);

        $this->assertCount(0, $errors);

    }


}