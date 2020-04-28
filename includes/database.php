<?php
session_start();
require_once('db_connection.php');
require_once('room.php');
require_once('user.php');
Class Database {
    public $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function is_postOwner($id) {
        $sql = 'SELECT postedBy FROM rooms WHERE id = '.$id;
        $result = mysqli_query($this->conn,$sql);
        if (!$result){
            echo "Error: " . $sql . "<br> Failed to add" . mysqli_error($this->conn);
            die();
        }
        $row = mysqli_fetch_assoc($result);
        return $_SESSION['userID'] == $row['postedBy'];
    }
	
	public function addRoom($data){ 
        $sql = 'INSERT INTO rooms (description, picture, price, postedBy, likeCount)';
        $sql .= ' VALUES ("'. $data['description'] . '","' . $data['house-img'];
        $sql .= '","' . $data['price'] . '",' . $_SESSION['userID'] . ',0)';
        $result = mysqli_query($this->conn,$sql);
        if (!$result)
            echo "Error: " . $sql . "<br> Failed to add" . mysqli_error($this->conn);

        // Get user's roomsForRent string
        $sql = 'SELECT roomsForRent FROM users WHERE id = '. $_SESSION['userID'];
        $result = mysqli_query($this->conn,$sql);
        if (!$result)
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        $row = mysqli_fetch_assoc($result);
        
        // Add the room to users.roomsForRent
        $sql = 'UPDATE users SET roomsForRent = CONCAT("' . $row['roomsForRent'];
        $sql .= '",LAST_INSERT_ID(),";") WHERE id = '. $_SESSION['userID'];
        $result = mysqli_query($this->conn,$sql);
        if (!$result)
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
	}
	
	public function getRoomInfo($id){
        $sql = 'SELECT * FROM rooms WHERE id = ' . $id;
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br> Failed to get Room " . mysqli_error($this->conn);
            return '';
        } else {
            $row = mysqli_fetch_assoc($result);
            $room = new Room($row['id'], $row['description'], $row['picture'], 
            $row['price'], $row['postedBy'], $row['likeCount']);
            return $room;
        }
    }
    
    public function getUserInfo($id){
		$sql = 'SELECT * FROM users WHERE id = ' . $id;
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br> Failed to get User " . mysqli_error($this->conn);
            return '';
        } else {
            $row = mysqli_fetch_assoc($result);
            $user = new User($row['id'], $row['name'], $row['email'], $row['age'], $row['password'], $row['roomsForRent'], $row['sex'], $row['profilePicture'], $row['phoneNumber'], $row['flatmateExpectation'], $row['cleanliness'], $row['bedtime'], $row['food']);
            return $user;
        }
	}
	
	public function editRoomInfo($data,$id){
        $sql = 'UPDATE rooms SET description = "'.$data['description'].'", picture = "'.$data['house-img'].'", price = "'.$data['price'].'" WHERE id = '. $id;
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br> Failed to edit Room " . mysqli_error($this->conn);
            return '';
        }  
    }
    
    public function incrementLike($id){
        $sql = 'UPDATE rooms SET likeCount = likeCount + 1 WHERE id = '. $id;
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br> Failed to edit Room " . mysqli_error($this->conn);
            return '';
        }
        
        $sql = 'SELECT likeCount FROM rooms WHERE id = '. $id;
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br> Failed to edit Room " . mysqli_error($this->conn);
            return '';
        }
        $row = mysqli_fetch_assoc($result);
        return $row['likeCount'];
	}
	
	public function deleteRoom($id){
        $sql = 'DELETE FROM rooms WHERE id = ' . $id;
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br> Failed to get User" . mysqli_error($this->conn);
        }
    }
    
    public function getAllRoomIds(){
        $sql = 'SELECT id FROM rooms';
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br> Failed to get All Room Ids " . mysqli_error($this->conn);
            die();
        } else {
            $arr = array();
            while ($row = mysqli_fetch_array($result)){
                array_push($arr,$row['id']);
            }
            return $arr;
        }
    }

    public function createUser($data,$id){
        $sql = 'INSERT INTO users (name,email,password,roomsForRent,age,sex,userLevel,';
		$sql .= 'profilePicture,phoneNumber,flatmateExpectation,cleanliness,bedtime,food)';
		$sql .= ' VALUES ("'.$data['name'].'","'.$data['email'].'","'.$data['password'];
		$sql .= '","",'.$data['household-age'].',"'.$data['household-sex'];
        $sql .= '",'.$data['userLevel'].',"'.$data['household-img'];
        $sql .= '","'.$data['phone-number'];
		$sql .= '","'.$data['flatmate-expectation'].'","'.$data['lifestyle-cleanliness'];
        $sql .= '","'.$data['lifestyle-bedtime'].'","'.$data['lifestyle-food'].'")';
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            die();
        }
    }

    public function editUser($data,$id){
        // encrypt password
        $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
        
        $sql = 'UPDATE users SET name = "'.$data['name'].'", email = "'.$data['email'].'", password = "'.$data['password'].'", age = '.$data['household-age'].', sex = "'.$data['household-sex'].'", userLevel = '.$data['userLevel'].', profilePicture = "'.$data['household-img'].'", phoneNumber = "'.$data['phone-number'].'", flatmateExpectation = "'.$data['flatmate-expectation'].'", cleanliness = "'.$data['lifestyle-cleanliness'].'", bedtime = "'.$data['lifestyle-bedtime'].'", food = "'.$data['lifestyle-food'].'" WHERE id = '.$id;

        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            die();
        }
    }
}

$database = new Database($conn);
?>