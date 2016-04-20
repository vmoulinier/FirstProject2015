<?php
class User
{
    private $mail;
    private $mdp;
    private $id;
    
    public function __construct($mail, $mdp) {
        $this->setMail($mail);
        $this->setMdp($mdp);
    }
    
    public function login($bdd) {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($this->mail, $this->mdp));
        $userexist = $requser->rowcount();
        if ($userexist == 1) {
            $userinfo = $requser->fetch();
            $id = $userinfo['id'];
            $this->setId($id);
            return true;
        } else {
            return false;
        }
    }
    
    public function register($bdd)
    {
            $insertmbr = $bdd->prepare("INSERT INTO membres(mail, motdepasse) VALUES(?, ?)");
            $insertmbr->execute(array($this->mail, $this->mdp));
            return $insertmbr;
    }
    
    public function selectuserbymail($bdd)
    {
        $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
        $reqmail->execute(array($this->mail));
        $mailexist = $reqmail->rowCount();
        return $mailexist;
    }
    
    public function saveSession() {
        $_SESSION['user'] = $this;
    }
    
    public function connexion()
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMail(){
        return $this->mail;
    } 
    
    public function getMdp(){
        return $this->mdp;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setMail($var){
        $this->mail = $var;
    }
    
    public function setMdp($var){
        $this->mdp = $var;
    }
    
    public function setId($var){
        $this->id = $var;
    }
}