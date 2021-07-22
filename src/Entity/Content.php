<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ContentRepository::class)
 * @ORM\Table(name="`con_content`")
 */
class Content
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @groups("cat:read")
     */
    private $id;

    /**
     * @ORM\Column(name="con_title", type="string", length=255)
     * @groups("cat:read")
     */
    private $title;

    /**
     * @ORM\Column(name="con_text", type="text")
     * @groups("cat:read")
     */
    private $text;

    /**
     * @ORM\Column(name="con_rating", type="integer", nullable=true)
     * @groups("cat:read")
     */
    private $rating;

    /**
     * @ORM\Column(name="con_date_start", type="datetime", nullable=true)
     * @groups("cat:read")
     */
    private $dateStart;

    /**
     * @ORM\Column(name="con_date_end", type="datetime", nullable=true)
     * @groups("cat:read")
     */
    private $dateEnd;

    /**
     * @ORM\Column(name="con_created_at", type="datetime")
     * @groups("cat:read")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="con_icon", type="string", length=255, nullable=true)
     * @groups("cat:read")
     */
    private $icon;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="contents")
     * @ORM\JoinColumn(name="con_categorie_id", referencedColumnName="id" ,nullable=false)
     */
    private $categorie;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(?\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
