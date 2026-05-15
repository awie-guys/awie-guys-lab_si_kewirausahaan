<?php

class User extends Model
{
    private string $table = 'users';

    public function findByUsername(string $username): array|false
    {
        $sql = "SELECT id, nama, username, password, role, status
                FROM {$this->table}
                WHERE username = :username
                LIMIT 1";

        return $this->first($sql, [
            'username' => $username
        ]);
    }

    public function findById(int $id): array|false
    {
        $sql = "SELECT id, nama, username, role, status
                FROM {$this->table}
                WHERE id = :id
                LIMIT 1";

        return $this->first($sql, [
            'id' => $id
        ]);
    }

    public function getAll(): array
    {
        $sql = "SELECT id, nama, username, role, status
                FROM {$this->table}
                ORDER BY id DESC";

        return $this->all($sql);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO {$this->table}
                (nama, username, password, role, status)
                VALUES
                (:nama, :username, :password, 'kasir', :status)";

        return $this->query($sql, [
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'status' => $data['status'] ?? 'aktif'
        ])->rowCount() > 0;
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE {$this->table}
                SET nama = :nama,
                    username = :username,
                    status = :status
                WHERE id = :id";

        return $this->query($sql, [
            'nama' => $data['nama'],
            'username' => $data['username'],
            'status' => $data['status'],
            'id' => $id
        ])->rowCount() >= 0;
    }

    public function resetPassword(int $id, string $password): bool
    {
        $sql = "UPDATE {$this->table}
                SET password = :password
                WHERE id = :id";

        return $this->query($sql, [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'id' => $id
        ])->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM {$this->table}
                WHERE id = :id
                AND role = 'kasir'";

        return $this->query($sql, [
            'id' => $id
        ])->rowCount() > 0;
    }

    public function usernameExists(string $username, ?int $exceptId = null): bool
    {
        $sql = "SELECT id
                FROM {$this->table}
                WHERE username = :username";

        $params = [
            'username' => $username
        ];

        if ($exceptId !== null) {
            $sql .= " AND id != :id";
            $params['id'] = $exceptId;
             }

        $sql .= " LIMIT 1";

        return $this->first($sql, $params) !== false;
    }}