<?php 

namespace Phalcon\Init\Produk\Infrastructure\Persistence;

use Phalcon\Init\Produk\Domain\Model\Produk;
use Phalcon\Init\Produk\Domain\Model\ProdukId;
use Phalcon\Init\Produk\Domain\Model\Rating;
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
        $statement = sprintf("INSERT INTO Produks(id, title, description, author_name, author_email, votes) VALUES(:id, :title, :description, :author_name, :author_email, :votes)" );
        $params = ['id' => $Produk->id()->id() , 'title' => $Produk->title(), 'description' => $Produk->description(), 'author_name' => $Produk->author()->name(), 'author_email' => $Produk->author()->email(), 'votes' => 0];

        return $this->db->execute($statement, $params);
    }

    public function allProduks()
    {
        $statement = sprintf("SELECT * FROM Produks");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function allRatings()
    {
        $statement = sprintf("SELECT * FROM ratings");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function vote(Produk $Produk)
    {
        $statement = sprintf("UPDATE Produks SET Produks.votes = :votes WHERE Produks.id = :Produk_id");
        $params = ['votes' => $Produk->votes(), 'Produk_id' => $Produk->id()->id()];

        return $this->db->execute($statement, $params);
    }

    public function rate(ProdukId $id, Rating $rating)
    {
        $statement = sprintf("INSERT INTO ratings(Produk_id, value, name) VALUES(:Produk_id, :value, :name)");
        $params = ['Produk_id' => $id->id(), 'value' => $rating->value(), 'name' => $rating->user()];

        return $this->db->execute($statement, $params);
    }

    public function getRatingsByProdukId(ProdukId $id)
    {
        $statement = sprintf("SELECT * FROM ratings WHERE Produk_id = :Produk_id");
        $param = ['Produk_id' => $id->id()];

        return $this->db->query($statement, $param)
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}