<?php
class JourBDD {
    private $id;
    private $date;
    private  $image;
    private $title;
    private $Cdescript;
    private $descript;
    private $horaire;
    private $facebook;
    private $inscription;
    private $vainqueur;
    private $finit;

    /**
    * JourBDD constructor.
    * @param $id
    * @param $date
    * @param $image
    * @param $title
    * @param $Cdescript
    * @param $descript
    * @param $horaire
    * @param $facebook
    * @param $inscription
    * @param $vainqueur
    * @param $finit
    */
    public function JourBDD($id, $date, $image, $title, $Cdescript, $descript, $horaire, $facebook, $inscription, $vainqueur, $finit)
    {
        $this->id = $id;
        $this->date = $date;
        $this->image = $image;
        $this->title = $title;
        $this->Cdescript = $Cdescript;
        $this->descript = $descript;
        $this->horaire = $horaire;
        $this->facebook = $facebook;
        $this->inscription = $inscription;
        $this->vainqueur = $vainqueur;
        $this->finit = $finit;
    }

    /**
    * @param mixed $id
    */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
    * @param mixed $date
    */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
    * @param mixed $image
    */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
    * @param mixed $title
    */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
    * @param mixed $Cdescript
    */
    public function setCdescript($Cdescript)
    {
        $this->Cdescript = $Cdescript;
    }

    /**
    * @param mixed $descript
    */
    public function setDescript($descript)
    {
        $this->descript = $descript;
    }

    /**
    * @param mixed $horaire
    */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;
    }

    /**
    * @param mixed $facebook
    */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
    * @param mixed $inscription
    */
    public function setInscription($inscription)
    {
        $this->inscription = $inscription;
    }

    /**
    * @param mixed $vainqueur
    */
    public function setVainqueur($vainqueur)
    {
        $this->vainqueur = $vainqueur;
    }

    /**
    * @param mixed $finit
    */
    public function setFinit($finit)
    {
        $this->finit = $finit;
    }

    /**
    * @return mixed
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * @return mixed
    */
    public function getDate()
    {
        return $this->date;
    }

    /**
    * @return mixed
    */
    public function getImage()
    {
        return $this->image;
    }

    /**
    * @return mixed
    */
    public function getTitle()
    {
        return $this->title;
    }

    /**
    * @return mixed
    */
    public function getCdescript()
    {
        return $this->Cdescript;
    }

    /**
    * @return mixed
    */
    public function getDescript()
    {
        return $this->descript;
    }

    /**
    * @return mixed
    */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
    * @return mixed
    */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
    * @return mixed
    */
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
    * @return mixed
    */
    public function getVainqueur()
    {
        return $this->vainqueur;
    }

    /**
    * @return mixed
    */
    public function getFinit()
    {
        return $this->finit;
    }
}

?>