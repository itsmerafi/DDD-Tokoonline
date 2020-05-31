<?php 

namespace Phalcon\Init\Product\Infrastructure\Persistence;

use Phalcon\Init\Product\Domain\Repository\ProductRepository;
use Phalcon\Init\Product\Domain\Model\Product;
use Phalcon\Init\Product\Domain\Model\ProductId;

use PDO;
use Phalcon\Db\Adapter\Pdo\Mysql;

class SqlProductRepository implements ProductRepository
{
    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }

    public function byId(ProductId $id)
    {
        $statement = sprintf("SELECT * FROM Products WHERE Products.id = :Product_id");
        $param = ['Product_id' => $id->id()];

        return $this->db->query($statement, $param)
            ->fetch(PDO::FETCH_ASSOC);
    }

    public function save(Product $Product)
    {
        $statement = sprintf("INSERT INTO Products(id, name, description, quantity, price) VALUES(:id, :name, :description, :quantity, :price)" );
        $params = ['id' => $Product->id()->id() , 'name' => $Product->name(), 'description' => $Product->description(), 'quantity' => $Product->quantity(), 'price' => $Product->price()];

        return $this->db->execute($statement, $params);
    }

    public function allProducts()
    {
        $statement = sprintf("SELECT * FROM Products");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProductById(ProductId $id)
    {
        $sql = "DELETE FROM Product WHERE id = :id";

        $this->db->query($sql, [
            'id' => $id
        ]);
    }

    public function update(ProductId $id, $name,$description,$quantity,$price)
    {
        $sql = "UPDATE Product 
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