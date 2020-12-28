<?php

namespace App\Entity;

use App\Repository\ProductoVentaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoVentaRepository::class)
 */
class ProductoVenta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $producto_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $venta_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductoId(): ?int
    {
        return $this->producto_id;
    }

    public function setProductoId(int $producto_id): self
    {
        $this->producto_id = $producto_id;

        return $this;
    }

    public function getVentaId(): ?int
    {
        return $this->venta_id;
    }

    public function setVentaId(int $venta_id): self
    {
        $this->venta_id = $venta_id;

        return $this;
    }
}
