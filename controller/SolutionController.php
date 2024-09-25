<?php
class PestInfo {
    public $name;
    public $information;
    public $solution;
    public $imagePath;

    public function __construct($name, $information, $solution, $imagePath) {
        $this->name = $name;
        $this->information = $information;
        $this->solution = $solution;
        $this->imagePath = $imagePath;
    }
}

class PestDescriptions {
    private static $pests = [
        'Wasp' => [
            'name' => 'Buboyog', 
            'information' => 'Ang mga gagamba ay mga lumilipad na insekto na may payat na katawan at makitid na baywang. May papel sila sa polinasyon at pagkontrol ng peste ngunit maaaring maging agresibo kapag nanganganib.', 
            'solution' => '1. Alisin ang mga bagay na nag-aakit sa kanila tulad ng bukas na basura. 2. I-seal ang mga pasukan sa mga gusali. 3. Gumamit ng mga patibong para sa gagamba. 4. Para sa matinding pagsalakay, isaalang-alang ang propesyonal na kontrol ng peste.', 
            'imagePath' => '../assets/images/pest/wasp.jpg'
        ],
        'Weevil' => [
            'name' => 'Weevil', 
            'information' => 'Ang mga weevil ay maliliit na beetle na may mahahabang pangil. Maaari nilang salakayin ang mga nakaimbak na butil at iba pang tuyong kalakal.', 
            'solution' => '1. Suriin at itapon ang mga infested na pagkain. 2. Linisin ng mabuti ang mga lugar ng imbakan. 3. Itago ang pagkain sa mga airtight na lalagyan. 4. Gumamit ng bay leaves o diatomaceous earth bilang natural na pang-iwas.', 
            'imagePath' => '../assets/images/pest/weevil.jpg'
        ],
        'Snail' => [
            'name' => 'Suso', 
            'information' => 'Ang mga suso ay mabagal na molusko na maaaring makasira sa mga halaman sa pamamagitan ng pagkain sa mga dahon at tangkay.', 
            'solution' => '1. Alisin ang mga suso ng mano-mano. 2. Gumamit ng copper tape o mga hadlang. 3. Maglagay ng mga patibong ng beer upang akitin at lunurin ang mga suso.', 
            'imagePath' => '../assets/images/pest/snail.jpg'
        ],
        'Moth' => [
            'name' => 'Moth', 
            'information' => 'Ang mga moth ay maaaring makasira sa mga tela at nakaimbak na produkto, at ang kanilang mga larvae ay kumakain sa iba\'t ibang halaman.', 
            'solution' => '1. Gumamit ng mothballs sa mga lugar ng imbakan. 2. Alisin ang mga infested na halaman. 3. Mag-set up ng pheromone traps upang mahuli ang mga moth.', 
            'imagePath' => '../assets/images/pest/moth.jpg'
        ],
        'Slug' => [
            'name' => 'Slug', 
            'information' => 'Ang mga slug ay katulad ng mga suso ngunit walang shell. Kumakain sila ng materyal ng halaman at maaaring magdulot ng malawak na pinsala.', 
            'solution' => '1. Gumamit ng slug pellets o patibong. 2. Gumawa ng mga hadlang gamit ang pinatuyong egg shells o diatomaceous earth. 3. Magdilig ng mga halaman sa umaga upang mabawasan ang kahalumigmigan sa gabi.', 
            'imagePath' => '../assets/images/pest/slug.jpg'
        ],
        'Earwig' => [
            'name' => 'Earwig', 
            'information' => 'Ang mga earwig ay nocturnal na insekto na kumakain sa mga halaman at nabubulok na organikong bagay.', 
            'solution' => '1. Gumamit ng mga patibong mula sa mamasa-masang nakatiklop na diyaryo. 2. Alisin ang mga labi at patay na materyal ng halaman. 3. Mag-apply ng insecticidal soap.', 
            'imagePath' => '../assets/images/pest/earwig.jpg'
        ],
        'Grasshopper' => [
            'name' => 'Salagubang', 
            'information' => 'Ang mga salagubang ay mga insekto na kumakain ng halaman na maaaring magdulot ng malubhang pinsala sa mga tanim at hardin.', 
            'solution' => '1. Gumamit ng insecticidal sprays. 2. Magpakilala ng mga natural na mandaragit tulad ng mga ibon. 3. Mag-apply ng neem oil sa mga halaman.', 
            'imagePath' => '../assets/images/pest/grasshopper.jpg'
        ],
        'Caterpillar' => [
            'name' => 'Caterpillar', 
            'information' => 'Ang mga caterpillar ay larvae ng mga paru-paro at moth. Maaari nilang ubusin ang mga dahon ng halaman at magdulot ng pinsala.', 
            'solution' => '1. Alisin ang mga caterpillar mula sa mga halaman ng mano-mano. 2. Gumamit ng Bacillus thuringiensis (Bt) bilang natural na insecticide. 3. Himukin ang mga natural na mandaragit tulad ng mga ibon.', 
            'imagePath' => '../assets/images/pest/caterpillar.jpg'
        ],
        'Earthworm' => [
            'name' => 'Laway', 
            'information' => 'Ang mga earthworm ay kapaki-pakinabang para sa kalusugan ng lupa dahil tumutulong silang mag-aerate ng lupa at mag-decompose ng organikong materyal.', 
            'solution' => 'Walang kinakailangang aksyon dahil ang mga earthworm ay kapaki-pakinabang para sa kalusugan ng lupa.', 
            'imagePath' => '../assets/images/pest/earthworms.jpg'
        ],
        'Bettle' => [
            'name' => 'Beetle', 
            'information' => 'Ang mga beetle ay karaniwang insekto na maaaring makasira sa mga tanim sa pamamagitan ng pagkain sa mga dahon, tangkay, at ugat.', 
            'solution' => '1. Alisin ang mga beetle mula sa mga halaman ng mano-mano. 2. Gumamit ng insecticidal soap o neem oil. 3. Mag-rotate ng mga tanim upang mabawasan ang populasyon ng beetle.', 
            'imagePath' => '../assets/images/pest/beetle.jpg'
        ],
        'Ants' => [
            'name' => 'Langgam', 
            'information' => 'Ang mga langgam ay sosyal na insekto na maaaring magdulot ng abala sa pamamagitan ng pagpasok sa mga tahanan para sa pagkain.', 
            'solution' => '1. I-seal ang mga pasukan sa mga gusali. 2. Gumamit ng ant baits o patibong. 3. Itago ang pagkain sa mga airtight na lalagyan.', 
            'imagePath' => '../assets/images/pest/ants.jpg'
        ],
        'Bees' => [
            'name' => 'Bubuyog', 
            'information' => 'Ang mga bubuyog ay mahalagang pollinators, ngunit ang ilang species ay maaaring maging agresibo kapag ang kanilang mga pugad ay naabala.', 
            'solution' => '1. Iwasang abalahin ang mga pugad ng bubuyog. 2. Makipag-ugnayan sa mga propesyonal na beekeepers para sa ligtas na pagtanggal kung kinakailangan.', 
            'imagePath' => '../assets/images/pest/bees.jpg'
        ],
        'Borers' => [
            'name' => 'Borers', 
            'information' => 'Ang mga borer ay mga larvae na sumusubok na pumasok sa mga puno at halaman, na nagiging sanhi ng malubhang pinsala.', 
            'solution' => '1. I-prune at sirain ang mga infested na sanga. 2. Gumamit ng insecticides upang targetin ang mga larvae. 3. Panatilihin ang kalusugan ng halaman upang labanan ang mga borer.', 
            'imagePath' => '../assets/images/pest/borers.jpg'
        ],
        'Cane Grubs' => [
            'name' => 'Cane Grubs', 
            'information' => 'Ang mga cane grubs ay larvae ng beetles na kumakain sa ugat ng tubo, na nagiging sanhi ng pagbawas sa ani.', 
            'solution' => '1. Mag-apply ng soil insecticides. 2. Mag-rotate ng mga tanim upang masira ang siklo ng buhay. 3. Subaybayan ang mga larangan para sa presensya ng grubs.', 
            'imagePath' => '../assets/images/pest/cane_grubs.jpg'
        ],
        'Corn Earworm' => [
            'name' => 'Corn Earworm', 
            'information' => 'Ang mga corn earworms ay caterpillar na kumakain sa mga tenga ng mais, na nagbabawas sa kalidad ng ani.', 
            'solution' => '1. Gumamit ng insecticidal sprays. 2. Magtanim ng mga uri ng mais na lumalaban. 3. Gumamit ng pheromone traps upang subaybayan ang populasyon.', 
            'imagePath' => '../assets/images/pest/corn_earworm.jpg'
        ],
        'Corn Leaf Aphid' => [
            'name' => 'Corn Leaf Aphid', 
            'information' => 'Ang mga corn leaf aphid ay maliliit na insekto na sumisipsip ng sap mula sa mga dahon ng mais, na nagiging sanhi ng pagka-dehydrate ng halaman.', 
            'solution' => '1. Gumamit ng insecticidal soaps. 2. Mag-introduce ng mga natural na mandaragit tulad ng ladybugs. 3. Panatilihing malusog ang mga halaman upang labanan ang aphids.', 
            'imagePath' => '../assets/images/pest/corn_leaf_aphid.jpg'
        ],
        'Undefined' => [
            'name' => 'Hindi Tukoy', 
            'information' => 'Ang peste ay hindi maaring matukoy. Mangyaring tiyakin na malinaw ang larawan at maayos ang pokus sa insekto.', 
            'solution' => 'Subukan ang kumuha ng ibang larawan na may mas magandang ilaw at pokus. Kung magpapatuloy ang problema, kumonsulta sa lokal na eksperto sa kontrol ng peste para sa personal na pagtukoy.', 
            'imagePath' => '../assets/images/pest/undefined.jpg'
        ]
    ];
    

    public static function getPestInfo($pestLabel) {
        $pestLabel = trim($pestLabel);
        if (array_key_exists($pestLabel, self::$pests)) {
            $pest = self::$pests[$pestLabel];
        } else {
            $pest = self::$pests['Undefined'];
        }
        return new PestInfo($pest['name'], $pest['information'], $pest['solution'], $pest['imagePath']);
    }
}


?>
