<?php

    function getAllBlogs($search_params = '') {
        global $database;

        if ( empty($search_params) ) {
            $blogs = $database
            ->query("SELECT * FROM `blogs` ORDER BY `created_at` DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $blogs = $database
            ->query("SELECT * FROM `blogs` $search_params ORDER BY `created_at` DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
        }


        return $blogs;
    }


    function getSingleBlog($id) {
        global $database;

        $blog = $database
            ->query("SELECT * FROM `blogs` WHERE `id`='$id'")
            ->fetch(PDO::FETCH_ASSOC);

        return $blog;
    }
?>