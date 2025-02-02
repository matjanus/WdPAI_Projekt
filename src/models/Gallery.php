<?

require_once 'Image.php';

class Gallery {
    private string $name;
    private int $id;
    private ?Image $cover;

    public function __construct(int $id, string $name, ?string $id_cover){ 
        $this->id = $id;
        $this->name = $name;
        if($id_cover === null){
            $this->cover = null;
        }else{
            $this->cover = new Image($id_cover);
        }
        
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function toJson(){
        if( $this->cover === null){
            return ["id" => $this->id,"name" => $this->name, "img_path" => null ];
        }else{
            return ["id" => $this->id,"name" => $this->name, "img_path" => $this->cover->getFilePath()];
        }
   
    }


}