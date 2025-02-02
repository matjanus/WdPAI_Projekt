<?

class Image {
    private string $id;

    public function __construct(string $id){ 
        $this->id = $id;
    }

    public function getFilePath(){
        return "/img/galleries/".$this->id;
    }

    public function getId() : string {
        return $this->id;
    }


}