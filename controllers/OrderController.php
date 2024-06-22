<?php
require_once "Controller.php";

class OrderController extends Controller
{
    private $_bookModel;
    private $_userModel;
    private $_orderModel;

    public function __construct(OrderModel $orderModel, BookModel $bookModel, UserModel $userModel) {
        $this->_bookModel = $bookModel;
        $this->_userModel = $userModel;
        $this->_orderModel = $orderModel;
    }

    public function index() {
        $this->show(1);
    }

    public function show($page_number, $orders_per_page = 5) {
        $user = $this->_userModel->get_current_user();
        $is_auth = $this->_userModel->is_auth();

        if (!$is_auth) {
            header("Location: /user/login");
        }

        //Розрахунок фрейму замовлень 
        $orders = $this->_userModel->is_admin() ? $this->_orderModel->GetAllOrders() : $this->_orderModel->GetOrdersByUser($user);
        $total_page_count = ceil(count($orders) / $orders_per_page);
        if ($page_number > $total_page_count) header("Location: /order/show/{$total_page_count}");
        $total_count_of_orders = count($orders);
        $start_index = $page_number * $orders_per_page - $orders_per_page;
        $orders_on_page = array_slice($orders, $start_index, $orders_per_page);
        $order_statuses = $this->_orderModel->GetStatuses();

        if (count($orders_on_page) > 0) {
            require $this->view_path . "show_orders_template.php";
        } else {
            require $this->view_path . "no_orders_template.php";
        }
    }

    public function delete($order_id) {
        if ($this->_userModel->is_admin()) {
            $this->_orderModel->DeleteOrderById($order_id);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            require $this->view_path . "wrong_page_template.php";
        }
    }

    public function apply($order_id) {
        if ($this->_userModel->is_admin()) {
            var_dump($_POST);
            $this->_orderModel->UpdateOrderStatus($order_id, $_POST['new-order-status']);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            require $this->view_path . "wrong_page_template.php";
        }
    }

    public function create($book_id) {
        $user = $this->_userModel->get_current_user();
        $is_auth = $this->_userModel->is_auth();
        $book = $this->_bookModel->GetBookById($book_id);

        if (!$is_auth) {
            header("Location: /user/login");
        }

        if (!is_null($book)) {

            if (isset($_POST['order-btn'])) {
                if (empty($_POST['buyer-name'])) {
                    $error = "You must enter a name!";
                } elseif (strlen($_POST['buyer-name']) > 60) {
                    $error = "Name must be less than 60 characters!";
                } elseif (empty($_POST["buyer-phone-number"])) {
                    $error = "You must enter a phone number!";
                } elseif (!preg_match("/^\+380\d{9}$/", $_POST["buyer-phone-number"])) {
                    $error = "Phone number must be in the format +380xxxxxxxxx!";
                } else {
                    //Create order and redirect to orders page
                    $statues = $this->_orderModel->GetStatuses();
                    $order = new Order(
                        -1,
                        $_POST['buyer-name'],
                        $_POST["buyer-phone-number"],
                        $book,
                        $user,
                        new DateTime('now'),
                        $this->_orderModel->GetOrderStatusByName("In processing")
                    );

                    $this->_orderModel->CreateOrder($order);

                    header("Location: /order/show/1");
                }
            }
            require $this->view_path . "create_order_template.php";
        } else {
            require $this->view_path . "wrong_page_template.php";
        }
    }
}