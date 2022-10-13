<head>
    <title>Database.php</title>
</head>
<?php
class Database
{
    public $host = 'localhost';
    public $dbuser = 'root';
    public $dbpass = '';
    public $dbname = 'ijssalon_de_roset';

    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->dbuser, $this->dbpass, $this->dbname);
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function makeUsersTable(): void
    {
        $sql = "CREATE TABLE Users (
                    id int PRIMARY KEY AUTO_INCREMENT,
                    firstName varchar(100),
                    lastName varchar(100),
                    email varchar(100),
                    password varchar(100),
                    date_of_birth date,
                    phonenumber varchar(100),
                    address varchar(50),
                    zipcode varchar(50),
                    city varchar(50),
                    role ENUM ('Manager','Medewerker','Klant')
                );";
        mysqli_query($this->conn, $sql);
    }

    public function makeOrdersTable(): void
    {
        $sql = "CREATE TABLE orders (
                    id int PRIMARY KEY AUTO_INCREMENT,
                    user_id int(11),
                    product_id int(11),
                    FOREIGN KEY (user_id) REFERENCES user(id),
                    FOREIGN KEY (product_id) REFERENCES products(id),
                    pickup datetime,
                    delivery datetime,
                    is_Received tinyint(1)  
                );";
        $result = mysqli_query($this->conn, $sql);
    }
    
    public function makeProductsTable(): void
    {
        $sql = "CREATE TABLE products (
                    id int PRIMARY KEY AUTO_INCREMENT,
                    name varchar(100),
                    price_per_kg decimal(6,2),
                    is_flavor_of_week tinyint(1)
                );";
        $result = mysqli_query($this->conn, $sql);
    }
}

$databaseConnection = new Database();
$conn = $databaseConnection->getConnection();