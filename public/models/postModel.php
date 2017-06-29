<?php
class postModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getPosts()
    {
        $post = array(
            'id' => 1,
            'titulo' => 'Titulo Post',
            'cuerpo' => 'Cuerpo Post'
        );
        return $post;
    }
    
}
?>