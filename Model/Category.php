<?php 

require_once __DIR__ . '/Model.php';

class Category extends Model {
    
    protected $table = 'categories';
    protected $primarykey = 'id_category';
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
        return parent::find_data($this->table, $id, $this->primarykey);
    }

    public function update($id, $datas)
    {
        return parent::update_data($this->table, $id, $datas,  $this->primarykey);
    }

    public function delete($id)
    {
        return parent::delete_data($id, $this->primarykey, $this->table);
    }

    public function search($keyword)
    {
        $keyword = " WHERE name LIKE '%{$keyword}%'";
        return parent::search_data($keyword, $this->table);
    }

    public function paginate($start, $limit)
    {
       return parent::paginate_data($start, $limit, $this->table);
    }
}