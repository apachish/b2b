<?php


namespace App\Excel;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class ExcelImport
{
    /**
     * @var
     */
    protected $excel;
    /**
     * @var
     */
    protected $work_sheet;

    /**
     * @var array
     */
    protected $excel_data = [];
    private $category;

    /**
     * ExcelImport constructor.
     * @param Request $request
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     */
    public function __construct($file, $category)
    {
        //Load file from request
        $this->excel = IOFactory::load($file);
        //Get active sheet
        $this->work_sheet = $this->excel->getActiveSheet();
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function import()
    {
        //Iterate through drawing collection
        foreach ($this->work_sheet->getDrawingCollection() as $drawing) {
            //check if it is instance of drawing
            if ($drawing instanceof MemoryDrawing) {
                ob_start();
                call_user_func(
                    $drawing->getRenderingFunction(),
                    $drawing->getImageResource()
                );
                $imageContents = ob_get_contents();
                ob_end_clean();
                $cellID = $drawing->getCoordinates();
                $image = $drawing->getImageResource();
                $coordinate = Coordinate::coordinateFromString($cellID);
                $category = $this->category[--$coordinate[1]][$coordinate[0]];
                if ($category == null) continue;

                if (($coordinate[0] == "C" || $coordinate[0] == "H" || $coordinate[0] == "M")) {
//                    $posted_data = array(
//                        'category_image' => $drawing->getIndexedFilename()
//                    );

                    $renderingFunction = $drawing->getRenderingFunction();
                    $file_name = $category->id . "_" . time();

                    switch ($renderingFunction) {
                        case MemoryDrawing::RENDERING_JPEG:
                            $file_name .= '.jpg';
                            imagejpeg($image, public_path() . '/images/category/' . $file_name);
                            break;
                        case MemoryDrawing::RENDERING_GIF:
                            $file_name .= '.gif';
                            imagegif($image, public_path() . '/images/category/' . $file_name);

                            break;
                        case MemoryDrawing::RENDERING_PNG:
                        case MemoryDrawing::RENDERING_DEFAULT:
                            $file_name .= '.png';

                            imagepng($image, public_path() . '/images/category/' . $file_name);
                            break;
                    }
                    self::upload(public_path() . '/images/category/'. $file_name, $file_name);
                    $category->image =$file_name;
                    $category->update();
                }
            }
        }
        //Map other data present in work sheet
        return $this->rowData();
    }

    /**
     * @return array
     */
    private function rowData()
    {
        $i = 0;
        //Iterate through row by row
        foreach ($this->work_sheet->getRowIterator(2) as $row) {

            //iterate through cell by cell of row
            foreach ($row->getCellIterator() as $cell) {
                //In case of image data that would be null continue
                //We have already populated them in array
                if (is_null($cell->getValue())) {
                    continue;
                }

                //Map other excel data into the array
                $this->excel_data[$i]['name'] = $cell->getValue();
            }
            $i++;
        }

        //Return final data array
        return $this->excel_data;
    }

    public static function upload($originalImage, $file_name)
    {
        $path = public_path() . '/images/category/';
        $image = Image::make($originalImage);
        $thumbnail = 'thumbnail_' . $file_name;
        $image->resize(150, 150);
        $image->save($path . $thumbnail);


        return $file_name;
    }

}