<?php

namespace App\Entity;

use App\Repository\Article1Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Article1Repository::class)]
class Article1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\ManyToMany(targetEntity: Category1::class, inversedBy: 'article1s')]
    private $category1;

    #[ORM\ManyToOne(targetEntity: User1::class, inversedBy: 'article1s')]
    #[ORM\JoinColumn(nullable: false)]
    private $author1;

    public function __construct()
    {
        $this->category1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Category1>
     */
    public function getCategory1(): Collection
    {
        return $this->category1;
    }

    public function addCategory1(Category1 $category1): self
    {
        if (!$this->category1->contains($category1)) {
            $this->category1[] = $category1;
        }

        return $this;
    }

    public function removeCategory1(Category1 $category1): self
    {
        $this->category1->removeElement($category1);

        return $this;
    }

    public function getAuthor1(): ?User1
    {
        return $this->author1;
    }

    public function setAuthor1(?User1 $author1): self
    {
        $this->author1 = $author1;

        return $this;
    }
}
