<?php
class mOrder
{
    public function mGetAllOrder()
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM `order` O JOIN order_detail OD ON O.orderID = OD.orderID JOIN customer C ON C.customerID = O.customerID GROUP BY OD.orderID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
            return $result;
        else
            return null;
    }

    public function mGetOrderByID($orderID)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT *, GROUP_CONCAT(CONCAT(P.productName, ' (x', OD.quantity, ')') SEPARATOR ', ') AS products 
            FROM `order` O JOIN order_detail OD ON O.orderID = OD.orderID JOIN customer C ON C.customerID = O.customerID JOIN product P ON P.productID = OD.productID WHERE OD.orderID GROUP BY OD.orderID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
            return $result;
        else
            return null;
    }

    public function mCheckOrder($orderID)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM `order` WHERE orderID = $orderID";
        $result = $conn->query($sql);

        return $result->num_rows;
    }

    public function mGetOrderDuring($start, $end)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM `order` O JOIN order_detail OD ON O.orderID = OD.orderID JOIN customer C ON C.customerID = O.customerID WHERE O.date BETWEEN '$start' AND '$end' GROUP BY OD.orderID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
            return $result;
        else
            return null;
    }

    public function mInsertOrder($userID, $customerID, $finalPrice, $paymentMethod)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "INSERT INTO `order` (userID, customerID, finalPrice, paymentMethod) VALUE ($userID, $customerID, $finalPrice, '$paymentMethod')";
        $result = $conn->query($sql);

        if (!$result)
            return null;
        else
            return $conn->insert_id;
    }

    public function mInsertOrderDetail($orderID, $productID, $quantity, $price)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "INSERT INTO `order_detail` (orderID, productID, quantity, price) VALUE ($orderID, $productID, $quantity, $price)";
        $result = $conn->query($sql);

        if (!$result)
            return null;
    }
}
?>