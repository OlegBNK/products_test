<?php


namespace App\Repositories;


use App\Service\ImageSaver;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    /**
     * @var ImageSaver
     */
    private $imageUrlFormatter;

    public function __construct(ImageSaver $imageUrlFormatter)
    {
        $this->imageUrlFormatter = $imageUrlFormatter;
    }

    public function getAll(): Collection
    {
        return DB::table('products')->get();
    }

    public function addProduct($productFromForm): void
    {
        DB::table('products')->insert($productFromForm);
    }

    public function productSelection($id): object
    {
        return DB::table('products')->find($id);
    }

    public function getImageFromTable($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->get();
        if (!isset($product[0])){
            throw new \Exception("продукта с идентификатором $id не существует");
        }
        return $product[0]->image;
    }

    public function updateProduct($productFromForm): void
    {
        $getImageFromTable = $this->getImageFromTable($productFromForm['id']);
        $productFromForm['image'] = $productFromForm['image'] ?? $getImageFromTable;
        DB::table('products')
            ->where('id', $productFromForm['id'])
            ->update($productFromForm);
    }
}
