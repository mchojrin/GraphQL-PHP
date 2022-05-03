<?php

namespace Model;

use Country;

class User
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId(string $id): User
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
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
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
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getBirthday(): DateTimeImmutable
    {
        return $this->birthday;
    }

    /**
     * @param DateTimeImmutable $birthday
     * @return User
     */
    public function setBirthday(DateTimeImmutable $birthday): User
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return User
     */
    public function setGender(string $gender): User
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     * @return User
     */
    public function setCountry(Country $country): User
    {
        $this->country = $country;
        return $this;
    }

    private string $id;
    private string $name;
    private string $email;
    private DateTimeImmutable $birthday;
    private string $gender;
    private Country $country;

    public function __construct(string $id, string $name, string $email, \DateTimeImmutable $birthday, string $gender, Country $country)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setEmail($email)
            ->setBirthday($birthday)
            ->setGender($gender)
            ->setCountry($country);
    }

    /**
     * @param string $id
     * @return User|null
     */
    public static function findById(string $id) : ?User
    {
        return new self(
            $id,
            'Mauro',
            'mauro.chojrin@leewayweb.com',
            new \DateTimeImmutable('1977-12-22'),
            'Male',
            new Country(uniqid(), "Spain")
        );
    }
}