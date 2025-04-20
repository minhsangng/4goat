<?php
class cOrder extends mOrder
{
    public function cGetAllOrder()
    {
        return $this->mGetAllOrder();
    }

    public function cGetOrderByID($orderID)
    {
        return $this->mGetOrderByID($orderID);
    }

    public function cCheckOrder($orderID)
    {
        return $this->mCheckOrder($orderID);
    }

    public function cGetOrderDuring($start, $end)
    {
        return $this->mGetOrderDuring($start, $end);
    }

    public function cInsertOrder($userID, $customerID, $paymentMethod)
    {
        return $this->mInsertOrder($userID, $customerID, $paymentMethod);
    }

    public function cInsertOrderDetail($orderID, $productID, $quantity, $price)
    {
        return $this->mInsertOrderDetail($orderID, $productID, $quantity, $price);
    }

    public function cGetRevenueByWeek($start, $end)
    {
        return $this->mGetRevenueByWeek($start, $end);
    }
    
    public function cGetRevenueByMonth($start, $end)
    {
        return $this->mGetRevenueByMonth($start, $end);
    }
    
    public function cGetCountOrder($start, $end)
    {
        return $this->mGetCountOrder($start, $end);
    }
    
    public function cGetProductTopSale($start, $end)
    {
        return $this->mGetProductTopSale($start, $end);
    }
    
    public function cGetCategoryTopSale($start, $end)
    {
        return $this->mGetCategoryTopSale($start, $end);
    }
}
?>