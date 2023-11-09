<?php

class TeamManager
{
    private mysqli $database;

    function __construct(mysqli $mysqlConnection)
    {
        $this->database = $mysqlConnection;
    }

    function getAllTeams() : array
    {
        $sql = 'SELECT * FROM team WHERE deleted != 1';
        $query = $this->database->prepare($sql);

        if ($query->execute()) {
            $result = $query->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    function getTeam(int $id) : ?array
    {
        $sql = 'SELECT * FROM team WHERE id = ? AND deleted != 1';
        $query = $this->database->prepare($sql);
        $query->bind_param('i', $id);

        if ($query->execute()) {
            $result = $query->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        }

        return NULL;
    }

    function delete(int $id) : bool
    {
        $sql = 'UPDATE team SET deleted = 1 WHERE id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('i', $id);
        return $query->execute();
    }

    function create(string $name, string $city) : bool
    {
        $sql = 'INSERT INTO team (name, city) VALUES (?, ?) ';
        $query = $this->database->prepare($sql);
        $query->bind_param('ss', $name,$city);
        return $query->execute();
    }

    function update(int $id, string $name, string $city) : bool
    {
        $sql = 'UPDATE team SET name = ?, city = ? WHERE id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('ssi', $name,$city, $id);
        return $query->execute();
    }
}
