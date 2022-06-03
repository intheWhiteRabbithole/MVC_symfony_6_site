<?php

namespace App\Entity;

use App\Repository\Category1Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: Category1Repository::class)]
class Category1
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\ManyToMany(targetEntity: Article1::class, mappedBy: 'category1')]
    private $article1s;

    public function __construct()
    {
        $this->article1s = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    /**
     * @return Collection<int, Article1>
     */
    public function getArticle1s(): Collection
    {
        return $this->article1s;
    }

    public function addArticle1(Article1 $article1): self
    {
        if (!$this->article1s->contains($article1)) {
            $this->article1s[] = $article1;
            $article1->addCategory1($this);
        }

        return $this;
    }

    public function removeArticle1(Article1 $article1): self
    {
        if ($this->article1s->removeElement($article1)) {
            $article1->removeCategory1($this);
        }

        return $this;
    }
}
