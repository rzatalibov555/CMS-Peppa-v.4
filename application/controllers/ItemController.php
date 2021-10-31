<?php

class ItemController extends CI_Controller{

    public $rootFolder = "";
    public $viewFolder = "";
    public $subViewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->rootFolder = "admin";
        $this->viewFolder = "item";
//        $this->subViewFolder = "add";

        $this->load->model("item_model");
    }

    public function index(){
        $viewData = new stdClass();


        $items = $this->item_model->get_all();

        $viewData->rootFolder = $this->rootFolder;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";

        $viewData->items = $items;

        $this->load->view("{$viewData->rootFolder}/{$viewData->viewFolder}/{$viewData->subViewFolder}/list",$viewData);
    }


    public function createItem(){
        $viewData = new stdClass();

        $get_all_item_category = $this->item_model->get_all_item_category();
        $get_all_item_status   = $this->item_model->get_all_item_status();
        $viewData->get_all_item_category = $get_all_item_category;
        $viewData->get_all_item_status   = $get_all_item_status;

        $viewData->rootFolder = $this->rootFolder;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->rootFolder}/{$viewData->viewFolder}/{$viewData->subViewFolder}/create",$viewData);
    }

    public function createItemAct(){


        $this->form_validation->set_rules("title_az", "TITLE AZ", "required|trim");
        $this->form_validation->set_rules("descr_az", "DESCRIPTION AZ", "required|trim");
        $this->form_validation->set_rules("date", "DATE", "required|trim");
        $this->form_validation->set_rules("category", "CATEGORY", "required|trim");
        $this->form_validation->set_rules("status", "STATUS", "required|trim");

        $this->form_validation->set_message(
            array(
                'required' => "<b>{field}</b> xanası doldurulmalıdır!",
                'trim'     => "<b>{field}</b> xanasında boşluq daxil etməyin!",
            )
        );

        $validate = $this->form_validation->run();

        if($validate){
            echo "yes";
        }else{
            $viewData = new stdClass();

            $get_all_item_category = $this->item_model->get_all_item_category();
            $get_all_item_status   = $this->item_model->get_all_item_status();
            $viewData->get_all_item_category = $get_all_item_category;
            $viewData->get_all_item_status   = $get_all_item_status;

            $viewData->rootFolder = $this->rootFolder;
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true; //Start form validation variable "set"

            $this->load->view("{$viewData->rootFolder}/{$viewData->viewFolder}/{$viewData->subViewFolder}/create",$viewData);

        }
//        die();
//        $title_az   = $_POST['title_az'];
//        $descr_az   = $_POST['descr_az'];
//
//        $title_en   = $_POST['title_en'];
//        $descr_en   = $_POST['descr_en'];
//
//        $title_ru   = $_POST['title_ru'];
//        $descr_ru   = $_POST['descr_ru'];
//
//        $title_tr   = $_POST['title_tr'];
//        $descr_tr   = $_POST['descr_tr'];
//
//        $date       = $_POST['date'];
//        $category   = $_POST['category'];
//        $status     = $_POST['status'];
//
//        if(!empty($title_az) && !empty($descr_az) && !empty($date) && !empty($category) && !empty($status)){
//
//            $data = [
//                'title'          => $title_az,
//                'title_en'       => $title_en,
//                'title_ru'       => $title_ru,
//                'title_tr'       => $title_tr,
//
//                'description'    => $descr_az,
//                'description_en' => $descr_en,
//                'description_ru' => $descr_ru,
//                'description_tr' => $descr_tr,
//
//                'date'           => $date,
//                'status'         => $status,
//                'category'       => $category,
//                'creater_id'     => $_SESSION['admin_id'],
//                'creat_date'     => date("Y-m-d H:i:s"),
//
//            ];
//
//            $data = $this->security->xss_clean($data);
//            print_r('<pre>');
//            print_r($data);
//
//        }else{
//            $this->session->set_flashdata('err', 'Diqqət! Boşluq buraxmayın!');
//            redirect($_SERVER['HTTP_REFERER']);
//
//        }
//





    }




}