<?php

require_once 'bdd.php';

class Movie {
    public $id;
    public $title;
    public $image;
    public $link;
    public $synopsis;
    public $duration;
    public $releaseyear;
    public $pegi;
    public $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd; 
    }

    public function load($id) {
        
        $select = $this->bdd->prepare ("SELECT mo.id, mo.title, mo.image, mo.link, mi.synopsis, mo.duration, mo.year, mi.pegi FROM movies AS mo LEFT JOIN movies_infos AS mi ON mo.id = mi.idMovie WHERE mo.id = $id");
        $select->execute();
        $res = $select->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function insert() {
        $title = $_POST['title'];
        $image = $_FILES['image'];
        $link = $_POST['link'];
        $synopsis = $_POST['synopsis'];
        $releaseyear = $_POST['year'];
        $duration = $_POST['duration'];
        $pegi = $_POST['pegi'];

        $bdd = new PDO('mysql:host=127.0.0.1;dbname=phpvideo','root',''); 
        
        $output_dir = "/images"; //"chemin pour enregistrer img"
        $imgName = $_FILES['image']['name'][0];
        $imgType = $_FILES['image']['type'][0];
        
        if (!file_exists($output_dir)) {
            @mkdir($output_dir, 0777);
        }

        move_uploaded_file( $_FILES["image"]["tmp_name"][0], $output_dir."/".$ImageName );
        
        if(isset($title, $image, $link, $releaseyear, $duration, $synopsis, $pegi)) {
            $query1 = $bdd->prepare("INSERT INTO movies (title, image, link) VALUES ('$title', '$imgName', '$link')");
            $query1->execute();
            
            $idmovie = intval($bdd->lastInsertId());
            
            $query2 = $bdd->prepare("INSERT INTO movies_infos(idmovie, synopsis, duration, releaseyear, pegi) VALUES ('$idmovie', '$synopsis', '$releaseyear', '$duration', '$pegi')");
            $query2->execute();
        }
    }

    public function update($id) {
        $id=$_POST['id'];
        $title = $_POST['title'];
        $image = $_FILES['image'];
        $link = $_POST['link'];
        $synopsis = $_POST['synopsis'];
        $releaseyear = $_POST['year'];
        $duration = $_POST['duration'];
        $pegi = $_POST['pegi'];
        
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=phpvideo','root','');
        $output_dir = "images/"; //"chemin pour enregistrer img"
        $imgName = $_FILES['image']['name'][0];
        $imgType = $_FILES['image']['type'][0];
        
        if (!file_exists($output_dir)) {
            @mkdir($output_dir, 0777);
        }
        
        if(isset($id, $title, $image, $link, $releaseyear, $duration, $synopsis, $pegi)) {
            $query1 = $bdd->prepare("UPDATE movies SET title='$title', image='$imgName', link='$link' WHERE id='$id'");
            $query1->execute();
                
            $query2 = $bdd->prepare("UPDATE movies_infos SET synopsis='$synopsis', duration=$duration, releaseyear=$releaseyear, pegi=$pegi WHERE idMovie=$id");
            var_dump($query2);
            $query2->execute();
        }
    }

    public function delete($id) {
        if(isset($id)) {
            $delete1 = $this->bdd->prepare("DELETE FROM movies_infos WHERE idMovie=$id");
            $delete1->execute();
            
            $delete2 = $this->bdd->prepare("DELETE FROM movies WHERE id = $id");
            $delete2->execute();
        }
    }

}
