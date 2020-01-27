<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoItemRepository")
 */
class TodoItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TodoList", inversedBy="items")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $list;

    /**
     * @ORM\Column(type="boolean")
     */
    private $complete = false;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * TodoItem constructor.
     *
     * @param string $description
     * @param bool $complete
     */
    public function __construct(
        string $description,
        ?bool $complete = false
    ) {
        $this->description = $description;
        $this->complete = $complete;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return TodoItem
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return TodoList|null
     */
    public function getList(): ?TodoList
    {
        return $this->list;
    }

    /**
     * @param TodoList|null $list
     *
     * @return TodoItem
     */
    public function setList(?TodoList $list): self
    {
        $this->list = $list;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     *
     * @return TodoItem
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return bool
     */
    public function isComplete()
    {
        return $this->complete;
    }

    /**
     * @param bool $complete
     *
     * @return TodoItem
     */
    public function setComplete($complete): self
    {
        $this->complete = $complete;

        return $this;
    }
}
