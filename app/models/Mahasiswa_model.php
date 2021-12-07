<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db =  new Database;  
    }

    public function getAllMahasiswa()
    {
        /*$this->statement = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->statement->execute();

        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        //return $this->mhs;
        */
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();

    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                    ('', :nama, :nim, :kelas)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('kelas', $data['kelas']);

        $this->db->execute();
        return $this->db->rowCount();
        
    }

    public function hapusDataMahasiswa($id)
    {
        $query ="DELETE FROM mahasiswa
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa
                    SET 
                        nama = :nama,
                        nim = :nim,
                        kelas = :kelas
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
        
    }

    public function cariDataMahasiswa()
    {
        $cariMahasiswa = $_POST['cariMahasiswa'];
        $query = "SELECT * FROM 
            mahasiswa 
                WHERE nama 
                    LIKE :cariMahasiswa";
        
        $this->db->query($query);
        $this->db->bind('cariMahasiswa', "%$cariMahasiswa%");
        return $this->db->resultSet();
    }
}