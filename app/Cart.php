<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            ////luu lai gia trị của cart cũ
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        //luu item mới vào biến phụ $storedItem
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
                //kiểm tra xem san pham đã co chưa neu có roi thi chỉnh sửa items đó
                 if($this->items[$id]['stocking'] == 'true'){ //neu het hang khong tang so luong
                     $storedItem['qty']++; //tang so lương len 1
                }

            }
            else {
                 $storedItem['qty']++; //tang so lương len 1
                 $storedItem['stocking'] = 'true'; ///khai bao còn hàng
                $this->totalQty++; // câp nhât lại so luong
            }
        }
        else { //truong hop gio hang chưa có sản phẩm
             $storedItem['qty']++; //tang so lương len 1
             $storedItem['stocking'] = 'true'; ///khai bao còn hàng
             $this->totalQty=1;
         }




        $storedItem['price'] = $item->price * $storedItem['qty']; //cap nhat price cho items
        $storedItem['minimum'] = 'true';

        $this->items[$id] = $storedItem; //cap nhat lại items cho cart thông qua biên phụ
        $this->totalPrice += $item->price; //cộng thêm giá của đơn hàng vừa thêm với tổng tiền cũ
    }
    public function delete($id){
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['price'] ;
        unset ( $this->items[$id]);         
    }
    public function update($id,$action,$qtyAvailable){

     if(array_key_exists($id,$this->items)){
        if($action=='asc')
        {
            $this->items[$id]['qty']++;


                    $this->items[$id]['minimum'] = 'false';  //sau khi tang thi cho phep giam

                    if($this->items[$id]['qty']>=$qtyAvailable) 
                    { 
                            $this->items[$id]['stocking'] = 'false'; //bao het hang
                            $this->items[$id]['qty']=$qtyAvailable; //so luong bang gia tri hang trong kho
                        } 
                        else 
                        {
                            $this->items[$id]['stocking'] = 'true';
                            
                        }
                    ///////////////

                        $this->items[$id]['price'] = ($this->items[$id]['item']->price)*($this->items[$id]['qty']);
                        $this->totalPrice = 0;
                        foreach ($this->items as $key => $value) {
                            $this->totalPrice += $value['price'];
                        }
                    }
                    if($action=='desc')
                    {   

                        $this->items[$id]['qty']--;

                    $this->items[$id]['stocking'] = 'true';//giam xong bao con hang
                    if($this->items[$id]['qty'] <=1) 
                        { $this->items[$id]['minimum'] = 'true';
                    $this->items[$id]['qty']=1;
                } 
                else 
                    {$this->items[$id]['minimum'] = 'false'; }


                $this->items[$id]['price'] = ($this->items[$id]['item']->price)*($this->items[$id]['qty']);
                $this->totalPrice = 0;
                foreach ($this->items as $key => $value) {
                    $this->totalPrice += $value['price'];
                }   
            }

        }
    }

}