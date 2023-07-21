<?php

    class Users{
        private $servername = "localhost";
        private $username = "root";
        private $password = "Montukhan@2000";
        private $database = "projectdb";

        public $con;

        //database conectcion
        public function __construct()
        {
            $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);

            if(mysqli_connect_error()){
                trigger_error("Failed to connect to mysql: ". mysqli_connect_error());
            }
            else{
                return $this->con;
            }
        }

        //insert data into table
        public function insertData($post){
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $username = $this->con->real_escape_string($_POST['username']);
            $password = $this->con->real_escape_string(md5($_POST['password']));
            
            $query ="insert into tblusers(name,email,username,password)values('$name','$email','$username','$password')";

            $sql = $this->con->query($query);

            // if($sql){
                // header('location:index.php?msg1=insert');
            // }
            // else{
                // echo "Registration failed try again!";
            // }
            return $sql;
        }

        //Fetch all records
        public function displayData(){
            $query = "SELECT * from tblusers";
            $result = $this->con->query($query);
            if($result->num_rows > 0){
                $data = array();
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
                return $data;
            }
            else{
                echo "No records found";
            }
        }

        //Fetch single data
        public function displayRecordById($id){
            $query = "SELECT * FROM tblusers WHERE id='$id'";
            $result = $this->con->query($query);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
            else{
                echo "Record not found";
            }
        }
        
        //update data
        public function updateRecord($postData){
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $username = $this->con->real_escape_string($_POST['username']);
            $id = $this->con->real_escape_string($_POST['id']);

            if(!empty($id) && !empty($postData)){
                $query = "UPDATE tblusers SET name='$name', email='$email', username='$username' WHERE id = '$id'";

                $sql = $this->con->query($query);

                if($sql){
                    header('location:index.php?msg2=update');
                }
                else{
                    echo "Registration updated failed try again!";
                }
            }
        }

        //Delete data
        public function deleteRecord($id){
            $query = "DELETE FROM tblusers WHERE id = '$id'";
            $sql = $this->con->query($query);

            if($sql){
                header('location:index.php?msg3=delete');
            }
            else{
                echo "Record does not delete try again!";
            }

        }
    }

?>