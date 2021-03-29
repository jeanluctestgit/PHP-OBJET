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

    public setTitre($titre){
        $this->titre = $titre;
    }

    public setAuteur($auteur){
        $this->auteur = $auteur;
    }

    public setDate($date){
        $this->date = $date;
    }

    public setImage($image){
        $this->image = $image;
    }

    public setMessage($message){

        $this->message = $message;
    }

    public getTitre(){
        return  $this->titre ;
    }

    public getAuteur(){
        return  $this->auteur ;
    }

    public getDate(){
        return $this->date ;
    }

    public getImage(){
        return $this->image ;
    }

    public getMessage(){

       return $this->message ;
    }

}