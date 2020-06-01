<?php 

namespace Phalcon\Init\Product\Infrastructure\Persistence;

use Phalcon\Init\Product\Domain\Repository\ProductRepository;
use Phalcon\Init\Product\Domain\Model\Product;
use Phalcon\Init\Product\Domain\Model\ProductId;

use PDO;
use Phalcon\Db\Adapter\Pdo\Mysql;

class SqlproductRepository implements productRepository
{
    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }

    public function byId(ProductId $id)
    {
        $statement = sprintf("SELECT * FROM product WHERE product.id = :product_id");
        $param = ['product_id' => $id->id()];

        return $this->db->query($statement, $param)
            ->fetch(PDO::FETCH_ASSOC);
    }

    public function save(Product $product)
    {
        $statement = sprintf("INSERT INTO product(id, name, description, quantity, price) VALUES(:id, :name, :description, :quantity, :price)" );
        $params = ['id' => $product->id()->id() , 'name' => $product->name(), 'description' => $product->description(), 'quantity' => $product->quantity(), 'price' => $product->price()];

        return $this->db->execute($statement, $params);
    }

    public function allProducts()
    {
        $statement = sprintf("SELECT * FROM product");

        $result =  $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);

        if($result) {
            $resultArray = array();
            foreach($result as $row) {
                $product = new Product(
                    new ProductId($row['id']),
                    $row['name'],
                    $row['description'],
                    $row ['quantity'],
                    $row['price']

                );
                array_push($resultArray, $product);
            }
            return $resultArray;
        }
        return null;
    }

    public function deleteProductById(productId $id)
    {
        $sql = "DELETE FROM product WHERE id = :id";

        $this->db->query($sql, [
            'id' => $id
        ]);
    }

    public function update(productId $id, $name,$description,$quantity,$price)
    {
        $sql = "UPDATE product 
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