<?php

namespace App\Interfaces;

interface BlogCategoryInterface
{
    public function getAllBlogCategories();
    public function getBlogCategoriesById($blogCategoriesId);
    public function deleteBlogCategories($blogCategoriesId);
    public function createBlogCategories(array $blogCategoriesDetails);
    public function updateBlogCategories($blogCategoriesId, array $newDetails);
    public function getFulfilledBlogCategories();
}
