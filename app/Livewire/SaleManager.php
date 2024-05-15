<?php

namespace App\Livewire;

use App\Models\Bill;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class SaleManager extends Component
{
    public $productId;
    public $productPrice;
    public $quantity;
    public $products;
    public $price;
    public $salesProducts = [];
    public $totalPrice = 0;

    public function mount()
    {
        $this->products = Product::orderBy('name')->get();
    }

    public function addProduct()
    {
        if ($this->productId && $this->quantity && $this->price) {
            $product = Product::find($this->productId);
            $productData = [
                'name' => $product->name,
                'id' => $product->id,
                'quantity' => $this->quantity,
                'price' => $this->price,
            ];
            $this->salesProducts[] = $productData;
            $this->productId = null;
            $this->quantity = null;
            $this->price = null;
            $this->productPrice = null;

            $this->totalPrice += $productData['price'];
        }
    }

    public function saveSale()
    {
        Sale::create(['price' => $this->totalPrice]);

        foreach ($this->salesProducts as $product) {
            Bill::create([
                'sale_id' => Sale::latest()->first()->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);

            // Update the product stock
            $updatedProduct = Product::find($product['id']);
            $updatedProduct->stock -= $product['quantity'];
            $updatedProduct->save();
        }


        return redirect()->route('sales.index');
    }

    public function removeSale($product_id)
    {
        $product = Product::find($product_id);
        $this->totalPrice -= $product->price;
        $this->salesProducts = array_filter($this->salesProducts, function ($product) use ($product_id) {
            return $product['id'] != $product_id;
        });

        if (empty($this->salesProducts)) {
            $this->totalPrice = 0;
        } else {
            $this->totalPrice = array_reduce($this->salesProducts, function ($carry, $product) {
                return $carry + $product['price'];
            });
        }
    }

    public function valuesSelected()
    {
        $this->productPrice = Product::find($this->productId)->price;
    }

    public function render()
    {
        return view('livewire.sale-manager');
    }
}
