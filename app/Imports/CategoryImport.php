<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class CategoryImport implements ToModel,WithHeadingRow,WithMultipleSheets
{

    private $number = 1;
    public  $category_array;
    public  $sheet;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $main_cat['name'] = strtolower(trim(@$row['main_category']));
        if (!empty($main_cat['name'])) {
            $main_cat['name_fa'] = @$row['farsi_main_category'];
            $main_cat['image'] = @$row['picture_of_category'];
            $main_cat['des'] = @$row['description_main_cat'];
            $main_cat['des_fa'] = @$row['description_main_cat_farsi'];
            $sub_cat['name'] = strtolower(trim(@$row['sub_category']));
            $sub_cat['name_fa'] = @$row['sub_category_farsi'];
            $sub_cat['image'] = @$row['picture_of_sub_category'];
            $sub_cat['des'] = @$row['description_of_sub_category'];
            $sub_cat['des_fa'] = @$row['description_of_sub_category_farsi'];
            $sub_sub_cat['name'] = strtolower(trim(@$row['sub_sub_category']));
            $sub_sub_cat['name_fa'] = @$row['sub_sub_category_farsi'];
            $sub_sub_cat['image'] = @$row['picture_of_sub_sub_category'];
            $sub_sub_cat['des'] = @$row['description_of_sub_sub_category'];
            $sub_sub_cat['des_fa'] = @$row['description_of_sub_sub_category_farsi'];
            $category = [];
            $subcategory = [];
            $sub_subcategory = [];

            if ($main_cat) {
                $category = Category::updateOrCreate([
                    'name' => $main_cat['name'], 'name_fa' => $main_cat['name_fa']],
                    $main_cat
                );
            }
            if ($sub_cat && !empty($category)) {
                $subcategory = Category::updateOrCreate([
                    'name' => $sub_cat['name'], 'name_fa' => $sub_cat['name_fa'], 'parent_id' => $category->id],
                    $sub_cat
                );
            }
            if ($sub_sub_cat && !empty($category) && !empty($subcategory)) {
                $sub_subcategory = Category::updateOrCreate([
                    'name' => $sub_sub_cat['name'], 'name_fa' => $sub_sub_cat['name_fa'], 'parent_id' => $subcategory->id],
                    $sub_sub_cat
                );
            }
            if ($category instanceof Category) {
                $this->category_array[$this->number]['C'] = $category;
            }
            if ($subcategory instanceof Category)
                $this->category_array[$this->number]['H'] = $subcategory;
            if ($sub_subcategory instanceof Category)
                $this->category_array[$this->number]['M'] = $sub_subcategory;
            ++$this->number;
            return $category;

        }
        return [];
//        return new Category([
//            'name'     => $row[0],
//            'name_fa'    => $row[1],
//            'image' => Hash::make($row[2]),
//        ]);
    }
//    public function rules(): array
//    {
//        return [];
//    }
//    public function getCsvSettings(): array
//    {
//        return [
//        ];
//    }
    public function headingRow(): int
    {
        return 1;
    }
    public function sheets(): array
    {
        return $this->sheet;
    }

}
