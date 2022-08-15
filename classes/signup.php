<?php
//we are error checking 
class Signup{
    private $error = "";

    public function evaluate($data){
foreach ($data as $key => $value){

    if(empty($value)){
        $this->error .=  $this->error . $key . " is empty!<br>";
    }
    if($key == "email"){
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
            $this->error .=  $this->error . " invalid email<br>";
        }
    }

    if($key == "first_name")
			{
				if (is_numeric($value)) {
 					$this->error = $this->error . "first name cant be a number<br>";
    			}
    			if (strstr($value, " ")) {
 					$this->error = $this->error . "first name cant have spaces<br>";
    			}
			}

			if($key == "last_name")
			{
				if (is_numeric($value)) {
 					$this->error = $this->error . "last name cant be a number<br>";
    			}
    			if (strstr($value, " ")) {
 					$this->error = $this->error . "last name cant have spaces<br>";
    			}

			}

}
if($this->error == "")
{
//no error
$this->create_user($data);
}else {
    return $this->error; 
}
    }
    public function create_user($data){

        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $email = $data['email'];
        $password = $data['password'];

        //create these
        $url_address = strtoLower($first_name) . "." . strtoLower($last_name);
        $userid = $this->create_userid();


        $query = "insert into users 
        (userid,first_name,last_name,email,password,url_address) 
        values 
        ('$userid','$first_name','$last_name','$email','$password','$url_address')";


$DB = new Database();
$DB->save($query);

    }

private function create_userid(){

    $length= rand(4, 19);
    $number = "";
for ($i=0; $i < $length; $i++){
$new_rand = rand(0,9);

$number = $number . $new_rand;
}

return $number;
}

}


?>