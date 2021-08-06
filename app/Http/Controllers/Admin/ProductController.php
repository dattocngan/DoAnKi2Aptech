<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use DB;

class ProductController extends Controller
{
	public function createProduct(Request $request) {
		$categoryParentList = Category::where([
		    ['is_deleted', '=', '0'],
		    ['parent_id', '=', '0'],
		])->get();

		return view('admin.product.create')->with([
			'categoryParentList' => $categoryParentList,
		]);
	}

	//Lay category child qua ajax
	public function getCategoryChild(Request $request) {
		$id = $request->id;

		$categoryChildList = Category::where([
		    ['parent_id', '=', $id],
		    ['is_deleted', '=', '0'],
		])->get();

		return json_encode($categoryChildList);
	}

	//AJAX- Upload ảnh vào folder khi thả ảnh vào khung summernote, trả về đường link
	public function sendFile(Request $request) {

		if ($request->hasFile('file')) {  

			$file = $request->file('file');  

			$typefile = $file->getClientOriginalExtension();

			if ($typefile == 'jpg' || $typefile == 'png' || $typefile == 'jpeg') {

                $filename = time().'_'.$file->getClientOriginalName(); //Dat  lai ten cho file

                while (file_exists($filename)) {
					$filename = time().'_'.$file->getClientOriginalName();
				}

          		$file->move('project/images/products/description/',$filename); //move file ve thu muc 
          		$res = [
          			'url'=> "project/images/products/description/".$filename,
          			'message' => 'success',
          		];
     		}else{
      		$res = [
          			'url'=> null,
          			'message' => 'Chọn lại file ảnh định dạng jpg, png, jpeg',
          		  ];
     		 }

      	return json_encode($res);
  		}
	}


	//Lưu product mới vào Database
	public function storeProduct(Request $request) {
		$validatedNews = $request->validate([
    		'name' => 'required|unique:products',
    		'price'  => 'required',
    		'quantity_available' => 'required',
    		'short_description' => 'required',
    		'image' => 'required',
		], [
			'name.required' => 'Bạn chưa nhập tên sản phẩm',
			'name.unique' => 'Tên sản phẩm đã tồn tại',
			'price.required' => 'Bạn chưa nhập giá sản phẩm',
			'quantity_available.required' => 'Bạn chưa số lượng sản phẩm ban đầu',
			'short_description.required' => 'Bạn chưa nhập thông số kỹ thuật sản phẩm',
			'image.required' => 'Bạn chưa chọn hình ảnh chính mô tả sản phẩm',

		]);
		//Upload anh chinh Image cua san pham
		if ($request->hasFile('image')) {
			$image = $request->file('image');

			$type = $image->getClientOriginalExtension();

			if ($type == 'jpg' || $type == 'png' || $type == 'jpeg') {

                $image_name = time().'_'. $image->getClientOriginalName(); 
                while (file_exists($image_name)) {
					$image_name = time().'_'.$image->getClientOriginalName();
				}

          		$image->move('project/images/products/image/',$image_name); 
          	
     		}else{
	 			return redirect()->route('product_create') -> with([
					'err_image' => "Chọn lại ảnh minh họa bài viết định dạng jpg, png, jpeg",
				]);
     		}
  		}
	  		$product = new Product;
			$product->category_id = $request->categorychild_id;
			$product->name = $request->name;
			$product->price = $request->price;
			$product->price_discount = $request->price_discount;
			$product->href_param = $request->name;
			
			$price_select = $request->price;
			if (isset($request->price_discount) && $request->price_discount > 0 ) {
				$price_select = $request->price_discount;
			}

			if ($price_select < 1000000){
			    $product->price_level = 1;
			}
			else if ($price_select >= 1000000 && $price_select < 5000000){
			    $product->price_level = 2;
			}
			else if ($price_select >= 5000000 && $price_select < 10000000){
			    $product->price_level = 3;
			}
			else if ($price_select >= 10000000 && $price_select < 20000000){
			    $product->price_level = 4;
			}
			else if ($price_select >= 20000000 && $price_select < 30000.000){
			    $product->price_level = 5;
			}
			else {
			    $product->price_level = 6;  
			}

			$product->quantity_available = $request->quantity_available;

			if (isset($request->description) && $request->description != '' ) {
				$product->description = $request->description;
			}
			
			$product->is_deleted = 0;

			$product->created_at = date('Y-m-d H:i:s');

			$product->short_description = $request->short_description;

			$product->image = '/project/images/products/image/'.$image_name;
		
			$product->save();

			return redirect()->route('product_create') -> with([
					'message' => "Đã thêm sản phẩm mới thành công",
			]);
		}

		//Đổ danh sách tin sản phẩm DataBase ra table dữ liệu
		public function indexProduct(Request $request){

			$categoryParentList = Category::where([
				['is_deleted', '=', '0'],
				['parent_id', '=', '0'],
			])->get();

			$categoryChildList = Category::where([
		    ['parent_id', '<>', 0],
		    ['is_deleted', '=', '0'],
			])->get();

			$productList = DB::table('products') -> leftjoin('categories', 'products.category_id', '=', 'categories.id') -> select('products.*', 'categories.name as category_name')->where('products.is_deleted', 0);

			if (isset($request->categorychild_id) && $request->categorychild_id > 0) {
				$productList = $productList->where('category_id', $request->categorychild_id);
			}

		   	if (isset($request->product_name) && $request->product_name != '' ) {
		    		$productList = $productList ->where('products.name', 'like', '%'.$request->product_name.'%');
		    }


		    $index = 0;
		    if (isset($request->page)) {
		    	$index = ($request->page - 1) *10;
		    }

		    $productList = $productList->paginate(10);

		    	return view('admin.product.index')->with([
		    		'productList' => $productList,
		    		'categoryParentList' => $categoryParentList,
		    		'index'=> $index,
				//keep lai thong tin phan tim kiem
		    		'categoryChildList' => $categoryChildList,
		    		'categoryparent_id' => $request->categoryparent_id,
		    		'categorychild_id' => $request->categorychild_id,
		    		'product_name' => $request->product_name,
		    	]);
		}


		//Đổ ra Form sửa tin tức
		public function editProduct(Request $request, $id){
			$categoryParentList = Category::where([
				['is_deleted', '=', '0'],
				['parent_id', '=', '0'],
			])->get();

			$categoryChildList = Category::where([
		    ['parent_id', '<>', 0],
		    ['is_deleted', '=', '0'],
			])->get();


			$product = Product::find($id);

			//Tìm id của category to và nhỏ truyền sang view
			$categorychild_id = $product->category_id;

			$categoryChild = Category::find($categorychild_id);

			$categoryparent = Category::find($categoryChild->parent_id);

			$categoryparent_id = $categoryparent->id;
			//Tìm id của category to và nhỏ truyền sang view End
			return view('admin.product.edit')->with([
				'product' => $product,
				'categorychild_id' => $categorychild_id,
				'categoryparent_id' => $categoryparent_id,
				'categoryChildList' => $categoryChildList,
				'categoryParentList' => $categoryParentList
			]);
		}


		//Lưu nội dung tin tức trong Form sửa vào database
		public function updateProduct(Request $request, $id){
		$validatedNews = $request->validate([
    		'name' => 'required|unique:products',
    		'price'  => 'required',
    		'quantity_available' => 'required',
    		'short_description' => 'required',
		], [
			'name.required' => 'Bạn chưa nhập tên sản phẩm',
			'name.unique' => 'Tên sản phẩm đã tồn tại',
			'price.required' => 'Bạn chưa nhập giá sản phẩm',
			'quantity_available.required' => 'Bạn chưa số lượng sản phẩm ban đầu',
			'short_description.required' => 'Bạn chưa nhập thông số kỹ thuật sản phẩm',
		]);

			$product = Product::find($id);
			$product->name = $request->name;
			$product->category_id = $request->categorychild_id;
			$product->price = $request->price;
			$product->price_discount = $request->price_discount;
			$product->quantity_available = $request->quantity_available;
			$product->short_description = $request->short_description;
			$product->description = $request->description;
			$product->updated_at = date('Y-m-d H:i:s');
			$product->href_param = $request->name;
			
			$price_select = $request->price;
			if (isset($request->price_discount) && $request->price_discount > 0 ) {
				$price_select = $request->price_discount;
			}

			if ($price_select < 1000000){
			    $product->price_level = 1;
			}
			else if ($price_select >= 1000000 && $price_select < 5000000){
			    $product->price_level = 2;
			}
			else if ($price_select >= 5000000 && $price_select < 10000000){
			    $product->price_level = 3;
			}
			else if ($price_select >= 10000000 && $price_select < 20000000){
			    $product->price_level = 4;
			}
			else if ($price_select >= 20000000 && $price_select < 30000.000){
			    $product->price_level = 5;
			}
			else {
			    $product->price_level = 6;  
			}
			

		if ($request->hasFile('image')) {
			$image = $request->file('image');

			$type = $image->getClientOriginalExtension();

			if ($type == 'jpg' || $type == 'png' || $type == 'jpeg') {

	            $image_name = time().'_'. $image->getClientOriginalName(); 

	            while (file_exists("project/images/products/image/".$image_name)) {
					$image_name = time().'_'.$image->getClientOriginalName();
				}

	      		$image->move('project/images/products/image/',$image_name); 

				// if(file_exists($product->thumnail)){
				//    unlink($product->thumnail);
				// }

	          	$product->image = '/project/images/products/image/'.$image_name;
  			}
			
		}
				$product->save();

				return redirect()->route('product_edit',['id'=>$product->id]) -> with([
					'message' => "Đã sửa sản phẩm thành công",
			]);
		}


		public function deleteProduct(Request $request){
			$id = $request->id;
			$product = Product::find($id);
			$product->is_deleted = 1;
			$product->save();

			// $productList = Product::where('is_deleted', 0)->paginate(10);
			$productList = DB::table('products') -> leftjoin('categories', 'products.category_id', '=', 'categories.id') -> select('products.*', 'categories.name as category_name')->where('products.is_deleted', 0);

			if (isset($request->categorychild_id) && $request->categorychild_id > 0) {
				$productList = $productList->where('category_id', $request->categorychild_id);
			}

		   	if (isset($request->product_name) && $request->product_name != '' ) {
		    		$productList = $productList ->where('products.name', 'like', '%'.$request->product_name.'%');
		    }

		    $productList = $productList->paginate(10);

			$res = [
          			'productList'=> $productList,
          			'message' => 'Đã xóa sản phẩm thành công',
          	 ];

			return json_encode($res);
	}
}
