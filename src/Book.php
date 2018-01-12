<?php
namespace Src;

/**
 * Book Classes
 */
class Book {

    /**
     * Book list array
     * @var array
     */
    protected $books;

    /**
     * Initial books
     * @param array $books
     */
    public function __construct($books = []) {
        $this->books = $books;
    }

    /**
     * Add array book
     * @param array $newBook
     */
    public function add($newBook) {
        $this->books[] = $newBook;
        return $this;
    }

    /**
     * Get all book
     * @return array
     */
    public function find() {
        return $this->books;
    }

    /**
     * Get one book by id
     * @param  integer $id
     * @return array
     */
    public function findOne($id) {
        $book = array_merge(array_filter($this->books, function($book) use($id) {
            return $book['id'] == $id;
        }));
        return count($book) > 0 ? $book[0] : (object)[];
    }

    /**
     * Delete spesifik book
     * @param  integer $id
     * @return Book
     */
    public function delete($id) {
        array_splice($this->books, array_search($id, array_column($this->books, 'id')), 1);
        return $this;
    }

    /**
     * Update spesifik book
     * @param  integer $id
     * @param  array $book
     * @return Book
     */
    public function update($id, $book) {
        $key = array_search($id, array_column($this->books, 'id'));
        $this->books[$key] = array_merge(['id' => $id], $book);
        return $this;
    }
}