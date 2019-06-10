<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 05/06/19
 * Time: 12:00
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * Commande
 * @ApiResource
 * @ORM\Table(name="ordersline", indexes={@ORM\Index(name="IDX_6EEAA67D19EB6921", columns={"client_id"})})
 * @ORM\Entity
 */
class OrderLine
{
    /**
     * @var int
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var decimal
     *
     * @ORM\Column(name="price", type="decimal", scale=2, nullable=false)
     */
    private $prix;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="orderline", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Orderc", inversedBy="orderline", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getArticle(): ?Product
    {
        return $this->article;
    }

    public function setArticle(?Product $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCommande(): ?Orderc
    {
        return $this->commande;
    }

    public function setCommande(?Orderc $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

}



