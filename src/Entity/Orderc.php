<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
/**
 * Orderc
 * @ApiResource
 * @ORM\Table(name="orderc", indexes={@ORM\Index(name="IDX_F898ED8A19EB6921", columns={"client_id"})})
 * @ORM\Entity
 * @ApiResource
 * @ApiFilter(DateFilter::class, properties={"date"})
 */
class Orderc
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="validate", type="boolean", nullable=false)
     */
    private $validate;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="OrderLine", mappedBy="commande")
     */
    private $orderline;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderline = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->date = $dateCreation;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->validate;
    }

    public function setEtat(bool $etat): self
    {
        $this->validate = $etat;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->addCommande($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->article->contains($article)) {
            $this->article->removeElement($article);
            $article->removeCommande($this);
        }

        return $this;
    }

    /**
     * @return Collection|OrderLine[]
     */
    public function getLignesCommande(): Collection
    {
        return $this->orderline;
    }

    public function addLignesCommande(OrderLine $lignesCommande): self
    {
        if (!$this->orderline->contains($lignesCommande)) {
            $this->orderline[] = $lignesCommande;
            $lignesCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLignesCommande(LignesCommande $lignesCommande): self
    {
        if ($this->orderline->contains($lignesCommande)) {
            $this->orderline->removeElement($lignesCommande);
            // set the owning side to null (unless already changed)
            if ($lignesCommande->getCommande() === $this) {
                $lignesCommande->setCommande(null);
            }
        }

        return $this;
    }



}
