<?php
class AdminBDD {
    private $id;
    private $mail;
    private $pseudo;
    private $password;
    private $super_admin;

    /**
    * JourBDD constructor.
    * @param $id
    * @param $image
    */
    public function AdminBDD($id, $image)
    {
        $this->id = $id;
        $this->mail = $mail;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->super_admin = $super_admin;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMail($image)
    {
        $this->mail = $mail;
    }

    public function setPseudo($image)
    {
        $this->pseudo = $pseudo;
    }

    public function setPassword($image)
    {
        $this->password = $password;
    }

    public function setSuper_Admin($image)
    {
        $this->super_admin = $super_admin;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSuper_Admin()
    {
        return $this->super_admin;
    }
}
?>