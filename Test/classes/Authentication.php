<?php
session_start();

/*
 * Todo :
 *  - uitzoeken static functions
 *  - code bekijken en goed proberen te begrijpen
 */

class Authentication
{
    private mysqli $database;

    function __construct(mysqli $mysqlConnection)
    {
        $this->database = $mysqlConnection;
    }

    public function login(string $username, string $password) : ?array {
        if ($this->verifyPassword($username, $password)) {
            $user = $this->getUser($username);
            $_SESSION['user_id'] = $user['id'];
            return $user;
        }

        return null;
    }

    public function verifyPassword($username, $password) : bool {
        $user = $this->getUser($username);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }

    public function getUser(string $username) : ?array {
        $sql = 'SELECT * FROM user WHERE username = ? LIMIT 1';
        $query = $this->database->prepare($sql);
        $query->bind_param('s', $username);

        // Is query gelukt?
        if ($query->execute()) {
            $result = $query->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                return $row;
            }
        }

        return null;
    }

    public function setPassword(string $username, string $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = 'UPDATE user SET `password` = ? WHERE username = ? LIMIT 1';
        $query = $this->database->prepare($sql);
        $query->bind_param('ss', $hashedPassword, $username);
        $query->execute();
    }

    public static function logout() {
        session_destroy(); // Gooit sessie weg (dus ook uitgelogd)
    }

    public static function isLoggedIn() : bool {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser(string $username, string $fullname, string $password) : bool {
        $sql = 'INSERT INTO user (`username`, `fullname`, `password`) VALUES (?, ?, ?)';
        $query = $this->database->prepare($sql);
        $query->bind_param('sss', $username, $fullname, password_hash($password,PASSWORD_DEFAULT ));
        return $query->execute();
    }
}