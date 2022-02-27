<?php
    class validation{
        public $uname;
        public $email;
        public $pass;
        public $age;
        public $phone_no;
        public function __construct($name,$email,$pass,$age,$phone_no)
        {
            $this->uname = $name;
            $this->email = $email;
            $this->pass = $pass;

            $this->phone_no = $phone_no;
            $this->age = $age;
        }
        public function unamecheck(){
            $name = $this->uname;
            $len = strlen($name);
            $check = false;
          if($len>=10 && $len <= 30){
              for($i = 0;$i<$len;$i++){
                  if($i>2&&$name[$i] == ' ')
                  {
                      $check = true;
                  }
              }
              if($check!=true)
                    return false;
              else{
                  return true;
              }
          }
          else return false;
    
        }
       public function passwordcheck(){
            $pass = $this->pass;
            $len = strlen($pass);
            $strlowcnt = 0;
            $strupcnt = 0;
            $strnumcnt = 0;
            $strsccount = 0;
            
            if($len>=5 && $len<=20){
             for($i = 0; $i<$len;$i++){
                 if((ord($pass[$i])>=32 & ord($pass[$i])<=47) || (ord($pass[$i])>=58 & ord($pass[$i])<=64) || (ord($pass[$i])>=91 & ord($pass[$i])<=96)||(ord($pass[$i])>=123 & ord($pass[$i])<=126)){
                      $strsccount++;
                 }
                 elseif(ord($pass[$i])>=97 && ord($pass[$i])<=122)
                 {
                     $strlowcnt++;
                 }
                 elseif(ord($pass[$i])>=65 && ord($pass[$i])<=90)
                 {
                     $strupcnt++;
                 }
                 elseif(ord($pass[$i])>=48 && ord($pass[$i])<=57)
                 {
                     $strnumcnt++;
                 }
            }
                
                if($strlowcnt>=1&& $strsccount>=1&&$strupcnt>=1&&$strnumcnt>=1)
                {
                 return true;
                }
                else
                {
                 return false;
                }
            }
            else{
                return false;
            }
        }
       public function emailcheck(){
            $email = $this->email;
            $len = strlen($email);
            $endp = $len - 14;
            $end = substr("$email",$endp,$len);
            if($end == "@std.ewubd.edu")
             { 
               
                 return true;
             }
             else {
                 return false;
             } 
    
    
        }
       
       public function agecheck(){
            $age = $this->age;
            if($age->format("%y")<=18){
                return false;
            }
            else
            {
                return true;
            }
    
    
        }
        
        public function phone_no_check(){
        $phone_no = $this->phone_no;
         $len = strlen($phone_no);
         if($phone_no[0]== '+' && $len == 14){
             if(($phone_no[1]==8&&$phone_no[2]==8&&$phone_no[3]==0&& $phone_no[4]==1)&&$phone_no[5]==7|| $phone_no[5]==9|| $phone_no[5]==6||$phone_no[5]==3 || $phone_no[5]==4)
                  {return true;}
             else return false;
         }
         else if ($phone_no[0] == '0' && $len == 11){
             if($phone_no[1]==0&& $phone_no[2]==1&&$phone_no[3]==7|| $phone_no[3]==9|| $phone_no[3]==6||$phone_no[3]==3 || $phone_no[3]==4)
                  {return true;}
             else return false;
         }
        }

    }

?>