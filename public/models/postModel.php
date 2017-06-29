<?php
class postModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getPostsPrueba()
    {
        $post = array(
            'id' => 1,
            'titulo' => 'Titulo Post',
            'cuerpo' => 'Cuerpo Post'
        );
        return $post;
    }

    public function getPosts()
    {
        $post = $this->_db->query("select * from posts");
        return $post->fetchall();
    }
    
}
?>