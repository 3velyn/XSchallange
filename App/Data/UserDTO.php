<?php

namespace App\Data;


class UserDTO
{
    private const EMAIL_MIN_LENGTH = 5;
    private const EMAIL_MAX_LENGTH = 100;
    private const EMAIL_REGEX = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i';

    private const PASSWORD_MIN_LENGTH = 5;
    private const PASSWORD_MAX_LENGTH = PHP_INT_MAX;

    private const NAME_MIN_LENGTH = 3;
    private const NAME_MAX_LENGTH = 20;
    private const NAME_REGEX = '/^[A-Za-z]+$/';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $active;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserDTO
     */
    public function setId(int $id): UserDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserDTO
     * @throws \Exception
     */
    public function setEmail(string $email): UserDTO
    {
        DTOValidator::validateLength(self::EMAIL_MIN_LENGTH, self::EMAIL_MAX_LENGTH,
            $email, "Email");
        DTOValidator::validate(self::EMAIL_REGEX, $email, "Email address");
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserDTO
     * @throws \Exception
     */
    public function setPassword(string $password): UserDTO
    {
        DTOValidator::validateLength(self::PASSWORD_MIN_LENGTH, self::PASSWORD_MAX_LENGTH,
            $password, "Password");
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return UserDTO
     * @throws \Exception
     */
    public function setFirstName(string $firstName): UserDTO
    {
        DTOValidator::validateLength(self::NAME_MIN_LENGTH, self::NAME_MAX_LENGTH,
            $firstName, "First name");
        DTOValidator::validate(self::NAME_REGEX, $firstName, "first name");
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return UserDTO
     * @throws \Exception
     */
    public function setLastName(string $lastName): UserDTO
    {
        DTOValidator::validateLength(self::NAME_MIN_LENGTH, self::NAME_MAX_LENGTH,
            $lastName, "Last name");
        DTOValidator::validate(self::NAME_REGEX, $lastName, "last name");
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $active
     * @return UserDTO
     */
    public function setActive($active): UserDTO
    {
        $this->active = $active;
        return $this;
    }

}