<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="App\Repository\TodoListRepository")
 */
class TodoList
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
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TodoItem", mappedBy="list")
     */
    private $items;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * TodoList constructor.
     *
     * @param string $title
     */
    public function __construct(
        ?string $title = ''
    ) {
        $this->title = $title;
        $this->items = new ArrayCollection();
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return TodoList
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param TodoItem $item
     *
     * @return TodoList
     */
    public function addItem(TodoItem $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setList($this);
        }

        return $this;
    }

    /**
     * @param TodoItem $item
     *
     * @return TodoList
     */
    public function removeItem(TodoItem $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            if ($item->getList() === $this) {
                $item->setList(null);
            }
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getItemsCount(): int
    {
        return $this->items->count();
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTime();
    }
}
