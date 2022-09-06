<?php

namespace App\Http\Controllers;

use App\Services\ProductColorService;
use App\Services\ProductTypeService;
use Illuminate\Http\Request;
use App\Services\ProductService;

class AdminController extends Controller
{
    protected $productService;
    protected $productTypeService;
    protected $productColorService;

    public function __construct(
        ProductService $productService,
        ProductTypeService $productTypeService,
        ProductColorService $productColorService
    )
    {
        $this->productService = $productService;
        $this->productTypeService = $productTypeService;
        $this->productColorService = $productColorService;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function edit()
    {
        $data = $this->productService->findId(1);

        return view('admin.product.edit', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $dataRequest = $request->all();

        //Combination to 1 array
        $arr = array();
        for ($i = 0; $i < count($dataRequest['memory']); $i++) {
            $file = $request->file('image')[$i];
            $h = [
                'id' => $i,
                'memory' => $dataRequest['memory'][$i],
                'color' => $dataRequest['color'][$i],
                'amount' => $dataRequest['amount'][$i],
                'price' => $dataRequest['price'][$i],
                'image' => $file->getClientOriginalName()
            ];
            array_push($arr, $h);
        }

        //Unique collection
        $collect = collect($arr);
        for ($i = 0; $i < count($dataRequest['memory']); $i++) {
            $query = $collect->where('memory', $dataRequest['memory'][$i])
                             ->where('color', $dataRequest['color'][$i]);

            if ($query->count() >= 2) {
                $id = $query->first()['id'];
                $collect->forget($id);
            }
        }
        dd($collect);

        try {
            //Insert product
                        $dataProduct = [
                            'name'          => $dataRequest['name'],
                            'type'          => $dataRequest['type'],
                            'description'   => $dataRequest['description'],
                            'status'        => isset($dataRequest['status']) ? 1 : 0
                        ];
                        $this->productService->insert($dataProduct);

                        //Insert product component

                        $dataProductComponent = [

                        ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $file = $request->file('img');
        return $file->move('images', $file->getClientOriginalName());
    }

    public function delete($id)
    {
        return $this->productService->delete($id);
    }

    public function indexProductType()
    {
        $data = $this->productTypeService->all();

        return view('admin.product_type.index', ['data' => $data]);
    }

    public function createProductType()
    {
        return view('admin.product_type.create');
    }

    public function editProductType($id)
    {
        $data = $this->productTypeService->findId($id);

        return view('admin.product_type.edit', ['data' => $data, 'id' => $id]);
    }

    public function storeProductType(Request $request)
    {
        $dataRequest = $request->all();

        $data = [
            'name'       => $dataRequest['name'],
            'status'     => isset($dataRequest['status']) ? $dataRequest['status'] : 1
        ];

        if (isset($dataRequest['id'])) {
            $this->productTypeService->update($data, $dataRequest['id']);
            return redirect()->back()->with(['message' => 'Thay đổi thành công']);
        }

        $row = $this->productTypeService->insert($data);

        if ($row) {
            return response()->json(['status' => 1 ,'data' => $row]);
        }

        return response()->json(['status' => 0]);
    }

    public function deleteProductType($id)
    {
        $this->productTypeService->delete($id);
        return redirect()->back()->with(['message' => 'Xoá thành công']);
    }

    public function indexProductColor()
    {
        $data = $this->productColorService->all();

        return view('admin.product_color.index', ['data' => $data]);
    }

    public function createProductColor()
    {
        return view('admin.product_color.create');
    }

    public function editProductColor($id)
    {
        $row = $this->productColorService->findId($id);

        return view('admin.product_color.edit', ['data' => $row, 'id' => $id]);
    }

    public function storeProductColor(Request $request)
    {
        $dataRequest = $request->all();

        $data = [
            'name'       => $dataRequest['color'],
            'color_code' => $dataRequest['color-code'],
            'status'     => isset($dataRequest['status']) ? $dataRequest['status'] : 1
        ];

        if (isset($dataRequest['id'])) {
            $this->productColorService->update($data, $dataRequest['id']);
            return redirect()->back()->with(['message' => 'Thay đổi thành công']);
        }

        $row = $this->productColorService->insert($data);

        if ($row) {
            return response()->json(['status' => 1 ,'data' => $row]);
        }

        return response()->json(['status' => 0]);
    }

    public function deleteProductColor($id)
    {
        $this->productColorService->delete($id);
        return redirect()->back()->with(['message' => 'Xoá thành công']);
    }
}
