<?php
class db{
    private $link;
    function __construct()
    {
    $this->link=mysqli_connect("localhost","root","rootroot","mycinma");
    }
    public function print_movies($in){
        $q="select * from movies {$in}";
        return mysqli_query($this->link,$q);
    }

    public function add_move($in){
     $q="insert into movies values(null,'$in[movie_name]','$in[movie_type]','$in[move_file]',now(),'$in[poster]',0)";
     return mysqli_query($this->link,$q) or die(mysqli_error($this->link));
    }
    public function login($u,$p){
        $q="SELECT * FROM admins where username=? and password=?";
        $sql=$this->link->prepare($q);
        $sql->bind_param("ss",$u,$p);
        $sql->execute();
        if($sql->get_result()->num_rows>=1){
            return true;
        }
    }

    public function get_movie($id){
        $q="select * from movies where ID=$id";
        return mysqli_query($this->link,$q);
    }

    public function view($id){
        $q="update movies set views=views+1 where ID=$id";
        return mysqli_query($this->link,$q);
    }

    function __destruct()
    {
        $this->link->close();
    }
}