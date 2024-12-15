<?php

require_once __DIR__ . '/Model.php';

class Posts extends Model
{
    protected $table = "posts";
    protected $primary_key = "id_post";

    public function create($datas)
    {


        if ($datas["files"]["attachment"]["name"] == "") {
            return "Masukan gambar terlebih dahulu";
        }

        $nama_file = $datas["files"]["attachment"]["name"];
        $tmp_name = $datas["files"]["attachment"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "Ektensi file tidak sesuai";
        }

        if ($datas["files"]["attachment"]["size"] > 5000000) {
            return "Ukuran file tidak boleh lebih dari 5MB";
        }

    
        $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "./../../public/img/konten/" . $nama_file);

        $datas = [
            "title" => $datas["post"]["title"],
            "content" => $datas["post"]["content"],
            "attachment" => $nama_file,
            "user_id" => $datas["post"]["user_id"],
            "category_id" => $datas["post"]["category_id"],
        ];

        return parent::create_data($datas, $this->table);

    }

    public function all()
    {
        return parent::all_data($this->table);
    }
    public function all_id($id)
    {
        $query = "SELECT posts.*, categories.name_category, users.full_name AS author_name FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user WHERE posts.user_id = '$id' order by title";
        $result = mysqli_query($this->db, $query);
        return parent::convert_data($result);
    }

    public function paginate($start, $limit)
    {
        $order = " order by title";
        return parent::paginate_data($this->table, $start, $limit, $order);
    }

    public function search($keyword, $start = null, $limit = null)
    {
        $queryLimit = "";
        if (isset($start) && isset($limit)) {
            $queryLimit = " LIMIT $start, $limit";
        }
        $keyword = " WHERE title LIKE '%{$keyword}%' $queryLimit";
        $query = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user $keyword";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }

    public function search_id($id, $keyword)
    {
        $queryLimit = "";
        if (isset($start) && isset($limit)) {
            $queryLimit = " LIMIT $start, $limit";}
        $keyword = " AND title LIKE '%{$keyword}%' $queryLimit";
        $query = "SELECT posts.*, categories.name_category, users.full_name AS author_name FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user WHERE posts.user_id = '$id' $keyword";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }

    public function delete($id)
    {
        return parent::delete_data($this->table, $this->primary_key, $id);
    }

    public function find($id)
    {
        return parent::find_data($this->table, $id, $this->primary_key);
    }

    public function update($id, $datas)
    {
        
        $attachment = '';
        if ($datas["files"]["attachment"]["name"] !== '') {
            $nama_file = $datas["files"]["attachment"]["name"];
            $tmp_name = $datas["files"]["attachment"]["tmp_name"];
            $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
            if (!in_array($ekstensi_file, $ekstensi_allowed)) {
                return "Ektensi file tidak sesuai";
            }

            if ($datas["files"]["attachment"]["size"] > 5000000) {
                return "Ukuran file tidak boleh lebih dari 5MB";
            }

            $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
            move_uploaded_file($tmp_name, "./../../public/img/konten/" . $nama_file);
            $attachment = $nama_file;
        }

        $datas = [
            "title" => $datas["post"]["title"],
            "content" => $datas["post"]["content"],
            "user_id" => $datas["post"]["user_id"],
            "category_id" => $datas["post"]["category_id"],
        ];

        if ($attachment !== '') {
            $datas["attachment"] = $attachment;
        }
        return parent::update_data($this->table, $id, $datas, $this->primary_key);
    }
    public function all2($start, $limit)
    {
        $query = "SELECT * FROM posts JOIN categories ON categories.id_category = posts.category_id JOIN users ON users.id_user = posts.user_id LIMIT $start, $limit";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

}