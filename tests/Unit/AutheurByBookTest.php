<?php

namespace App\Tests\Unit;

use App\Entity\Auteur;
use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class AutheurByBookTest extends TestCase
{

    public function testAddBookToAuthor(): void
    {
        $author = new Auteur();
        $author->setName('J.K. Rowling');

        $book1 = new Book();
        $book1->setTitle('Harry Potter and the Sorcerer\'s Stone');
        $book1->setIsbn('9780747532699');
        $book1->setPublishedAt(new \DateTime('1997-06-26'));

        $author->addBook($book1);

        $this->assertCount(1, $author->getBook());
        $this->assertSame($author, $book1->getAuteur());
    }

    public function testRemoveBookFromAuthor(): void
    {
        $author = new Auteur();
        $author->setName('J.K. Rowling');

        $book1 = new Book();
        $book1->setTitle('Harry Potter et le sorcier de pierre');
        $book1->setIsbn('9780747532699');
        $book1->setPublishedAt(new \DateTime('1997-06-26'));

        $book2 = new Book();
        $book2->setTitle('Harry Potter et la Chambre des Secrets');
        $book2->setIsbn('9780747538493');
        $book2->setPublishedAt(new \DateTime('1998-07-02'));

        $author->addBook($book1);
        $author->addBook($book2);

        $author->removeBook($book1);

        $this->assertCount(1, $author->getBook());
        $this->assertNull($book1->getAuteur());
    }


    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
}
