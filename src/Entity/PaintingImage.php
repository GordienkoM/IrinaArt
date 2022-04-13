<?php

namespace App\Entity;

use App\Repository\PaintingImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaintingImageRepository::class)
 */
class PaintingImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity=Painting::class, inversedBy="images")
     */
    private $painting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getPainting(): ?Painting
    {
        return $this->painting;
    }

    public function setPainting(?Painting $painting): self
    {
        $this->painting = $painting;

        return $this;
    }
}
