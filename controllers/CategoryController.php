<?php
require_once 'Controller.php';
require_once 'models/Category.php';


class CategoryController extends Controller
{
    public function __construct()
    {

        $session = new Session();
        if (!$session->isLogged())
        {
            $this->redirectTo("user", "login");
        }
    }
    public function index()
    {
        $categories = Category::getAllCategories();
        $this->render('admin/categories', ['categories' => $categories]);
    }
  
    
    public function addCategory(){

            if (isset($_POST["name"])){

                $category = new Category();
                $category->setNom($_POST["name"]);

                $category->add();

            }
            
            $this->render("admin/add_category");

    }

    public function editCategory(){

        if(isset($_GET['id']))
        {
            $category = Category::getCategoryById($_GET["id"]);

            if (isset($_POST["name"])){

                $category->setNom($_POST["name"]);
                $category->edit();
                $this->redirectTo("category", "index");
            }

            $this->render("admin/edit_category",["category"=>$category]);
        }else{
            $this->redirectTo("admin");
        }

    }
    public function deleteCategory(){

        if(isset($_GET['id']))
        {

            $category = Category::getCategoryById($_GET["id"]);

            $category->delete();

            $this->redirectTo("category", "index");

            }else{
        $this->redirectTo("admin");
        }
    }
}