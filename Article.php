<?php
class Article {
    private string $titre;
    private string $auteur;
    private string $date;
    private string $image;
    private string $message;

    public function __construct(array $data) {
    $this->hydrate($data);
    }
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
              $this->$method($value);
            }
        }
    }

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function setAuteur($auteur){
        $this->auteur = $auteur;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function setMessage($message){

        $this->message = $message;
    }

    public function getTitre(){
        return  $this->titre ;
    }

    public function getAuteur(){
        return  $this->auteur ;
    }

    public function getDate(){
        return $this->date ;
    }

    public function getImage(){
        return $this->image ;
    }

    public function getMessage(){

       return $this->message ;
    }

}