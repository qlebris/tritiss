<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @Vich\Uploadable
 */
class Article
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sold;

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName1", size="imageSize1")
     * @var File|null
     */
    private $imageFile1;

    /**
     * @ORM\Column(type="string")
     * @var string|null
     */
    private $imageName1;

    /**
     * @ORM\Column(type="integer")
     * @var int|null
     */
    private $imageSize1;

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName2", size="imageSize2")
     * @var File|null
     */
    private $imageFile2;

    /**
     * @ORM\Column(type="string")
     * @var string|null
     */
    private $imageName2;

    /**
     * @ORM\Column(type="integer")
     * @var int|null
     */
    private $imageSize2;

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName3", size="imageSize3")
     * @var File|null
     */
    private $imageFile3;

    /**
     * @ORM\Column(type="string")
     * @var string|null
     */
    private $imageName3;

    /**
     * @ORM\Column(type="integer")
     * @var int|null
     */
    private $imageSize3;

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName4", size="imageSize4")
     * @var File|null
     */
    private $imageFile4;

    /**
     * @ORM\Column(type="string")
     * @var string|null
     */
    private $imageName4;

    /**
     * @ORM\Column(type="integer")
     * @var int|null
     */
    private $imageSize4;


    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="articles")
     */
    private $categories;




    public function __construct()
    {
        $this->categories = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile1(): ?File
    {
        return $this->imageFile1;
    }

    /**
     * @param File|null $imageFile1
     * @return Article
     */
    public function setImageFile1(?File $imageFile1): Article
    {
        $this->imageFile1 = $imageFile1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName1(): ?string
    {
        return $this->imageName1;
    }

    /**
     * @param string|null $imageName1
     * @return Article
     */
    public function setImageName1(?string $imageName1): Article
    {
        $this->imageName1 = $imageName1;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getImageSize1(): ?int
    {
        return $this->imageSize1;
    }

    /**
     * @param int|null $imageSize1
     * @return Article
     */
    public function setImageSize1(?int $imageSize1): Article
    {
        $this->imageSize1 = $imageSize1;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile2(): ?File
    {
        return $this->imageFile2;
    }

    /**
     * @param File|null $imageFile2
     * @return Article
     */
    public function setImageFile2(?File $imageFile2): Article
    {
        $this->imageFile2 = $imageFile2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName2(): ?string
    {
        return $this->imageName2;
    }

    /**
     * @param string|null $imageName2
     * @return Article
     */
    public function setImageName2(?string $imageName2): Article
    {
        $this->imageName2 = $imageName2;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getImageSize2(): ?int
    {
        return $this->imageSize2;
    }

    /**
     * @param int|null $imageSize2
     * @return Article
     */
    public function setImageSize2(?int $imageSize2): Article
    {
        $this->imageSize2 = $imageSize2;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile3(): ?File
    {
        return $this->imageFile3;
    }

    /**
     * @param File|null $imageFile3
     * @return Article
     */
    public function setImageFile3(?File $imageFile3): Article
    {
        $this->imageFile3 = $imageFile3;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName3(): ?string
    {
        return $this->imageName3;
    }

    /**
     * @param string|null $imageName3
     * @return Article
     */
    public function setImageName3(?string $imageName3): Article
    {
        $this->imageName3 = $imageName3;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getImageSize3(): ?int
    {
        return $this->imageSize3;
    }

    /**
     * @param int|null $imageSize3
     * @return Article
     */
    public function setImageSize3(?int $imageSize3): Article
    {
        $this->imageSize3 = $imageSize3;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile4(): ?File
    {
        return $this->imageFile4;
    }

    /**
     * @param File|null $imageFile4
     * @return Article
     */
    public function setImageFile4(?File $imageFile4): Article
    {
        $this->imageFile4 = $imageFile4;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName4(): ?string
    {
        return $this->imageName4;
    }

    /**
     * @param string|null $imageName4
     * @return Article
     */
    public function setImageName4(?string $imageName4): Article
    {
        $this->imageName4 = $imageName4;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getImageSize4(): ?int
    {
        return $this->imageSize4;
    }

    /**
     * @param int|null $imageSize4
     * @return Article
     */
    public function setImageSize4(?int $imageSize4): Article
    {
        $this->imageSize4 = $imageSize4;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

}
