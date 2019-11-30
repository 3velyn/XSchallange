<?php


namespace App\Data;


class BookDTO
{
    private const NAME_MIN_LENGTH = 2;
    private const NAME_MAX_LENGTH = 50;
    private const NAME_REGEX = '/^[A-Za-z]+$/';

    private const ISBN_MIN_LENGTH = 17;
    private const ISBN_MAX_LENGTH = 17;
    private const ISBN_REGEX = '/^(\d{1,6})[- ](?1)[- ](?1)-(?1)-(?1)$/';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $isbn;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BookDTO
     */
    public function setId(int $id): BookDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BookDTO
     * @throws \Exception
     */
    public function setName(string $name): BookDTO
    {
        DTOValidator::validateLength(self::NAME_MIN_LENGTH, self::NAME_MAX_LENGTH,
            $name, "Book name");
        DTOValidator::validate(self::NAME_REGEX, $name, "Book name");
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     * @return BookDTO
     * @throws \Exception
     */
    public function setIsbn(string $isbn): BookDTO
    {
        DTOValidator::validateLength(self::ISBN_MIN_LENGTH, self::ISBN_MAX_LENGTH,
            $isbn, "ISBN");
        DTOValidator::validate(self::ISBN_REGEX, $isbn, "ISBN");
        $this->isbn = $isbn;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return BookDTO
     */
    public function setDescription(string $description): BookDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return BookDTO
     */
    public function setImage(string $image): BookDTO
    {
        $this->image = $image;
        return $this;
    }
}