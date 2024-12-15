<?php


require_once __DIR__ . '/Model.php';


class Users extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id_user';

    public function create($datas)
    {
        return parent::create_data($datas, $this->table);
    }

    public function all()
    {
        return parent::all_data($this->table);
    }

    public function find($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE {$this->primarykey} = '$id' ";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }

    public function update($id, $datas)
    {
        $avatar = '';
        if ($datas["files"]["avatar"]["name"] !== '') {
            $nama_file = $datas["files"]["avatar"]["name"];
            $tmp_name = $datas["files"]["avatar"]["tmp_name"];
            $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
            if (!in_array($ekstensi_file, $ekstensi_allowed)) {
                return "Ektensi file tidak sesuai";
            }

            if ($datas["files"]["avatar"]["size"] > 5000000) {
                return "Ukuran file tidak boleh lebih dari 5MB";
            }

            $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
            move_uploaded_file($tmp_name, "./../../public/img/users/" . $nama_file);
            $avatar = $nama_file;
        }

        $datas = [
            "full_name" => $datas["post"]["full_name"],
            "email" => $datas["post"]["email"],
            "phone" => $datas["post"]["phone"],
            "bio" => $datas["post"]["bio"],
        ];

        if ($avatar !== '') {
            $datas["avatar"] = $avatar;
        }
        return parent::update_data($this->table, $id, $datas, $this->primarykey);

    }

    public function delete($id)
    {
        parent::delete_data($id, $this->primarykey, $this->table);
    }

    public function register($datas)
    {
        $email = $datas['post']['email'];
        $name = $datas['post']['full_name'];
        $password = $datas['post']['password'];
        $bio = $datas['post']['bio'];
        $gender = $datas['post']['gender'];
        $avatar = $datas['files']['avatar'];
        $phone = $datas['post']['phone'];

        $query = "SELECT * FROM {$this->table} WHERE email = '$email' ";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) > 0) {
            return "Email sudah terdaftar";
        }

        $nama_file = $datas["files"]["avatar"]["name"];
        $tmp_name = $datas["files"]["avatar"]["tmp_name"];
        $ekstensi_file =  pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ['jpg', 'png', 'gif', 'jpeg', ' heic'];
        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "Ekstensi file tidak sesuai";
        }
        if ($datas["files"]["avatar"]["size"] > 5000000) {
            return "Size melebihi dari 5Mb";
        }
        $nama_file =  random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "./../public/img/users/" . $nama_file);

        //untuk mengenkripsi password
        $password = base64_encode($password);

        $query_register = "INSERT INTO {$this->table} (full_name, password, email, bio, gender,  avatar, phone) VALUES ('$name',  '$password', '$email', '$bio', '$gender', '$nama_file', '$phone' )";
        $result =  mysqli_query($this->db, $query_register);

        if (!$result) {
            return "Registrasi gagal";
        }


        $user = [
            'full_name' => $name,
            'email' => $email,
            'avatar' => $nama_file
        ];
        return $user;
    }
    public function login($email, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) == 0) {
            return "user tidak ditemukan";
        }

        $user = mysqli_fetch_assoc($result);
        if (base64_decode($user['password'], false) == $password) {
            $_SESSION["id_user"] = $user['id_user'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['avatar'] = $user['avatar'];

            $detail_user = [
                'full_name' => $user['full_name'],
                'email' => $email,
                'avatar' => $user['avatar']
            ];
            return $detail_user;
        } else {
            return "Password salah!";
        }
    }

    public function logout() 
    {
        session_destroy();
        return "Logout succes";   
    }

    public function update_password($id,  $old_pass, $new_pass)
    {
        $query = "SELECT * FROM {$this->table} WHERE id_user = '$id'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) == 0) {
            return "user tidak ditemukan";
        }
        $user = mysqli_fetch_assoc($result);

        $_SESSION["id_user"] = $user['id_user'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['avatar'] = $user['avatar'];
        
        if (base64_decode($user['password'], false) !== $old_pass) {
            
            return "Pssword salah";
        }
        $new_pass = base64_encode($new_pass);
        $queryUpdate = "UPDATE {$this->table} SET password = '$new_pass' WHERE id_user = $id";
        $result = mysqli_query($this->db, $queryUpdate);
        if($result == false) {
            return "Gagal update password";
        }
        

        return [
            'full_name' => $user['full_name'],
            'email' => $user['email'],
            'avatar' => $user['avatar'] 
        ];
    }


    public function get_author(){
        $query = "SELECT * FROM users ORDER BY users.id_user DESC LIMIT 5";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }

    public function author_all()
    {
        $query = "SELECT * FROM users WHERE id_user";
        $result = mysqli_query($this->db, $query);

        return parent::convert_data($result);
    }

}
