<?php


namespace App\Http\Controllers;


use App\Repositories\ProductRepository;
use App\Service\ImageSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var ImageSaver
     */
    private $imageSaver;

    public function __construct(ProductRepository $productRepository, ImageSaver $imageSaver)
    {
        $this->productRepository = $productRepository;
        $this->imageSaver = $imageSaver;
    }

    public function products()
    {
        $products = $this->productRepository->getAll();
        return view('products.products', ['products' => $products]);
    }

    public function productsList()
    {
        $products = $this->productRepository->getAll();
        return view('products.productsList', ['products' => $products]);
    }

    public function addProduct(Request $request)
    {
        $image = $request->file('image')
            ? $this->imageSaver->getImageFromForm($request->file('image'))
            : 'noimage.png';
        $productFromForm = [
            'image' => $image,
            'name' => $request->input('name'),
            'tittle' => $request->input('tittle'),
            'price' => $request->input('price'),
        ];
        $this->productRepository->addProduct($productFromForm);
        return redirect()->route('productsList');
    }

    public function productSelection($id)
    {
        $productSelection = $this->productRepository->productSelection($id);
        return view('products.updateProduct', ['product' => $productSelection]);
    }

    public function deleteProduct($id)
    {
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->route('productsList');
    }

    public function updateProduct(Request $request, $id)
    {
        $productFromForm = [
            'id' => $id,
            'name' => $request->input('name'),
            'tittle' => $request->input('tittle'),
            'price' => $request->input('price'),
        ];
        if ($formImage = $request->file('image')) {
            $productFromForm['image'] = $this->imageSaver->getImageFromForm($formImage);
        }
        $this->productRepository->updateProduct($productFromForm);
        $productSelection = $this->productRepository->productSelection($productFromForm['id']);
        return view('products.updateProduct', ['product' => $productSelection]);
    }
}
