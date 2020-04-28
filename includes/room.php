<?php
class Room {
    public $id;
    public $description;
    public $picture;
    public $price;
    public $postedBy;
    public $likeCount;
    
    public function __construct($id, $description, $picture, $price, $postedBy, $likeCount){
        $this->id = $id;
        $this->description = $description;
        $this->picture = $picture;
        $this->price = $price;
        $this->postedBy = $postedBy;
        $this->likeCount = $likeCount;
    }
}
?>