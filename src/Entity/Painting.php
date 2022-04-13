<?php

namespace App\Entity;

use App\Repository\PaintingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaintingRepository::class)
 */
class Painting
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_en;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $discription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_en;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gallery_image;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_original;

    /**
     * @ORM\Column(type="integer")
     */
    private $price_original;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price_original_sale;

    /**
     * @ORM\Column(type="integer")
     */
    private $price_print;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price_print_sale;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $creation_year;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=1)
     */
    private $hight;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=1)
     */
    private $width;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $material;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, mappedBy="paintings")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=PaintingVideo::class, mappedBy="painting")
     */
    private $videos;

    /**
     * @ORM\OneToMany(targetEntity=PaintingImage::class, mappedBy="painting")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity=Keyword::class, mappedBy="paintings")
     */
    private $keywords;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->keywords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->name_en;
    }

    public function setNameEn(string $name_en): self
    {
        $this->name_en = $name_en;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(?string $discription): self
    {
        $this->discription = $discription;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->description_en;
    }

    public function setDescriptionEn(?string $description_en): self
    {
        $this->description_en = $description_en;

        return $this;
    }

    public function getGalleryImage(): ?string
    {
        return $this->gallery_image;
    }

    public function setGalleryImage(string $gallery_image): self
    {
        $this->gallery_image = $gallery_image;

        return $this;
    }

    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function getHasOriginal(): ?bool
    {
        return $this->has_original;
    }

    public function setHasOriginal(bool $has_original): self
    {
        $this->has_original = $has_original;

        return $this;
    }

    public function getPriceOriginal(): ?int
    {
        return $this->price_original;
    }

    public function setPriceOriginal(int $price_original): self
    {
        $this->price_original = $price_original;

        return $this;
    }

    public function getPriceOriginalSale(): ?int
    {
        return $this->price_original_sale;
    }

    public function setPriceOriginalSale(?int $price_original_sale): self
    {
        $this->price_original_sale = $price_original_sale;

        return $this;
    }

    public function getPricePrint(): ?int
    {
        return $this->price_print;
    }

    public function setPricePrint(int $price_print): self
    {
        $this->price_print = $price_print;

        return $this;
    }

    public function getPricePrintSale(): ?int
    {
        return $this->price_print_sale;
    }

    public function setPricePrintSale(?int $price_print_sale): self
    {
        $this->price_print_sale = $price_print_sale;

        return $this;
    }

    public function getCreationYear(): ?int
    {
        return $this->creation_year;
    }

    public function setCreationYear(?int $creation_year): self
    {
        $this->creation_year = $creation_year;

        return $this;
    }

    public function getHight(): ?string
    {
        return $this->hight;
    }

    public function setHight(string $hight): self
    {
        $this->hight = $hight;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(string $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->material = $material;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addPainting($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removePainting($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, PaintingVideo>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(PaintingVideo $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setPainting($this);
        }

        return $this;
    }

    public function removeVideo(PaintingVideo $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getPainting() === $this) {
                $video->setPainting(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PaintingImage>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(PaintingImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setPainting($this);
        }

        return $this;
    }

    public function removeImage(PaintingImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getPainting() === $this) {
                $image->setPainting(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Keyword>
     */
    public function getKeywords(): Collection
    {
        return $this->keywords;
    }

    public function addKeyword(Keyword $keyword): self
    {
        if (!$this->keywords->contains($keyword)) {
            $this->keywords[] = $keyword;
            $keyword->addPainting($this);
        }

        return $this;
    }

    public function removeKeyword(Keyword $keyword): self
    {
        if ($this->keywords->removeElement($keyword)) {
            $keyword->removePainting($this);
        }

        return $this;
    }
}
