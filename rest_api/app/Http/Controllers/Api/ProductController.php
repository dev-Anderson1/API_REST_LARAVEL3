<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Api\ApiError; 

class ProductController extends Controller
{
   /** 
    * @var Product
   */
   private $product;
   
   public function __construct(Product $product)
    {
        $this->product = $product;

    }
    
    
    public function index()
    {
        $data = ['data' => $this->product->paginate(10)];
        return response()->json($data);
        
    }

    public function show($id)
    {
        $product = $this->product->find($id);

        if(!$product) return response()->json(['data' => ['msg' => 'Produto nao encontrado']], 404);

        $data = ['data' => $product];
        return response()->json($data);
    }

    public function store(Request $request)
    {

            try{
                $productData = $request->all();
                $this->product->create($productData);
                $return = ['data'=>['msg'=> 'Produto Criado com sucesso']];
                return response()->json($return, 201);

            } catch(\Exception $e){
                if(config('app.debug')){
                    return response()->json(ApiError::erroMessage($e->getMessage(), 1010));
                }
                return response()->json(ApiError::erroMessage('Erro de Operação', 1010));
            }
        }

    public function update(Request $request, $id)
    {

            try{
                $productData = $request->all();
                $product     = $this->product->find($id);
                $product->update($productData);

                $return = ['data'=>['msg'=> 'Produto Atualizado com sucesso']];
                return response()->json($return, 201);

            } catch(\Exception $e){
                if(config('app.debug')){
                    return response()->json(ApiError::erroMessage($e->getMessage(), 1011));
                }
                return response()->json(ApiError::erroMessage('Erro de Operação de atualizar', 1011));
            }
        }
        public function delete(Product $id)
        {
            try{
                $id->delete();
                return response()->json(['data'=>['msg' => 'Produto: ' . $id->name . 'removido com sucesso']], 200);

            }catch (\Exception $e){
                if(config('app.debug')){
                    return response()->json(ApiError::erroMessage($e->getMessage(), 1012));
                }
                return response()->json(ApiError::erroMessage('Erro de Operação de deletar', 1012));

            }
        }
}
    
    
              //dd($request->all());
             // $productData = $request->all();
             // $this->product->create($productData);
      //      $data = ['data' => $id];
      //     return response()->json($data);
