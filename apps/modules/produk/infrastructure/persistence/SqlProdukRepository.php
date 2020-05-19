<?php 

namespace Phalcon\Init\Produk\Infrastructure\Persistence;

use Phalcon\Init\Produk\Domain\Model\Produk;
use Phalcon\Init\Produk\Domain\Model\ProdukId;
use Phalcon\Init\Produk\Domain\Repository\ProdukRepository;
use PDO;
use Phalcon\Db\Adapter\Pdo\Mysql;

class SqlProdukRepository implements ProdukRepository
{
    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }

    public function byId(ProdukId $id)
    {
        $statement = sprintf("SELECT * FROM Produks WHERE Produks.id = :Produk_id");
        $param = ['Produk_id' => $id->id()];

        return $this->db->query($statement, $param)
            ->fetch(PDO::FETCH_ASSOC);
    }

    public function save(Produk $Produk)
    {
        $statement = sprintf("INSERT INTO Produks(id, name, description, quantity, price) VALUES(:id, :name, :description, :quantity, :price)" );
        $params = ['id' => $Produk->id()->id() , 'name' => $Produk->name(), 'description' => $Produk->description(), 'quantity' => $Produk->quantity(), 'price' => $Produk->price()];

        return $this->db->execute($statement, $params);
    }

    public function allProduks()
    {
        $statement = sprintf("SELECT * FROM Produks");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProdukById(ProdukId $id)
    {
        $sql = "DELETE FROM Produk WHERE id = :id";

        $this->db->query($sql, [
            'id' => $id
        ]);
    }

    public function update(ProdukId $id, $name,$description,$quantity,$price)
    {
        $sql = "UPDATE Produk 
                SET name = :name, description = :description, quantity = :quantity, price = :price
                WHERE id = :id";

        $this->db->query($sql, [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'quantity' => $quantity,
            'price' => $price
        ]);
    }


}