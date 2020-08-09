<?php


class FrontController extends Controller
{
    
    public function index()
    {
        $this->render("front/index");
    }
    public function contact()
    {
        $this->render("front/contact");
    }
    public function calendar()
    {
        $this->render("front/calendrier_ajax");
    }
    public function soins() {
        $soins = [];
        $categories = Category::getAllCategories();
        foreach ($categories as $category)
        {
            $soins[] = Soin::getByCategory($category->getId());
        }
        $this->render("front/soins", ['soins' => $soins]);

    }
}