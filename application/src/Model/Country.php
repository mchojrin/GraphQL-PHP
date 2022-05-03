<?php

namespace Model;

class Country
{
    private string $id;
    private string $name;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Country
     */
    public function setId(string $id): Country
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
     * @return Country
     */
    public function setName(string $name): Country
    {
        $this->name = $name;
        return $this;
    }

    public function __construct(string $id, string $name)
    {
        $this
            ->setId($id)
            ->setName($name)
        ;
    }
}