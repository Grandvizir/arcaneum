<?php
class ImageBDD {
    private $id;
    private  $image;

    /**
    * JourBDD constructor.
    * @param $id
    * @param $image
    */
    public function ImageBDD($id, $image)
    {
        $this->id = $id;
        $this->image = $image;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

}

?>