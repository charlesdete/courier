<?php



class registerUser extends Dbh {

    protected function addregisterUser($name, $email, $phone, $password, $role) {
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO user (Name, Email, Phone, Password, Role) VALUES (?, ?, ?, ?, ?)";
        
        try {
            $stmt = $this->connect()->prepare($query);
            $stmt->bind_param("sssss", $name, $email, $phone, $hashedpassword, $role);
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            if ($e->getMessage() == "MySQL server has gone away") {
                // Retry connection
                $this->reconnect();
                $stmt = $this->connect()->prepare($query);
                $stmt->bind_param("sssss", $name, $email, $phone, $hashedpassword, $role);
                $stmt->execute();
            } else {
                throw $e;
            }
        }
    }
    
    private function reconnect() {
        // Close the existing connection
        $this->connect()->close();
        
        // Create a new connection
        $this->connect();
    }
}