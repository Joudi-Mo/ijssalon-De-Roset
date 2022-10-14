<head>
    <title>DbSeeder</title>
</head>
<?php
require 'Database.php';
require_once '../vendor/autoload.php';

// How to reset the id counter in the database:
// ALTER TABLE tablename AUTO_INCREMENT = 1

class DbSeeder
{
    private $conn;
    private $faker;

    public function __construct($conn)
    {
        $this->faker = Faker\Factory::create();
        $this->conn = $conn;
    }

    //Functie om de 'user' table in te vullen met nep data
    public function fillUsers(int $number_of_records)
    {
        $statement = "INSERT INTO 
                        `users`(`firstname`, `lastname`, `email`, `password`, `date_of_birth`, `phonenumber`, `address`, `zipcode`, `city`, `role`)

                      VALUES ";

        for ($i = 0; $i < $number_of_records; $i++) {
            if ($i == $number_of_records - 1) {
                $statement .= 
                "(
                    '{$this->faker->firstName()}',
                    '{$this->faker->lastName()}',
                    '{$this->faker->safeEmail()}',
                    '{$this->randomPassword(8)}',
                    '2005-01-01',
                    '{$this->randomPhoneNumber()}',
                    'NovaCollege',
                    '1234',
                    'Haarlem',
                    '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}'
                )";
            } else {

                $statement .= 
                "(
                    '{$this->faker->firstName()}',
                    '{$this->faker->lastName()}',
                    '{$this->faker->safeEmail()}',
                    '{$this->randomPassword(8)}',
                    '2002-07-13',
                    '{$this->randomPhoneNumber()}',
                    'NovaCollege',
                    '2020',
                    'Amsterdam',
                    '{$this->faker->randomElement(['Klant', 'Medewerker', 'Manager'])}'
                ),"; 
            }
        } //End for loop

        mysqli_query($this->conn, $statement);
        print_r(mysqli_info($this->conn));
    }

    //Een random NL telefoonnummer genereren
    public function randomPhoneNumber(){
        $sequence = '06';
        for ($i = 0; $i < 8; ++$i) {
            $sequence .= mt_rand(0, 9);
        }
        return $sequence;
    }
    
    //Een random password genereren
    public function randomPassword($length){
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$#&";
        return substr(str_shuffle($characters), 0, $length);
    }
    
    //Functie om de 'Products' table in te vullen met data
    public function fillProducts()
    {
        $sql ='INSERT INTO `products`(`name`, `price_per_kg`, `is_flavor_of_week`, `category`)
                    VALUES
                ("Vanille","12.00", false,"schepijs"),
                ("Chocolade","9.50", false,"schepijs"),
                ("Witte Chocolade","9.65", true,"schepijs"),
                ("Citroen","11.50", false,"schepijs"),

                ("Aardbeien","9.00", false,"schepijs"),
                ("Banaan","12.00", false,"schepijs"),
                ("Pistache","8.90", false,"schepijs"),
                ("Framboos","14.50", false,"schepijs"),

                ("Mango","10.00", false,"schepijs"),
                ("Meloen","11.75", false,"schepijs"),
                ("Smurfen","13.00", false,"schepijs"),
                ("Watermeloen","11.75", false,"schepijs"),

                ("Kokos","12.50", false,"schepijs"),
                ("Hazelnoot","11.75", false,"schepijs"),
                ("Limoen","10.00", false,"schepijs"),
                ("Kaneel","10.00", false,"schepijs"),

                ("Mokka","11.75", false,"schepijs"),
                ("Amarena","10.00", false,"schepijs"),
                ("Ananas","13.50", false,"schepijs"),
                ("Bloedsinaasappel","11.75", false,"schepijs")
                ';

        mysqli_query($this->conn, $sql);
        print_r(mysqli_info($this->conn));
    }
    
}

$seeder = new DbSeeder($conn);
echo $seeder->randomPassword(8);
echo'<br>';
echo $seeder->randomPhoneNumber();
echo'<br>';
// $seeder->fillUsers(10);
// echo $seeder->fillProducts();