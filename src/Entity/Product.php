<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * Product
 * @ApiResource
 * @ORM\Table(name="product", indexes={@ORM\Index(name="IDX_D34A04AD12469DE2", columns={"category_id"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=false)
     */
    private $imageUrl;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="OrderLine", mappedBy="article")
     */
    private $orderc;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderc = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $libelle): self
    {
        $this->name = $libelle;

        return $this;
    }

    public function getPrix()
    {
        return $this->price;
    }

    public function setPrix($prix): self
    {
        $this->price = $prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->imageUrl;
    }

    public function setImage(string $image): self
    {
        $this->imageUrl = $image;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->category;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->category = $categorie;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commande->contains($commande)) {
            $this->commande->removeElement($commande);
        }

        return $this;
    }

    /**
     * @return Collection|Orderc[]
     */
    public function getLignesCommande(): Collection
    {
        return $this->orderc;
    }

    public function addLignesCommande(Orderc $lignesCommande): self
    {
        if (!$this->orderc->contains($lignesCommande)) {
            $this->orderc[] = $lignesCommande;
            $lignesCommande->setArticle($this);
        }

        return $this;
    }

    public function removeLignesCommande(Orderc $lignesCommande): self
    {
        if ($this->orderc->contains($lignesCommande)) {
            $this->orderc->removeElement($lignesCommande);
            // set the owning side to null (unless already changed)
            if ($lignesCommande->getArticle() === $this) {
                $lignesCommande->setArticle(null);
            }
        }

        return $this;
    }


}
